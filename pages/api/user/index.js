import {withApiSession} from "../../../lib/withSession";
import {prisma} from "../../../lib/database";

/**
 |--------------------------------------------------------------------------
 | Authentication Api routes
 |--------------------------------------------------------------------------
 */
export default withApiSession(async (req, res) => {

    const user = await prisma.user.findUnique({
        where: {
            id: req?.session?.user?.id ?? 0
        }
    });

    return !user ? res.status(403).json() : res.json(user);

});
