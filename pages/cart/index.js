import {QuestionMarkCircleIcon, XIcon as XIconSolid} from '@heroicons/react/solid'

import PublicLayout from "../../components/PublicLayout";
import {useTranslation} from "next-i18next";
import PublicServerSideProps from "../../lib/props/PublicServerSideProps";
import useSWR, {useSWRConfig} from "swr";
import {fetcher, slugCategoryProduct} from "../../lib/function";
import useMoney from "../../hooks/useMoney";
import Link from "next/link";

import useCarts from "../../hooks/useCarts";

// This gets called on every request
export const getServerSideProps = PublicServerSideProps

export default function CartIndex({set, opt}) {

    const money = useMoney()

    const {t} = useTranslation();

    const [items, TotalTax, PartialPrice, TotalPrice, ChangeQuantity, DeleteProduct] = useCarts(opt)

    return (
        <PublicLayout
            set={set}
            title={t('seo-cart-title')}
            description={t('seo-cart-description')}
            className="max-w-2xl mx-auto pt-16 pb-24 px-4 sm:px-6 lg:max-w-7xl lg:px-8">
            <h1 className="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">{t('cart-head-title')}</h1>

            {items.length > 0 ? (
                <div className="mt-12 lg:grid lg:grid-cols-12 lg:gap-x-12 lg:items-start xl:gap-x-16">
                    <section aria-labelledby="cart-heading" className="lg:col-span-7">
                        <ul role="list" className="border-t border-b border-gray-200 divide-y divide-gray-200">
                            {items.map((cartItem, idx) => (
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

                                                <p className="mt-1 text-md font-medium text-gray-900 flex gap-2">
                                                    <b>{money.format(cartItem.price)}</b>
                                                    <i>({opt.PriceInTax ? 'Tasse Incluse' : 'Tasse Escluse'})</i>
                                                </p>
                                            </div>

                                            <div className="mt-4 sm:mt-0 sm:pr-9">
                                                <label htmlFor={`quantity-${idx}`} className="sr-only">
                                                    Quantity, {cartItem.bag}
                                                </label>
                                                <select
                                                    onChange={(event) => ChangeQuantity(event.target.value, cartItem)}
                                                    defaultValue={cartItem.bag}
                                                    id={`quantity-${idx}`}
                                                    name={`quantity-${idx}`}
                                                    className="max-w-full rounded-md border border-gray-300 py-1.5 text-base leading-5 font-medium text-gray-700 text-left shadow-sm focus:outline-none focus:ring-1 focus:ring-shop focus:border-shop sm:text-sm"
                                                >

                                                    {[...Array(cartItem.quantity).keys()].map((item, idx) => (
                                                        <option key={idx} value={item + 1}>{item + 1}</option>
                                                    ))}

                                                </select>

                                                <div className="absolute top-0 right-0">
                                                    <button
                                                        type="button"
                                                        onClick={DeleteProduct}
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
                    <section className="mt-16 bg-gray-50 rounded-lg px-4 py-6 sm:p-6 lg:p-8 lg:mt-0 lg:col-span-5">
                        <h2 className="flex items-center text-lg font-medium text-gray-900">
                            <span>Riepilogo del tuo carrello</span>
                        </h2>

                        <dl className="mt-6 space-y-4">

                            <div className="pt-2 flex items-center justify-between">
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
                                <dd className="text-sm font-medium text-gray-900">{money.format(TotalTax)}</dd>
                            </div>
                            <div className="border-t text-xl border-gray-200 pt-4 flex items-center justify-between">
                                <dt className="font-bold text-gray-900">{t('cart-summary-total')}</dt>
                                <dd className="font-bold text-gray-900">{money.format(TotalPrice)}</dd>
                            </div>
                        </dl>

                        <div className="mt-6 w-full flex">
                            <Link href="/cart/checkout">
                                <a
                                    className="w-full text-center bg-shop border border-transparent rounded-md shadow-sm py-3 px-4 text-base font-medium text-white hover:bg-shop focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-50 focus:ring-shop">
                                    Prosegui
                                </a>
                            </Link>
                        </div>
                    </section>
                </div>
            ) : (
                <div className="w-full h-96 flex items-center justify-center flex-col">
                    <p className="font-bold text-xl">
                        Il tuo carrello sembra essere vuoto
                    </p>
                    <Link href="/">
                        <a className="text-shop">Continua lo shopping</a>
                    </Link>
                </div>
            )}

        </PublicLayout>
    )
}