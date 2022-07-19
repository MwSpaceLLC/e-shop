import {CalendarIcon, ChevronRightIcon} from '@heroicons/react/solid'
import useSWR from "swr";
import {fetcher} from "../../lib/function";
import {useRouter} from "next/router";
import Image from "next/image";
import Link from "next/link";
import {useState} from "react";

export default function ViewProducts() {

    const router = useRouter()
    const {token} = router.query

    const [like, setLike] = useState("")

    const {data: products, error} = useSWR(`/api/admin/${token}/catalog/products?like=${like}`, fetcher)

    return (
        <div className="bg-white shadow overflow-hidden sm:rounded-md">

            <div className="bg-white px-4 py-5 border-b border-gray-200 sm:px-6">
                <div className="-ml-4 -mt-4 flex justify-between items-center flex-wrap sm:flex-nowrap">
                    <div className="ml-4 mt-4">
                        <h3 className="text-lg leading-6 font-medium text-gray-900">Gestione prodotti</h3>
                        <p className="mt-1 text-sm text-gray-500">
                            Sfoglia tutti i tuoi prodotti
                        </p>
                    </div>
                    <div className="ml-4 mt-4 flex gap-2">
                        <input onChange={e => setLike(e.target.value)} type="search" placeholder="Cerca..."
                               className="relative inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-shop-800 bg-shop-100 hover:bg-shop-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-shop-500"/>

                        <Link href={`/admin/${token}/catalog/products/create`}>
                            <a className="relative inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-shop-600 hover:bg-shop-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-shop-500">
                                Aggiungi prodotto
                            </a>
                        </Link>
                    </div>
                </div>
            </div>

            {products && (
                <ul role="list" className="divide-y divide-gray-200">
                    {products.map((product, idx) => (
                        <li key={idx}>
                            <a href="#" className="block hover:bg-gray-50">
                                <div className="px-4 py-4 flex items-center sm:px-6">
                                    <div className="min-w-0 flex-1 sm:flex sm:items-center sm:justify-between">
                                        <div className="truncate">
                                            <div className="flex text-sm">
                                                <p className="font-medium text-shop-600 truncate">{product.name}</p>
                                                <p className="ml-1 flex-shrink-0 font-normal text-gray-500"> | {product.quantity}</p>
                                            </div>
                                            <div className="mt-2 flex">
                                                <div className="flex items-center truncate max-w-lg text-sm text-gray-500">
                                                    <p>{product.description}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div className="mt-4 flex-shrink-0 sm:mt-0 sm:ml-5">
                                            <div className="flex overflow-hidden -space-x-1">
                                                <Image width={45} height={45}
                                                       className="inline-block h-6 w-6 rounded-xl ring-2 ring-white"
                                                       src={product.thumbnail}
                                                       alt={product.name}
                                                />

                                            </div>
                                        </div>
                                    </div>
                                    <div className="ml-5 flex-shrink-0">
                                        <ChevronRightIcon className="h-5 w-5 text-gray-400" aria-hidden="true"/>
                                    </div>
                                </div>
                            </a>
                        </li>
                    ))}
                </ul>
            )}

        </div>
    )
}