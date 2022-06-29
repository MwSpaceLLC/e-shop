import {serverSideTranslations} from 'next-i18next/serverSideTranslations';
import {withSession} from "../withSession";

export default withSession(
    async function getServerSideProps({query, req, res, locale}) {

        const admin = req.session.admin;
        const backendToken = process.env.ADMIN_BACKEND_TOKEN;
        const {token} = query;

        if (backendToken !== token) return {notFound: true};
        if (admin) return {
            redirect: {
                permanent: false,
                destination: `/admin/${token}`
            },
        };

        return {
            props: {
                token: token,
                loggedIn: !!admin,
                ...(await serverSideTranslations(locale, ['common']))
            },
        };
    }
);