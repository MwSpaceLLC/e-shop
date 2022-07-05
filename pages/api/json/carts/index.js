// Next.js API route support: https://nextjs.org/docs/api-routes/introduction
import {withApiSession} from "../../../../lib/withSession";
import {prisma} from "../../../../lib/database";
import crypto from "crypto";

/**
 |--------------------------------------------------------------------------
 | Authentication Api routes
 |--------------------------------------------------------------------------
 */
export default withApiSession(async (req, res) => {

    /*
     | POST CALL
     |------------------------------------------------------------------------*/
    if (req.method === 'POST') {

        //TODO: create cart system
        // // search cart
        // const cart = await prisma.user.findFirst({
        //     where: {
        //         session: req.session.id,
        //     },
        // })
        //
        // return res.json(cart ?? await prisma.cart.create({
        //     data: {
        //         session: req.session.id,
        //     }
        // }))
    }

    /*
     | GET CALL
     |------------------------------------------------------------------------*/
    let query = {};

    // concatenate query if exists on request like
    if (req.query.key) query = {...query, where: {key: req.query.key}}

    return res.json(
        await prisma.cart.findMany(query) ?? {}
    )

});
