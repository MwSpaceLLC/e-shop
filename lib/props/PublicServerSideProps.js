import {createIronSessionId, withSession} from "../withSession";
import {serverSideTranslations} from 'next-i18next/serverSideTranslations';

export default withSession(
    async function getServerSideProps({req, locale}) {

        await createIronSessionId(req.session);

        return {
            props: {
                ...(await serverSideTranslations(locale, ['common'])),
            },
        };
    }
);