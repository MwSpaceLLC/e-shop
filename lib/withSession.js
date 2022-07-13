import {withIronSessionApiRoute, withIronSessionSsr} from "iron-session/next";
import crypto from "crypto";
import {prisma} from "./database";

const sessionOptions = {
    cookieName: process.env.COOKIES_NAME,
    password: process.env.COOKIES_PASSWORD,
    // secure: true should be used in production (HTTPS) but can't be used in development (HTTP)
    cookieOptions: {
        maxAge: 60 * 60 * 24, // 1 days
        secure: process.env.NODE_ENV === "production",
    },
};

// create guest connection with authIdUser if exists
export async function connectGuestCartAndWishlist(session) {

    if (await prisma.cart.findUnique({where: {session: session.id}})) {
        await prisma.cart.update({
            where: {session: session.id},
            data: {userId: session.user.id}
        })
    }

    if (await prisma.wishlist.findUnique({where: {session: session.id}})) {
        await prisma.wishlist.update({
            where: {session: session.id},
            data: {userId: session.user.id}
        })
    }
}

export async function createIronSessionId(session) {
    if (!session.id) {
        session.id = crypto.randomUUID();
        await session.save();
    }

    return session.id;
}

export function withApiSession(handler) {
    return withIronSessionApiRoute(handler, sessionOptions);
}

export function withSession(handler) {
    return withIronSessionSsr(handler, sessionOptions);
}