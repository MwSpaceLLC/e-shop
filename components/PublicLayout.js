import {useTranslation} from "next-i18next";

import {classNames, fetcher} from "../lib/function"

import {Fragment, useState} from 'react'
import {Dialog, Popover, Tab, Transition} from '@headlessui/react'
import {MenuIcon, QuestionMarkCircleIcon, SearchIcon, ShoppingBagIcon, XIcon} from '@heroicons/react/outline'
import Link from "next/link";
import Image from "next/image";
import Head from "next/head";
import useSWR from "swr";

const currencies = ['EUR']

const navigation = {
    categories: [
        {
            name: 'Women',
            featured: [
                {
                    name: 'New Arrivals',
                    href: '#',
                    imageSrc: 'https://tailwindui.com/img/ecommerce-images/mega-menu-category-01.jpg',
                    imageAlt: 'Models sitting back to back, wearing Basic Tee in black and bone.',
                },
                {
                    name: 'Basic Tees',
                    href: '#',
                    imageSrc: 'https://tailwindui.com/img/ecommerce-images/mega-menu-category-02.jpg',
                    imageAlt: 'Close up of Basic Tee fall bundle with off-white, ochre, olive, and black tees.',
                },
                {
                    name: 'Accessories',
                    href: '#',
                    imageSrc: 'https://tailwindui.com/img/ecommerce-images/mega-menu-category-03.jpg',
                    imageAlt: 'Model wearing minimalist watch with black wristband and white watch face.',
                },
                {
                    name: 'Carry',
                    href: '#',
                    imageSrc: 'https://tailwindui.com/img/ecommerce-images/mega-menu-category-04.jpg',
                    imageAlt: 'Model opening tan leather long wallet with credit card pockets and cash pouch.',
                },
            ],
        },
        {
            name: 'Men',
            featured: [
                {
                    name: 'New Arrivals',
                    href: '#',
                    imageSrc: 'https://tailwindui.com/img/ecommerce-images/mega-menu-01-men-category-01.jpg',
                    imageAlt: 'Hats and sweaters on wood shelves next to various colors of t-shirts on hangers.',
                },
                {
                    name: 'Basic Tees',
                    href: '#',
                    imageSrc: 'https://tailwindui.com/img/ecommerce-images/mega-menu-01-men-category-02.jpg',
                    imageAlt: 'Model wearing light heather gray t-shirt.',
                },
                {
                    name: 'Accessories',
                    href: '#',
                    imageSrc: 'https://tailwindui.com/img/ecommerce-images/mega-menu-01-men-category-03.jpg',
                    imageAlt:
                        'Grey 6-panel baseball hat with black brim, black mountain graphic on front, and light heather gray body.',
                },
                {
                    name: 'Carry',
                    href: '#',
                    imageSrc: 'https://tailwindui.com/img/ecommerce-images/mega-menu-01-men-category-04.jpg',
                    imageAlt: 'Model putting folded cash into slim card holder olive leather wallet with hand stitching.',
                },
            ],
        },
    ],
    pages: [
        {name: 'Company', href: '#'},
        {name: 'Stores', href: '#'},
    ],
}

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
export default function PublicLayout({title, description, children, className, HeroSection, loggedIn}) {

    const {t} = useTranslation();
    const [mobileMenuOpen, setMobileMenuOpen] = useState(false)

    const {data: categories} = useSWR(`/api/json/catalog/categories?recursive=true`, fetcher)

    const {data: MainBackgroundImage} = useSWR(`/api/json/sections/MainBackgroundImage`, fetcher)

    return (
        <>
            <Head>
                <title>{title} | {process.env.NEXT_PUBLIC_APPLICATION_NAME}</title>
                <meta name="description" content={description}/>
                <link rel="icon" href="/favicon.ico"/>
            </Head>

            <div className="bg-white">
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
                                    <Tab.Group as="div" className="mt-2">
                                        <div className="border-b border-gray-200">
                                            <Tab.List className="-mb-px flex px-4 space-x-8">
                                                {categories?.map((category) => (
                                                    <Tab
                                                        key={category.name}
                                                        className={({selected}) =>
                                                            classNames(
                                                                selected ? 'text-gray-600 border-gray-600' : 'text-gray-900 border-transparent',
                                                                'flex-1 whitespace-nowrap py-4 px-1 border-b-2 text-base font-medium'
                                                            )
                                                        }
                                                    >
                                                        {category.name}
                                                    </Tab>
                                                ))}
                                            </Tab.List>
                                        </div>
                                        <Tab.Panels as={Fragment}>
                                            {categories?.map((category) => (
                                                <Tab.Panel key={category.name} className="px-4 py-6 space-y-12">
                                                    <div className="grid grid-cols-2 gap-x-4 gap-y-10">
                                                        {category.featured?.map((item) => (
                                                            <div key={item.name} className="group relative">
                                                                <div
                                                                    className="aspect-w-1 aspect-h-1 rounded-md bg-gray-100 overflow-hidden group-hover:opacity-75">
                                                                    <img src={item.imageSrc} alt={item.imageAlt}
                                                                         className="object-center object-cover"/>
                                                                </div>
                                                                <a href={item.href}
                                                                   className="mt-6 block text-sm font-medium text-gray-900">
                                                                    <span className="absolute z-10 inset-0"
                                                                          aria-hidden="true"/>
                                                                    {item.name}
                                                                </a>
                                                                <p aria-hidden="true"
                                                                   className="mt-1 text-sm text-gray-500">
                                                                    Shop now
                                                                </p>
                                                            </div>
                                                        ))}
                                                    </div>
                                                </Tab.Panel>
                                            ))}
                                        </Tab.Panels>
                                    </Tab.Group>

                                    <div className="border-t border-gray-200 py-6 px-4 space-y-6">
                                        {navigation.pages.map((page) => (
                                            <div key={page.name} className="flow-root">
                                                <a href={page.href}
                                                   className="-m-2 p-2 block font-medium text-gray-900">
                                                    {page.name}
                                                </a>
                                            </div>
                                        ))}
                                    </div>

                                    <div className="border-t border-gray-200 py-6 px-4 space-y-6">

                                        <div className="flow-root">
                                            <Link href={loggedIn ? "/account" : "/register"}>
                                                <a className="-m-2 p-2 block font-medium text-gray-900">
                                                    {loggedIn ? 'Account' : 'Create an account'}
                                                </a>
                                            </Link>
                                        </div>

                                        <div className="flow-root">
                                            <Link href={loggedIn ? "/logout" : "/login"}>
                                                <a className="-m-2 p-2 block font-medium text-gray-900">
                                                    {loggedIn ? 'Sign Out' : 'Sign in'}
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
                                                        {currencies.map((currency) => (
                                                            <option key={currency}>{currency}</option>
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
                <div className="relative bg-gray-900">
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
                            <div className="bg-gray-900">
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
                                                {currencies.map((currency) => (
                                                    <option key={currency}>{currency}</option>
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
                                                {loggedIn ? 'Sign Out' : 'Sign in'}
                                            </a>
                                        </Link>

                                        <Link href={loggedIn ? "/account" : "/register"}>
                                            <a className="text-sm font-medium text-white hover:text-gray-100">
                                                {loggedIn ? 'Account' : 'Create an account'}
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
                                                        <span className="sr-only">e-shop</span>
                                                        <Image
                                                            className="h-8 w-auto"
                                                            src="/e-shop-1080-hd.png"
                                                            alt="e-shop logo"
                                                            width={50} height={50}/>
                                                    </a>
                                                </Link>
                                            </div>

                                            <div className="hidden h-full lg:flex">
                                                {/* Flyout menus */}
                                                <Popover.Group className="px-4 bottom-0 inset-x-0">
                                                    <div className="h-full flex justify-center space-x-8">
                                                        {categories?.slice(0,6).map((category) => (
                                                            <Popover key={category.name} className="flex">
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
                                                                                            {category.children?.slice(0,4).map((item) => (
                                                                                                <div key={item.name}
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
                                                <a href="#" className="ml-2 p-2 text-white">
                                                    <span className="sr-only">Search</span>
                                                    <SearchIcon className="w-6 h-6" aria-hidden="true"/>
                                                </a>
                                            </div>

                                            {/* Logo (lg-) */}
                                            <a href="#" className="lg:hidden">
                                                <span className="sr-only">Workflow</span>
                                                <Image
                                                    className="h-8 w-auto"
                                                    src="/e-shop-1080-hd.png"
                                                    alt="e-shop logo"
                                                    width={50} height={50}/>
                                            </a>

                                            <div className="flex-1 flex items-center justify-end">
                                                <a href="#" className="hidden text-sm font-medium text-white lg:block">
                                                    Search
                                                </a>

                                                <div className="flex items-center lg:ml-8">
                                                    {/* Help */}
                                                    <a href="#" className="p-2 text-white lg:hidden">
                                                        <span className="sr-only">Help</span>
                                                        <QuestionMarkCircleIcon className="w-6 h-6" aria-hidden="true"/>
                                                    </a>
                                                    <a href="#"
                                                       className="hidden text-sm font-medium text-white lg:block">
                                                        Help
                                                    </a>

                                                    {/* Cart */}
                                                    <div className="ml-4 flow-root lg:ml-8">
                                                        <Link href="/cart">
                                                            <a className="group -m-2 p-2 flex items-center">
                                                                <ShoppingBagIcon
                                                                    className="flex-shrink-0 h-6 w-6 text-white"
                                                                    aria-hidden="true"/>
                                                                <span
                                                                    className="ml-2 text-sm font-medium text-white">0</span>
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

                    {HeroSection ? <HeroSection></HeroSection> : <></>}

                </div>

                <main className={className}>{children}</main>

                <footer aria-labelledby="footer-heading" className="bg-gray-900">
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
                                            {footerNavigation.shop.map((item) => (
                                                <li key={item.name} className="text-sm">
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
                                            {footerNavigation.company.map((item) => (
                                                <li key={item.name} className="text-sm">
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
                                            {footerNavigation.account.map((item) => (
                                                <li key={item.name} className="text-sm">
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
                                            {footerNavigation.connect.map((item) => (
                                                <li key={item.name} className="text-sm">
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