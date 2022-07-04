import useSWR from 'swr'
import {fetcher} from "../lib/function";

export default function useMoney() {

    const {data: ShopLanguage} = useSWR(`/api/json/settings/ShopLanguage`, fetcher)
    const {data: ShopCurrency} = useSWR(`/api/json/settings/ShopCurrency`, fetcher)

    return new Intl.NumberFormat(ShopLanguage?.value ? (ShopLanguage.value.toLowerCase() + '-' + ShopLanguage.value.toUpperCase()) : 'it-IT', {
        style: 'currency',
        currency: ShopCurrency?.value ?? 'EUR',
    });
}