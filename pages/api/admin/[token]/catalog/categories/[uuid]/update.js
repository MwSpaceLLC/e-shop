// Next.js API route support: https://nextjs.org/docs/api-routes/introduction
import {withApiSession} from "../../../../../../../lib/withSession";

import {prisma} from "../../../../../../../lib/database";

/**
 |--------------------------------------------------------------------------
 | Authentication Api routes
 |--------------------------------------------------------------------------
 */
export default withApiSession(async (req, res) => {

    console.log(req.session.admin)

    if (req.method !== 'POST' || process.env.ADMIN_BACKEND_TOKEN !== req.query.token || !req.session.admin) return res.status("403").json();

    /*
     | Logic apis
     |------------------------------------------------------------------------*/
    return res.status(200).json(
        await prisma.category.update({
            where: {
                uuid: req.query.uuid,
            },
            data: req.body
        })
    )

});
