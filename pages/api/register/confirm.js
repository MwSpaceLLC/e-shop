// Next.js API route support: https://nextjs.org/docs/api-routes/introduction
import {connectGuestCartAndWishlist, withApiSession} from "../../../lib/withSession";
import bcrypt from "bcryptjs";
import {prisma} from "../../../lib/database";

/**
 |--------------------------------------------------------------------------
 | Authentication Api routes
 |--------------------------------------------------------------------------
 */
export default withApiSession(async (req, res) => {
    const {email, password, name} = req.session.confirm;

    if (req.method !== 'POST' || !password || !email || !name || !req.body.code) return res.status("403").json();

    if (!req.session.confirm) return res.status("403").json({message: 'Codice non valido'})
    if (req.session.confirm.random !== parseInt(req.body.code)) return res.status("422").json({message: 'Codice non valido'})

    if (await prisma.user.findUnique({where: {email: email}})) return res.status(403).json({message: 'Codice già utilizzato'});

    const hash = bcrypt.hashSync(password, 10);

    // Store hash in your password DB. | store in to a session USER
    req.session.user = await prisma.user.create({
        data: {
            name: name,
            email: email,
            password: hash,
        }
    })

    await connectGuestCartAndWishlist(req.session); //TODO: check if work

    delete req.session.confirm; //delete old confirm
    await req.session.save(); // save session

    return res.status(200).json();

});
