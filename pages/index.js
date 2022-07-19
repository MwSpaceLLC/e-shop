import PublicLayout from "../components/PublicLayout";
import {useTranslation} from "next-i18next";
import Image from "next/image";
import useSWR from "swr";
import {fetcher, slugCategory} from "../lib/function";
import Link from "next/link";

import PublicIndexServerSideProps from "../lib/props/PublicIndexServerSideProps";

// This gets called on every request
export const getServerSideProps = PublicIndexServerSideProps

/**
 |--------------------------------------------------------------------------
 | Export default React Component
 |--------------------------------------------------------------------------
 */

export default function Index({ShopSeoIndexTitle, ShopSeoIndexDescription}) {

    const {t} = useTranslation();

    const {data: categories} = useSWR(`/api/json/categories?parentId=0`, fetcher)
    const {data: collection} = useSWR(`/api/json/categories?parentId=11`, fetcher)

    const {data: HomeCollection} = useSWR(`/api/json/sections/HomeCollection`, fetcher)
    const {data: HomeBottom} = useSWR(`/api/json/sections/HomeBottom`, fetcher)
    const {data: HomeHero} = useSWR(`/api/json/sections/HomeHero`, fetcher)

    return (
        <PublicLayout title={ShopSeoIndexTitle} description={ShopSeoIndexDescription} HeroSection={HeroSection}>

            {/* Category section */}
            <section aria-labelledby="category-heading"
                     className="pt-24 sm:pt-32 xl:max-w-7xl xl:mx-auto xl:px-8">
                <div className="px-4 sm:px-6 sm:flex sm:items-center sm:justify-between lg:px-8 xl:px-0">
                    <h2 id="category-heading" className="text-2xl font-extrabold tracking-tight text-gray-900">
                        {t('index-cat-title')}
                    </h2>

                    <Link href="/search">
                        <a className="hidden text-sm font-semibold text-indigo-600 hover:text-indigo-500 sm:block">
                            {t('index-cat-link')}<span aria-hidden="true"> &rarr;</span>
                        </a>
                    </Link>
                </div>

                <div className="mt-4 flow-root">
                    <div className="-my-2">
                        <div className="box-content py-2 relative h-80 overflow-x-auto xl:overflow-visible">
                            <div
                                className="absolute min-w-screen-xl px-4 flex space-x-8 sm:px-6 lg:px-8 xl:relative xl:px-0 xl:space-x-0 xl:grid xl:grid-cols-5 xl:gap-x-8">
                                {categories?.slice(0, 5).map((category, idx) => (

                                    <Link key={idx} href={slugCategory(category)}>
                                        <a className="relative w-56 h-80 rounded-lg p-6 flex flex-col overflow-hidden hover:opacity-75 xl:w-auto">
                                      <span aria-hidden="true" className="absolute inset-0">
                                          <Image
                                              layout="fill"
                                              objectFit="contain"
                                              src={category.thumbnail}
                                              alt={category.name}
                                              className="w-full h-full object-center object-contain"
                                          />
                                      </span>
                                            <span
                                                aria-hidden="true"
                                                className="absolute inset-x-0 bottom-0 h-2/3 bg-gradient-to-t from-gray-800 opacity-50"
                                            />
                                            <span
                                                className="relative mt-auto text-center text-xl font-bold text-white">{category.name}</span>
                                        </a>
                                    </Link>

                                ))}
                            </div>
                        </div>
                    </div>
                </div>

                <div className="mt-6 px-4 sm:hidden">
                    <Link href="/search">
                        <a className="block text-sm font-semibold text-indigo-600 hover:text-indigo-500">
                            {t('index-cat-link')}<span aria-hidden="true"> &rarr;</span>
                        </a>
                    </Link>
                </div>
            </section>

            {/* Featured section */}
            {HomeHero && (
                <section
                    aria-labelledby="social-impact-heading"
                    className="max-w-7xl mx-auto pt-24 px-4 sm:pt-32 sm:px-6 lg:px-8">
                    <div className="relative rounded-lg overflow-hidden">
                        <div className="absolute inset-0">

                            <Image
                                quality={100}
                                layout="fill"
                                objectFit="cover"
                                src={HomeHero.body.image}
                                alt={HomeHero.body.header}
                                className="w-full h-full object-center object-cover"
                            />

                        </div>
                        <div className="relative bg-gray-900 bg-opacity-75 py-32 px-6 sm:py-40 sm:px-12 lg:px-16">
                            <div className="relative max-w-3xl mx-auto flex flex-col items-center text-center">
                                <h2
                                    id="social-impact-heading"
                                    className="text-3xl font-extrabold tracking-tight text-white sm:text-4xl"
                                >
                                    <span className="block sm:inline">{HomeHero.body.header}</span>
                                </h2>
                                <p className="mt-3 text-xl text-white">{HomeHero.body.text}</p>
                            </div>
                        </div>
                    </div>
                </section>
            )}

            {/* Collection section */}
            <section
                aria-labelledby="collection-heading"
                className="max-w-xl mx-auto pt-24 px-4 sm:pt-32 sm:px-6 lg:max-w-7xl lg:px-8"
            >
                {HomeCollection && (
                    <>
                        <h2 id="collection-heading" className="text-2xl font-extrabold tracking-tight text-gray-900">
                            {HomeCollection.body.header}
                        </h2>
                        <p className="mt-4 text-base text-gray-500">
                            {HomeCollection.body.text}
                        </p>
                    </>
                )}

                <div className="mt-10 space-y-12 lg:space-y-0 lg:grid lg:grid-cols-3 lg:gap-x-8">
                    {collection?.slice(0, 3).map((cat, idx) => (
                        <Link key={idx} href={slugCategory(cat)}>
                            <a className="group block">
                                <div
                                    aria-hidden="true"
                                    className="aspect-w-3 aspect-h-2 rounded-lg overflow-hidden group-hover:opacity-75 lg:aspect-w-5 lg:aspect-h-6"
                                >
                                    <Image
                                        layout="fill"
                                        quality={100}
                                        objectFit="contain"
                                        src={cat.thumbnail}
                                        alt={cat.name}
                                        className="w-full h-full object-center object-cover"
                                    />

                                </div>
                                <h3 className="mt-4 text-base font-semibold text-gray-900">{cat.name}</h3>
                                <p className="mt-2 text-sm text-gray-500">{cat.description}</p>
                            </a>
                        </Link>
                    ))}
                </div>
            </section>

            {/* Featured section */}
            {HomeBottom && (
                <section aria-labelledby="comfort-heading"
                         className="max-w-7xl mx-auto py-24 px-4 sm:py-32 sm:px-6 lg:px-8">
                    <div className="relative rounded-lg overflow-hidden">
                        <div className="absolute inset-0">

                            <Image
                                quality={100}
                                layout="fill"
                                objectFit="cover"
                                src={HomeBottom.body.image}
                                alt={HomeBottom.body.header}
                                className="w-full h-full object-center object-cover"
                            />

                        </div>
                        <div className="relative bg-gray-900 bg-opacity-75 py-32 px-6 sm:py-40 sm:px-12 lg:px-16">
                            <div className="relative max-w-3xl mx-auto flex flex-col items-center text-center">
                                <h2 id="comfort-heading"
                                    className="text-3xl font-extrabold tracking-tight text-white sm:text-4xl">
                                    {HomeBottom.body.header}
                                </h2>
                                <p className="mt-3 text-xl text-white">{HomeBottom.body.text}</p>
                            </div>
                        </div>
                    </div>
                </section>
            )}

        </PublicLayout>
    )
}

function HeroSection() {

    const {data: HomeIntro} = useSWR(`/api/json/sections/HomeIntro`, fetcher)

    return (
        HomeIntro ? (
            <div
                className="relative max-w-3xl mx-auto py-32 px-6 flex flex-col items-center text-center sm:py-64 lg:px-0">
                <h1 className="text-4xl font-extrabold tracking-tight text-white lg:text-6xl">{HomeIntro.body.header}</h1>
                <p className="mt-4 text-xl text-white">{HomeIntro.body.text}</p>
            </div>
        ) : <></>
    )
}