import Head from "next/head";

import {Fragment, useState} from 'react'
import {Disclosure, Menu, RadioGroup, Transition} from '@headlessui/react'

import {
    SearchIcon, TruckIcon,
    BellIcon,
    CogIcon,
    CreditCardIcon,
    MenuIcon,
    ViewGridAddIcon,
    XIcon, CashIcon
} from '@heroicons/react/outline'
import Image from "next/image";
import {useRouter} from "next/router";
import Link from "next/link";
import useAdminToken from "../hooks/useAdminToken";
import {useTranslation} from "next-i18next";


const user = {
    name: 'Lisa Marie',
    email: 'lisamarie@example.com',
    imageUrl:
        'https://images.unsplash.com/photo-1517365830460-955ce3ccd263?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=80',
}
const navigation = [
    {name: 'Dashboard', href: '#'},
    {name: 'Jobs', href: '#'},
    {name: 'Applicants', href: '#'},
    {name: 'Company', href: '#'},
]
const userNavigation = [
    {name: 'Your Profile', href: '#'},
    {name: 'Settings', href: '#'},
    {name: 'Sign out', href: '#'},
]

const settings = [
    {name: 'Public access', description: 'This project would be available to anyone who has the link'},
    {name: 'Private to Project Members', description: 'Only members of this project would be able to access'},
    {name: 'Private to you', description: 'You are the only one able to access this project'},
]

function classNames(...classes) {
    return classes.filter(Boolean).join(' ')
}

export default function AppLayout({title, description, children}) {

    const router = useRouter()
    const token = useAdminToken()
    const {t} = useTranslation();

    const subNavigation = [
        {name: 'Dashboard', href: `/admin/${token}`, icon: CreditCardIcon, current: router.route === '/admin/[token]'},
        {
            name: 'Catalogo',
            href: `/admin/${token}/catalog`,
            icon: ViewGridAddIcon,
            current: router.route.includes('catalog')
        },
        {name: 'Vendite', href: `/admin/${token}/sales`, icon: CashIcon, current: router.route.includes('sales')},
        {
            name: 'Pagamenti',
            href: `/admin/${token}/payments`,
            icon: CreditCardIcon,
            current: router.route.includes('payments')
        },
        {
            name: 'Spedizioni',
            href: `/admin/${token}/shipments`,
            icon: TruckIcon,
            current: router.route.includes('shipments')
        },
        {
            name: 'Impostazioni',
            href: `/admin/${token}/settings`,
            icon: CogIcon,
            current: router.route.includes('settings')
        },
    ]

    return (
        <>
            <Head>
                <title>{title}</title>
                <meta name="description" content={description}/>
                <link rel="icon" href="/favicon.ico"/>
            </Head>

            <div className="h-full">
                <Disclosure as="header" className="bg-white shadow">
                    {({open}) => (
                        <>
                            <div className="max-w-7xl mx-auto px-2 sm:px-4 lg:divide-y lg:divide-gray-200 lg:px-8">
                                <div className="relative h-16 flex justify-between">
                                    <div className="relative z-10 px-2 flex lg:px-0">
                                        <div className="flex-shrink-0 flex items-center">
                                            <Image
                                                className="h-8 w-auto"
                                                src="/e-shop-1080-hd.png"
                                                alt="e-shop logo"
                                                width={50} height={50}/>
                                        </div>
                                    </div>
                                    <div
                                        className="relative z-0 flex-1 px-2 flex items-center justify-center sm:absolute sm:inset-0">
                                        <div className="max-w-xs w-full">
                                            <label htmlFor="search" className="sr-only">
                                                Search
                                            </label>
                                            <div className="relative">
                                                <div
                                                    className="pointer-events-none absolute inset-y-0 left-0 pl-3 flex items-center">
                                                    <SearchIcon className="flex-shrink-0 h-5 w-5 text-gray-400"
                                                                aria-hidden="true"/>
                                                </div>
                                                <input
                                                    name="search"
                                                    id="search"
                                                    className="block w-full bg-white border border-gray-300 rounded-md py-2 pl-10 pr-3 text-sm placeholder-gray-500 focus:outline-none focus:text-gray-900 focus:placeholder-gray-400 focus:ring-1 focus:ring-gray-900 focus:border-gray-900 sm:text-sm"
                                                    placeholder="Search"
                                                    type="search"
                                                />
                                            </div>
                                        </div>
                                    </div>
                                    <div className="relative z-10 flex items-center lg:hidden">
                                        {/* Mobile menu button */}
                                        <Disclosure.Button
                                            className="rounded-full p-2 inline-flex items-center justify-center text-gray-400 hover:bg-gray-100 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-gray-900">
                                            <span className="sr-only">Open menu</span>
                                            {open ? (
                                                <XIcon className="block h-6 w-6" aria-hidden="true"/>
                                            ) : (
                                                <MenuIcon className="block h-6 w-6" aria-hidden="true"/>
                                            )}
                                        </Disclosure.Button>
                                    </div>
                                    <div className="hidden lg:relative lg:z-10 lg:ml-4 lg:flex lg:items-center">
                                        <button
                                            type="button"
                                            className="flex-shrink-0 bg-white rounded-full p-1 text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900"
                                        >
                                            <span className="sr-only">View notifications</span>
                                            <BellIcon className="h-6 w-6" aria-hidden="true"/>
                                        </button>

                                        {/* Profile dropdown */}
                                        <Menu as="div" className="flex-shrink-0 relative ml-4">
                                            <div>
                                                <Menu.Button
                                                    className="bg-white rounded-full flex focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900">
                                                    <span className="sr-only">Open user menu</span>
                                                    <img className="h-8 w-8 rounded-full" src={user.imageUrl} alt=""/>
                                                </Menu.Button>
                                            </div>
                                            <Transition
                                                as={Fragment}
                                                enter="transition ease-out duration-100"
                                                enterFrom="transform opacity-0 scale-95"
                                                enterTo="transform opacity-100 scale-100"
                                                leave="transition ease-in duration-75"
                                                leaveFrom="transform opacity-100 scale-100"
                                                leaveTo="transform opacity-0 scale-95"
                                            >
                                                <Menu.Items
                                                    className="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5  focus:outline-none">
                                                    {userNavigation.map((item) => (
                                                        <Menu.Item key={item.name}>
                                                            {({active}) => (
                                                                <a
                                                                    href={item.href}
                                                                    className={classNames(
                                                                        active ? 'bg-gray-100' : '',
                                                                        'block py-2 px-4 text-sm text-gray-700 rounded-md'
                                                                    )}
                                                                >
                                                                    {item.name}
                                                                </a>
                                                            )}
                                                        </Menu.Item>
                                                    ))}
                                                </Menu.Items>
                                            </Transition>
                                        </Menu>
                                    </div>
                                </div>
                            </div>

                            <Disclosure.Panel as="nav" className="lg:hidden" aria-label="Global">

                                <div className="border-t border-gray-200 pt-4 pb-3">
                                    <div className="px-4 flex items-center">
                                        <div className="flex-shrink-0">
                                            <img className="h-10 w-10 rounded-full" src={user.imageUrl} alt=""/>
                                        </div>
                                        <div className="ml-3">
                                            <div className="text-base font-medium text-gray-800">{user.name}</div>
                                            <div className="text-sm font-medium text-gray-500">{user.email}</div>
                                        </div>
                                        <button
                                            type="button"
                                            className="ml-auto flex-shrink-0 bg-white rounded-full p-1 text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900"
                                        >
                                            <span className="sr-only">View notifications</span>
                                            <BellIcon className="h-6 w-6" aria-hidden="true"/>
                                        </button>
                                    </div>
                                    <div className="mt-3 px-2 space-y-1">
                                        {userNavigation.map((item) => (
                                            <Disclosure.Button
                                                key={item.name}
                                                as="a"
                                                href={item.href}
                                                className="block rounded-full py-2 px-3 text-base font-medium text-gray-500 hover:bg-gray-50 hover:text-gray-900"
                                            >
                                                {item.name}
                                            </Disclosure.Button>
                                        ))}
                                    </div>
                                </div>
                            </Disclosure.Panel>
                        </>
                    )}
                </Disclosure>

                <main className="max-w-7xl mx-auto pb-10 lg:py-12 lg:px-8">

                    <div className="lg:grid lg:grid-cols-12 lg:gap-x-5">
                        <aside className="py-6 px-2 sm:px-6 lg:py-0 lg:px-0 lg:col-span-3">
                            <nav className="space-y-1">
                                {subNavigation.map((item) => token && (
                                    <Link href={item.href} key={item.name}>
                                        <a
                                            className={classNames(
                                                item.current
                                                    ? 'bg-gray-50 text-orange-600 hover:bg-white'
                                                    : 'text-gray-900 hover:text-gray-900 hover:bg-gray-50',
                                                'group rounded-full px-3 py-2 flex items-center text-sm font-medium'
                                            )}
                                            aria-current={item.current ? 'page' : undefined}
                                        >
                                            <item.icon
                                                className={classNames(
                                                    item.current ? 'text-orange-500' : 'text-gray-400 group-hover:text-gray-500',
                                                    'flex-shrink-0 -ml-1 mr-3 h-6 w-6'
                                                )}
                                                aria-hidden="true"
                                            />
                                            <span className="truncate">{item.name}</span>
                                        </a>
                                    </Link>
                                ))}
                            </nav>
                        </aside>

                        {/* Details */}
                        <div className="space-y-6 sm:px-6 lg:px-0 lg:col-span-9">{children}</div>
                    </div>

                </main>
            </div>
        </>
    )
}

