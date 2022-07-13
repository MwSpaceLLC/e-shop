import {Fragment, useState} from 'react'

import {ChevronDownIcon, PlusSmIcon} from '@heroicons/react/solid'
import useSWR from "swr";
import {fetcher, slugCategory, slugCategoryProduct, slugProduct} from "../../../lib/function";
import PublicLayout from "../../../components/PublicLayout";
import {useRouter} from "next/router";

import Link from "next/link";

import CategoryServerSideProps from "../../../lib/props/CategoryServerSideProps";
import SideCategoriesNested from "../../../components/SideCategoriesNested";
import useMoney from "../../../hooks/useMoney";

// This gets called on every request
export const getServerSideProps = CategoryServerSideProps

export default function CategoryIndexProducts({category}) {
    const [name, setName] = useState("")
    const [mobileFiltersOpen, setMobileFiltersOpen] = useState(false)

    const money = useMoney()
    const router = useRouter()

    const id = router.query.category?.split('-').shift()

    const {data: products} = useSWR(`/api/json/products?category=${id}&name=${name}`, fetcher)

    return (
        <PublicLayout className="mx-auto max-w-7xl" title={category?.name} description={category?.description}>
            <div className="border-b border-gray-200 pt-24 pb-10">
                <h1 className="text-4xl font-extrabold tracking-tight text-gray-900 capitalize">{category?.name}</h1>
                <p className="mt-4 text-base text-gray-500">{category?.description}</p>
            </div>

            <div className="pt-12 pb-24 lg:grid lg:grid-cols-3 lg:gap-x-8 xl:grid-cols-4">
                <aside>
                    <h2 className="sr-only">Filters</h2>

                    <button
                        type="button"
                        className="inline-flex items-center lg:hidden"
                        onClick={() => setMobileFiltersOpen(true)}
                    >
                        <span className="text-sm font-medium text-gray-700">Filters</span>
                        <PlusSmIcon className="flex-shrink-0 ml-1 h-5 w-5 text-gray-400" aria-hidden="true"/>
                    </button>

                    <div className="hidden lg:block">
                        <div className="divide-y divide-gray-200 space-y-10">
                            <fieldset>
                                <SideCategoriesNested categoryId={id}/>
                            </fieldset>
                        </div>
                    </div>
                </aside>

                <section aria-labelledby="product-heading" className="mt-6 lg:mt-0 lg:col-span-2 xl:col-span-3">

                    {products?.length === 0 && (
                        <div className="w-full flex items-center justify-center flex-col">
                            <p className="font-bold text-xl">Il prodotto che stai cercando non è attualmente
                                disponibile. Riprova più tardi.</p>
                            <Link href="/cart">
                                <a className="text-orange-500">Continua lo shopping</a>
                            </Link>
                        </div>
                    )}

                    <div
                        className="grid grid-cols-1 gap-y-4 sm:grid-cols-2 sm:gap-x-6 sm:gap-y-10 lg:gap-x-8 xl:grid-cols-3">
                        {category && products?.map((product, idx) => (
                            <Link key={idx} href={slugCategoryProduct(product)}>
                                <a
                                    className="group bg-gray-200 relative bg-white border-2 border-gray-200 rounded-lg flex flex-col overflow-hidden">
                                    <div
                                        className="relative aspect-w-3 aspect-h-4 bg-white group-hover:opacity-75 sm:aspect-none sm:h-96">
                                        <img
                                            alt={product.name}
                                            src={product.thumbnail}
                                            className="w-52 h-52 object-center object-cover"
                                        />
                                    </div>
                                    <div className="flex-1 p-4 space-y-2 flex flex-col">
                                        <h3 className="text-sm font-medium text-gray-900">
                                            <span>
                                                <span aria-hidden="true" className="absolute inset-0"/>
                                                {product.name}
                                            </span>
                                        </h3>
                                        <p className="text-sm text-gray-500">{product.description}</p>
                                        <div className="flex-1 flex flex-col justify-end">
                                            <p className="text-sm italic text-gray-500">{product.options}</p>
                                            <p className="text-base font-medium text-gray-900">{money.format(product.price)}</p>
                                        </div>
                                    </div>
                                </a>
                            </Link>
                        ))}

                    </div>
                </section>
            </div>
        </PublicLayout>
    )
}
