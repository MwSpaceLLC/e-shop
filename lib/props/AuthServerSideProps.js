import {serverSideTranslations} from 'next-i18next/serverSideTranslations';
import {createIronSessionId, withSession} from "../withSession";

export default withSession(
    async function getServerSideProps({req, locale}) {

        await createIronSessionId(req.session);

        const user = req.session.user;

        // todo: check with sql query
        if (!user) return {
            redirect: {
                permanent: false,
                destination: `/login`
            },
        }

        return {
            props: {
                loggedIn: !!req.session.user,
                ...(await serverSideTranslations(locale, ['common']))
            },
        };
    }
);