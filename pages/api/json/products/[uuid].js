import {prisma} from "../../../../lib/database";
import {getPrismaCart, getPrismaWishlist, withApiSession} from "../../../../lib/withSession";

export default withApiSession(async (req, res) => {

    /*
     | Logic apis
     |------------------------------------------------------------------------*/

    const product = await prisma.product.findFirst({
        where: {
            OR: [
                {id: parseInt(req.query.uuid) || 0},
                {uuid: req.query.uuid},
            ]
        },
        include: {
            langs: true,
            images: true,
            categories: true
        }
    });

    const cart = await getPrismaCart(req.session);

    const wishlist = await getPrismaWishlist(req.session);

    return res.json(
        {
            ...product,

            // concatenate in cart presence
            cart: cart.items ? cart.items.find(item => item.uuid === product.uuid) : false,

            // concatenate in wishlist presence
            wishlist: wishlist.items ? wishlist.items.find(item => item.uuid === product.uuid) : false,
        } ?? {}
    )

})