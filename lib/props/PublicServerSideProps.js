import {createIronSessionId, withSession} from "../withSession";
import {serverSideTranslations} from 'next-i18next/serverSideTranslations';

export default withSession(
    async function getServerSideProps({req, locale}) {

        const sessionId = await createIronSessionId(req.session);

        const user = req.session.user;

        return {
            props: {
                loggedIn: !!user,
                sessionId: sessionId,
                ...(await serverSideTranslations(locale, ['common'])),
            },
        };
    }
);