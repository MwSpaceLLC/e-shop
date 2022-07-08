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
    const {email, password} = req.body;

    if (req.method !== 'POST' || !password || !email) return res.status("403").json({message: 'Errore di richiesta, prova più tardi'});

    req.session.user = await prisma.user.findUnique({where: {email: email}})

    // user not found in to a DATABASE
    if (!req.session.user) return res.status(403).json({message: 'Indirizzo e-mail o password errati'});

    if (bcrypt.compareSync(password, req.session.user.password)) {

        //save user session
        await req.session.save();

        return res.status(200).json()
    }

    return res.status(403).json({message: 'Le credenziali non corrispondono ai nostri record'})

});
