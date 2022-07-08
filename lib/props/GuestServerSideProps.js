import {createIronSessionId, withSession} from "../withSession";
import {serverSideTranslations} from 'next-i18next/serverSideTranslations';
import {prisma} from "../database";

export default withSession(
    async function getServerSideProps({req, locale}) {

        await createIronSessionId(req.session);

        // check with sql query
        if (await prisma.user.findUnique({where: {id: req.session?.user?.id ?? 0}})) return {
            redirect: {
                destination: `/accounts`
            }
        }

        return {
            props: {
                ...(await serverSideTranslations(locale, ['common'])),
            },
        };
    }
);