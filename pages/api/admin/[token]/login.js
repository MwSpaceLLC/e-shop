// Next.js API route support: https://nextjs.org/docs/api-routes/introduction
import {withApiSession} from "../../../../lib/withSession";

import {prisma} from "../../../../lib/database";
import bcrypt from "bcryptjs";

/**
 |--------------------------------------------------------------------------
 | Authentication Api routes
 |--------------------------------------------------------------------------
 */
export default withApiSession(async (req, res) => {

    if (process.env.ADMIN_BACKEND_TOKEN !== req.query.token || req.method !== 'POST') return res.status("403").json();

    /*
     | Logic apis
     |------------------------------------------------------------------------*/
    const {email, password} = req.body;

    req.session.admin = await prisma.admin.findUnique({where: {email: email}})

    // admin not found in to a DATABASE
    if (!req.session.admin) return res.status(403).json({message: 'Email address not exists'});

    if (bcrypt.compareSync(password, req.session.admin.password)) {

        //save user session
        await req.session.save();

        return res.status(200).json()
    }

    return res.status(403).json({message: 'Credentials not match with our records'})

});
