import {prisma} from "../../../../lib/database";

export default async function handler(req, res) {
    /*
     | Logic apis
     |------------------------------------------------------------------------*/
    return res.json(
        await prisma.cart.findFirst({
            where: {
                id: parseInt(req.query.id) || 0
            },
            include: {
                items: true,
            }
        }) ?? {}
    )

}