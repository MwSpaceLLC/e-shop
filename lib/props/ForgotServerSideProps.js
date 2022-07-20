import {createIronSessionId, withSession} from "../withSession";
import {serverSideTranslations} from 'next-i18next/serverSideTranslations';
import {prisma} from "../database";
import {tokenIsExpired} from "../function";
import {getAppOptions, getAppSettings} from "../helpers";

export default withSession(
    async function getServerSideProps({query, req, locale}) {

        await createIronSessionId(req.session);

        const {hash} = query;

        // get token in to a database
        const token = await prisma.token.findUnique({where: {hash: hash}});

        // block request if token mismatch or expired
        if (!token || tokenIsExpired(token)) return {
            notFound: true
        }

        return {
            props: {
                set: await getAppSettings(),
                opt: await getAppOptions(),
                ...(await serverSideTranslations(locale, ['common'])),
            },
        };
    }
);