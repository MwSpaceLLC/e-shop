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
    const {email} = req.body;

    const sendResponse = (message, status = 200) => res.status(status).json({message: message})

    if (req.method !== 'POST' || !email) return sendResponse('Errore di richiesta, prova più tardi', 403);

    const user = await prisma.user.findUnique({where: {email: email}})

    // user not found in to a DATABASE
    if (!user) return sendResponse('Indirizzo e-mail non trovato', 403);

    // make token for user
    const token = (crypto.randomUUID() + crypto.randomUUID() + crypto.randomUUID()).replace(/-/g, '');

    // update token
    await prisma.user.update({
        where: {id: user.id},
        data: {
            tokens: {
                create: {
                    hash: token
                }
            }
        }
    })

    const link = `${req.headers.host}/api/forgot/${token}`;

    // send email from node to smtp
    const html = ReactDOMServer.renderToString(<ResetPassword email={email} link={link}/>);
    nodemail(email, 'Richiesta reset della password | ' + user.name, html, async function (err, info) {
        if (err) return sendResponse(err, 500)

        await req.session.save();
        return sendResponse('e-mail sent');

    })

});
