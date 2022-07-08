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
     | POST CALL
     |------------------------------------------------------------------------*/
    if (req.method === 'POST') {

        //TODO: create cart system
        const cart = await prisma.cart.findFirst({
            where: {session: req.session.id}
        }) ?? await prisma.cart.create({
            data: {session: req.session.id}
        })

        // check if already exists product
        const items = cart.items?.find(item => item.uuid === req.body.uuid) ?
            cart.items?.map(item => ({
                ...item,

                // product max quantity
                bag: item.bag < item.quantity ? item.bag + 1 : item.bag

                // product not found, insert new object
            })) : [...cart?.items ?? [], {...req.body, bag: 1}];

        await prisma.cart.update({
            where: {session: cart.session},
            data: {
                items: items,
            },
        })

        return res.json(
            cart
        )
    }

    /*
     | GET CALL
     |------------------------------------------------------------------------*/
    const query = {
        where: {
            session: req.session.id, // TODO: check if work
        },
    };

    return res.json(
        await prisma.cart.findFirst(query) ?? {}
    )

});
