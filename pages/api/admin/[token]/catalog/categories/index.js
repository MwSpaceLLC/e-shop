// Next.js API route support: https://nextjs.org/docs/api-routes/introduction
import {withApiSession} from "../../../../../../lib/withSession";

import {prisma} from "../../../../../../lib/database";

/**
 |--------------------------------------------------------------------------
 | Authentication Api routes
 |--------------------------------------------------------------------------
 */
export default withApiSession(async (req, res) => {

    if (process.env.ADMIN_BACKEND_TOKEN !== req.query.token || !req.session.admin) return res.status("403").json();

    /*
     | Logic apis
     |------------------------------------------------------------------------*/

    let query = {
        include: {
            langs: true,
        },
    };

    // concatenate query if exists on request like
    if (req.query.like) query = {...query, where: {name: {contains: req.query.like}}}

    return res.status(200).json(
        await prisma.category.findMany(query)
    )

});
