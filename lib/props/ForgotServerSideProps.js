import {createIronSessionId, withSession} from "../withSession";
import {serverSideTranslations} from 'next-i18next/serverSideTranslations';
import {prisma} from "../database";
import {tokenIsExpired} from "../function";

export default withSession(
    async function getServerSideProps({query, req, locale}) {

        await createIronSessionId(req.session);

        const {hash} = query;

        // get token in to a database
        const token = await prisma.token.findUnique({where: {hash: hash}});

        // block request if token mismatch or expired
        if (!token || tokenIsExpired(token)) return {
            redirect: {
                destination: `/login`
            }
        }

        return {
            props: {
                ...(await serverSideTranslations(locale, ['common'])),
            },
        };
    }
);