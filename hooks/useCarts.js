import useSWR, {mutate} from 'swr'
import {fetcher} from "../lib/function";
import axios from "axios";

export default function useCarts(opt = {}) {

    const {data: carts} = useSWR(`/api/json/carts`, fetcher)

    const ChangeQuantity = (value, cartItem) => {
        axios
            .patch(`/api/json/carts/${cartItem.uuid}`, {bag: value})
            .then(() => mutate('/api/json/carts'))
    }

    const TotalTax = carts?.items?.reduce((accumulator, item) => (+accumulator + +parseFloat(item.price) * item.bag) * (parseFloat(item.tax) / 100), 0);

    //TODO: check if work | remove or not price tax
    const PartialPrice = carts?.items?.reduce((accumulator, item) => (+accumulator + +parseFloat(item.price) * item.bag), 0) - (opt.PriceInTax ? TotalTax : 0);

    //TODO: check if work | add or not price tax
    const TotalPrice = carts?.items?.reduce((accumulator, item) => (+accumulator + +parseFloat(item.price) * item.bag), 0) + (opt.PriceInTax ? 0 : TotalTax);

    return [
        carts?.items || [],
        TotalTax,
        PartialPrice,
        TotalPrice,
        ChangeQuantity,
    ]
}