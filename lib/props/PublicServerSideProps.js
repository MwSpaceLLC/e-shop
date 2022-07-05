import {createIronSessionId, withSession} from "../withSession";
import {serverSideTranslations} from 'next-i18next/serverSideTranslations';

export default withSession(
    async function getServerSideProps({req, locale}) {

        await createIronSessionId(req.session);

        const user = req.session.user;

        return {
            props: {
                loggedIn: !!user,
                ...(await serverSideTranslations(locale, ['common'])),
            },
        };
    }
);