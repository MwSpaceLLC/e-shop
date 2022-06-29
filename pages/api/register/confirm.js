// Next.js API route support: https://nextjs.org/docs/api-routes/introduction
import {withApiSession} from "../../../lib/withSession";
import bcrypt from "bcryptjs";
import {prisma} from "../../../lib/database";

/**
 |--------------------------------------------------------------------------
 | Authentication Api routes
 |--------------------------------------------------------------------------
 */
export default withApiSession(async (req, res) => {
    if (req.method !== 'POST') return res.status("403").json({message: 'method not recognized'});

    if (!req.session.confirm) return res.status("403").json({message: 'confirm code not set'})
    if (req.session.confirm.random !== parseInt(req.body.code)) return res.status("422").json({message: 'code mismatch'})

    // get user data from reg
    const {email, password, name} = req.session.confirm;

    const hash = bcrypt.hashSync(password, 10);

    // Store hash in your password DB. | store in to a session USER
    req.session.user = await prisma.user.create({
        data: {
            name: name,
            email: email,
            password: hash,
        }
    })

    //delete old confirm
    delete req.session.confirm;
    await req.session.save();

    return res.status(200).json();

});
