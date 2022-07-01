import {Fragment, useState} from 'react'

import {ArchiveIcon, HeartIcon, XIcon} from '@heroicons/react/outline'

import {CheckCircleIcon, ChevronRightIcon, MailIcon} from '@heroicons/react/solid'

import {useTranslation} from "next-i18next";

import useSWR from "swr";
import {fetcher} from "../../lib/function";
import Image from "next/image";
import Link from "next/link";
import {useRouter} from "next/router";

export default function ViewCategories() {

    // const token = useAdminToken()
    const {t} = useTranslation();

    const router = useRouter()
    const {token} = router.query

    const [like, setLike] = useState("")

    const {data: categories, error} = useSWR(`/api/admin/${token}/catalog/categories?like=${like}`, fetcher)

    return (
        <div className="bg-white shadow overflow-hidden sm:rounded-md">

            <div className="bg-white px-4 py-5 border-b border-gray-200 sm:px-6">
                <div className="-ml-4 -mt-4 flex justify-between items-center flex-wrap sm:flex-nowrap">
                    <div className="ml-4 mt-4">
                        <h3 className="text-lg leading-6 font-medium text-gray-900">Gestione categorie</h3>
                        <p className="mt-1 text-sm text-gray-500">
                            Sfoglia le tue categorie e sottocategorie
                        </p>
                    </div>
                    <div className="ml-4 mt-4 flex gap-2">
                        <input onChange={e => setLike(e.target.value)} type="search" placeholder="Cerca..."
                               className="relative inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-orange-800 bg-orange-100 hover:bg-orange-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500"/>

                        <Link href={`/admin/${token}/catalog/categories/create`}>
                            <a className="relative inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-orange-600 hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500">
                                Nuova categoria
                            </a>
                        </Link>
                    </div>
                </div>
            </div>

            {categories && (
                <ul role="list" className="divide-y divide-gray-200">
                    {categories.map((category, idx) => (
                        <li key={idx}>
                            <Link href={`${window.location.pathname}/categories/${category.uuid}`}>
                                <a className="block hover:bg-gray-50">
                                    <div className="flex items-center px-4 py-4 sm:px-6">
                                        <div className="min-w-0 flex-1 flex items-center">
                                            <div className="flex-shrink-0">
                                                <Image width={50} height={50} className="h-12 w-12 rounded-sm"
                                                       src={category.thumbnail}
                                                       alt=""/>
                                            </div>
                                            <div className="min-w-0 flex-1 px-4 md:grid md:grid-cols-2 md:gap-4">
                                                <div>
                                                    <p className="text-sm font-medium text-orange-600 truncate">{category.name}</p>
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
                                        </div>
                                        <div>
                                            <ChevronRightIcon className="h-5 w-5 text-gray-400" aria-hidden="true"/>
                                        </div>
                                    </div>
                                </a>
                            </Link>
                        </li>
                    ))}
                </ul>
            )}

        </div>
    )
}