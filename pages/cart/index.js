import {Fragment, useState} from 'react'

import {CheckIcon, ClockIcon, QuestionMarkCircleIcon, XIcon as XIconSolid} from '@heroicons/react/solid'

import PublicLayout from "../../components/PublicLayout";
import {useTranslation} from "next-i18next";
import PublicServerSideProps from "../../lib/props/PublicServerSideProps";
import useSWR, {useSWRConfig} from "swr";
import {fetcher, slugCategoryProduct} from "../../lib/function";
import useMoney from "../../hooks/useMoney";
import Link from "next/link";
import axios from "axios";

// This gets called on every request
export const getServerSideProps = PublicServerSideProps

export default function CartIndex() {

    const {mutate} = useSWRConfig()
    const money = useMoney()

    const {t} = useTranslation();
    const [open, setOpen] = useState(false)

    const {data: carts} = useSWR(`/api/json/carts`, fetcher)
    const {data: PriceInTax} = useSWR(`/api/json/options/PriceInTax`, fetcher)

    const TotalPriceTax = carts?.items?.reduce((accumulator, item) => (+accumulator + +parseFloat(item.price) * item.bag) * (parseFloat(item.tax) / 100), 0);

    //TODO: check if work | remove or not price tax
    const PartialPrice = carts?.items?.reduce((accumulator, item) => (+accumulator + +parseFloat(item.price) * item.bag), 0) - (PriceInTax?.enabled ? TotalPriceTax : 0);

    //TODO: check if work | add or not price tax
    const TotalPrice = carts?.items?.reduce((accumulator, item) => (+accumulator + +parseFloat(item.price) * item.bag), 0) + (PriceInTax?.enabled ? 0 : TotalPriceTax);

    const ChangeProductQuantity = (value, cartItem) => {
        axios
            .patch(`/api/json/carts/${cartItem.uuid}`, {bag: value})
            .then(() => mutate('/api/json/carts'))
    }

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
                        <a className="text-shop-500">Continua lo shopping</a>
                    </Link>
                </div>
            )}

            {carts?.items && (
                <div className="mt-12 lg:grid lg:grid-cols-12 lg:gap-x-12 lg:items-start xl:gap-x-16">
                    <section aria-labelledby="cart-heading" className="lg:col-span-7">
                        <ul role="list" className="border-t border-b border-gray-200 divide-y divide-gray-200">
                            {carts?.items?.map((cartItem, idx) => (
                                <li key={idx} className="flex py-6 sm:py-10">
                                    <div className="flex-shrink-0">

                                        <img
                                            src={cartItem.thumbnail}
                                            alt={cartItem.name}
                                            className="w-24 h-24 rounded-md object-center object-cover sm:w-48 sm:h-48"
                                        />

                                    </div>

                                    <div className="ml-4 flex-1 flex flex-col justify-between sm:ml-6">
                                        <div className="relative pr-9 sm:grid sm:grid-cols-2 sm:gap-x-6 sm:pr-0">
                                            <div>
                                                <div className="flex justify-between">
                                                    <h3 className="text-sm">
                                                        <Link href={slugCategoryProduct(cartItem)}>
                                                            <a className="font-medium hover:underline text-gray-700 hover:text-gray-800">
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
                                                <p className="mt-1 text-sm font-medium text-gray-900 flex gap-2">
                                                    <span>{money.format(cartItem.price)}</span>
                                                    <i>({PriceInTax?.enabled ? 'Tasse Incluse' : 'Tasse Escluse'})</i>
                                                </p>
                                            </div>

                                            <div className="mt-4 sm:mt-0 sm:pr-9">
                                                <label htmlFor={`quantity-${idx}`} className="sr-only">
                                                    Quantity, {cartItem.bag}
                                                </label>
                                                <select
                                                    onChange={(event) => ChangeProductQuantity(event.target.value, cartItem)}
                                                    defaultValue={cartItem.bag}
                                                    id={`quantity-${idx}`}
                                                    name={`quantity-${idx}`}
                                                    className="max-w-full rounded-md border border-gray-300 py-1.5 text-base leading-5 font-medium text-gray-700 text-left shadow-sm focus:outline-none focus:ring-1 focus:ring-shop-500 focus:border-shop-500 sm:text-sm"
                                                >

                                                    {[...Array(cartItem.quantity).keys()].map((item, idx) => (
                                                        <option key={idx} value={item + 1}>{item + 1}</option>
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
                        <h2 id="summary-heading" className="flex items-center text-lg font-medium text-gray-900">
                            <span>{t('cart-summary-title')}</span>
                        </h2>

                        <dl className="mt-6 space-y-4">
                            <div className="flex items-center justify-between">
                                <dt className="flex items-center text-sm text-gray-600">{t('cart-summary-ship')}
                                    <QuestionMarkCircleIcon className="ml-2 h-5 w-5" aria-hidden="true"/>
                                </dt>
                                <dd className="text-sm font-medium text-gray-900">{money.format(15.00)}</dd>
                            </div>
                            <div className="border-t border-gray-200 pt-4 flex items-center justify-between">
                                <dt className="text-sm text-gray-600">
                                    <span>{t('cart-summary-sub')}</span>
                                </dt>
                                <dd className="text-sm font-medium text-gray-900">{money.format(PartialPrice)}</dd>
                            </div>
                            <div className="border-t border-gray-200 pt-4 flex items-center justify-between">
                                <dt className="flex text-sm text-gray-600">
                                    <span>{t('cart-summary-tax')}</span>
                                    <QuestionMarkCircleIcon className="ml-2 h-5 w-5" aria-hidden="true"/>
                                </dt>
                                <dd className="text-sm font-medium text-gray-900">{money.format(TotalPriceTax)}</dd>
                            </div>
                            <div className="border-t border-gray-200 pt-4 flex items-center justify-between">
                                <dt className="font-bold text-gray-900">{t('cart-summary-total')}</dt>
                                <dd className="font-bold text-gray-900">{money.format(TotalPrice)}</dd>
                            </div>
                        </dl>

                        <div className="mt-6 w-full flex">
                            <Link href="/cart/checkout">
                                <a
                                    className="w-full text-center bg-shop-600 border border-transparent rounded-md shadow-sm py-3 px-4 text-base font-medium text-white hover:bg-shop-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-50 focus:ring-shop-500">
                                    Prosegui
                                </a>
                            </Link>
                        </div>
                    </section>
                </div>
            )}
        </PublicLayout>
    )
}