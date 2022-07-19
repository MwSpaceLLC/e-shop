import {createIronSessionId, withSession} from "../withSession";
import {serverSideTranslations} from 'next-i18next/serverSideTranslations';
import axios from "axios";
import {fetcher} from "../function";

export default withSession(
    async function getServerSideProps({req, locale}) {

        await createIronSessionId(req.session);

        const
            ShopSeoIndexTitle = (await axios.get(`http://${req.headers.host}/api/json/settings/ShopSeoIndexTitle`)).data,
            ShopSeoIndexDescription = (await axios.get(`http://${req.headers.host}/api/json/settings/ShopSeoIndexDescription`, fetcher)).data;

        return {
            props: {
                ShopSeoIndexTitle: ShopSeoIndexTitle.value,
                ShopSeoIndexDescription: ShopSeoIndexDescription.value,
                ...(await serverSideTranslations(locale, ['common'])),
            },
        };
    }
);