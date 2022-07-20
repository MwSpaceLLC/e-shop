import {createIronSessionId, withSession} from "../withSession";
import {serverSideTranslations} from 'next-i18next/serverSideTranslations';

import {getAppSettings} from "../helpers";

export default withSession(
    async function getServerSideProps({req, locale}) {

        await createIronSessionId(req.session);

        return {
            props: {
                sett: await getAppSettings(),
                ...(await serverSideTranslations(locale, ['common'])),
            },
        };
    }
);