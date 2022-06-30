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

    // concatenate query if exists on request like
    if (req.query.category) query = {
        ...query,
        where: {
            ...query.where, categories: {
                some: {
                    id: {in: [parseInt(req.query.category)]}
                }
            }
        }
    }

    return res.json(
        await prisma.product.findMany(query)
    )
}