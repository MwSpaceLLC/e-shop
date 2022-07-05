import {prisma} from "../../../../../lib/database";

export default async function handler(req, res) {
    /*
     | Logic apis
     |------------------------------------------------------------------------*/

    let query = {
        include: {
            langs: true,
            images: true,
            categories: true
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
                    id: {in: req.query.category.split(',').map(id => parseInt(id))}
                }
            }
        },
    }

    return res.json(
        await prisma.product.findMany(query)
    )
}