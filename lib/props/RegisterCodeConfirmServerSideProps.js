import {withSession} from "../withSession";
import {serverSideTranslations} from 'next-i18next/serverSideTranslations';

export default withSession(
    async function getServerSideProps({req, locale}) {
        const {confirm, user} = req.session;

        // todo: check with sql query
        if (!confirm || user) return {
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