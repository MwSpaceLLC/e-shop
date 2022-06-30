import {prisma} from "../../../../../lib/database";

export default async function handler(req, res) {
    /*
     | Logic apis
     |------------------------------------------------------------------------*/
    return res.json(
        await prisma.category.findFirst({
            where: {
                OR: [
                    {id: parseInt(req.query.uuid ?? 0)},
                    {uuid: req.query.uuid},
                ]
            },
            include: {
                langs: true,
            }
        }) ?? {}
    )

}