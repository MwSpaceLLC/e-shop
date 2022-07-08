import {useTranslation} from 'next-i18next';
import GuestServerSideProps from "../lib/props/GuestServerSideProps";
import {useEffect, useRef, useState} from "react";
import Link from "next/link";

import {useRouter} from 'next/router'
import axios from "axios";
import ErrorsAlert from "../components/ErrorsAlert";
import {CookiePrivacyBanner} from "./login";
import {LogoApp} from "../components/LogoApp";
import PublicLayout from "../components/PublicLayout";

// This gets called on every request
export const getServerSideProps = GuestServerSideProps

/**
 |--------------------------------------------------------------------------
 | Export default React Component
 |--------------------------------------------------------------------------
 */
export default function Register() {
    const {t} = useTranslation();

    const router = useRouter()

    const invoice = useRef();
    const name = useRef();
    const email = useRef();
    const password = useRef();
    const _password = useRef();
    const [loader, setLoader] = useState(false);
    const [res, setRes] = useState({});

    const AuthPost = (evt) => {
        setLoader(true)

        evt.preventDefault()

        const credentials = {
            name: name.current.value,
            email: email.current.value,
            password: password.current.value,
            invoice: invoice.current.value
        };

        if (_password.current.value !== password.current.value) {
            setLoader(false)

            return setRes({status: 422, statusText: 'Password mismatch'});
        }

        // TODO: make auth
        axios
            .post('/api/register', credentials)
            .then(response => router.push(`${window.location.pathname}/confirm`))
            .catch(({response}) => setRes(response))
            .finally(() => setLoader(false))

    }

    return (
        <PublicLayout title="Crea il tuo account!">

            <div className="min-h-full flex flex-col justify-center py-12 sm:px-6 lg:px-8">
                <div className="sm:mx-auto sm:w-full sm:max-w-md">

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

                        Crea un account
                    </h2>
                    <p className="mt-2 text-center text-sm text-gray-600">
                        Oppure

                        <Link href="/login">
                            <a className="ml-1 font-medium underline text-shop hover:text-shop">
                                accedi al tuo account
                            </a>
                        </Link>

                    </p>
                </div>

                <div className="sm:mx-auto sm:w-full sm:max-w-md">
                    <div className="py-8 px-4 sm:px-10">
                        <form className="space-y-6" onSubmit={AuthPost} method="POST">
                            <div>
                                <label htmlFor="invoice" className="block text-sm font-medium text-gray-700">
                                    Tipo di account
                                </label>
                                <div className="mt-1">
                                    <select
                                        ref={invoice}
                                        id="invoice"
                                        name="invoice"
                                        autoComplete="invoice"
                                        required
                                        disabled={loader}
                                        className="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-shop focus:border-shop sm:text-sm"
                                    >
                                        <option value={0}>Privato</option>
                                        <option value={1}>Azienda</option>
                                    </select>
                                </div>
                            </div>

                            <div>
                                <label htmlFor="name" className="block text-sm font-medium text-gray-700">
                                    Nome e Cognome
                                </label>
                                <div className="mt-1">
                                    <input
                                        ref={name}
                                        id="name"
                                        name="name"
                                        type="text"
                                        autoComplete="name"
                                        required
                                        disabled={loader}
                                        className="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-shop focus:border-shop sm:text-sm"
                                    />
                                </div>
                            </div>

                            <div>
                                <label htmlFor="email" className="block text-sm font-medium text-gray-700">
                                    e-mail address
                                </label>
                                <div className="mt-1">
                                    <input
                                        ref={email}
                                        id="email"
                                        name="email"
                                        type="email"
                                        autoComplete="email"
                                        required
                                        disabled={loader}
                                        className="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-shop focus:border-shop sm:text-sm"
                                    />
                                </div>
                            </div>

                            <div>
                                <label htmlFor="password" className="block text-sm font-medium text-gray-700">
                                    Password
                                </label>
                                <div className="mt-1">
                                    <input
                                        ref={password}
                                        id="password"
                                        name="password"
                                        type="password"
                                        readOnly={loader}
                                        autoComplete="new-password"
                                        required
                                        className="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-shop focus:border-shop sm:text-sm"
                                    />
                                </div>
                            </div>

                            <div>
                                <label htmlFor="_password" className="block text-sm font-medium text-gray-700">
                                    Verifica password
                                </label>
                                <div className="mt-1">
                                    <input
                                        ref={_password}
                                        id="_password"
                                        name="_password"
                                        type="password"
                                        readOnly={loader}
                                        autoComplete="confirm-password"
                                        required
                                        className="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-shop focus:border-shop sm:text-sm"
                                    />
                                </div>
                            </div>

                            <CookiePrivacyBanner intro="Registrandoti"/>

                            <div>
                                <button
                                    disabled={loader}
                                    type="submit"
                                    className={(loader ? 'animate-pulse' : '') + " w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-shop hover:bg-shop focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-shop"}>
                                    {loader ? '⚪⚪⚪' : 'Continua'}
                                </button>
                            </div>
                        </form>

                    </div>
                </div>

                {!res.status ? '' : <ErrorsAlert onClose={e => setRes({})} res={res}/>}
            </div>
        </PublicLayout>
    )
}
