// Next.js API route support: https://nextjs.org/docs/api-routes/introduction
import {
    getPrismaCart,
    withApiSession
} from "../../../../lib/withSession";
import {prisma} from "../../../../lib/database";

/**
 |--------------------------------------------------------------------------
 | Authentication Api routes
 |--------------------------------------------------------------------------
 */
export default withApiSession(async (req, res) => {

    const cart = await getPrismaCart(req.session);

    /*
     | POST CALL
     |------------------------------------------------------------------------*/
    if (req.method === 'POST') {

        console.log(req.session.user?.id ?? null)

        //TODO: check if logic work property
        return res.json(
            await prisma.cart.upsert({
                where: {session: req.session.id},
                update: {

                    //check if cart.items bag has already product, if not, add to bag
                    items: cart.items?.find(item => item.uuid === req.body.uuid) ? cart.items.map(
                        item => ({
                            ...item, // already item

                            bag: item.bag < item.quantity ? item.bag + 1 : item.bag // product max quantity
                        })
                    ) : [...cart?.items ?? [], {...req.body, bag: 1}] // product not found, insert new object
                },
                create: {
                    session: req.session.id,
                    items: [{...req.body, bag: 1}], // add product bag

                    // connect session user if autenticate
                    userId: req.session.user?.id ?? null,
                },
            })
        )
    }

    /*
     | GET CALL
     |------------------------------------------------------------------------*/
    return res.json(cart)

});
