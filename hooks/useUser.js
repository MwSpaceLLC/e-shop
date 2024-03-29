import useSWR from 'swr'
import {fetcher} from "../lib/function";

export default function useUser() {

    const {data, error} = useSWR('/api/user', fetcher)

    return [
        data, // user
        !error && !!data, // loggedIn
    ]
}