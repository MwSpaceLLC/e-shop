import {serverSideTranslations} from 'next-i18next/serverSideTranslations';
import {createIronSessionId, withSession} from "../withSession";
import {prisma} from "../database";

export default withSession(
    async function getServerSideProps({query, req, res, locale}) {

        await createIronSessionId(req.session);

        if (process.env.ADMIN_BACKEND_TOKEN !== query.token) return {notFound: true};

        // console.log(req.session?.admin?.id)

        // check with sql query
        if (!await prisma.admin.findUnique({where: {id: req.session?.admin?.id??0}})) return {
            redirect: {
                permanent: false,
                destination: `/admin/${query.token}/login`
            },
        };

        return {
            props: {
                token: query.token,
                ...(await serverSideTranslations(locale, ['common']))
            },
        };
    }
);