import useSWR from 'swr'
import {fetcher} from "../lib/function";

export default function useCarts(opt = {}) {

    const {data: carts} = useSWR(`/api/json/carts`, fetcher)

    const TotalPriceTax = carts?.items?.reduce((accumulator, item) => (+accumulator + +parseFloat(item.price) * item.bag) * (parseFloat(item.tax) / 100), 0);

    //TODO: check if work | remove or not price tax
    const PartialPrice = carts?.items?.reduce((accumulator, item) => (+accumulator + +parseFloat(item.price) * item.bag), 0) - (opt.PriceInTax ? TotalPriceTax : 0);

    //TODO: check if work | add or not price tax
    const TotalPrice = carts?.items?.reduce((accumulator, item) => (+accumulator + +parseFloat(item.price) * item.bag), 0) + (opt.PriceInTax ? 0 : TotalPriceTax);

    return [
        carts?.items || [],
        TotalPriceTax,
        PartialPrice,
        TotalPrice,
    ]
}