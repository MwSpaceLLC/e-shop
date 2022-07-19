import {Fragment, useState} from 'react'

import {ArchiveIcon, HeartIcon, XIcon} from '@heroicons/react/outline'

import {CheckCircleIcon, ChevronRightIcon, MailIcon} from '@heroicons/react/solid'

import {useTranslation} from "next-i18next";

import useSWR from "swr";
import {fetcher} from "../../lib/function";
import Image from "next/image";
import Link from "next/link";
import {useRouter} from "next/router";

export default function ViewCategories({parentId = 0}) {

    const {t} = useTranslation();

    const router = useRouter()
    const {token} = router.query

    const [like, setLike] = useState("")

    const {data: categories} = useSWR(`/api/json/categories?parentId=${parentId}&name=${like}`, fetcher)

    const {data: category} = useSWR(`/api/json/categories/${parentId}`, fetcher)

    return (
        <div className="bg-white shadow overflow-hidden sm:rounded-md">

            <div className="bg-white px-4 py-5 border-b border-gray-200 sm:px-6">
                <div className="-ml-4 -mt-4 flex justify-between items-center flex-wrap sm:flex-nowrap">
                    <div className="ml-4 mt-4">
                        <h3 className="text-lg leading-6 font-medium text-gray-900">Gestione
                            categorie <b>({parentId ? category?.name : 'Home'})</b></h3>
                        <p className="mt-1 text-sm text-gray-500">
                            Sfoglia le tue categorie e sottocategorie
                        </p>
                    </div>
                    <div className="ml-4 mt-4 flex gap-2">
                        <input onChange={e => setLike(e.target.value)} type="search" placeholder="Cerca..."
                               className="relative inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-shop bg-shop hover:bg-shop focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-shop"/>

                        <Link href={`/admin/${token}/catalog/categories/create`}>
                            <a className="relative inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-shop hover:bg-shop focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-shop">
                                Nuova categoria
                            </a>
                        </Link>
                    </div>
                </div>
            </div>

            <ul role="list" className="divide-y divide-gray-200">
                {categories?.map((category, idx) => (
                    <li key={idx}>
                        <div className="block hover:bg-gray-50">
                            <div className="flex items-center px-4 py-4 sm:px-6">
                                <Link href={`${window.location.pathname}?parentId=${category.id}`}>
                                    <a className="min-w-0 flex-1 flex items-center">
                                        <div className="flex-shrink-0">
                                            {category.thumbnail && (
                                                <Image
                                                    width={80}
                                                    height={80}
                                                    alt={category.name}
                                                    src={category.thumbnail}
                                                    className="h-12 w-12 object-contain rounded-sm"
                                                />
                                            )}
                                        </div>
                                        <div className="min-w-0 flex-1 px-4 md:grid md:grid-cols-2 md:gap-4">
                                            <div>
                                                <p className="text-sm font-medium text-shop truncate">{category.name}</p>
                                                <p className="mt-2 flex items-center text-sm text-gray-500">
                                                    <span
                                                        className="truncate">{category.description}</span>
                                                </p>
                                            </div>
                                            <div className="hidden md:block">
                                                <div>
                                                    <p className="text-sm text-gray-900">
                                                        Create <time
                                                        dateTime={category.createdAt}>{new Date(category.createdAt).toDateString()}</time>
                                                    </p>
                                                    <p className="mt-2 flex items-center text-sm text-gray-500">
                                                        <ArchiveIcon
                                                            className="flex-shrink-0 mr-1.5 h-5 w-5 text-green-400"
                                                            aria-hidden="true"/>
                                                        {category.quantity ?? 0} Prodotti disponibili
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </Link>

                                <Link href={`${window.location.pathname}/categories/${category.uuid}`}>
                                    <a>
                                        <ChevronRightIcon className="bg-gray-100 p-1 rounded-xl w-10 text-gray-400"
                                                          aria-hidden="true"/>
                                    </a>
                                </Link>

                            </div>
                        </div>
                    </li>
                ))}
            </ul>

        </div>
    )
}