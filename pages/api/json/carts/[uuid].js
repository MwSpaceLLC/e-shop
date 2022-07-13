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

    const cart = await prisma.cart.findFirst({
        where: {session: req.session.id},
    }) ?? {};

    // delete an item in cart bags
    if (req.method === 'DELETE' && cart.items && req.query.uuid) {

        const items = cart.items?.filter(item => item.uuid !== req.query.uuid);

        if (items.length > 0) {
            return res.json(
                await prisma.cart.update({
                    where: {session: cart.session},
                    data: {items: items}
                })
            )
        }

        // delete cart for empty items
        return res.json(
            await prisma.cart.delete({where: {session: cart.session}})
        )

    }

    // delete an item in cart bags
    if (req.method === 'PATCH' && cart.items && req.query.uuid) {

        return res.json(
            await prisma.cart.update({
                where: {session: cart.session},
                data: {
                    items: cart.items?.map(item => {

                        // update item bag
                        return {...item, bag: item.uuid === req.query.uuid ? req.body.bag : item.bag};
                    })
                }
            })
        )

    }

    // return res.json(cart.items ? {...cart, items: cart.items?.filter(item => item.uuid === req.query.uuid) ?? []} : {})

    return res.json(
        cart.items?.find(item => item.uuid === req.query.uuid)
        ?? {})
});
