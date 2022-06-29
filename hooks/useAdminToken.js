import {useEffect, useState} from "react";

export default function useAdminToken() {

    const [token, setToken] = useState(null);

    useEffect(() => setToken(window.location.pathname.split('/')[2]), [])

    return token
}