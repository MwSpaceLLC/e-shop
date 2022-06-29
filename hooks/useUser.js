import useSWR from 'swr'
import {fetcher} from "../lib/function";

export default function useUser() {

    const {data, error} = useSWR('/api/user', fetcher)

    if (error || !data) return {}

    return data
}