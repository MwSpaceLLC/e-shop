import {prisma} from "../../../../lib/database";

export default async function handler(req, res) {

    /*
     | Logic apis
     |------------------------------------------------------------------------*/

    return res.json(
        await prisma.setting.findFirst({
            where: {
                key: req.query.key
            }
        })
    )
}