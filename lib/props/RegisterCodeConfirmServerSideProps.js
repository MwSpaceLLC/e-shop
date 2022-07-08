import {createIronSessionId, withSession} from "../withSession";
import {serverSideTranslations} from 'next-i18next/serverSideTranslations';

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
                ...(await serverSideTranslations(locale, ['common'])),
            },
        };
    }
);