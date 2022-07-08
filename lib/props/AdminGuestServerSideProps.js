import {serverSideTranslations} from 'next-i18next/serverSideTranslations';
import {createIronSessionId, withSession} from "../withSession";
import {prisma} from "../database";

export default withSession(
    async function getServerSideProps({query, req, res, locale}) {

        await createIronSessionId(req.session);

        const backendToken = process.env.ADMIN_BACKEND_TOKEN;
        const {token} = query;

        if (backendToken !== token) return {notFound: true};

        // check with sql query
        if (await prisma.admin.findUnique({where: {id: req.session?.admin?.id??0}})) return {
            redirect: {
                permanent: false,
                destination: `/admin/${token}`
            },
        };

        return {
            props: {
                token: token,
                ...(await serverSideTranslations(locale, ['common']))
            },
        };
    }
);