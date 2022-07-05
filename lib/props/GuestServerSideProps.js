import {createIronSessionId, withSession} from "../withSession";
import {serverSideTranslations} from 'next-i18next/serverSideTranslations';

export default withSession(
    async function getServerSideProps({req, locale}) {

        await createIronSessionId(req.session);

        const user = req.session.user;

        // todo: check with sql query
        if (user) return {
            notFound: true,
        }

        return {
            props: {
                loggedIn: !!user,
                ...(await serverSideTranslations(locale, ['common'])),
            },
        };
    }
);