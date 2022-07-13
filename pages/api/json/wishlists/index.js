// Next.js API route support: https://nextjs.org/docs/api-routes/introduction
import {
    getPrismaWishlist,
    withApiSession
} from "../../../../lib/withSession";
import {prisma} from "../../../../lib/database";

/**
 |--------------------------------------------------------------------------
 | Authentication Api routes
 |--------------------------------------------------------------------------
 */
export default withApiSession(async (req, res) => {

    const wishlist = await getPrismaWishlist(req.session);

    /*
     | POST CALL
     |------------------------------------------------------------------------*/
    if (req.method === 'POST') {

        //TODO: check if logic work property
        return res.json(
            await prisma.wishlist.upsert({
                where: {session: req.session.id},
                update: {

                    //check if wishlist.items bag has already product, if not, add to bag
                    items: wishlist.items?.find(item => item.uuid === req.body.uuid) ?
                        wishlist.items : [...wishlist?.items ?? [], {...req.body}] // product not found, insert new object
                },
                create: {
                    session: req.session.id,
                    items: [{...req.body}], // add product bag

                    // connect session user if autenticate
                    userId: req.session.user?.id ?? null,
                },
            })
        )
    }

    /*
     | GET CALL
     |------------------------------------------------------------------------*/
    return res.json(wishlist)

});
