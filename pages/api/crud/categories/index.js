import {prisma} from "../../../../lib/database";

/**
 |--------------------------------------------------------------------------
 | Crud Api routes
 |--------------------------------------------------------------------------
 */
export default async function handler(req, res) {
    return res.status(200).json(
        await prisma.category.findMany({
            include: {
                CategoryLangs: true,
            },
        })
    )
}
