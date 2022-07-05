import {prisma} from "../../../../lib/database";

export default async function handler(req, res) {
    /*
     | Logic apis
     |------------------------------------------------------------------------*/

    let query = {};

    // concatenate query if exists on request like
    if (req.query.key) query = {...query, where: {key: req.query.key}}

    return res.json(
        await prisma.setting.findMany(query) ?? {}
    )
}