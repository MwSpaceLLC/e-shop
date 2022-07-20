import {createIronSessionId, getPrismaCart, withSession} from "../withSession";
import {serverSideTranslations} from 'next-i18next/serverSideTranslations';
import {getAppOptions, getAppSettings} from "../helpers";

export default withSession(
    async function getServerSideProps({req, locale}) {

        await createIronSessionId(req.session);

        const cart = await getPrismaCart(req.session);

        if (!cart.items) return {
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