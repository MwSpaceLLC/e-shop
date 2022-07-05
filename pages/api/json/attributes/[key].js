import {prisma} from "../../../../lib/database";

export default async function handler(req, res) {

    /*
     | Logic apis
     |------------------------------------------------------------------------*/

    return res.json(
        await prisma.attribute.findFirst({
            where: {
                id: req.query.id
            }
        })
    )
}