import {withSession} from "../withSession";
import {serverSideTranslations} from 'next-i18next/serverSideTranslations';

export default withSession(
    async function getServerSideProps({req, locale}) {
        const user = req.session.user;

        return {
            props: {
                loggedIn: !!user,
                ...(await serverSideTranslations(locale, ['common'])),
            },
        };
    }
);