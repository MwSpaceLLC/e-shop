import {createIronSessionId, withSession} from "../withSession";
import {serverSideTranslations} from 'next-i18next/serverSideTranslations';
import {getAppOptions, getAppSettings} from "../helpers";

export default withSession(
    async function getServerSideProps({req, locale}) {

        await createIronSessionId(req.session);

        const {confirm, user} = req.session;

        // todo: check with sql query
        if (!confirm || user) return {
            notFound: true,
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