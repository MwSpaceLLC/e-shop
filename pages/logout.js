import {useTranslation} from 'next-i18next';

import {useEffect, useRef, useState} from "react";
import Link from "next/link";

import {useRouter} from 'next/router'
import axios from "axios";
import ErrorsAlert from "../components/ErrorsAlert";

import AuthServerSideProps from "../lib/props/AuthServerSideProps";
import {LogoApp} from "../components/LogoApp";

// This gets called on every request
export const getServerSideProps = AuthServerSideProps

/**
 |--------------------------------------------------------------------------
 | Export default React Component
 |--------------------------------------------------------------------------
 */
export default function Login() {
    const {t} = useTranslation();
    const router = useRouter()

    const [loader, setLoader] = useState(false);
    const [res, setRes] = useState({});

    const AuthPost = (evt) => {
        setRes({})
        setLoader(true)

        evt.preventDefault()

        // TODO: make auth
        axios
            .post(`/api/logout`)
            .then(() => router.push('/'))
            .catch(({response}) => setRes(response))
            .finally(() => setLoader(false))

    }

    return (
        <div className="min-h-full flex flex-col justify-center py-12 sm:px-6 lg:px-8">
            <div className="sm:mx-auto sm:w-full sm:max-w-md">

                <LogoApp className="h-8 w-auto"/>

                <h2 className="mt-6 flex items-center gap-2 text-center justify-center text-3xl font-extrabold text-gray-900">
                    <Link href="/">
                        <a>
                            <svg xmlns="http://www.w3.org/2000/svg" className="h-6 w-6 text-shop" fill="none"
                                 viewBox="0 0 24 24"
                                 stroke="currentColor" strokeWidth={2}>
                                <path strokeLinecap="round" strokeLinejoin="round"
                                      d="M11 15l-3-3m0 0l3-3m-3 3h8M3 12a9 9 0 1118 0 9 9 0 01-18 0z"/>
                            </svg>
                        </a>
                    </Link>

                    Esci dal tuo account
                </h2>
                <p className="mt-2 text-center text-sm text-gray-600">
                    Oppure

                    <Link href="/account">
                        <a className="ml-1 font-medium underline text-shop hover:text-shop">
                            torna alla tua area clienti
                        </a>
                    </Link>

                </p>
            </div>

            <div className="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
                <div className="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">
                    <form className="space-y-6" onSubmit={AuthPost} method="POST">

                        <div>
                            <button
                                disabled={loader}
                                type="submit"
                                className={(loader ? 'animate-pulse' : '') + " w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-shop hover:bg-shop focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-shop"}>
                                {loader ? '⚪⚪⚪' : 'Disconnetti'}
                            </button>
                        </div>
                    </form>

                </div>
            </div>

            {!res.status ? '' : <ErrorsAlert onClose={e => setRes({})} res={res}/>}
        </div>
    )
}
