import {Fragment, useState} from "react";

import PublicLayout from "../../components/PublicLayout";
import {Menu, Popover, Transition} from "@headlessui/react";
import {ChevronDownIcon} from "@heroicons/react/solid";

import PublicServerSideProps from "../../lib/props/PublicServerSideProps";

import {fetcher, slugCategoryProduct} from "../../lib/function";
import useMoney from "../../hooks/useMoney";

import useSWR from "swr";
import Link from "next/link";

import {classNames} from "../../lib/function"
import {SearchIcon} from "@heroicons/react/outline";

// This gets called on every request
export const getServerSideProps = PublicServerSideProps

export default function IndexSearch({set}) {

    const money = useMoney()

    const [name, setName] = useState("")
    const [orderBy, setOrderBy] = useState("")
    const [_products, set_Products] = useState([])
    const [inCategory, setInCategory] = useState([])
    const [activeFilters, setActiveFilters] = useState([])

    const [mobileMenuOpen, setMobileMenuOpen] = useState(false)
    const [mobileFiltersOpen, setMobileFiltersOpen] = useState(false)

    const {data: products} = useSWR(`/api/json/products?name=${name}&category=${inCategory.join(',')}&orderBy=createdAt&order=desc`, fetcher)
    const {data: categories} = useSWR(`/api/json/categories`, fetcher)

    const sortOptions = [
        {name: 'Più nuovo', onChange: () => setOrderBy('new'), current: orderBy === 'new'},
        {name: 'Più costoso', onChange: () => setOrderBy('high'), current: orderBy === 'high'},
        {name: 'Più vecchio', onChange: () => setOrderBy('old'), current: orderBy === 'old'},
        {name: 'Più economico', onChange: () => setOrderBy('low'), current: orderBy === 'low'},
    ]

    const filters = [
        {
            id: 'category',
            name: 'Categorie',
            length: inCategory.length,
            options: categories?.map(({name, id}) =>
                ({
                    id: id,
                    value: name,
                    label: name,
                    checked: inCategory.includes(id),
                    onChange: () => inCategory.includes(id) ?
                        setInCategory(inCategory.filter(num => num !== id)) :
                        setInCategory(inCategory => [...inCategory, id])
                })
            ) ?? [],
        },
        // {
        //     id: 'color',
        //     name: 'Color',
        //     length: inCategory.length,
        //     options: [
        //         {value: 'white', label: 'White', checked: false},
        //         {value: 'beige', label: 'Beige', checked: false},
        //         {value: 'blue', label: 'Blue', checked: false},
        //         {value: 'brown', label: 'Brown', checked: false},
        //         {value: 'green', label: 'Green', checked: false},
        //         {value: 'purple', label: 'Purple', checked: false},
        //     ],
        // },
        // {
        //     id: 'sizes',
        //     name: 'Sizes',
        //     length: inCategory.length,
        //     options: [
        //         {value: 'xs', label: 'XS', checked: false},
        //         {value: 's', label: 'S', checked: false},
        //         {value: 'm', label: 'M', checked: false},
        //         {value: 'l', label: 'L', checked: false},
        //         {value: 'xl', label: 'XL', checked: false},
        //         {value: '2xl', label: '2XL', checked: false},
        //     ],
        // },
    ]

    return (
        <PublicLayout set={set} title="Cerca un prodotto nello shop">

            <div className="bg-white">
                <div className="max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:px-8 flex justify-between">
                    <div className="md:block hidden">
                        <h1 className="text-3xl font-extrabold tracking-tight text-gray-900">Ricerca un prodotto</h1>
                        <p className="mt-4 max-w-xl text-sm text-gray-700">

                            Puoi utilizzare la ricerca avanzata del nostro shop per trovare facilmente il prodotto che
                            stai
                            cercando.
                        </p>
                    </div>

                    <div className="md:w-auto w-full">
                        <label htmlFor="search" className="block text-sm font-medium text-gray-700">
                            Cerca un prodotto con il nome o codice
                        </label>
                        <div className="mt-1 relative flex items-center">
                            <input
                                value={name}
                                type="text"
                                onChange={e => setName(e.target.value)}
                                className="shadow-sm focus:ring-shop focus:border-shop block w-full pr-12 sm:text-sm border-gray-300 rounded-md"
                            />
                            <div className="absolute inset-y-0 right-0 flex py-1.5 pr-1.5">
                                <kbd
                                    className="inline-flex items-center border border-gray-200 rounded px-2 text-sm font-sans font-medium text-gray-400">
                                    <SearchIcon className="w-4"/>
                                </kbd>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            {/* Filters */}
            <section aria-labelledby="filter-heading">
                <h2 id="filter-heading" className="sr-only">
                    Filtri
                </h2>

                <div className="relative z-10 bg-white border-b border-gray-200 pb-4">
                    <div className="max-w-7xl mx-auto px-4 flex items-center justify-between sm:px-6 lg:px-8">
                        <Menu as="div" className="relative inline-block text-left">
                            <div>
                                <Menu.Button
                                    className="group inline-flex justify-center text-sm font-medium text-gray-700 hover:text-gray-900">
                                    Ordina
                                    <ChevronDownIcon
                                        className="flex-shrink-0 -mr-1 ml-1 h-5 w-5 text-gray-400 group-hover:text-gray-500"
                                        aria-hidden="true"
                                    />
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
                                    className="origin-top-left absolute left-0 mt-2 w-40 rounded-md shadow-2xl bg-white ring-1 ring-black ring-opacity-5 focus:outline-none">
                                    <div className="py-1">
                                        {sortOptions.map((option, idx) => (
                                            <Menu.Item key={idx}>
                                                {({active}) => (
                                                    <a
                                                        href={option.href}
                                                        className={classNames(
                                                            option.current ? 'font-medium text-gray-900' : 'text-gray-500',
                                                            active ? 'bg-gray-100' : '',
                                                            'block px-4 py-2 text-sm'
                                                        )}
                                                    >
                                                        {option.name}
                                                    </a>
                                                )}
                                            </Menu.Item>
                                        ))}
                                    </div>
                                </Menu.Items>
                            </Transition>
                        </Menu>

                        {/*<button*/}
                        {/*    type="button"*/}
                        {/*    className="inline-block text-sm font-medium text-gray-700 hover:text-gray-900 sm:hidden"*/}
                        {/*    onClick={() => setMobileFiltersOpen(true)}*/}
                        {/*>*/}
                        {/*    Filtri*/}
                        {/*</button>*/}

                        <div className="hidden sm:block">
                            <div className="flow-root">
                                <Popover.Group className="-mx-4 flex items-center divide-x divide-gray-200">
                                    {filters.map((section, sectionIdx) => (
                                        <Popover key={sectionIdx} className="px-4 relative inline-block text-left">
                                            <Popover.Button
                                                className="group inline-flex justify-center text-sm font-medium text-gray-700 hover:text-gray-900">
                                                <span>{section.name}</span>
                                                {section.length > 0 && (
                                                    <span
                                                        className="ml-1.5 rounded py-0.5 px-1.5 bg-gray-200 text-xs font-semibold text-gray-700 tabular-nums">
                                                        {section.length}
                                                    </span>
                                                )}
                                                <ChevronDownIcon
                                                    className="flex-shrink-0 -mr-1 ml-1 h-5 w-5 text-gray-400 group-hover:text-gray-500"
                                                    aria-hidden="true"
                                                />
                                            </Popover.Button>

                                            <Transition
                                                as={Fragment}
                                                enter="transition ease-out duration-100"
                                                enterFrom="transform opacity-0 scale-95"
                                                enterTo="transform opacity-100 scale-100"
                                                leave="transition ease-in duration-75"
                                                leaveFrom="transform opacity-100 scale-100"
                                                leaveTo="transform opacity-0 scale-95"
                                            >
                                                <Popover.Panel
                                                    className="origin-top-right absolute right-0 mt-2 bg-white rounded-md shadow-2xl p-4 ring-1 ring-black ring-opacity-5 focus:outline-none">
                                                    <form className="space-y-4">
                                                        {section.options.map((option, optionIdx) => (
                                                            <div key={optionIdx} className="flex items-center">
                                                                <input
                                                                    id={`filter-${section.id}-${optionIdx}`}
                                                                    name={`${section.id}[]`}
                                                                    defaultValue={option.value}
                                                                    onChange={option.onChange}
                                                                    type="checkbox"
                                                                    defaultChecked={option.checked}
                                                                    className="h-4 w-4 border-gray-300 rounded-full text-shop focus:ring-shop"
                                                                />
                                                                <label
                                                                    htmlFor={`filter-${section.id}-${optionIdx}`}
                                                                    className="ml-3 pr-6 text-sm font-medium text-gray-900 whitespace-nowrap"
                                                                >
                                                                    {option.label}
                                                                </label>
                                                            </div>
                                                        ))}
                                                    </form>
                                                </Popover.Panel>
                                            </Transition>
                                        </Popover>
                                    ))}
                                </Popover.Group>
                            </div>
                        </div>
                    </div>
                </div>

                {/* Active filters */}
                {activeFilters.length > 0 && (
                    <div className="bg-gray-100">
                        <div className="max-w-7xl mx-auto py-3 px-4 sm:flex sm:items-center sm:px-6 lg:px-8">
                            <h3 className="text-xs font-semibold uppercase tracking-wide text-gray-500">
                                Filtri
                                <span className="sr-only">, active</span>
                            </h3>

                            <div aria-hidden="true" className="hidden w-px h-5 bg-gray-300 sm:block sm:ml-4"/>

                            <div className="mt-2 sm:mt-0 sm:ml-4">
                                <div className="-m-1 flex flex-wrap items-center">
                                    {activeFilters.map((activeFilter, idx) => (
                                        <span
                                            key={idx}
                                            className="m-1 inline-flex rounded-full border border-gray-200 items-center py-1.5 pl-3 pr-2 text-sm font-medium bg-white text-gray-900"
                                        >
                                    <span>{activeFilter.label}</span>
                                    <button
                                        type="button"
                                        className="flex-shrink-0 ml-1 h-4 w-4 p-1 rounded-full inline-flex text-gray-400 hover:bg-gray-200 hover:text-gray-500"
                                    >
                                      <span className="sr-only">Remove filter for {activeFilter.label}</span>
                                      <svg className="h-2 w-2" stroke="currentColor" fill="none" viewBox="0 0 8 8">
                                        <path strokeLinecap="round" strokeWidth="1.5" d="M1 1l6 6m0-6L1 7"/>
                                      </svg>
                                    </button>
                                  </span>
                                    ))}
                                </div>
                            </div>
                        </div>
                    </div>
                )}

            </section>

            {/* Product grid */}

            {products?.length > 0?(
                <section
                    aria-labelledby="products-heading"
                    className="max-w-2xl mx-auto pt-12 pb-16 px-4 sm:pt-16 sm:pb-24 sm:px-6 lg:max-w-7xl lg:px-8"
                >
                    <div
                        className="grid grid-cols-1 gap-y-10 sm:grid-cols-2 gap-x-6 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
                        {products?.map((product, idx) => (
                            <Link key={idx} href={slugCategoryProduct(product)}>
                                <a className="group bg-gray-100 rounded-xl p-4">
                                    <div
                                        className="w-full aspect-w-1 aspect-h-1 bg-gray-200 rounded-lg overflow-hidden xl:aspect-w-7 xl:aspect-h-8">
                                        <img
                                            src={product.thumbnail}
                                            alt={product.name}
                                            className="w-full h-full object-center object-cover group-hover:opacity-75"
                                        />
                                    </div>
                                    <h3 className="mt-4 text-sm text-gray-700">{product.name}</h3>
                                    <p className="mt-1 text-lg font-medium text-gray-900">{money.format(product.price)}</p>
                                </a>
                            </Link>
                        ))}
                    </div>
                </section>
            ):(
                <div className="w-full h-96 flex items-center justify-center flex-col">
                    <p className="font-bold text-xl">
                        La tua ricerca non ha prodotto alcun risultato.
                    </p>
                    <Link href="/">
                        <a className="text-shop">Continua lo shopping</a>
                    </Link>
                </div>
            )}

        </PublicLayout>
    )
}