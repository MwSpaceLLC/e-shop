// Next.js API route support: https://nextjs.org/docs/api-routes/introduction

import {prisma} from "../../../lib/database";
import ReactDOMServer from "react-dom/server";
import nodemail from "../../../lib/nodemail";
import ResetPassword from "../../../emails/ResetPassword";
import {generateToken} from "../../../lib/function";
import bcrypt from "bcryptjs";
import {connectGuestCartAndWishlist, withApiSession} from "../../../lib/withSession";

/**
 |--------------------------------------------------------------------------
 | Authentication Api routes
 |--------------------------------------------------------------------------
 */
export default withApiSession(async (req, res) => {


    const {hash} = req.query;

    const sendResponse = (message, status = 200) => res.status(status).json({message: message})

    if (req.method !== 'PATCH' || !hash) return sendResponse('Errore di richiesta, prova più tardi', 403);

    /*
     | Logic apis
     |------------------------------------------------------------------------*/

    const token = await prisma.token.findUnique({where: {hash: hash}})

    // token not found in to a DATABASE
    if (!token) return sendResponse('Token non valido', 403)

    req.session.user = await prisma.user.update({
        where: {id: token.userId},
        data: {
            password: bcrypt.hashSync(req.body.password, 10)
        }
    })

    // save session and redirect
    await req.session.save(); // save session

    return res.status(200).json();

});