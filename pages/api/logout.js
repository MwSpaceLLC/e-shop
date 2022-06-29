// Next.js API route support: https://nextjs.org/docs/api-routes/introduction
import {withApiSession} from "../../lib/withSession";

/**
 |--------------------------------------------------------------------------
 | Authentication Api routes
 |--------------------------------------------------------------------------
 */
export default withApiSession(async (req, res) => {
    if (req.method !== 'POST') return res.status("403").json();

    await req.session.destroy();
    return res.status(200).json({message: 'Good job'})

});
