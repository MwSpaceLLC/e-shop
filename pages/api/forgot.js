// Next.js API route support: https://nextjs.org/docs/api-routes/introduction
import {connectGuestCartAndWishlist, withApiSession} from "../../lib/withSession";

import {prisma} from "../../lib/database";
import ReactDOMServer from "react-dom/server";
import nodemail from "../../lib/nodemail";
import ResetPassword from "../../emails/ResetPassword";

/**
 |--------------------------------------------------------------------------
 | Authentication Api routes
 |--------------------------------------------------------------------------
 */
export default withApiSession(async (req, res) => {
    const {email} = req.body;

    const sendResponse = (message, status = 200) => res.status(status).json({message: message})

    if (req.method !== 'POST' || !email) return sendResponse('Errore di richiesta, prova più tardi', 403);

    const user = await prisma.user.findUnique({where: {email: email}})

    // user not found in to a DATABASE
    if (!user) return sendResponse('Indirizzo e-mail non trovato', 403);

    // send email from node to smtp
    const html = ReactDOMServer.renderToString(<ResetPassword {...req.session.confirm}/>);
    nodemail(email, 'Richiesta reset della password | ' + user.name, html, async function (err, info) {
        if (err) return sendResponse(err, 500)

        await req.session.save();
        return sendResponse('e-mail sent');

    })

    return res.status(403).json({message: 'Le credenziali non corrispondono ai nostri record'})

});
