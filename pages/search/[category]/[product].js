import {useState} from 'react'
import {Tab} from '@headlessui/react'
import {HeartIcon} from '@heroicons/react/outline'

import HeartIconSolid from '@heroicons/react/solid/HeartIcon'

import PublicLayout from "../../../components/PublicLayout";
import {useTranslation} from "next-i18next";
import Link from "next/link";
import {classNames, fetcher, slugCategoryProduct} from "../../../lib/function"

import ProductServerSideProps from "../../../lib/props/ProductServerSideProps";
import useMoney from "../../../hooks/useMoney";

import axios from "axios";
import Image from "next/image";
import useSWR, {useSWRConfig} from "swr";
import FlayOutCart from "../../../components/FlayOutCart";
import NotifyAddWishlist from "../../../components/NotifyAddWishlist";
import NotifyRemoveWishlist from "../../../components/NotifyRemoveWishlist";
import InnerImageZoom from "react-inner-image-zoom";

// This gets called on every request
export const getServerSideProps = ProductServerSideProps

export default function Product({set, product, category}) {

    const {mutate} = useSWRConfig()
    const {t} = useTranslation();
    const money = useMoney()

    const [open, setOpen] = useState(false)
    const [load, setLoad] = useState(false)

    const [wishAdd, setWishAdd] = useState(false)
    const [wishRemove, setWishRemove] = useState(false)

    const {data: products} = useSWR(`/api/json/products?category=${category.id}`, fetcher)
    const {data: wishlist} = useSWR(`/api/json/wishlists/${product.uuid}`, fetcher)
    const {data: PriceInTax} = useSWR(`/api/json/options/PriceInTax`, fetcher)

    const MutateCarts = () => mutate('/api/json/carts').then(e => setOpen(true));

    const AddProductCart = (override) => {

        setLoad(true)

        axios.post('/api/json/carts', override || product).then(MutateCarts)
            .catch(err => console.error(err))
            .finally(() => setLoad(false))

    }

    const AddFromWishlist = () => {
        setWishRemove(false)

        axios.post('/api/json/wishlists', product)
            .then(res => mutate(`/api/json/wishlists/${product.uuid}`).then(e => setWishAdd(true)))
            .catch(err => console.error(err))
    }

    const RemoveFromWishlist = () => {
        setWishAdd(false)

        axios.delete(`/api/json/wishlists/${product.uuid}`)
            .then(res => mutate(`/api/json/wishlists/${product.uuid}`).then(e => setWishRemove(true)))
            .catch(err => console.error(err))
    }

    return (
        <PublicLayout set={set} title={product.name + ' | ' + category.name} description={product.description}>
            <main className="max-w-7xl mx-auto sm:pt-16 sm:px-6 lg:px-8">
                <div className="max-w-2xl mx-auto lg:max-w-none">
                    {/* Product */}
                    <div className="lg:grid lg:grid-cols-2 lg:gap-x-8 lg:items-start">
                        {/* Image gallery */}
                        <Tab.Group as="div" className="flex flex-col-reverse">
                            {/* Image selector */}
                            <div className="hidden mt-6 w-full max-w-2xl mx-auto sm:block lg:max-w-none">
                                <Tab.List className="grid grid-cols-4 gap-6">

                                    <Tab
                                        className="relative h-24 bg-white rounded-md flex items-center justify-center text-sm font-medium uppercase text-gray-900 cursor-pointer hover:bg-gray-50 focus:outline-none focus:ring focus:ring-offset-4 focus:ring-opacity-50"
                                    >
                                        {({selected}) => (
                                            <>
                                                <span className="sr-only">{product?.name}</span>
                                                <span className="absolute inset-0 rounded-md overflow-hidden">
                                                    {product?.thumbnail && (
                                                        <Image
                                                            layout="fill"
                                                            objectFit="cover"
                                                            alt={product.name}
                                                            src={product.thumbnail}
                                                            className="w-full h-full object-center object-cover"
                                                        />
                                                    )}
                                                </span>
                                                <span
                                                    className={classNames(
                                                        selected ? 'ring-shop' : 'ring-transparent',
                                                        'absolute inset-0 rounded-md ring-2 ring-offset-2 pointer-events-none'
                                                    )}
                                                    aria-hidden="true"
                                                />
                                            </>
                                        )}
                                    </Tab>

                                    {product?.images?.map((image, idx) => (
                                        <Tab
                                            key={idx}
                                            className="relative h-24 bg-white rounded-md flex items-center justify-center text-sm font-medium uppercase text-gray-900 cursor-pointer hover:bg-gray-50 focus:outline-none focus:ring focus:ring-offset-4 focus:ring-opacity-50"
                                        >
                                            {({selected}) => (
                                                <>
                                                    <span className="sr-only">{image.name}</span>
                                                    <span className="absolute inset-0 rounded-md overflow-hidden">

                                                        <Image
                                                            layout="fill"
                                                            objectFit="cover"
                                                            src={image.path}
                                                            className="w-full h-full object-center object-cover"
                                                        />

                                                      </span>
                                                    <span
                                                        className={classNames(
                                                            selected ? 'ring-shop' : 'ring-transparent',
                                                            'absolute inset-0 rounded-md ring-2 ring-offset-2 pointer-events-none'
                                                        )}
                                                        aria-hidden="true"
                                                    />
                                                </>
                                            )}
                                        </Tab>
                                    ))}
                                </Tab.List>
                            </div>

                            <Tab.Panels className="w-full aspect-w-1 aspect-h-1">

                                <Tab.Panel>
                                    {product?.thumbnail && (
                                        // <Image
                                        //     layout="fill"
                                        //     objectFit="cover"
                                        //     src={product.thumbnail}
                                        //     alt={product.name}
                                        //     className="w-full h-full object-center object-cover sm:rounded-lg"
                                        // />

                                        <InnerImageZoom className="w-full h-full object-center object-cover" src={product.thumbnail} zoomSrc={product.thumbnail} />

                                    )}
                                </Tab.Panel>

                                {product?.images?.map((image, idx) => (
                                    <Tab.Panel key={idx}>

                                        <Image
                                            layout="fill"
                                            objectFit="cover"
                                            src={image.path}
                                            className="w-full h-full object-center object-cover sm:rounded-lg"
                                        />

                                    </Tab.Panel>
                                ))}
                            </Tab.Panels>
                        </Tab.Group>

                        {/* Product info */}
                        <div className="mt-10 px-4 sm:px-0 sm:mt-16 lg:mt-0">
                            <h1 className="text-3xl font-extrabold tracking-tight text-gray-900">{product.name}</h1>

                            <div className="mt-3">
                                <h2 className="sr-only">Product information</h2>
                                <p className="text-3xl text-gray-900 flex items-center gap-4">{money.format(product.price)}
                                    <i className="text-sm">({PriceInTax?.enabled ? 'Tasse Incluse' : 'Tasse Escluse'})</i>
                                </p>
                            </div>

                            {/* Reviews */}
                            {/*<div className="mt-3">*/}
                            {/*    <h3 className="sr-only">Reviews</h3>*/}
                            {/*    <div className="flex items-center">*/}
                            {/*        <div className="flex items-center">*/}
                            {/*            {[0, 1, 2, 3, 4].map((rating) => (*/}
                            {/*                <StarIcon*/}
                            {/*                    key={rating}*/}
                            {/*                    className={classNames(*/}
                            {/*                        product?.rating > rating ? 'text-shop' : 'text-gray-300',*/}
                            {/*                        'h-5 w-5 flex-shrink-0'*/}
                            {/*                    )}*/}
                            {/*                    aria-hidden="true"*/}
                            {/*                />*/}
                            {/*            ))}*/}
                            {/*        </div>*/}
                            {/*        <p className="sr-only">{product?.rating} out of 5 stars</p>*/}
                            {/*    </div>*/}
                            {/*</div>*/}

                            <div className="mt-6">
                                <h3 className="sr-only">Description</h3>

                                <div className="text-base text-gray-700 space-y-6"
                                     dangerouslySetInnerHTML={{__html: product.description}}/>
                            </div>

                            <div className="mt-6">

                                <h3 className="text-sm text-gray-600">Disponibili: {product.quantity}</h3>

                                <div className="mt-10 flex sm:flex-col1">
                                    <button
                                        onClick={AddProductCart}
                                        type="button"
                                        className={(load ? 'animate-pulse' : '') + " max-w-xs flex-1 bg-shop border border-transparent rounded-md py-3 px-8 flex items-center justify-center text-base font-medium text-white hover:bg-shop focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-50 focus:ring-shop sm:w-full"}
                                    >
                                        {load ? '⚪⚪⚪' : 'Aggiungi al carrello'}
                                    </button>

                                    <button
                                        type="button"
                                        title={(wishlist?.id ? 'Togli dalla' : 'Aggiungi alla') + " tua lista dei preferiti"}
                                        onClick={wishlist?.id ? RemoveFromWishlist : AddFromWishlist}
                                        className="ml-4 py-3 px-3 rounded-md flex items-center justify-center text-gray-400 hover:bg-gray-100 hover:text-gray-500"
                                    >
                                        {wishlist?.id ? (
                                            <HeartIconSolid className="h-6 w-6 text-green-500"/>
                                        ) : (
                                            <HeartIcon className="h-6 w-6 text-green-500"/>
                                        )}

                                        <span className="sr-only">Aggiungi ai preferiti</span>
                                    </button>
                                </div>
                            </div>

                            {/*<section aria-labelledby="details-heading" className="mt-12">*/}
                            {/*    <h2 id="details-heading" className="sr-only">*/}
                            {/*        Additional details*/}
                            {/*    </h2>*/}

                            {/*    <div className="border-t divide-y divide-gray-200">*/}
                            {/*        {product?.details?.map((detail, idx) => (*/}
                            {/*            <Disclosure as="div" key={idx}>*/}
                            {/*                {({open}) => (*/}
                            {/*                    <>*/}
                            {/*                        <h3>*/}
                            {/*                            <Disclosure.Button*/}
                            {/*                                className="group relative w-full py-6 flex justify-between items-center text-left">*/}
                            {/*  <span*/}
                            {/*      className={classNames(*/}
                            {/*          open ? 'text-shop' : 'text-gray-900',*/}
                            {/*          'text-sm font-medium'*/}
                            {/*      )}*/}
                            {/*  >*/}
                            {/*    {detail.name}*/}
                            {/*  </span>*/}
                            {/*                                <span className="ml-6 flex items-center">*/}
                            {/*    {open ? (*/}
                            {/*        <MinusSmIcon*/}
                            {/*            className="block h-6 w-6 text-shop group-hover:text-shop"*/}
                            {/*            aria-hidden="true"*/}
                            {/*        />*/}
                            {/*    ) : (*/}
                            {/*        <PlusSmIcon*/}
                            {/*            className="block h-6 w-6 text-gray-400 group-hover:text-gray-500"*/}
                            {/*            aria-hidden="true"*/}
                            {/*        />*/}
                            {/*    )}*/}
                            {/*  </span>*/}
                            {/*                            </Disclosure.Button>*/}
                            {/*                        </h3>*/}
                            {/*                        <Disclosure.Panel as="div" className="pb-6 prose prose-sm">*/}
                            {/*                            <ul role="list">*/}
                            {/*                                {detail.items.map((item, idx) => (*/}
                            {/*                                    <li key={idx}>{item}</li>*/}
                            {/*                                ))}*/}
                            {/*                            </ul>*/}
                            {/*                        </Disclosure.Panel>*/}
                            {/*                    </>*/}
                            {/*                )}*/}
                            {/*            </Disclosure>*/}
                            {/*        ))}*/}
                            {/*    </div>*/}
                            {/*</section>*/}
                        </div>
                    </div>

                    {/* Consigliati */}
                    <section aria-labelledby="related-heading"
                             className="mt-10 border-t border-gray-200 py-16 px-4 sm:px-0">
                        <h2 id="related-heading" className="text-xl font-bold text-gray-900">
                            Prodotti consigliati
                        </h2>

                        <div
                            className="mt-8 grid grid-cols-1 gap-y-12 sm:grid-cols-2 sm:gap-x-6 lg:grid-cols-4 xl:gap-x-8">
                            {category && product && products?.map((prd, idx) => prd.id !== product.id && (
                                <Link key={idx} href={slugCategoryProduct(prd)}>
                                    <a key={prd?.id}>
                                        <div className="relative">
                                            <div className="relative w-full h-72 rounded-lg overflow-hidden">
                                                <img
                                                    src={prd?.thumbnail}
                                                    alt={prd?.name}
                                                    className="w-full h-full object-center object-cover"
                                                />
                                            </div>
                                            <div className="relative mt-4">
                                                <h3 className="text-md h-20 border rounded-xl p-4 font-bold text-gray-900">{prd?.name}</h3>
                                            </div>
                                            <div
                                                className="absolute top-0 inset-x-0 h-72 rounded-lg p-4 flex items-end justify-end overflow-hidden">
                                                <div
                                                    aria-hidden="true"
                                                    className="absolute inset-x-0 bottom-0 h-36 bg-gradient-to-t from-black opacity-50"
                                                />
                                                <p className="relative text-lg font-semibold text-white">{money.format(product?.price)}</p>
                                            </div>
                                        </div>
                                        <div className="mt-6">
                                            <button
                                                className="w-full relative flex bg-gray-100 border border-transparent rounded-md py-2 px-8 items-center justify-center text-sm font-medium text-gray-900 hover:bg-gray-200"
                                            >
                                                Aggiungi al carrello
                                            </button>
                                        </div>
                                    </a>
                                </Link>
                            ))}
                        </div>
                    </section>
                </div>

                <FlayOutCart product={product} open={open} setOpen={setOpen}/>

                <NotifyAddWishlist product={product} show={wishAdd} setShow={setWishAdd}/>

                <NotifyRemoveWishlist product={product} show={wishRemove} setShow={setWishRemove}/>
            </main>
        </PublicLayout>
    )
}
