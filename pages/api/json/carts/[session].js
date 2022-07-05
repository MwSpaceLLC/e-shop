import {prisma} from "../../../../lib/database";
import _ from "lodash";

export default async function handler(req, res) {
    /*
     | Logic apis
     |------------------------------------------------------------------------*/

    return res.json(
        await prisma.cart.findFirst({
            where: {
                session: req.query.session
            }
        }) ?? {}
    )

}