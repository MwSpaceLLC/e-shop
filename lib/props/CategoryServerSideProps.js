import {withSession} from "../withSession";
import {serverSideTranslations} from 'next-i18next/serverSideTranslations';

import {fetcher} from "../function";
import axios from "axios";

export default withSession(
    async function getServerSideProps({query, req, locale}) {
        const user = req.session.user;

        const categoryId = query.category?.split('-').shift()
        const category = (await axios.get(`http://${req.headers.host}/api/json/catalog/categories/${categoryId}`, fetcher)).data;

        return {
            props: {
                loggedIn: !!user,
                category: category,
                ...(await serverSideTranslations(locale, ['common'])),
            },
        };
    }
);