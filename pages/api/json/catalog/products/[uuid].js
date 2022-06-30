import {prisma} from "../../../../../lib/database";

export default async function handler(req, res) {

    /*
     | Logic apis
     |------------------------------------------------------------------------*/
    return res.json(
        await prisma.product.findFirst({
            where: {
                uuid: req.query.uuid,
            },
            include: {
                langs: true,
            }
        }) ?? {}
    )

}