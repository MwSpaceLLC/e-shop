import {serverSideTranslations} from 'next-i18next/serverSideTranslations';
import {createIronSessionId, withSession} from "../withSession";
import {prisma} from "../database";

export default withSession(
    async function getServerSideProps({req, locale}) {

        await createIronSessionId(req.session);

        // check with sql query
        if (!await prisma.user.findFirst({where: {id: req.session.user.id}})) return {
            redirect: {
                destination: `/login`
            },
        }

        return {
            props: {
                ...(await serverSideTranslations(locale, ['common'])),
            },
        };
    }
);