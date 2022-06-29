// Next.js API route support: https://nextjs.org/docs/api-routes/introduction
import {withApiSession} from "../../lib/withSession";

import bcrypt from "bcryptjs";
import {prisma} from "../../lib/database";

/**
 |--------------------------------------------------------------------------
 | Authentication Api routes
 |--------------------------------------------------------------------------
 */
export default withApiSession(async (req, res) => {
    if (req.method !== 'POST') return res.status("403").json();

    const {email, password} = req.body;

    req.session.user = await prisma.user.findUnique({where: {email: email}})

    // user not found in to a DATABASE
    if (!req.session.user) return res.status(403).json({message: 'Email address not exists'});

    if (bcrypt.compareSync(password, req.session.user.password)) {

        //save user session
        await req.session.save();

        return res.status(200).json()
    }

    return res.status(403).json({message: 'Credentials not match with our records'})

});
