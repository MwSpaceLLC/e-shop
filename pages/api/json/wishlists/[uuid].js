// Next.js API route support: https://nextjs.org/docs/api-routes/introduction
import {withApiSession} from "../../../../lib/withSession";
import {prisma} from "../../../../lib/database";

/**
 |--------------------------------------------------------------------------
 | Authentication Api routes
 |--------------------------------------------------------------------------
 */
export default withApiSession(async (req, res) => {

    /*
     | Logic apis
     |------------------------------------------------------------------------*/

    const wishlist = await prisma.wishlist.findFirst({
        where: {session: req.session.id},
    }) ?? {};

    console.log(req.method)

    // delete an item in wishlist bags
    if (req.method === 'DELETE' && wishlist.items && req.query.uuid) {


        const items = wishlist.items?.filter(item => item.uuid !== req.query.uuid);

        if (items.length > 0) {
            return res.json(
                await prisma.wishlist.update({
                    where: {session: wishlist.session},
                    data: {items: items}
                })
            )
        }

        // delete wishlist for empty items
        return res.json(
            await prisma.wishlist.delete({where: {session: wishlist.session}})
        )

    }

    return res.json(
        wishlist.items?.find(item => item.uuid === req.query.uuid)
        ?? {})

});
