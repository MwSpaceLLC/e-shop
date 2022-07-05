import {withIronSessionApiRoute, withIronSessionSsr} from "iron-session/next";
import crypto from "crypto";

const sessionOptions = {
    cookieName: process.env.COOKIES_NAME,
    password: process.env.COOKIES_PASSWORD,
    // secure: true should be used in production (HTTPS) but can't be used in development (HTTP)
    cookieOptions: {
        maxAge: 60 * 60 * 24, // 1 days
        secure: process.env.NODE_ENV === "production",
    },
};

export async function createIronSessionId(session){
    if (!session.id) {
        session.id = crypto.randomUUID();
        await session.save();
    }
}

export function withApiSession(handler) {
    return withIronSessionApiRoute(handler, sessionOptions);
}

export function withSession(handler) {
    return withIronSessionSsr(handler, sessionOptions);
}