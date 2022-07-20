import {serverSideTranslations} from 'next-i18next/serverSideTranslations';
import {createIronSessionId, withSession} from "../withSession";
import {prisma} from "../database";
import {getAppOptions, getAppSettings} from "../helpers";

export default withSession(
    async function getServerSideProps({req, locale}) {

        await createIronSessionId(req.session);

        // check with sql query
        if (!await prisma.user.findUnique({where: {id: req.session?.user?.id??0}})) return {
            redirect: {
                destination: `/login`
            }
        }

        return {
            props: {
                set: await getAppSettings(),
                opt: await getAppOptions(),
                ...(await serverSideTranslations(locale, ['common'])),
            },
        };
    }
);