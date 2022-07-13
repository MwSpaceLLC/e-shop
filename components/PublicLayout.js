import {useTranslation} from "next-i18next";

import {classNames, fetcher, slugCategory} from "../lib/function"

import {Fragment, useState} from 'react'
import {Dialog, Popover, Tab, Transition} from '@headlessui/react'
import {
    MenuIcon,
    SearchCircleIcon,
    SearchIcon,
    ShoppingBagIcon,
    XIcon
} from '@heroicons/react/outline'
import Link from "next/link";
import Image from "next/image";
import Head from "next/head";
import useSWR from "swr";
import {LogoApp} from "./LogoApp";
import useUser from "../hooks/useUser";

const currencies = ['EUR']

const footerNavigation = {
    shop: [
        {name: 'Bags', href: '#'},
        {name: 'Tees', href: '#'},
        {name: 'Objects', href: '#'},
        {name: 'Home Goods', href: '#'},
        {name: 'Accessories', href: '#'},
    ],
    company: [
        {name: 'Who we are', href: '#'},
        {name: 'Sustainability', href: '#'},
        {name: 'Press', href: '#'},
        {name: 'Careers', href: '#'},
        {name: 'Terms & Conditions', href: '#'},
        {name: 'Privacy', href: '#'},
    ],
    account: [
        {name: 'Manage Account', href: '#'},
        {name: 'Returns & Exchanges', href: '#'},
        {name: 'Redeem a Gift Card', href: '#'},
    ],
    connect: [
        {name: 'Contact Us', href: '#'},
        {name: 'Twitter', href: '#'},
        {name: 'Instagram', href: '#'},
        {name: 'Pinterest', href: '#'},
    ],
}

/**
 |--------------------------------------------------------------------------
 | Export default React Component
 |--------------------------------------------------------------------------
 */
export default function PublicLayout({title, description, children, className, HeroSection}) {

    const [user, loggedIn] = useUser();

    const {t} = useTranslation();
    const [mobileMenuOpen, setMobileMenuOpen] = useState(false)

    const {data: categories} = useSWR(`/api/json/categories?recursive=true&menu=1`, fetcher)

    const {data: MainBackgroundImage} = useSWR(`/api/json/sections/MainBackgroundImage`, fetcher)

    const {data: ShopName} = useSWR(`/api/json/settings/ShopName`, fetcher)

    const {data: ShopFavicon} = useSWR(`/api/json/settings/ShopFavicon`, fetcher)
    const {data: ShopFavicon16} = useSWR(`/api/json/settings/ShopFavicon16`, fetcher)
    const {data: ShopFavicon32} = useSWR(`/api/json/settings/ShopFavicon32`, fetcher)
    const {data: ShopAppleTouchIcon} = useSWR(`/api/json/settings/ShopAppleTouchIcon`, fetcher)
    const {data: ShopWebManifest} = useSWR(`/api/json/settings/ShopWebManifest`, fetcher)

    const {data: ShopFooterTextColor} = useSWR(`/api/json/settings/ShopFooterTextColor`, fetcher)
    const {data: ShopFooterBackgroundColor} = useSWR(`/api/json/settings/ShopFooterBackgroundColor`, fetcher)

    const {data: ShopTopTextColor} = useSWR(`/api/json/settings/ShopTopTextColor`, fetcher)
    const {data: ShopTopBackgroundColor} = useSWR(`/api/json/settings/ShopTopBackgroundColor`, fetcher)

    const {data: ShopBackgroundColor} = useSWR(`/api/json/settings/ShopBackgroundColor`, fetcher)

    const {data: carts} = useSWR(`/api/json/carts`, fetcher)

    return (
        <>
            <Head>
                <title>{title} | {ShopName?.name ?? process.env.NEXT_PUBLIC_APPLICATION_NAME}</title>
                <meta name="description" content={description}/>

                <link rel="icon" href={ShopFavicon?.value}/>
                <link rel="apple-touch-icon" sizes="180x180" href={ShopAppleTouchIcon?.value}/>
                <link rel="icon" type="image/png" sizes="32x32" href={ShopFavicon32?.value}/>
                <link rel="icon" type="image/png" sizes="16x16" href={ShopFavicon16?.value}/>
                <link rel="manifest" href={ShopWebManifest?.value}/>
            </Head>

            <div style={{background: ShopBackgroundColor?.value}}>

                {/* Mobile menu */}
                <Transition.Root show={mobileMenuOpen} as={Fragment}>
                    <Dialog as="div" className="relative z-40 lg:hidden" onClose={setMobileMenuOpen}>
                        <Transition.Child
                            as={Fragment}
                            enter="transition-opacity ease-linear duration-300"
                            enterFrom="opacity-0"
                            enterTo="opacity-100"
                            leave="transition-opacity ease-linear duration-300"
                            leaveFrom="opacity-100"
                            leaveTo="opacity-0"
                        >
                            <div className="fixed inset-0 bg-black bg-opacity-25"/>
                        </Transition.Child>

                        <div className="fixed inset-0 flex z-40">
                            <Transition.Child
                                as={Fragment}
                                enter="transition ease-in-out duration-300 transform"
                                enterFrom="-translate-x-full"
                                enterTo="translate-x-0"
                                leave="transition ease-in-out duration-300 transform"
                                leaveFrom="translate-x-0"
                                leaveTo="-translate-x-full"
                            >
                                <Dialog.Panel
                                    className="relative max-w-xs w-full bg-white shadow-xl pb-12 flex flex-col overflow-y-auto">
                                    <div className="px-4 pt-5 pb-2 flex">
                                        <button
                                            type="button"
                                            className="-m-2 p-2 rounded-md inline-flex items-center justify-center text-gray-400"
                                            onClick={() => setMobileMenuOpen(false)}
                                        >
                                            <span className="sr-only">Close menu</span>
                                            <XIcon className="h-6 w-6" aria-hidden="true"/>
                                        </button>
                                    </div>

                                    {/* Links */}
                                    {/*<Tab.Group as="div" className="">*/}
                                    {/*    <Tab.Panels as={Fragment}>*/}
                                    {/*        {categories?.map((category) => (*/}
                                    {/*            <Tab.Panel key={category.name} className="px-4 py-2 space-y-12">*/}
                                    {/*                <div className="grid grid-cols-2 gap-x-4 gap-y-10">*/}
                                    {/*                    {category.featured?.map((item) => (*/}
                                    {/*                        <div key={item.name} className="group relative">*/}
                                    {/*                            <div*/}
                                    {/*                                className="aspect-w-1 aspect-h-1 rounded-md bg-gray-100 overflow-hidden group-hover:opacity-75">*/}
                                    {/*                                <img src={item.imageSrc} alt={item.imageAlt}*/}
                                    {/*                                     className="object-center object-cover"/>*/}
                                    {/*                            </div>*/}
                                    {/*                            <a href={item.href}*/}
                                    {/*                               className="mt-6 block text-sm font-medium text-gray-900">*/}
                                    {/*                                <span className="absolute z-10 inset-0"*/}
                                    {/*                                      aria-hidden="true"/>*/}
                                    {/*                                {item.name}*/}
                                    {/*                            </a>*/}
                                    {/*                            <p aria-hidden="true"*/}
                                    {/*                               className="mt-1 text-sm text-gray-500">*/}
                                    {/*                                Shop now*/}
                                    {/*                            </p>*/}
                                    {/*                        </div>*/}
                                    {/*                    ))}*/}
                                    {/*                </div>*/}
                                    {/*            </Tab.Panel>*/}
                                    {/*        ))}*/}
                                    {/*    </Tab.Panels>*/}
                                    {/*</Tab.Group>*/}

                                    <div className="border-t border-gray-200 py-6 px-4 space-y-6">
                                        {categories?.map((category, idx) => category.menu && (
                                            <div key={idx} className="flow-root">
                                                <Link href={slugCategory(category)}>
                                                    <a className="-m-2 hover:bg-gray-200 rounded p-2 block font-medium text-gray-900">
                                                        {category.name}
                                                    </a>
                                                </Link>
                                            </div>
                                        ))}
                                    </div>

                                    <div className="border-t border-gray-200 py-6 px-4 space-y-6">

                                        <div className="flow-root">
                                            <Link href={loggedIn ? "/account" : "/register"}>
                                                <a className="-m-2 p-2 block font-medium text-gray-900">
                                                    {loggedIn ? 'Account' : 'Crea un account'}
                                                </a>
                                            </Link>
                                        </div>

                                        <div className="flow-root">
                                            <Link href={loggedIn ? "/logout" : "/login"}>
                                                <a className="-m-2 p-2 block font-medium text-gray-900">
                                                    {loggedIn ? 'Disconnetti' : 'Accedi'}
                                                </a>
                                            </Link>
                                        </div>
                                    </div>

                                    <div className="border-t border-gray-200 py-6 px-4 space-y-6">
                                        {/* Currency selector */}
                                        <form>
                                            <div className="inline-block">
                                                <label htmlFor="mobile-currency" className="sr-only">
                                                    Currency
                                                </label>
                                                <div
                                                    className="-ml-2 group relative border-transparent rounded-md focus-within:ring-2 focus-within:ring-white">
                                                    <select
                                                        id="mobile-currency"
                                                        name="currency"
                                                        className="bg-none border-transparent rounded-md py-0.5 pl-2 pr-5 flex items-center text-sm font-medium text-gray-700 group-hover:text-gray-800 focus:outline-none focus:ring-0 focus:border-transparent"
                                                    >
                                                        {currencies.map((currency, idx) => (
                                                            <option key={idx}>{currency}</option>
                                                        ))}
                                                    </select>
                                                    <div
                                                        className="absolute right-0 inset-y-0 flex items-center pointer-events-none">
                                                        <svg
                                                            aria-hidden="true"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            fill="none"
                                                            viewBox="0 0 20 20"
                                                            className="w-5 h-5 text-gray-500"
                                                        >
                                                            <path
                                                                stroke="currentColor"
                                                                strokeLinecap="round"
                                                                strokeLinejoin="round"
                                                                strokeWidth="1.5"
                                                                d="M6 8l4 4 4-4"
                                                            />
                                                        </svg>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </Dialog.Panel>
                            </Transition.Child>
                        </div>
                    </Dialog>
                </Transition.Root>

                {/* Hero section */}
                <div className="relative bg-gray-900 z-40">
                    {/* Decorative image and overlay */}
                    <div aria-hidden="true" className="absolute inset-0 overflow-hidden">

                        {MainBackgroundImage && (
                            <Image
                                layout="fill"
                                objectFit="cover"
                                src={MainBackgroundImage.body.image}
                                alt="Shop Home Image"
                                className="w-full h-full object-center object-cover"
                            />
                        )}

                    </div>
                    <div aria-hidden="true" className="absolute inset-0 bg-gray-900 opacity-50"/>

                    {/* Navigation */}
                    <header className="relative z-10">
                        <nav aria-label="Top">

                            {/* Top navigation */}
                            <div style={{
                                color: ShopTopTextColor?.value,
                                background: ShopTopBackgroundColor?.value
                            }}>
                                <div
                                    className="max-w-7xl mx-auto h-10 px-4 flex items-center justify-between sm:px-6 lg:px-8">
                                    {/* Currency selector */}
                                    <div>
                                        <label htmlFor="desktop-currency" className="sr-only">
                                            Currency
                                        </label>
                                        <div
                                            className="-ml-2 group relative bg-gray-900 border-transparent rounded-md focus-within:ring-2 focus-within:ring-white">
                                            <select
                                                id="desktop-currency"
                                                name="currency"
                                                className="bg-none bg-gray-900 border-transparent rounded-md py-0.5 pl-2 pr-5 flex items-center text-sm font-medium text-white group-hover:text-gray-100 focus:outline-none focus:ring-0 focus:border-transparent"
                                            >
                                                {currencies.map((currency, idx) => (
                                                    <option key={idx}>{currency}</option>
                                                ))}
                                            </select>
                                            <div
                                                className="absolute right-0 inset-y-0 flex items-center pointer-events-none">
                                                <svg
                                                    aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    fill="none"
                                                    viewBox="0 0 20 20"
                                                    className="w-5 h-5 text-gray-300"
                                                >
                                                    <path
                                                        stroke="currentColor"
                                                        strokeLinecap="round"
                                                        strokeLinejoin="round"
                                                        strokeWidth="1.5"
                                                        d="M6 8l4 4 4-4"
                                                    />
                                                </svg>
                                            </div>
                                        </div>
                                    </div>

                                    <div className="flex items-center space-x-6">

                                        <Link href={loggedIn ? "/logout" : "/login"}>
                                            <a className="text-sm font-medium text-white hover:text-gray-100">
                                                {loggedIn ? 'Disconnetti' : 'Accedi'}
                                            </a>
                                        </Link>

                                        <Link href={loggedIn ? "/account" : "/register"}>
                                            <a className="text-sm font-medium text-white hover:text-gray-100">
                                                {loggedIn ? 'Account' : 'Crea un account'}
                                            </a>
                                        </Link>
                                    </div>
                                </div>
                            </div>

                            {/* Secondary navigation */}
                            <div className="backdrop-blur-md backdrop-filter bg-opacity-10 bg-white">
                                <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                                    <div>
                                        <div className="h-16 flex items-center justify-between">

                                            {/* Logo (lg+) */}
                                            <div className="hidden lg:flex-1 lg:flex lg:items-center">
                                                <Link href="/">
                                                    <a>
                                                        <LogoApp className="h-8 w-auto"/>
                                                    </a>
                                                </Link>
                                            </div>

                                            <div className="hidden h-full lg:flex">
                                                {/* Flyout menus */}
                                                <Popover.Group className="px-4 bottom-0 inset-x-0">
                                                    <div className="h-full flex justify-center space-x-8">
                                                        {categories?.map((category, idx) => category.menu && (
                                                            <Popover key={idx} className="flex">
                                                                {({open}) => (
                                                                    <>
                                                                        <div className="relative flex">
                                                                            <Popover.Button
                                                                                className="relative z-10 flex items-center justify-center transition-colors ease-out duration-200 text-sm font-medium text-white">
                                                                                {category.name}
                                                                                <span
                                                                                    className={classNames(
                                                                                        open ? 'bg-white' : '',
                                                                                        'absolute -bottom-px inset-x-0 h-0.5 transition ease-out duration-200'
                                                                                    )}
                                                                                    aria-hidden="true"
                                                                                />
                                                                            </Popover.Button>
                                                                        </div>

                                                                        <Transition
                                                                            as={Fragment}
                                                                            enter="transition ease-out duration-200"
                                                                            enterFrom="opacity-0"
                                                                            enterTo="opacity-100"
                                                                            leave="transition ease-in duration-150"
                                                                            leaveFrom="opacity-100"
                                                                            leaveTo="opacity-0"
                                                                        >
                                                                            <Popover.Panel
                                                                                className="absolute top-full inset-x-0 text-sm text-gray-500">
                                                                                {/* Presentational element used to render the bottom shadow, if we put the shadow on the actual panel it pokes out the top, so we use this shorter element to hide the top of the shadow */}
                                                                                <div
                                                                                    className="absolute inset-0 top-1/2 bg-white shadow"
                                                                                    aria-hidden="true"/>

                                                                                <div className="relative bg-white">
                                                                                    <div
                                                                                        className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                                                                                        <div
                                                                                            className="grid grid-cols-4 gap-y-10 gap-x-8 py-16">
                                                                                            {category.children?.slice(0, 4).map((item, idx) => (
                                                                                                <div key={idx}
                                                                                                     className="group relative">
                                                                                                    <div
                                                                                                        className="aspect-w-1 aspect-h-1 rounded-md bg-gray-100 overflow-hidden group-hover:opacity-75">
                                                                                                        <img
                                                                                                            src={item.thumbnail}
                                                                                                            alt={item.name}
                                                                                                            className="object-center object-cover"
                                                                                                        />
                                                                                                    </div>
                                                                                                    <a href={item.href}
                                                                                                       className="mt-4 block font-medium text-gray-900">
                                                                                                        <span
                                                                                                            className="absolute z-10 inset-0"
                                                                                                            aria-hidden="true"/>
                                                                                                        {item.name}
                                                                                                    </a>
                                                                                                    <p aria-hidden="true"
                                                                                                       className="mt-1">
                                                                                                        Shop now
                                                                                                    </p>
                                                                                                </div>
                                                                                            ))}
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </Popover.Panel>
                                                                        </Transition>
                                                                    </>
                                                                )}
                                                            </Popover>
                                                        ))}
                                                    </div>
                                                </Popover.Group>
                                            </div>

                                            {/* Mobile menu and search (lg-) */}
                                            <div className="flex-1 flex items-center lg:hidden">
                                                <button type="button" className="-ml-2 p-2 text-white"
                                                        onClick={() => setMobileMenuOpen(true)}>
                                                    <span className="sr-only">Open menu</span>
                                                    <MenuIcon className="h-6 w-6" aria-hidden="true"/>
                                                </button>

                                                {/* Search */}
                                                {/*<Link href="/search">*/}
                                                {/*    <a href="#" className="ml-2 p-2 text-white">*/}
                                                {/*        <span className="sr-only">Ricerca</span>*/}
                                                {/*        <SearchIcon className="w-6 h-6" aria-hidden="true"/>*/}
                                                {/*    </a>*/}
                                                {/*</Link>*/}
                                            </div>

                                            {/* Logo (lg-) */}
                                            <Link href="/">
                                                <a className="lg:hidden">
                                                    <LogoApp className="h-8 w-auto"/>
                                                </a>
                                            </Link>

                                            <div className="flex-1 flex items-center justify-end">

                                                <div className="flex items-center lg:ml-8">
                                                    {/* Help */}
                                                    <Link href="/search">
                                                        <a className="p-2 text-white lg:hidden">
                                                            <SearchCircleIcon
                                                                className="w-6 h-6"
                                                                aria-hidden="true"/>
                                                        </a>
                                                    </Link>

                                                    <Link href="/search">
                                                        <a className="hidden text-sm font-medium text-white lg:block">
                                                            Ricerca
                                                        </a>
                                                    </Link>

                                                    {/* Cart */}
                                                    <div className="ml-4 flow-root lg:ml-8">
                                                        <Link href="/cart">
                                                            <a className="group -m-2 p-2 flex items-center">
                                                                <ShoppingBagIcon
                                                                    className="flex-shrink-0 h-6 w-6 text-white"
                                                                    aria-hidden="true"/>
                                                                <span
                                                                    className="ml-2 text-sm font-medium text-white">{carts?.items?.length ?? 0}</span>
                                                                <span className="sr-only">items in cart, view bag</span>
                                                            </a>
                                                        </Link>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </nav>
                    </header>

                    {HeroSection && (<HeroSection/>)}

                </div>

                <main className={className}>{children}</main>

                <footer aria-labelledby="footer-heading" style={{
                    color: ShopFooterTextColor?.value,
                    background: ShopFooterBackgroundColor?.value
                }}>
                    <h2 id="footer-heading" className="sr-only">
                        Footer
                    </h2>
                    <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        <div className="py-20 xl:grid xl:grid-cols-3 xl:gap-8">
                            <div className="grid grid-cols-2 gap-8 xl:col-span-2">
                                <div className="space-y-12 md:space-y-0 md:grid md:grid-cols-2 md:gap-8">
                                    <div>
                                        <h3 className="text-sm font-medium text-white">Shop</h3>
                                        <ul role="list" className="mt-6 space-y-6">
                                            {footerNavigation.shop.map((item,idx) => (
                                                <li key={idx} className="text-sm">
                                                    <a href={item.href} className="text-gray-300 hover:text-white">
                                                        {item.name}
                                                    </a>
                                                </li>
                                            ))}
                                        </ul>
                                    </div>
                                    <div>
                                        <h3 className="text-sm font-medium text-white">Company</h3>
                                        <ul role="list" className="mt-6 space-y-6">
                                            {footerNavigation.company.map((item,idx) => (
                                                <li key={idx} className="text-sm">
                                                    <a href={item.href} className="text-gray-300 hover:text-white">
                                                        {item.name}
                                                    </a>
                                                </li>
                                            ))}
                                        </ul>
                                    </div>
                                </div>
                                <div className="space-y-12 md:space-y-0 md:grid md:grid-cols-2 md:gap-8">
                                    <div>
                                        <h3 className="text-sm font-medium text-white">Account</h3>
                                        <ul role="list" className="mt-6 space-y-6">
                                            {footerNavigation.account.map((item,idx) => (
                                                <li key={idx} className="text-sm">
                                                    <a href={item.href} className="text-gray-300 hover:text-white">
                                                        {item.name}
                                                    </a>
                                                </li>
                                            ))}
                                        </ul>
                                    </div>
                                    <div>
                                        <h3 className="text-sm font-medium text-white">Connect</h3>
                                        <ul role="list" className="mt-6 space-y-6">
                                            {footerNavigation.connect.map((item,idx) => (
                                                <li key={idx} className="text-sm">
                                                    <a href={item.href} className="text-gray-300 hover:text-white">
                                                        {item.name}
                                                    </a>
                                                </li>
                                            ))}
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div className="mt-12 md:mt-16 xl:mt-0">
                                <h3 className="text-sm font-medium text-white">Sign up for our newsletter</h3>
                                <p className="mt-6 text-sm text-gray-300">The latest deals and savings, sent to your
                                    inbox weekly.</p>
                                <form className="mt-2 flex sm:max-w-md">
                                    <label htmlFor="email-address" className="sr-only">
                                        Email address
                                    </label>
                                    <input
                                        id="email-address"
                                        type="text"
                                        autoComplete="email"
                                        required
                                        className="appearance-none min-w-0 w-full bg-white border border-white rounded-md shadow-sm py-2 px-4 text-base text-gray-900 placeholder-gray-500 focus:outline-none focus:border-white focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-900 focus:ring-white"
                                    />
                                    <div className="ml-4 flex-shrink-0">
                                        <button
                                            type="submit"
                                            className="w-full bg-gray-600 border border-transparent rounded-md shadow-sm py-2 px-4 flex items-center justify-center text-base font-medium text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-900 focus:ring-gray-500"
                                        >
                                            Sign up
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div className="border-t border-gray-800 py-10">
                            <p className="text-sm text-gray-400">Copyright &copy; 2022 | MwSpace llc.</p>
                        </div>
                    </div>
                </footer>
            </div>
        </>
    )
}