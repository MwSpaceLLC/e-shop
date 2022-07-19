import {createIronSessionId, withSession} from "../withSession";
import {serverSideTranslations} from 'next-i18next/serverSideTranslations';

import axios from "axios";

export default withSession(
    async function getServerSideProps({req, locale}) {

        await createIronSessionId(req.session);

        // const
        //     ShopSeoIndexTitle = (await axios.get(`http://${req.headers.host}/api/json/settings/ShopSeoIndexTitle`)).data,
        //     ShopSeoIndexDescription = (await axios.get(`http://${req.headers.host}/api/json/settings/ShopSeoIndexDescription`, fetcher)).data;

        return {
            props: {
                ShopSeoIndexTitle: (await axios.get(`http://${req.headers.host}/api/json/settings/ShopSeoIndexTitle`)).data,
                ShopSeoIndexDescription: (await axios.get(`http://${req.headers.host}/api/json/settings/ShopSeoIndexDescription`)).data,

                ...(await serverSideTranslations(locale, ['common'])),
            },
        };
    }
);