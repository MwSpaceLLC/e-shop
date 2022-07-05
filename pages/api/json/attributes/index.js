import {prisma} from "../../../../lib/database";

export default async function handler(req, res) {
    /*
     | Logic apis
     |------------------------------------------------------------------------*/

    let query = {};

    // concatenate query if exists on request like
    if (req.query.id) query = {...query, where: {id: req.query.id}}

    return res.json(
        await prisma.attribute.findMany(query) ?? {}
    )
}