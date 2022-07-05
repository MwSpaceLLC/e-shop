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
    if (req.query.name) query = {...query, where: {name: {contains: req.query.name}}}

    // concatenate query if exists on request parentId
    if (req.query.parentId) query = {...query, where: {parentId: parseInt(req.query.parentId)}}

    // concatenate query if exists on request id
    if (req.query.id) query = {
        ...query,
        where: {
            ...query.where, id: parseInt(req.query.id)
        }
    }

    // get categories
    const categories = await prisma.category.findMany(query)

    // get category recursively
    if (req.query.recursive) {
        return res.json(
            await recursivelySubCategories()
        )
    }

    return res.json(categories)
}

async function recursivelySubCategories(parentId = 0) {

    // first search with 0, parent id not set
    const categories = await prisma.category.findMany({where: {parentId: parentId}})

    return await Promise.all(
        categories.map(
            async category => ({
                ...category, children: await recursivelySubCategories(category.id)
            })
        )
    )
}