import {createIronSessionId, withSession} from "../withSession";
import {serverSideTranslations} from 'next-i18next/serverSideTranslations';

import {prisma} from "../database";
import {getAppSettings} from "../helpers";
import {stringify} from "../function";

export default withSession(
    async function getServerSideProps({query, req, locale}) {

        await createIronSessionId(req.session);

        // block request if not set query
        if (!query.category || !query.product) return {notFound: true}

        const categoryId = parseInt(query.category.split('-').shift())
        const productId = parseInt(query.product.split('-').shift())

        // get product
        const product = await prisma.product.findFirst({
            where: {id: productId},
            include: {
                langs: true,
                images: true,
                categories: true
            }
        }) || {};

        // get category
        const category = await prisma.category.findFirst({
            where: {id: categoryId},
            include: {
                langs: true
            }
        }) || {};

        return {
            props: {
                product: stringify(product),
                category: stringify(category),
                sett: await getAppSettings(),
                ...(await serverSideTranslations(locale, ['common'])),
            },
        };
    }
);