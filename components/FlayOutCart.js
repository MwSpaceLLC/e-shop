import {Fragment, useState} from 'react'
import {Dialog, Transition} from '@headlessui/react'
import {HeartIcon, XIcon} from '@heroicons/react/outline'

import Image from "next/image";
import useMoney from "../hooks/useMoney";
import useSWR from "swr";
import {fetcher} from "../lib/function";
import Link from "next/link";

export default function FlayOutCart({open, setOpen, product}) {

    const money = useMoney()

    const {data: PriceInTax} = useSWR(`/api/json/options/PriceInTax`, fetcher)

    return (
        <Transition.Root show={open} as={Fragment}>
            <Dialog as="div" className="relative z-50" onClose={setOpen}>
                <Transition.Child
                    as={Fragment}
                    enter="ease-in-out duration-500"
                    enterFrom="opacity-0"
                    enterTo="opacity-100"
                    leave="ease-in-out duration-500"
                    leaveFrom="opacity-100"
                    leaveTo="opacity-0"
                >
                    <div className="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"/>
                </Transition.Child>

                <div className="fixed inset-0 overflow-hidden">
                    <div className="absolute inset-0 overflow-hidden">
                        <div className="pointer-events-none fixed inset-y-0 right-0 flex max-w-full pl-10">
                            <Transition.Child
                                as={Fragment}
                                enter="transform transition ease-in-out duration-500 sm:duration-700"
                                enterFrom="translate-x-full"
                                enterTo="translate-x-0"
                                leave="transform transition ease-in-out duration-500 sm:duration-700"
                                leaveFrom="translate-x-0"
                                leaveTo="translate-x-full"
                            >
                                <Dialog.Panel className="pointer-events-auto relative w-96">
                                    <Transition.Child
                                        as={Fragment}
                                        enter="ease-in-out duration-500"
                                        enterFrom="opacity-0"
                                        enterTo="opacity-100"
                                        leave="ease-in-out duration-500"
                                        leaveFrom="opacity-100"
                                        leaveTo="opacity-0"
                                    >
                                        <div className="absolute top-0 left-0 -ml-8 flex pt-4 pr-2 sm:-ml-10 sm:pr-4">
                                            <button
                                                type="button"
                                                className="rounded-full text-gray-300 hover:text-white focus:outline-none focus:ring-2 focus:ring-white"
                                                onClick={() => setOpen(false)}
                                            >
                                                <span className="sr-only">Close panel</span>
                                                <XIcon className="h-6 w-6" aria-hidden="true"/>
                                            </button>
                                        </div>
                                    </Transition.Child>
                                    <div className="h-full overflow-y-auto bg-white p-8">
                                        <div className="space-y-6 pb-16">
                                            <div>
                                                <div
                                                    className="aspect-w-10 aspect-h-7 shadow-md block w-full overflow-hidden rounded-lg">
                                                    {product.thumbnail && (
                                                        <Image
                                                            layout="fill"
                                                            objectFit="cover"
                                                            alt={product.name}
                                                            src={product.thumbnail}
                                                            className="w-full h-full object-center object-cover"
                                                        />
                                                    )}
                                                </div>
                                                <div className="mt-4 flex items-start justify-between">
                                                    <div>
                                                        <h1 className="text-lg font-medium text-gray-900">
                                                            {product.name}
                                                        </h1>
                                                        <p className="text-sm font-medium text-gray-500">{product.description}</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div>
                                                <h3 className="font-medium text-gray-900">Informazioni</h3>
                                                <dl className="mt-2 divide-y divide-gray-200 border-t border-b border-gray-200">
                                                    <div className="flex justify-between py-3 text-sm font-medium">
                                                        <dt className="text-gray-500">Disponibili</dt>
                                                        <dd className="text-gray-900 font-bold">{product.quantity}</dd>
                                                    </div>
                                                    <div className="flex justify-between py-3 text-sm font-medium">
                                                        <dt className="text-gray-500">Tasse</dt>
                                                        <dd className="text-gray-900 font-bold">{PriceInTax?.enabled ? 'Incluse' : 'Escluse'}</dd>
                                                    </div>
                                                    <div className="flex justify-between py-3 text-sm font-medium">
                                                        <dt className="text-gray-500">Prezzo</dt>
                                                        <dd className="text-gray-900 font-bold">{money.format(product.price)}</dd>
                                                    </div>
                                                    <div className="flex justify-between py-3 text-sm font-medium">
                                                        <dt className="text-gray-500">Stato</dt>
                                                        <dd className="text-gray-900 font-bold">Aggiunto al carrello
                                                        </dd>
                                                    </div>
                                                </dl>
                                            </div>

                                            <div className="flex">
                                                <Link href="/cart">
                                                    <a className="text-center ml-3 flex-1 rounded-md border border-gray-300 bg-white py-2 px-4 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-shop-500 focus:ring-offset-2">
                                                        Vai al carrello
                                                    </a>
                                                </Link>
                                            </div>
                                        </div>
                                    </div>
                                </Dialog.Panel>
                            </Transition.Child>
                        </div>
                    </div>
                </div>
            </Dialog>
        </Transition.Root>
    )
}
