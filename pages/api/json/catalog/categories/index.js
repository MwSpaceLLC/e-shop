import {prisma} from "../../../../../lib/database";

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
    if (req.query.name) query = {...query, where: {name: {contains: req.query.name}}}

    // concatenate query if exists on request parentId
    if (req.query.parent) query = {...query, where: {parentId: parseInt(req.query.parent)}}

    // concatenate query if exists on request id
    if (req.query.id) query = {
        ...query,
        where: {
            ...query.where, id: parseInt(req.query.id)
        }
    }

    return res.json(
        await prisma.category.findMany(query)
    )
}