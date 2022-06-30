import PublicServerSideProps from "../lib/props/PublicServerSideProps";
import PublicLayout from "../components/PublicLayout";
import {useTranslation} from "next-i18next";
import Image from "next/image";
import useSWR from "swr";
import {fetcher} from "../lib/function";
import Link from "next/link";
import slugify from "slugify";

// This gets called on every request
export const getServerSideProps = PublicServerSideProps

/**
 |--------------------------------------------------------------------------
 | Export default React Component
 |--------------------------------------------------------------------------
 */

export default function Index({loggedIn}) {
    const {t} = useTranslation();

    const {data: categories} = useSWR(`/api/json/catalog/categories`, fetcher)

    return (
        <PublicLayout loggedIn={loggedIn} title={t('seo-index-title')} description={t('seo-index-description')}
                      HeroSection={HeroSection}>

            {/* Category section */}
            <section aria-labelledby="category-heading"
                     className="pt-24 sm:pt-32 xl:max-w-7xl xl:mx-auto xl:px-8">
                <div className="px-4 sm:px-6 sm:flex sm:items-center sm:justify-between lg:px-8 xl:px-0">
                    <h2 id="category-heading" className="text-2xl font-extrabold tracking-tight text-gray-900">
                        {t('index-cat-title')}
                    </h2>
                    <a href="#"
                       className="hidden text-sm font-semibold text-indigo-600 hover:text-indigo-500 sm:block">
                        {t('index-cat-link')}<span aria-hidden="true"> &rarr;</span>
                    </a>
                </div>

                <div className="mt-4 flow-root">
                    <div className="-my-2">
                        <div className="box-content py-2 relative h-80 overflow-x-auto xl:overflow-visible">
                            <div
                                className="absolute min-w-screen-xl px-4 flex space-x-8 sm:px-6 lg:px-8 xl:relative xl:px-0 xl:space-x-0 xl:grid xl:grid-cols-5 xl:gap-x-8">
                                {categories?.map((category, idx) => (

                                    <Link key={idx} href={slugify(category.id + '-' + category.name).toLowerCase()}>
                                        <a className="relative w-56 h-80 rounded-lg p-6 flex flex-col overflow-hidden hover:opacity-75 xl:w-auto">
                                      <span aria-hidden="true" className="absolute inset-0">
                                        <img src={category.thumbnail} alt=""
                                             className="w-full h-full object-center object-cover"/>
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
                    <a href="#" className="block text-sm font-semibold text-indigo-600 hover:text-indigo-500">
                        {t('index-cat-link')}<span aria-hidden="true"> &rarr;</span>
                    </a>
                </div>
            </section>

            {/* Featured section */}
            <section
                aria-labelledby="social-impact-heading"
                className="max-w-7xl mx-auto pt-24 px-4 sm:pt-32 sm:px-6 lg:px-8"
            >
                <div className="relative rounded-lg overflow-hidden">
                    <div className="absolute inset-0">
                        <img
                            src="https://tailwindui.com/img/ecommerce-images/home-page-01-feature-section-01.jpg"
                            alt=""
                            className="w-full h-full object-center object-cover"
                        />
                    </div>
                    <div className="relative bg-gray-900 bg-opacity-75 py-32 px-6 sm:py-40 sm:px-12 lg:px-16">
                        <div className="relative max-w-3xl mx-auto flex flex-col items-center text-center">
                            <h2
                                id="social-impact-heading"
                                className="text-3xl font-extrabold tracking-tight text-white sm:text-4xl"
                            >
                                <span className="block sm:inline">{t('index-banner-title')}</span>
                            </h2>
                            <p className="mt-3 text-xl text-white">{t('index-banner-description')}</p>
                            <a
                                href="#"
                                className="mt-8 w-full block bg-white border border-transparent rounded-md py-3 px-8 text-base font-medium text-gray-900 hover:bg-gray-100 sm:w-auto"
                            >
                                {t('index-banner-btn')}
                            </a>
                        </div>
                    </div>
                </div>
            </section>

            {/* Collection section */}
            <section
                aria-labelledby="collection-heading"
                className="max-w-xl mx-auto pt-24 px-4 sm:pt-32 sm:px-6 lg:max-w-7xl lg:px-8"
            >
                <h2 id="collection-heading" className="text-2xl font-extrabold tracking-tight text-gray-900">
                    {t('index-collection-title')}
                </h2>
                <p className="mt-4 text-base text-gray-500">
                    {t('index-collection-description')}
                </p>

                <div className="mt-10 space-y-12 lg:space-y-0 lg:grid lg:grid-cols-3 lg:gap-x-8">
                    {collections.map((collection) => (
                        <a key={collection.name} href={collection.href} className="group block">
                            <div
                                aria-hidden="true"
                                className="aspect-w-3 aspect-h-2 rounded-lg overflow-hidden group-hover:opacity-75 lg:aspect-w-5 lg:aspect-h-6"
                            >
                                <img
                                    src={collection.imageSrc}
                                    alt={collection.imageAlt}
                                    className="w-full h-full object-center object-cover"
                                />
                            </div>
                            <h3 className="mt-4 text-base font-semibold text-gray-900">{collection.name}</h3>
                            <p className="mt-2 text-sm text-gray-500">{collection.description}</p>
                        </a>
                    ))}
                </div>
            </section>

            {/* Featured section */}
            <section aria-labelledby="comfort-heading"
                     className="max-w-7xl mx-auto py-24 px-4 sm:py-32 sm:px-6 lg:px-8">
                <div className="relative rounded-lg overflow-hidden">
                    <div className="absolute inset-0">
                        <img
                            src="https://tailwindui.com/img/ecommerce-images/home-page-01-feature-section-02.jpg"
                            alt=""
                            className="w-full h-full object-center object-cover"
                        />
                    </div>
                    <div className="relative bg-gray-900 bg-opacity-75 py-32 px-6 sm:py-40 sm:px-12 lg:px-16">
                        <div className="relative max-w-3xl mx-auto flex flex-col items-center text-center">
                            <h2 id="comfort-heading"
                                className="text-3xl font-extrabold tracking-tight text-white sm:text-4xl">
                                {t('index-last-title')}
                            </h2>
                            <p className="mt-3 text-xl text-white">{t('index-last-description')}</p>
                            <a
                                href="#"
                                className="mt-8 w-full block bg-white border border-transparent rounded-md py-3 px-8 text-base font-medium text-gray-900 hover:bg-gray-100 sm:w-auto"
                            >
                                {t('index-last-btn')}
                            </a>
                        </div>
                    </div>
                </div>
            </section>

        </PublicLayout>
    )
}

export function LogoApp({className}) {
    return (
        <div className="w-full flex items-center justify-center">
            <Image
                className={className}
                src="/e-shop-1080-hd.png"
                alt="e-shop logo"
                width={50} height={50}/>
        </div>
    )
}

function HeroSection() {
    const {t} = useTranslation();

    return (
        <div
            className="relative max-w-3xl mx-auto py-32 px-6 flex flex-col items-center text-center sm:py-64 lg:px-0">
            <h1 className="text-4xl font-extrabold tracking-tight text-white lg:text-6xl">{t('index-head-title')}</h1>
            <p className="mt-4 text-xl text-white">{t('index-head-description')}</p>
            <a
                href="#"
                className="mt-8 inline-block bg-white border border-transparent rounded-md py-3 px-8 text-base font-medium text-gray-900 hover:bg-gray-100"
            >
                {t('index-head-btn')}
            </a>
        </div>
    )
}

const collections = [
    {
        name: 'Handcrafted Collection',
        href: '#',
        imageSrc: 'https://tailwindui.com/img/ecommerce-images/home-page-01-collection-01.jpg',
        imageAlt: 'Brown leather key ring with brass metal loops and rivets on wood table.',
        description: 'Keep your phone, keys, and wallet together, so you can lose everything at once.',
    },
    {
        name: 'Organized Desk Collection',
        href: '#',
        imageSrc: 'https://tailwindui.com/img/ecommerce-images/home-page-01-collection-02.jpg',
        imageAlt: 'Natural leather mouse pad on white desk next to porcelain mug and keyboard.',
        description: 'The rest of the house will still be a mess, but your desk will look great.',
    },
    {
        name: 'Focus Collection',
        href: '#',
        imageSrc: 'https://tailwindui.com/img/ecommerce-images/home-page-01-collection-03.jpg',
        imageAlt: 'Person placing task list card into walnut card holder next to felt carrying case on leather desk pad.',
        description: 'Be more productive than enterprise project managers with a single piece of paper.',
    },
]