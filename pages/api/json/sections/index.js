import {prisma} from "../../../../lib/database";

export default async function handler(req, res) {
    /*
     | Logic apis
     |------------------------------------------------------------------------*/

    let query = {
        include: {
            langs: true,
        },
    };

    // concatenate query if exists on request like
    if (req.query.slug) query = {...query, where: {slug: req.query.slug}}

    return res.json(
        await prisma.section.findMany(query) ?? {}
    )
}