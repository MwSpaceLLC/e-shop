import {Fragment, useState} from 'react'

import {CheckIcon, ClockIcon, QuestionMarkCircleIcon, XIcon as XIconSolid} from '@heroicons/react/solid'

import PublicLayout from "../components/PublicLayout";
import {useTranslation} from "next-i18next";
import PublicServerSideProps from "../lib/props/PublicServerSideProps";
import useSWR, {useSWRConfig} from "swr";
import {fetcher, slugCategoryProduct} from "../lib/function";
import useMoney from "../hooks/useMoney";
import Link from "next/link";
import axios from "axios";

// This gets called on every request
export const getServerSideProps = PublicServerSideProps

export default function Cart() {

    const { mutate } = useSWRConfig()
    const money = useMoney()

    const {t} = useTranslation();
    const [open, setOpen] = useState(false)

    const {data: carts} = useSWR(`/api/json/carts`, fetcher)

    return (
        <PublicLayout title={t('seo-cart-title')} description={t('seo-cart-description')}
                      className="max-w-2xl mx-auto pt-16 pb-24 px-4 sm:px-6 lg:max-w-7xl lg:px-8">
            <h1 className="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">{t('cart-head-title')}</h1>

            {!carts?.items && (
                <div className="w-full h-96 flex items-center justify-center flex-col">
                    <p className="font-bold text-xl">
                        Il tuo carrello sembra essere vuoto
                    </p>
                    <Link href="/">
                        <a className="text-orange-500">Continua lo shopping</a>
                    </Link>
                </div>
            )}

            {carts?.items && (
                <div className="mt-12 lg:grid lg:grid-cols-12 lg:gap-x-12 lg:items-start xl:gap-x-16">
                    <section aria-labelledby="cart-heading" className="lg:col-span-7">
                        <ul role="list" className="border-t border-b border-gray-200 divide-y divide-gray-200">
                            {carts?.items?.map((cartItem, cartItemIdx) => (
                                <li key={cartItemIdx} className="flex py-6 sm:py-10">
                                    <div className="flex-shrink-0">

                                        <Link href={slugCategoryProduct(cartItem)}>
                                            <a>
                                                <img
                                                    src={cartItem.thumbnail}
                                                    alt={cartItem.name}
                                                    className="w-24 h-24 rounded-md object-center object-cover sm:w-48 sm:h-48"
                                                />
                                            </a>
                                        </Link>

                                    </div>

                                    <div className="ml-4 flex-1 flex flex-col justify-between sm:ml-6">
                                        <div className="relative pr-9 sm:grid sm:grid-cols-2 sm:gap-x-6 sm:pr-0">
                                            <div>
                                                <div className="flex justify-between">
                                                    <h3 className="text-sm">
                                                        <Link href={slugCategoryProduct(cartItem)}>
                                                            <a className="font-medium text-gray-700 hover:text-gray-800">
                                                                {cartItem.name}
                                                            </a>
                                                        </Link>
                                                    </h3>
                                                </div>
                                                <div className="mt-1 flex text-sm">
                                                    <p className="text-gray-500">{cartItem.color}</p>
                                                    {cartItem.size ? (
                                                        <p className="ml-4 pl-4 border-l border-gray-200 text-gray-500">{cartItem.size}</p>
                                                    ) : null}
                                                </div>
                                                <p className="mt-1 text-sm font-medium text-gray-900">{money.format(cartItem.price)}</p>
                                            </div>

                                            <div className="mt-4 sm:mt-0 sm:pr-9">
                                                <label htmlFor={`quantity-${cartItemIdx}`} className="sr-only">
                                                    Quantity, {cartItem.bag}
                                                </label>
                                                <select
                                                    defaultValue={cartItem.bag}
                                                    id={`quantity-${cartItemIdx}`}
                                                    name={`quantity-${cartItemIdx}`}
                                                    className="max-w-full rounded-md border border-gray-300 py-1.5 text-base leading-5 font-medium text-gray-700 text-left shadow-sm focus:outline-none focus:ring-1 focus:ring-orange-500 focus:border-orange-500 sm:text-sm"
                                                >

                                                    {[...Array(cartItem.quantity).keys()].map((item, key) => (
                                                        <option key={key} value={item + 1}>{item + 1}</option>
                                                    ))}

                                                </select>

                                                <div className="absolute top-0 right-0">
                                                    <button
                                                        onClick={() => axios.delete(`/api/json/carts/${cartItem.uuid}`).then(() => mutate('/api/json/carts'))}
                                                        type="button"
                                                        className="-m-2 p-2 inline-flex text-gray-400 hover:text-gray-500">
                                                        <span className="sr-only">Remove</span>
                                                        <XIconSolid className="h-5 w-5" aria-hidden="true"/>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                        <p className="mt-4 flex text-sm text-gray-700 space-x-2">
                                            {cartItem.inStock ? (
                                                <CheckIcon className="flex-shrink-0 h-5 w-5 text-green-500"
                                                           aria-hidden="true"/>
                                            ) : (
                                                <ClockIcon className="flex-shrink-0 h-5 w-5 text-gray-300"
                                                           aria-hidden="true"/>
                                            )}

                                            <span>{cartItem.inStock ? 'In stock' : `Ships in ${cartItem.leadTime}`}</span>
                                        </p>
                                    </div>
                                </li>
                            ))}
                        </ul>
                    </section>

                    {/* Order summary */}
                    <section
                        aria-labelledby="summary-heading"
                        className="mt-16 bg-gray-50 rounded-lg px-4 py-6 sm:p-6 lg:p-8 lg:mt-0 lg:col-span-5"
                    >
                        <h2 id="summary-heading" className="text-lg font-medium text-gray-900">
                            {t('cart-summary-title')}
                        </h2>

                        <dl className="mt-6 space-y-4">
                            <div className="flex items-center justify-between">
                                <dt className="text-sm text-gray-600">{t('cart-summary-sub')}</dt>
                                <dd className="text-sm font-medium text-gray-900">$99.00</dd>
                            </div>
                            <div className="border-t border-gray-200 pt-4 flex items-center justify-between">
                                <dt className="flex items-center text-sm text-gray-600">
                                    <span>{t('cart-summary-ship')}</span>
                                    <a href="#" className="ml-2 flex-shrink-0 text-gray-400 hover:text-gray-500">
                                        <span className="sr-only">Learn more about how shipping is calculated</span>
                                        <QuestionMarkCircleIcon className="h-5 w-5" aria-hidden="true"/>
                                    </a>
                                </dt>
                                <dd className="text-sm font-medium text-gray-900">$5.00</dd>
                            </div>
                            <div className="border-t border-gray-200 pt-4 flex items-center justify-between">
                                <dt className="flex text-sm text-gray-600">
                                    <span>{t('cart-summary-tax')}</span>
                                    <a href="#" className="ml-2 flex-shrink-0 text-gray-400 hover:text-gray-500">
                                        <span className="sr-only">Learn more about how tax is calculated</span>
                                        <QuestionMarkCircleIcon className="h-5 w-5" aria-hidden="true"/>
                                    </a>
                                </dt>
                                <dd className="text-sm font-medium text-gray-900">$8.32</dd>
                            </div>
                            <div className="border-t border-gray-200 pt-4 flex items-center justify-between">
                                <dt className="text-base font-medium text-gray-900">{t('cart-summary-total')}</dt>
                                <dd className="text-base font-medium text-gray-900">$112.32</dd>
                            </div>
                        </dl>

                        <div className="mt-6">
                            <button
                                type="button"
                                className="w-full bg-orange-600 border border-transparent rounded-md shadow-sm py-3 px-4 text-base font-medium text-white hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-50 focus:ring-orange-500"
                            >
                                {t('cart-summary-btn')}
                            </button>
                        </div>
                    </section>
                </div>
            )}
        </PublicLayout>
    )
}