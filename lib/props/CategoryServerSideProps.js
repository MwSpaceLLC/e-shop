import {createIronSessionId, withSession} from "../withSession";
import {serverSideTranslations} from 'next-i18next/serverSideTranslations';

import {fetcher} from "../function";
import axios from "axios";
import {getAppOptions, getAppSettings} from "../helpers";

export default withSession(
    async function getServerSideProps({query, req, locale}) {

        await createIronSessionId(req.session);

        const categoryId = query.category?.split('-').shift()
        const category = (await axios.get(`http://${req.headers.host}/api/json/categories/${categoryId}`, fetcher)).data;

        return {
            props: {
                category: category,
                set: await getAppSettings(),
                opt: await getAppOptions(),
                ...(await serverSideTranslations(locale, ['common'])),
            },
        };
    }
);