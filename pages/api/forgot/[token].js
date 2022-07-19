// Next.js API route support: https://nextjs.org/docs/api-routes/introduction
import {connectGuestCartAndWishlist, withApiSession} from "../../../lib/withSession";

import {prisma} from "../../../lib/database";
import ReactDOMServer from "react-dom/server";
import nodemail from "../../../lib/nodemail";
import ResetPassword from "../../../emails/ResetPassword";
import crypto from "crypto";

/**
 |--------------------------------------------------------------------------
 | Authentication Api routes
 |--------------------------------------------------------------------------
 */
export default withApiSession(async (req, res) => {
    const {forgot} = req.session;

    // const sendResponse = (message, status = 200) => res.status(status).json({message: message})

    if (req.method !== 'GET' || !forgot) return res.status(403).json()

    const user = await prisma.user.findUnique({where: {id: forgot.id}})

    // user not found in to a DATABASE
    if (!user) return sendResponse('Indirizzo e-mail non trovato', 403);

    // const token = (crypto.randomUUID() + crypto.randomUUID()).replace(/-/g, '');
    //
    // // return console.log(req.headers.origin)
    //
    // const link = `${req.headers.host}/api/forgot/${token}`;
    //
    // // send email from node to smtp
    // const html = ReactDOMServer.renderToString(<ResetPassword email={email} link={link}/>);
    // nodemail(email, 'Richiesta reset della password | ' + user.name, html, async function (err, info) {
    //     if (err) return sendResponse(err, 500)
    //
    //     await req.session.save();
    //     return sendResponse('e-mail sent');
    //
    // })

});
