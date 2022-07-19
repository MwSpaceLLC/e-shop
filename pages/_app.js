import '../styles/globals.css'

import {useEffect} from "react";
import {appWithTranslation} from 'next-i18next';
import {fetcher} from "../lib/function";
import useSWR from "swr";
import {DatabaseIcon} from "@heroicons/react/outline";

export default appWithTranslation(({Component, pageProps}) => {

    const {data: ShopName} = useSWR(`/api/json/settings/ShopName`, fetcher)
    // const {data: ShopTopTextColor} = useSWR(`/api/json/settings/ShopTopTextColor`, fetcher)

    // useEffect(() => {
    //     document.documentElement.style.cssText =
    //         `--ShopTopTextColor:${ShopTopTextColor?.value.trim()}!important;` +
    //         `--ShopMainBackgroundColor: ${ShopMainBackgroundColor?.value.trim()}!important;`;
    // }, [ShopMainBackgroundColor, ShopTopTextColor])

    return ShopName?.value ? (
        <Component {...pageProps} />
    ) : (
        <div
            className="mx-auto max-w-7xl mt-20 pointer-events-none relative block w-full border-2 border-gray-300 border-dashed rounded-lg p-12 text-center hover:border-gray-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
        >
            <DatabaseIcon className="mx-auto h-12 w-12 text-gray-400"/>
            <span className="mt-2 block text-sm font-medium text-gray-900">Database not installed, please: <b>npm run installation</b> </span>
        </div>
    )
});