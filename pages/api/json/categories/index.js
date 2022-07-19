import {prisma} from "../../../../lib/database";

export default async function handler(req, res) {
    /*
     | Logic apis
     |------------------------------------------------------------------------*/

    let query = {
        include: {
            langs: true,
        },
        where: {
            AND: [],
        },
    };

    // concatenate query if exists on request menu
    if (req.query.menu) query.where.AND.push({menu: true})

    // concatenate query if exists on request orderBy
    if (req.query.hasOwnProperty('orderBy')) query = {...query, orderBy: {[req.query.orderBy]: 'asc'}}
    if (req.query.hasOwnProperty('order')) query = {...query, orderBy: {[req.query.orderBy]: req.query.order}}

    // concatenate query if exists on request homepage
    if (req.query.homepage) query.where.AND.push({homepage: true})

    // concatenate query if exists on request footer
    if (req.query.footer) query.where.AND.push({footer: true})

    // concatenate query if exists on request like
    if (req.query.name) query.where.AND.push({name: {contains: req.query.name}})

    // concatenate query if exists on request parentId
    if (req.query.parentId) query.where.AND.push({parentId: parseInt(req.query.parentId)})

    // concatenate query if exists on request id
    if (req.query.id) query.where.AND.push({id: parseInt(req.query.id)})

    // get category recursively
    if (req.query.recursive) {
        return res.json(
            await recursivelySubCategories() ?? {}
        )
    }

    // get all categories
    return res.json(
        await prisma.category.findMany(query) ?? {}
    )
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