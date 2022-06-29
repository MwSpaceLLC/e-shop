import {prisma} from "../../../../../lib/database";

/**
 |--------------------------------------------------------------------------
 | Crud Api routes
 |--------------------------------------------------------------------------
 */
export default async function handler(req, res) {

    if (req.method !== 'POST') return res.status("403").json();

    return res.status(200).json(
        await prisma.category.update({
            where: {
                uuid: req.query.uuid,
            },
            data: req.body,
        }) ?? {}
    )

}
