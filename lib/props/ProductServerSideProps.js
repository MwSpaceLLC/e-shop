import {createIronSessionId, withSession} from "../withSession";
import {serverSideTranslations} from 'next-i18next/serverSideTranslations';
import {get} from "../request";
import useSWR from "swr";
import {fetcher} from "../function";
import axios from "axios";

export default withSession(
    async function getServerSideProps({query, req, locale}) {

        await createIronSessionId(req.session);

        const user = req.session.user;

        const categoryId = query.category?.split('-').shift()
        const productId = query.product?.split('-').shift()

        const
            product = (await axios.get(`http://${req.headers.host}/api/json/catalog/products/${productId}`)).data,
            category = (await axios.get(`http://${req.headers.host}/api/json/catalog/categories/${categoryId}`, fetcher)).data;

        return {
            props: {
                loggedIn: !!user,
                product: product,
                category: category,
                ...(await serverSideTranslations(locale, ['common'])),
            },
        };
    }
);