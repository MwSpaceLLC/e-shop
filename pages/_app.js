import '../styles/globals.css'

import {useEffect} from "react";
import {appWithTranslation} from 'next-i18next';
import {fetcher} from "../lib/function";
import useSWR from "swr";

export default appWithTranslation(({Component, pageProps}) => {

    const {data: ShopMainBackgroundColor} = useSWR(`/api/json/settings/ShopMainBackgroundColor`, fetcher)
    const {data: ShopTopTextColor} = useSWR(`/api/json/settings/ShopTopTextColor`, fetcher)

    useEffect(() => {
        document.documentElement.style.cssText =
            `--ShopTopTextColor:${ShopTopTextColor?.value.trim()}!important;` +
            `--ShopMainBackgroundColor: ${ShopMainBackgroundColor?.value.trim()}!important;`;
    }, [ShopMainBackgroundColor, ShopTopTextColor])

    return (
        <Component {...pageProps} />
    )
});