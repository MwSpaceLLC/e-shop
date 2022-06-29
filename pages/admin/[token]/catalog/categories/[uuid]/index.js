import {useTranslation} from "next-i18next";
import AdminAuthServerSideProps from "../../../../../../lib/props/AdminAuthServerSideProps";

import AppLayout from "../../../../../../components/AppLayout";
import useAdminToken from "../../../../../../hooks/useAdminToken";
import {useRouter} from "next/router";
import useSWR from "swr";
import {fetcher} from "../../../../../../lib/function";

import Image from "next/image";
import slugify from "slugify";
import {useState, useRef} from "react";
import Link from "next/link";
import {post} from "../../../../../../lib/request";
import axios from "axios";

// This gets called on every request
export const getServerSideProps = AdminAuthServerSideProps

export default function AdminCatalog() {

    const [loader, setLoader] = useState(false);
    const [confirm, setConfirm] = useState(false);
    const [res, setRes] = useState({});

    const name = useRef();
    const cover = useRef();
    const thumbnail = useRef();
    const description = useRef();

    const token = useAdminToken()
    const {t} = useTranslation();

    const router = useRouter()
    const {uuid} = router.query

    const {data: category, error} = useSWR(`/api/crud/categories/${uuid}`, fetcher)

    const Update = (e, inputs = []) => {
        e.preventDefault()

        const credentials = {};

        axios
            .post(`/api/login`, credentials)
            .then(() => router.push('/account'))
            .catch(({response}) => setRes(response))
            .finally(() => setLoader(false))

    }

    return (
        <AppLayout title="Modifica | Catalogo">

            {category && (
                <form onSubmit={Update}
                      className="mt-6 shadow bg-white shadow overflow-hidden sm:rounded-md px-8 py-8 space-y-8 divide-y divide-y-orange-200">
                    <div className="grid grid-cols-1 gap-y-6 sm:grid-cols-6 sm:gap-x-6">

                        <div className="sm:col-span-6">
                            <label htmlFor="photo" className="block text-sm font-bold text-orange-500">
                                THUMBNAIL
                            </label>
                            <div className="mt-1 flex items-center">
                                <Image width={160} height={160}
                                       className="inline-block object-contain"
                                       src={category.cover}
                                       alt=""
                                />
                                <div className="ml-4 flex">

                                    {confirm ? (
                                        <>
                                            <button
                                                onClick={e => setConfirm(false)}
                                                type="button"
                                                className="ml-3 bg-transparent py-2 px-3 border border-transparent rounded-md text-sm font-medium text-orange-gray-900 hover:text-orange-gray-700 focus:outline-none focus:border-gray-300 focus:ring-2 focus:ring-offset-2 focus:ring-offset-orange-gray-50 focus:ring-orange-500"
                                            >
                                                Annulla
                                            </button>

                                            <button
                                                onClick={e => post(`${window.location.pathname}/delete`)}
                                                type="button"
                                                className="ml-3 bg-red-500 py-2 px-3 border border-transparent rounded-md text-sm font-medium text-white focus:outline-none focus:border-gray-300 focus:ring-2 focus:ring-offset-2 focus:ring-offset-red-50 focus:ring-red-500"
                                            >
                                                Conferma
                                            </button>
                                        </>
                                    ) : (
                                        <>
                                            <div
                                                className="relative bg-white py-2 px-3 border border-gray-300 rounded-md shadow-sm flex items-center cursor-pointer hover:bg-orange-gray-50 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-offset-orange-gray-50 focus-within:ring-orange-500">
                                                <label
                                                    htmlFor="user-photo"
                                                    className="relative text-sm font-medium text-orange-gray-900 pointer-events-none"
                                                >
                                                    <span>Change</span>
                                                    <span className="sr-only"> user photo</span>
                                                </label>
                                                <input
                                                    type="file"
                                                    ref={thumbnail}
                                                    className="absolute inset-0 w-full h-full opacity-0 cursor-pointer border-gray-300 rounded-md"
                                                />
                                            </div>

                                            {category.cover && (
                                                <button
                                                    onClick={e => setConfirm(true)}
                                                    type="button"
                                                    className="ml-3 bg-transparent py-2 px-3 border border-transparent rounded-md text-sm font-medium text-orange-gray-900 hover:text-orange-gray-700 focus:outline-none focus:border-gray-300 focus:ring-2 focus:ring-offset-2 focus:ring-offset-orange-gray-50 focus:ring-orange-500"
                                                >
                                                    Rimuovi
                                                </button>
                                            )}
                                        </>
                                    )}

                                </div>
                            </div>
                        </div>

                        <div className="sm:col-span-3">
                            <label className="block text-sm text-orange-500 font-bold">
                                NOME CATEGORIA
                            </label>
                            <input
                                ref={name}
                                onChange={e => Update(e.target)}
                                type="text"
                                defaultValue={category.name}
                                className="mt-1 block w-full border-gray-300 rounded-md shadow-sm text-orange-gray-900 sm:text-sm focus:ring-orange-500 focus:border-orange-500"
                            />
                        </div>

                        <div className="sm:col-span-6">
                            <label className="block text-sm text-orange-500 font-bold">
                                IDENTIFICATIVO
                            </label>
                            <div className="mt-1 flex rounded-md shadow-sm">
                            <span
                                className="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-orange-gray-50 text-orange-gray-500 sm:text-sm">
                              UUID
                            </span>
                                <input
                                    type="text"
                                    readOnly={true}
                                    value={category.uuid}
                                    className="flex-1 block w-full min-w-0 border-gray-300 rounded-none rounded-r-md text-orange-gray-900 sm:text-sm focus:ring-orange-500 focus:border-orange-500"
                                />
                            </div>
                        </div>

                        <div className="sm:col-span-6">
                            <label htmlFor="description" className="block text-sm font-bold text-orange-500">
                                DESCRIZIONE
                            </label>
                            <div className="mt-1">
                            <textarea
                                rows={4}
                                ref={description}
                                className="block w-full border border-gray-300 rounded-md shadow-sm sm:text-sm focus:ring-orange-500 focus:border-orange-500"
                                defaultValue={category.description}
                            />
                            </div>
                            <p className="mt-3 text-sm text-orange-gray-500">
                                Descrivi brevemente la categoria che vuoi gestire nel tuo shop
                            </p>
                        </div>

                        <div className="sm:col-span-6">
                            <label className="block text-sm text-orange-500 font-bold">
                                AUTO SEO FRIENDLY
                            </label>
                            <div className="mt-1 flex rounded-md shadow-sm">
                            <span
                                className="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-orange-gray-50 text-orange-gray-500 sm:text-sm">
                              {window.location.host}/
                            </span>
                                <input
                                    type="text"
                                    readOnly={true}
                                    value={slugify(category.id + '-' + category.name.toLowerCase())}
                                    className="flex-1 block w-full min-w-0 border-gray-300 rounded-none rounded-r-md text-orange-gray-900 sm:text-sm focus:ring-orange-500 focus:border-orange-500"
                                />
                            </div>
                        </div>

                        <div className="sm:col-span-6">
                            <label htmlFor="photo" className="block text-sm font-bold text-orange-500">
                                COVER
                            </label>
                            <div className="mt-1 flex items-center">
                                <Image width={450} height={150}
                                       className="inline-block object-contain"
                                       src={category.cover}
                                       alt=""
                                />
                                <div className="ml-4 flex">
                                    <div
                                        className="relative bg-white py-2 px-3 border border-gray-300 rounded-md shadow-sm flex items-center cursor-pointer hover:bg-orange-gray-50 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-offset-orange-gray-50 focus-within:ring-orange-500">
                                        <label
                                            htmlFor="user-photo"
                                            className="relative text-sm font-medium text-orange-gray-900 pointer-events-none"
                                        >
                                            <span>Change</span>
                                            <span className="sr-only"> user photo</span>
                                        </label>
                                        <input
                                            ref={cover}
                                            type="file"
                                            className="absolute inset-0 w-full h-full opacity-0 cursor-pointer border-gray-300 rounded-md"
                                        />
                                    </div>
                                    <button
                                        type="button"
                                        className="ml-3 bg-transparent py-2 px-3 border border-transparent rounded-md text-sm font-medium text-orange-gray-900 hover:text-orange-gray-700 focus:outline-none focus:border-gray-300 focus:ring-2 focus:ring-offset-2 focus:ring-offset-orange-gray-50 focus:ring-orange-500"
                                    >
                                        Remove
                                    </button>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div className="pt-8 flex justify-end">

                        <Link href={`/admin/${token}/catalog`}>
                            <a className="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-orange-gray-900 hover:bg-orange-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500">
                                Annulla
                            </a>
                        </Link>

                        <button
                            type="submit"
                            className="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-orange-600 hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500"
                        >
                            Save
                        </button>
                    </div>
                </form>
            )}

        </AppLayout>
    )
}