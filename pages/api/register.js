// Next.js API route support: https://nextjs.org/docs/api-routes/introduction
import {withApiSession} from "../../lib/withSession";
import nodemail from "../../lib/nodemail";
import ConfirmCode from "../../emails/ConfirmCode";
import ReactDOMServer from "react-dom/server";
import {prisma} from "../../lib/database";

/**
 |--------------------------------------------------------------------------
 | Authentication Api routes
 |--------------------------------------------------------------------------
 */
export default withApiSession(async (req, res) => {
    const {name, email, password} = req.body;

    if (req.method !== 'POST' || !password || !email || !name) return res.status("403").json();

    const random = Math.floor(100000 + Math.random() * 900000);
    const sendResponse = (message, status = 200) => res.status(status).json({message: message})

    //create session confirm
    req.session.confirm = {name, email, password, random};

    // check if user already taken in to a DATABASE
    if (await prisma.user.findUnique({where: {email: email}})) {
        return sendResponse("indirizzo email già preso", 403)
    }

    // send email from node to smtp
    const html = ReactDOMServer.renderToString(<ConfirmCode {...req.session.confirm}/>);
    nodemail(email, 'Conferma il tuo indirizzo email', html, async function (err, info) {
        if (err) return sendResponse(err, 500)

        await req.session.save();
        return sendResponse('confirm email sent');

    })
});
