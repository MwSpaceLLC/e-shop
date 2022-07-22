require('dotenv').config()

const bcrypt = require("bcryptjs");
const crypto = require('crypto');

const {PrismaClient} = require('@prisma/client')

const prisma = new PrismaClient({log: ['query']});

/**
 |--------------------------------------------------------------------------
 | Welcome to install file !!
 |--------------------------------------------------------------------------
 |
 | The following file prepare your system for migrate and create default data in to a database;
 |
 */
(async () => {


    /*
     |--------------------------------------------------------------------------
     | Create Admin User
     |------------------------------------------------------------------------*/
    console.log("\n======= Create Admin User =======")
    console.log(
        await prisma.admin.create({
            data: {
                role: 'root',
                name: 'e-shop',
                email: 'www@e-shop.com',
                password: bcrypt.hashSync(process.env.ADMIN_BACKEND_TOKEN, 10),
            }
        })
    )


    /*
     |--------------------------------------------------------------------------
     | Create Default Lang
     |------------------------------------------------------------------------*/
    console.log("\n======= Create Default Lang =======")
    console.log(
        await prisma.lang.create({
            data: {
                name: 'Italiano',
                default: true,
                iso: 'IT',
            }
        })
    )


    /*
     |--------------------------------------------------------------------------
     | Create Default Setting
     |------------------------------------------------------------------------*/
    console.log("\n======= Create Default Setting =======")
    console.log(
        await prisma.setting.createMany({
            data: [
                {
                    key: 'ShopName',
                    value: 'e-shop',
                }, {
                    key: 'ShopDescription',
                    value: 'Free commerce platform based on NextJs',
                }, {
                    key: 'ShopLogo',
                    value: '/crud/demo/settings/2.0/1080-logo.png',
                }, {
                    key: 'ShopFavicon',
                    value: '/crud/demo/settings/2.0/favicon/favicon.ico',
                }, {
                    key: 'ShopFavicon16',
                    value: '/crud/demo/settings/2.0/favicon/favicon-16x16.png',
                }, {
                    key: 'ShopFavicon32',
                    value: '/crud/demo/settings/2.0/favicon/favicon-32x32.png',
                }, {
                    key: 'ShopAppleTouchIcon',
                    value: '/crud/demo/settings/2.0/favicon/apple-touch-icon.png',
                }, {
                    key: 'ShopWebManifest',
                    value: '/crud/demo/settings/2.0/favicon/site.webmanifest',
                }, {
                    key: 'MainBackgroundImage',
                    value: '/crud/demo/settings/support-hero-large.jpg',
                }, {
                    key: 'ShopBackgroundColor',
                    value: '#ffffff',
                }, {
                    key: 'ShopMainTextColor',
                    value: '#ffffff',
                }, {
                    key: 'ShopMainBackgroundColor',
                    value: `#${process.env.NEXT_PUBLIC_APPLICATION_COLOR}`,
                }, {
                    key: 'ShopTopTextColor',
                    value: '#ffffff',
                }, {
                    key: 'ShopTopBackgroundColor',
                    value: '#111827',
                }, {
                    key: 'ShopMenuTextColor',
                    value: '#ffffff',
                }, {
                    key: 'ShopFooterTextColor',
                    value: '#ffffff',
                }, {
                    key: 'ShopFooterBackgroundColor',
                    value: '#111827',
                }, {
                    key: 'ShopProductTextColor',
                    value: '#374151',
                }, {
                    key: 'ShopProductBackgroundColor',
                    value: '#f3f4f6',
                }, {
                    key: 'ShopAddress',
                    value: 'Via camillo bozza, 14',
                }, {
                    key: 'ShopCity',
                    value: 'Perugia',
                }, {
                    key: 'ShopZip',
                    value: '06073',
                }, {
                    key: 'ShopCountry',
                    value: 'Italy',
                }, {
                    key: 'ShopCurrency',
                    value: 'EUR',
                }, {
                    key: 'ShopLanguage',
                    value: 'IT',
                }, {
                    key: 'ShopTax',
                    value: '22.00',
                }, {
                    key: 'ShopSeoIndexTitle',
                    value: 'elettronica, libri, musica, fashion, videogiochi, DVD e tanto altro',
                }, {
                    key: 'ShopSeoIndexDescription',
                    value: 'Ampia scelta, piccoli prezzi. Scopri nei nostri negozi online fotocamere digitali, lettori MP3, libri, musica, DVD, videogiochi, elettrodomestici e tanto altro',
                },

                // insert api system keys
                {
                    key: 'ShopStripeId',
                    value: '',
                }, {
                    key: 'ShopStripeSecret',
                    value: '',
                }, {
                    key: 'ShopPackLinkApiKey',
                    value: '',
                },

                {
                    key: 'ShopHeaderJsSnippet',
                    value: '',
                },
                {
                    key: 'ShopHeaderCssSnippet',
                    value: '',
                },
            ]
        })
    )


    /*
     |--------------------------------------------------------------------------
     | Create Default Option
     |------------------------------------------------------------------------*/
    console.log("\n======= Create Default Option =======")
    console.log(
        await prisma.option.createMany({
            data: [
                {
                    key: 'SystemBlog',
                    enabled: true,
                }, {
                    key: 'SystemShipment',
                    enabled: true,
                }, {
                    key: 'SystemSelling',
                    enabled: true,
                }, {
                    key: 'GuestPrices',
                    enabled: true,
                }, {
                    key: 'PriceInTax',
                    enabled: true,
                },
            ]
        })
    )


    /*
     |--------------------------------------------------------------------------
     | Create Demo Sections
     |------------------------------------------------------------------------*/
    console.log("\n======= Create Demo Sections =======")
    console.log(
        await prisma.section.createMany({
            data: [
                {
                    slug: 'HomeIntro',
                    name: 'Home Intro',
                    body: {
                        header: 'Pro. E pronto a tutto',
                        image: '/crud/demo/sections/Immagine-home 2022-07-01 153057.png',
                        text: 'MacBook Pro 13" è più veloce e potente che mai. Con il nuovissimo chip M2, un sistema di raffreddamento attivo e fino a 20 ore di autonomia, affronta con agilità anche i carichi di lavoro più impegnativi.',
                    },
                },
                {
                    slug: 'HomeHero',
                    name: 'Home Hero',
                    body: {
                        header: 'Sistema più evoluto di sempre',
                        image: '/crud/demo/sections/hero_1_static__feiuc1zaeiaa_large.jpg',
                        text: 'Abbiamo riprogettato completamente l’architettura e ruotato gli obiettivi di 45 gradi per fare spazio al nostro sistema a doppia fotocamera più evoluto, con il sensore più grande di sempre sul grandangolo, e una nuova stabilizzazione ottica dell’immagine su sensore. E abbiamo anche aumentato la velocità dell’ultra-grandangolo.',
                    },
                },
                {
                    slug: 'HomeCollection',
                    name: 'Home Collection',
                    body: {
                        header: 'Scopri i "nuovi" Ricondizionati',
                        text: 'iPhone ricondizionati ufficiali apple. Ogni stagione, collaboriamo con designer di livello mondiale per creare una collezione ispirata al mondo naturale',
                    },
                },
                {
                    slug: 'HomeBottom',
                    name: 'Home Bottom',
                    body: {
                        header: 'Con un chip esagerato',
                        image: '/crud/demo/sections/immagine-footer-2022-07-01 153803.png',
                        text: 'Con il nuovo iPad Air ti immergi in tutto quello che leggi, guardi o crei. Lo splendido display Liquid Retina da 10,9" ha un’ampia gamma cromatica P3, tecnologie evolute come True Tone, e il rivestimento antiriflesso.',
                    },
                },
            ]
        })
    )


    /*
     |--------------------------------------------------------------------------
     | Create Demo Pages
     |------------------------------------------------------------------------*/
    console.log("\n======= Create Demo Pages =======")
    console.log(
        await prisma.page.createMany({
            data: [
                {
                    name: 'Privacy',
                    body: '',
                }, {
                    name: 'Termini',
                    body: '',
                }, {
                    name: 'Cookies',
                    body: '',
                }, {
                    name: 'Supporto',
                    body: '',
                },
            ]
        })
    )


    /*
     |--------------------------------------------------------------------------
     | Create Demo Categories
     |------------------------------------------------------------------------*/
    console.log("\n======= Create Demo Categories =======")
    console.log(
        await prisma.category.createMany({
            data: [

                /** Category Id [1] */
                {            // ID: 1
                    parentId: 0,
                    menu: true,
                    footer: true,
                    homepage: true,
                    uuid: crypto.randomUUID(),
                    name: 'Mac ricondizionato',
                    cover: '/crud/demo/categories/mac-refurb-category-201810.jfif',
                    thumbnail: '/crud/demo/categories/refurb-macbook-air-space-gray-m1-202010.jfif',
                    description: 'Scopri cosa c’è dietro un Mac ricondizionato.',
                }, {            // ID: 2
                    parentId: 1,
                    uuid: crypto.randomUUID(),
                    name: 'MacBook Air',
                    cover: '/crud/demo/categories/refurb-macbook-air-space-gray-m1-202010_AV6.jfif',
                    thumbnail: '/crud/demo/categories/refurb-macbook-air-space-gray-m1-202010_AV6.jfif',
                    description: 'Scopri cosa c’è dietro un MacBook Air ricondizionato.',
                }, {            // ID: 3
                    parentId: 1,
                    uuid: crypto.randomUUID(),
                    name: 'MacBook Pro',
                    cover: '/crud/demo/categories/refurb-mbp13-space-m1-2020_AV4.jfif',
                    thumbnail: '/crud/demo/categories/refurb-mbp13-space-m1-2020_AV4.jfif',
                    description: 'Scopri cosa c’è dietro un MacBook Pro ricondizionato.',
                }, {            // ID: 4
                    parentId: 1,
                    uuid: crypto.randomUUID(),
                    name: 'Mac mini',
                    cover: '/crud/demo/categories/refurb-mac-mini-2018_AV4.jfif',
                    thumbnail: '/crud/demo/categories/refurb-mac-mini-2018_AV4.jfif',
                    description: 'Scopri cosa c’è dietro un Mac mini ricondizionato.',
                }, {            // ID: 5
                    parentId: 1,
                    uuid: crypto.randomUUID(),
                    name: 'iMac',
                    cover: '/crud/demo/categories/refurb-imac-24-pink-2021_AV4.jfif',
                    thumbnail: '/crud/demo/categories/refurb-imac-24-pink-2021_AV4.jfif',
                    description: 'Scopri cosa c’è dietro un iMac ricondizionato.',
                }, {            // ID: 6
                    parentId: 1,
                    uuid: crypto.randomUUID(),
                    name: 'Mac Pro',
                    cover: '/crud/demo/categories/refurb-mac-pro-2019_AV6.jfif',
                    thumbnail: '/crud/demo/categories/refurb-mac-pro-2019_AV6.jfif',
                    description: 'Scopri cosa c’è dietro un Mac Pro ricondizionato.',
                },


                /** Category Id [7] */
                {            // ID: 7
                    parentId: 0,
                    menu: true,
                    footer: true,
                    homepage: true,
                    uuid: crypto.randomUUID(),
                    name: 'iPad ricondizionato',
                    cover: '/crud/demo/categories/ipad-refurb-category-201810.jfif',
                    thumbnail: '/crud/demo/categories/refurb-ipad-air-wifi-gold-2019.jfif',
                    description: 'Scopri cosa c’è dietro un iPad ricondizionato.',
                }, {            // ID: 8
                    parentId: 7,
                    uuid: crypto.randomUUID(),
                    name: 'iPad Pro 11',
                    cover: '/crud/demo/categories/refurb-ipad-pro-11-wifi-silver-2019_AV3.jfif',
                    thumbnail: '/crud/demo/categories/refurb-ipad-pro-11-wifi-silver-2019_AV3.jfif',
                    description: 'Scopri cosa c’è dietro un iPad Pro 11 ricondizionato.',
                }, {            // ID: 9
                    parentId: 7,
                    uuid: crypto.randomUUID(),
                    name: 'iPad Pro 12',
                    cover: '/crud/demo/categories/refurb-ipad-pro-12-wifi-silver-2019_AV3.jfif',
                    thumbnail: '/crud/demo/categories/refurb-ipad-pro-12-wifi-silver-2019_AV3.jfif',
                    description: 'Scopri cosa c’è dietro un iPad Pro 12 ricondizionato.',
                }, {            // ID: 10
                    parentId: 7,
                    uuid: crypto.randomUUID(),
                    name: 'iPad Air',
                    cover: '/crud/demo/categories/refurb-ipad-air-wifi-gold-2019_AV3.jfif',
                    thumbnail: '/crud/demo/categories/refurb-ipad-air-wifi-gold-2019_AV3.jfif',
                    description: 'Scopri cosa c’è dietro un iPad Air ricondizionato.',
                },


                /** Category Id [11] */
                {            // ID: 11
                    parentId: 0,
                    uuid: crypto.randomUUID(),
                    menu: true,
                    footer: true,
                    homepage: true,
                    name: 'iPhone ricondizionato',
                    cover: '/crud/demo/categories/iphone-refurb-category-201810.jfif',
                    thumbnail: '/crud/demo/categories/refurb-iphone-12-blue-2020.jfif',
                    description: 'Scopri cosa c’è dietro un iPhone ricondizionato.',
                }, {            // ID: 12
                    parentId: 11,
                    uuid: crypto.randomUUID(),
                    name: 'iPhone 11 Pro',
                    cover: '/crud/demo/categories/refurb-iphone-11-pro-gold-2019_AV4.jfif',
                    thumbnail: '/crud/demo/categories/refurb-iphone-11-pro-gold-2019_AV4.jfif',
                    description: 'Scopri cosa c’è dietro un iPhone 11 Pro ricondizionato.',
                }, {            // ID: 13
                    parentId: 11,
                    uuid: crypto.randomUUID(),
                    name: 'iPhone 11 Pro Max',
                    cover: '/crud/demo/categories/refurb-iphone-11-pro-max-midnight-green-2019_AV4.jfif',
                    thumbnail: '/crud/demo/categories/refurb-iphone-11-pro-max-midnight-green-2019_AV4.jfif',
                    description: 'Scopri cosa c’è dietro un iPhone 11 Pro Max ricondizionato.',
                }, {            // ID: 14
                    parentId: 11,
                    uuid: crypto.randomUUID(),
                    name: 'iPhone 12',
                    cover: '/crud/demo/categories/refurb-iphone-12-white-2020_AV3.jfif',
                    thumbnail: '/crud/demo/categories/refurb-iphone-12-white-2020_AV3.jfif',
                    description: 'Scopri cosa c’è dietro un iPhone 12 ricondizionato.',
                }, {            // ID: 15
                    parentId: 11,
                    uuid: crypto.randomUUID(),
                    name: 'iPhone 12 Pro',
                    cover: '/crud/demo/categories/refurb-iphone-12-pro-gold-2020_AV2.jfif',
                    thumbnail: '/crud/demo/categories/refurb-iphone-12-pro-gold-2020_AV2.jfif',
                    description: 'Scopri cosa c’è dietro un iPhone 12 Pro ricondizionato.',
                },

                /** Category Id [16] */
                {            // ID: 16
                    parentId: 0,
                    uuid: crypto.randomUUID(),
                    name: 'Apple TV ricondizionata',
                    menu: true,
                    footer: true,
                    homepage: true,
                    cover: '/crud/demo/categories/apple-tv-refurb-category-201810.jfif',
                    thumbnail: '/crud/demo/categories/refurb-apple-tv-hd-2021.jfif',
                    description: 'Scopri cosa c’è dietro una Apple TV ricondizionata.',
                }, {            // ID: 17
                    parentId: 16,
                    uuid: crypto.randomUUID(),
                    name: 'Apple TV HD',
                    cover: '/crud/demo/categories/refurb-apple-tv-hd-2021_AV4.jfif',
                    thumbnail: '/crud/demo/categories/refurb-apple-tv-hd-2021_AV4.jfif',
                    description: 'Scopri cosa c’è dietro una Apple TV HD ricondizionata.',
                }, {            // ID: 18
                    parentId: 16,
                    uuid: crypto.randomUUID(),
                    name: 'Apple TV 4K',
                    cover: '/crud/demo/categories/refurb-apple-tv-4k-2021_AV4.jfif',
                    thumbnail: '/crud/demo/categories/refurb-apple-tv-4k-2021_AV4.jfif',
                    description: 'Scopri cosa c’è dietro una Apple TV 4K ricondizionata.',
                },


                /** Category Id [19] */
                {            // ID: 19
                    parentId: 0,
                    uuid: crypto.randomUUID(),
                    name: 'Accessori ricondizionati',
                    menu: true,
                    footer: true,
                    homepage: true,
                    cover: '/crud/demo/categories/accessories-refurb-category-201810.jfif',
                    thumbnail: '/crud/demo/categories/MNA73.jfif',
                    description: 'Scopri cosa c’è dietro un accessorio ricondizionato.',
                }, {            // ID: 20
                    parentId: 18,
                    uuid: crypto.randomUUID(),
                    name: 'Accessori per Mac',
                    description: 'Scopri cosa c’è dietro un Accessori per Mac ricondizionato.',
                }, {            // ID: 21
                    parentId: 18,
                    uuid: crypto.randomUUID(),
                    name: 'Accessori per iPad',
                    description: 'Scopri cosa c’è dietro un Accessori per iPad ricondizionato.',
                },


                /** Category Id [22] */
                {            // ID: 22
                    parentId: 2,
                    uuid: crypto.randomUUID(),
                    name: 'MacBook Air (1° Generazione)',
                    cover: '/crud/demo/categories/refurb-ipad-air-wifi-spacegrey-2021_AV3.jfif',
                    thumbnail: '/crud/demo/categories/refurb-ipad-air-wifi-spacegrey-2021_AV3.jfif',
                    description: 'Scopri cosa c’è dietro un accessorio ricondizionato.',
                }, {            // ID: 23
                    parentId: 2,
                    uuid: crypto.randomUUID(),
                    name: 'MacBook Air (2° Generazione)',
                    cover: '/crud/demo/categories/refurb-ipad-air-wifi-spacegrey-2021_AV3.jfif',
                    thumbnail: '/crud/demo/categories/refurb-ipad-air-wifi-spacegrey-2021_AV3.jfif',
                    description: 'Scopri cosa c’è dietro un Accessori per Mac ricondizionato.',
                }, {            // ID: 24
                    parentId: 2,
                    uuid: crypto.randomUUID(),
                    name: 'MacBook Air (3° Generazione)',
                    cover: '/crud/demo/categories/refurb-ipad-air-wifi-spacegrey-2021_AV3.jfif',
                    thumbnail: '/crud/demo/categories/refurb-ipad-air-wifi-spacegrey-2021_AV3.jfif',
                    description: 'Scopri cosa c’è dietro un Accessori per iPad ricondizionato.',
                },


                /** Category Id [25] */
                {            // ID: 25
                    parentId: 22,
                    uuid: crypto.randomUUID(),
                    name: 'MacBook Air (1° Generazione) | 2014',
                    cover: '/crud/demo/categories/refurb-ipad-air-wifi-spacegrey-2021.jfif',
                    thumbnail: '/crud/demo/categories/refurb-ipad-air-wifi-spacegrey-2021.jfif',
                    description: 'Scopri cosa c’è dietro un accessorio ricondizionato.',
                }, {            // ID: 26
                    parentId: 22,
                    uuid: crypto.randomUUID(),
                    name: 'MacBook Air (1° Generazione) | 2016',
                    cover: '/crud/demo/categories/refurb-ipad-air-wifi-silver-2021.jfif',
                    thumbnail: '/crud/demo/categories/refurb-ipad-air-wifi-silver-2021.jfif',
                    description: 'Scopri cosa c’è dietro un Accessori per Mac ricondizionato.',
                },


                /** Category Id [27] */
                {            // ID: 27
                    parentId: 0,
                    uuid: crypto.randomUUID(),
                    name: 'Fine Serie',
                    cover: '/crud/demo/categories/clearance-refurb-category-201810.jfif',
                    thumbnail: '/crud/demo/categories/airpods_pro_right__fm0wwisa76em_large.png',
                    description: 'Scopri cosa c’è dietro un accessorio ricondizionato.',
                },


                /** Category Id [28] */
                {            // ID: 28
                    parentId: 19,
                    uuid: crypto.randomUUID(),
                    name: 'Accessori per Mac',
                    cover: '/crud/demo/categories/accessories-refurb-category-201810.jfif',
                    thumbnail: '/crud/demo/categories/stand-mount-gallery-1-202203.jfif',
                    description: 'Scopri cosa c’è dietro un accessorio ricondizionato.',
                },

                /** Category Id [29] */
                {            // ID: 29
                    parentId: 1,
                    uuid: crypto.randomUUID(),
                    name: 'Mac Studio',
                    cover: '/crud/demo/categories/mac-refurb-category-201810.jfif',
                    thumbnail: '/crud/demo/categories/refurb-mac-studio-202203_AV5.jfif',
                    description: 'Scopri cosa c’è dietro un Mac Studio ricondizionato.',
                },

                /** Category Id [30] */
                {            // ID: 30
                    parentId: 11,
                    uuid: crypto.randomUUID(),
                    name: 'iPhone 12 Pro Max',
                    cover: '/crud/demo/categories/refurb-iphone-12-white-2020_AV3.jfif',
                    thumbnail: '/crud/demo/categories/refurb-iphone-12-white-2020_AV3.jfif',
                    description: 'Scopri cosa c’è dietro un iPhone 12 Pro Max ricondizionato.',
                },

            ]
        })
    )


    /*
     |--------------------------------------------------------------------------
     | Create Demo Attribute
     |------------------------------------------------------------------------*/
    console.log("\n======= Create Default Attribute =======")
    console.log(
        await prisma.attribute.create({
            data: {
                name: 'Color',
                type: 'color', // color, button, checkbox, range, radio, select
                values: {
                    create: [
                        {
                            spec: '#b90000'
                        }, {
                            spec: '#FF9800'
                        }, {
                            spec: '#0040ef'
                        }, {
                            spec: '#b700ef'
                        }, {
                            spec: '#828282'
                        }, {
                            spec: '#000000'
                        }, {
                            spec: '#ffffff'
                        },
                    ]
                },
            }
        }),
        await prisma.attribute.create({
            data: {
                name: 'Ram',
                type: 'range', // color, button, checkbox, range, radio, select
                values: {
                    create: [
                        {
                            spec: '128GB'
                        }, {
                            spec: '256GB'
                        }, {
                            spec: '512GB'
                        }, {
                            spec: '768GB'
                        }, {
                            spec: '1024GB'
                        },
                    ]
                },
            }
        }),
        await prisma.attribute.create({
            data: {
                name: 'Ram',
                type: 'select', // color, button, checkbox, range, radio, select
                values: {
                    create: [
                        {
                            spec: '128GB'
                        }, {
                            spec: '256GB'
                        }, {
                            spec: '512GB'
                        }, {
                            spec: '768GB'
                        }, {
                            spec: '1024GB'
                        },
                    ]
                },
            }
        }),
        await prisma.attribute.create({
            data: {
                name: 'Connessione',
                type: 'button', // color, button, checkbox, range, radio, select
                values: {
                    create: [
                        {
                            spec: 'Wi-Fi'
                        }, {
                            spec: 'Wi-Fi+Cellular'
                        },
                    ]
                },
            }
        }),
    )


    /*
     |--------------------------------------------------------------------------
     | Create Demo Products
     |------------------------------------------------------------------------*/
    console.log("\n======= Create Demo Products =======")
    console.log(
        await prisma.product.create({
            data: {
                uuid: crypto.randomUUID(),
                tax: 22.00,
                quantity: 4,
                price: 989,
                discount: 20.00,
                name: 'MacBook Air 13,3" ricondizionato con chip Apple M1, CPU 8‑core e GPU 7‑core',
                thumbnail: '/crud/demo/products/refurb-macbook-air-space-gray-m1-202010_AV1.jfif',
                description: 'Data iniziale di immissione sul mercato: novembre 2020 Display retroilluminato LED da 13,3" (diagonale) con tecnologia IPS; risoluzione nativa 2560×1600 a 227 pixel per pollice 8GB di memoria unificata Unità SSD da 256GB1 Sensore Touch ID Videocamera FaceTime HD a 720p.',
                categories: {connect: [{id: 1}, {id: 2}, {id: 22}, {id: 26}]},
                images: {
                    create: [
                        {path: '/crud/demo/products/refurb-macbook-air-space-gray-m1-202010_AV2.jfif'},
                        {path: '/crud/demo/products/refurb-macbook-air-space-gray-m1-202010_AV3.jfif'},
                        {path: '/crud/demo/products/refurb-macbook-air-space-gray-m1-202010_AV4.jfif'},
                        {path: '/crud/demo/products/refurb-macbook-air-space-gray-m1-202010_AV5.jfif'},
                    ]
                }
            }
        }),
        await prisma.product.create({
            data: {
                uuid: crypto.randomUUID(),
                tax: 22.00,
                quantity: 22,
                price: 1259,
                discount: 20.00,
                name: 'MacBook Pro 13,3" ricondizionato con chip Apple M1, CPU 8‑core e GPU 8‑core',
                thumbnail: '/crud/demo/products/refurb-mbp13-space-m1-2020_GEO_IT.jfif',
                description: 'Data iniziale di immissione sul mercato: novembre 2020 Display retroilluminato LED da 13,3" (diagonale) con tecnologia IPS; risoluzione nativa 2560×1600 a 227 pixel per pollice 8GB di memoria unificata Unità SSD da 256GB1 Touch Bar e Touch ID Videocamera FaceTime HD a 720p.',
                categories: {connect: [{id: 1}, {id: 3}]},
                images: {
                    create: [
                        {path: '/crud/demo/products/refurb-mbp13-space-m1-2020_AV1.jfif'},
                        {path: '/crud/demo/products/refurb-mbp13-space-m1-2020_AV2.jfif'},
                        {path: '/crud/demo/products/refurb-mbp13-space-m1-2020_AV3.jfif'},
                    ]
                }
            }
        }),
        await prisma.product.create({
            data: {
                uuid: crypto.randomUUID(),
                tax: 22.00,
                quantity: 22,
                price: 2559,
                discount: 20.00,
                name: 'MacBook Pro 16" ricondizionato con chip Apple M1 Pro, CPU 10‑core e GPU 16‑core - Grigio siderale',
                thumbnail: '/crud/demo/products/refurb-mbp16-space-m1-2021_GEO_IT.jfif',
                description: 'Data iniziale di immissione sul mercato: ottobre 2021 Display Liquid Retina XDR da 16,2" (diagonale);1 risoluzione nativa 3456×2234 a 254 pixel per pollice 16GB di memoria unificata Unità SSD da 512GB2 Touch ID Videocamera FaceTime HD a 1080p Tre porte Thunderbolt 4.',
                categories: {connect: [{id: 1}, {id: 3}]},
                images: {
                    create: [
                        {path: '/crud/demo/products/refurb-mbp16-space-m1-2021_AV1.jfif'},
                        {path: '/crud/demo/products/refurb-mbp16-space-m1-2021_AV2.jfif'},
                        {path: '/crud/demo/products/refurb-mbp16-space-m1-2021_AV3.jfif'},
                    ]
                }
            }
        }),
        await prisma.product.create({
            data: {
                uuid: crypto.randomUUID(),
                tax: 22.00,
                quantity: 5,
                price: 1259,
                discount: 20.00,
                name: 'Mac mini Intel Core i5 6‑core di ottava generazione a 3,0GHz',
                thumbnail: '/crud/demo/products/mac-mini-spacegray-202011-gallery-1.jfif',
                description: 'Data iniziale di immissione sul mercato: giugno 2017 Display retroilluminato LED da 21,5" (diagonale); risoluzione 1920×1080; supporta milioni di colori 8GB di memoria DDR4 a 2133MHz su scheda Archiviazione SSD da 256GB1 Videocamera FaceTime HD Intel Iris Plus Graphics 640.',
                categories: {connect: [{id: 1}, {id: 4}]},
                images: {
                    create: [
                        {path: '/crud/demo/products/mac-mini-spacegray-202011-gallery-2.jfif'},
                        {path: '/crud/demo/products/mac-mini-spacegray-202011-gallery-3.jfif'},
                        {path: '/crud/demo/products/mac-mini-spacegray-202011-gallery-4.jfif'},
                        {path: '/crud/demo/products/mac-mini-spacegray-202011-gallery-5.jfif'},
                    ]
                }
            }
        }),
        await prisma.product.create({
            data: {
                uuid: crypto.randomUUID(),
                tax: 22.00,
                quantity: 8,
                price: 1259,
                discount: 20.00,
                name: 'iMac 21,5" ricondizionato con Intel Core i5 dual-core a 2,3GHz',
                thumbnail: '/crud/demo/products/refurb-2017-imac-215-gallery.jfif',
                description: 'Data iniziale di immissione sul mercato: giugno 2017 Display retroilluminato LED da 21,5" (diagonale); risoluzione 1920×1080; supporta milioni di colori 8GB di memoria DDR4 a 2133MHz su scheda Archiviazione SSD da 256GB1 Videocamera FaceTime HD Intel Iris Plus Graphics 640.',
                categories: {connect: [{id: 1}, {id: 5}]},
                images: {
                    create: [
                        {path: '/crud/demo/products/refurb-2017-imac-215-gallery_AV1.jfif'},
                        {path: '/crud/demo/products/refurb-2017-imac-215-gallery_AV2.jfif'},
                        {path: '/crud/demo/products/refurb-2017-imac-215-gallery_AV3.jfif'},
                    ]
                }
            }
        }),
        await prisma.product.create({
            data: {
                uuid: crypto.randomUUID(),
                tax: 22.00,
                quantity: 35,
                price: 4699,
                discount: 10.00,
                name: 'Mac Pro ricondizionato con Intel Xeon W 8‑core a 3,5GHz, due Radeon Pro W5700X e Apple Afterburner',
                thumbnail: '/crud/demo/products/mac-pro-2019-gallery1.jfif',
                description: 'Data iniziale di immissione sul mercato: dicembre 2019 Processore Intel Xeon W 8‑core a 3,5GHz (Turbo Boost fino a 4,0GHz) 48GB (6x8GB) di memoria ECC DDR4 Due Radeon Pro W5700X con 16GB di memoria GDDR6 ciascuna Archiviazione SSD da 1TB1 Telaio in acciaio inossidabile con piedini Apple Afterburner',
                categories: {connect: [{id: 1}, {id: 6}]},
                images: {
                    create: [
                        {path: '/crud/demo/products/mac-pro-2019-gallery2.jfif'},
                        {path: '/crud/demo/products/mac-pro-2019-gallery3.jfif'},
                        {path: '/crud/demo/products/mac-pro-2019-gallery4.jfif'},
                        {path: '/crud/demo/products/mac-pro-2019-gallery5.jfif'},
                        {path: '/crud/demo/products/mac-pro-2019-gallery6.jfif'},
                    ]
                }
            }
        }),
        // await prisma.product.create({
        //     data: {
        //         uuid: crypto.randomUUID(),
        //         tax: 22.00,
        //         quantity: 2,
        //         price: 6599,
        //         discount: 10.00,
        //         name: 'Mac Pro ricondizionato con Intel Xeon W 28‑core a 2,5GHz, due Radeon Pro Vega II Duo e Apple Afterburner',
        //         thumbnail: '/crud/demo/products/mac-pro-2019-gallery1.jfif',
        //         description: 'Data iniziale di immissione sul mercato: dicembre 2019 Processore Intel Xeon W 28‑core a 2,5GHz (Turbo Boost fino a 4,4GHz) 1,5TB (12x128GB) di memoria ECC DDR4 Due Radeon Pro Vega II Duo con 2x32GB di memoria HBM2 ciascuna Archiviazione SSD da 8TB1 Telaio in acciaio inossidabile con piedini Apple Afterburner',
        //         categories: {connect: [{id: 1}, {id: 6}]},
        //         images: {
        //             create: [
        //                 {path: '/crud/demo/products/mac-pro-2019-gallery2.jfif'},
        //                 {path: '/crud/demo/products/mac-pro-2019-gallery3.jfif'},
        //                 {path: '/crud/demo/products/mac-pro-2019-gallery4.jfif'},
        //                 {path: '/crud/demo/products/mac-pro-2019-gallery5.jfif'},
        //                 {path: '/crud/demo/products/mac-pro-2019-gallery6.jfif'},
        //             ]
        //         }
        //     }
        // }),
        await prisma.product.create({
            data: {
                uuid: crypto.randomUUID(),
                tax: 22.00,
                quantity: 2,
                price: 479,
                discount: 10.00,
                name: 'iPad Air Wi-Fi 64GB ricondizionato - Oro (terza generazione)',
                thumbnail: '/crud/demo/products/refurb-ipad-air-wifi-gold-2019.jfif',
                description: 'Data iniziale di immissione sul mercato: marzo 2019 Wi-Fi (802.11a/b/g/n/ac) Bluetooth 5.0 Display Retina da 10,5" Fotocamera iSight da 8 megapixel Videocamera FaceTime HD Registrazione video HD a 1080p Chip A12 Bionic con architettura a 64 bit Coprocessore M12 integrato Neural Engine Schermo Multi-Touch 456 g e 6,1 mm.',
                categories: {connect: [{id: 7}, {id: 10}]},
                images: {
                    create: [
                        {path: '/crud/demo/products/refurb-ipad-air-wifi-gold-2019_AV1.jfif'},
                        {path: '/crud/demo/products/refurb-ipad-air-wifi-gold-2019_AV2.jfif'},
                    ]
                }
            }
        }),
        await prisma.product.create({
            data: {
                uuid: crypto.randomUUID(),
                tax: 22.00,
                quantity: 2,
                price: 799,
                discount: 10.00,
                name: 'iPad Pro 12,9" Wi-Fi 256GB ricondizionato - Grigio siderale (terza generazione)',
                thumbnail: '/crud/demo/products/refurb-ipad-pro-12-wifi-spacegray-2019.jfif',
                description: 'Data iniziale di immissione sul mercato: marzo 2019 Wi-Fi (802.11a/b/g/n/ac) Bluetooth 5.0 Display Retina da 10,5" Fotocamera iSight da 8 megapixel Videocamera FaceTime HD Registrazione video HD a 1080p Chip A12 Bionic con architettura a 64 bit Coprocessore M12 integrato Neural Engine Schermo Multi-Touch 456 g e 6,1 mm.',
                categories: {connect: [{id: 7}, {id: 9}]},
                images: {
                    create: [
                        {path: '/crud/demo/products/refurb-ipad-pro-12-wifi-spacegray-2019_AV1.jfif'},
                        {path: '/crud/demo/products/refurb-ipad-pro-12-wifi-spacegray-2019_AV2.jfif'},
                    ]
                }
            }
        }),
        await prisma.product.create({
            data: {
                uuid: crypto.randomUUID(),
                tax: 22.00,
                quantity: 2,
                price: 139,
                discount: 10.00,
                name: 'Apple TV HD 32GB ricondizionata',
                thumbnail: '/crud/demo/products/refurb-apple-tv-hd-2021.jfif',
                description: 'Data iniziale di immissione sul mercato: aprile 2021 Film, serie ed eventi sportivi in diretta: Apple TV HD mette insieme il meglio della televisione e i tuoi servizi Apple preferiti. Scegli fra i titoli di Apple TV+, Netflix e Disney+, e guarda i canali in diretta di YouTube TV e Sling TV. E controlla tutto con il telecomando Siri Remote (seconda generazione).',
                categories: {connect: [{id: 16}, {id: 17}]},
                images: {
                    create: [
                        {path: '/crud/demo/products/refurb-apple-tv-hd-2021_AV1.jfif'},
                        {path: '/crud/demo/products/refurb-apple-tv-hd-2021_AV2.jfif'},
                        {path: '/crud/demo/products/refurb-apple-tv-hd-2021_AV3.jfif'},
                    ]
                }
            }
        }),
        await prisma.product.create({
            data: {
                uuid: crypto.randomUUID(),
                tax: 22.00,
                quantity: 8,
                price: 169,
                discount: 10.00,
                name: 'Apple TV 4K 32GB ricondizionata',
                thumbnail: '/crud/demo/products/rfb-apple-tv-4k.jfif',
                description: 'Data iniziale di immissione sul mercato: aprile 2021 Film, serie ed eventi sportivi in diretta: Apple TV HD mette insieme il meglio della televisione e i tuoi servizi Apple preferiti. Scegli fra i titoli di Apple TV+, Netflix e Disney+, e guarda i canali in diretta di YouTube TV e Sling TV. E controlla tutto con il telecomando Siri Remote (seconda generazione).',
                categories: {connect: [{id: 16}, {id: 18}]},
                images: {
                    create: [
                        {path: '/crud/demo/products/rfb-apple-tv-4k_AV1.jfif'},
                        {path: '/crud/demo/products/rfb-apple-tv-4k_AV2.jfif'},
                        {path: '/crud/demo/products/rfb-apple-tv-4k_AV3.jfif'},
                    ]
                }
            }
        }),
        await prisma.product.create({
            data: {
                uuid: crypto.randomUUID(),
                tax: 22.00,
                quantity: 5,
                price: 8319,
                discount: 10.00,
                name: 'Mac Studio ricondizionato, chip Apple M1 Ultra con CPU 20‑core e GPU 64‑core',
                thumbnail: '/crud/demo/products/refurb-mac-studio-202203.jfif',
                description: 'Data iniziale di immissione sul mercato: marzo 2022 128GB di memoria unificata Unità SSD da 8TB¹ Lato anteriore: due porte Thunderbolt 4, uno slot SDXC card Lato posteriore: quattro porte Thunderbolt 4, due porte USB‑A, una porta HDMI, una porta 10Gb Ethernet, un jack da 3,5 mm per cuffie.',
                categories: {connect: [{id: 1}, {id: 29}]},
                images: {
                    create: [
                        {path: '/crud/demo/products/refurb-mac-studio-202203_AV1.jfif'},
                        {path: '/crud/demo/products/refurb-mac-studio-202203_AV2.jfif'},
                        {path: '/crud/demo/products/refurb-mac-studio-202203_AV3.jfif'},
                        {path: '/crud/demo/products/refurb-mac-studio-202203_AV4.jfif'},
                    ]
                }
            }
        }),
        await prisma.product.create({
            data: {
                uuid: crypto.randomUUID(),
                tax: 22.00,
                quantity: 8,
                price: 809,
                discount: 10.00,
                name: 'iPhone 11 Pro 64GB ricondizionato - Verde notte',
                thumbnail: '/crud/demo/products/refurb-iphone-11-pro-midnight-green-2019_GEO_EMEA.jfif',
                description: 'Data iniziale di immissione sul mercato: settembre 2019 Senza contratto, senza SIM, modello A22151 Display Super Retina XDR da 5,8" (OLED) Chip A13 Bionic con Neural Engine di terza generazione Riproduzione video: fino a 18 ore Gigabit LTE e Wi‑Fi 802.11ax con tecnologia MIMO 2×2 Tecnologia wireless Bluetooth 5.0 NFC con modalità lettore Tripla fotocamera da 12MP con ultra‑grandangolo, grandangolo e teleobiettivo Zoom digitale: fino a 10x Registrazione video 4K, registrazione video HD a 1080p Face ID Siri Apple Pay 188 grammi e 8,1 mm',
                categories: {connect: [{id: 11}, {id: 12}]},
                images: {
                    create: [
                        {path: '/crud/demo/products/refurb-iphone-11-pro-midnight-green-2019_AV1.jfif'},
                        {path: '/crud/demo/products/refurb-iphone-11-pro-midnight-green-2019_AV2.jfif'},
                        {path: '/crud/demo/products/refurb-iphone-11-pro-midnight-green-2019_AV3.jfif'},
                    ]
                }
            }
        }),
        await prisma.product.create({
            data: {
                uuid: crypto.randomUUID(),
                tax: 22.00,
                quantity: 5,
                price: 1239,
                discount: 5.00,
                name: 'iPhone 11 Pro Max 512GB ricondizionato - Grigio siderale',
                thumbnail: '/crud/demo/products/refurb-iphone-11-pro-max-space-gray-2019_GEO_EMEA.jfif',
                description: 'Data iniziale di immissione sul mercato: settembre 2019 Senza contratto, senza SIM, modello A22181 Display Super Retina XDR da 6,5" (OLED) Chip A13 Bionic con Neural Engine di terza generazione Riproduzione video: fino a 20 ore Gigabit LTE e Wi‑Fi 802.11ax con tecnologia MIMO 2×2 Tecnologia wireless Bluetooth 5.0 NFC con modalità lettore Tripla fotocamera da 12MP con ultra‑grandangolo, grandangolo e teleobiettivo Zoom digitale: fino a 10x Registrazione video 4K, registrazione video HD a 1080p Face ID Siri Apple Pay.',
                categories: {connect: [{id: 11}, {id: 13}]},
                images: {
                    create: [
                        {path: '/crud/demo/products/refurb-iphone-11-pro-midnight-green-2019_AV1.jfif'},
                        {path: '/crud/demo/products/refurb-iphone-11-pro-midnight-green-2019_AV2.jfif'},
                        {path: '/crud/demo/products/refurb-iphone-11-pro-midnight-green-2019_AV3.jfif'},
                    ]
                }
            }
        }),
        await prisma.product.create({
            data: {
                uuid: crypto.randomUUID(),
                tax: 22.00,
                quantity: 5,
                price: 709,
                discount: 5.00,
                name: 'iPhone 12 64GB ricondizionato - Viola',
                thumbnail: '/crud/demo/products/refurb-iphone-12-purple-2021.jfif',
                description: 'Data iniziale di immissione sul mercato: ottobre 2020 Senza contratto, senza SIM, modello A24031 Display Super Retina XDR OLED da 6,1" Chip A14 Bionic con Neural Engine 16-core Riproduzione video: fino a 17 ore 5G, Gigabit LTE e Wi‑Fi 802.11ax con tecnologia MIMO 2x2 Tecnologia wireless Bluetooth 5.0 NFC con modalità lettore Doppia fotocamera da 12MP con ultra‑grandangolo e grandangolo Zoom digitale: fino a 5x Registrazione video 4K, registrazione video HD a 1080p Face ID Siri Apple Pay 164 g e 0,74 cm.',
                categories: {connect: [{id: 11}, {id: 14}]},
                images: {
                    create: [
                        {path: '/crud/demo/products/refurb-iphone-12-purple-2021_AV1.jfif'},
                        {path: '/crud/demo/products/refurb-iphone-12-purple-2021_AV2.jfif'},
                    ]
                }
            }
        }),
        await prisma.product.create({
            data: {
                uuid: crypto.randomUUID(),
                tax: 22.00,
                quantity: 5,
                price: 909,
                discount: 5.00,
                name: 'iPhone 12 Pro 128GB ricondizionato - Blu Pacifico',
                thumbnail: '/crud/demo/products/refurb-iphone-12-pro-blue-2020.jfif',
                description: 'Data iniziale di immissione sul mercato: ottobre 2020 Senza contratto, senza SIM, modello A24071 Display Super Retina XDR OLED da 6,1" Chip A14 Bionic con Neural Engine 16-core Riproduzione video: fino a 17 ore 5G, Gigabit LTE e Wi‑Fi 802.11ax con tecnologia MIMO 2x2 Tecnologia wireless Bluetooth 5.0 NFC con modalità lettore Sistema di fotocamere Pro da 12MP con ultra‑grandangolo, grandangolo e teleobiettivo Zoom digitale: fino a 10x Registrazione video 4K, registrazione video HD a 1080p Face ID Siri Apple Pay 189 grammi e 7,4 mm',
                categories: {connect: [{id: 11}, {id: 15}]},
                images: {
                    create: [
                        {path: '/crud/demo/products/refurb-iphone-12-purple-2021_AV1.jfif'},
                        {path: '/crud/demo/products/refurb-iphone-12-purple-2021_AV2.jfif'},
                    ]
                }
            }
        }),
        await prisma.product.create({
            data: {
                uuid: crypto.randomUUID(),
                tax: 22.00,
                quantity: 5,
                price: 909,
                discount: 5.00,
                name: 'iPhone 12 Pro Max 256GB ricondizionato - Oro',
                thumbnail: '/crud/demo/products/refurb-iphone-12-pro-max-gold-2020.jfif',
                description: 'Data iniziale di immissione sul mercato: ottobre 2020 Senza contratto, senza SIM, modello A24071 Display Super Retina XDR OLED da 6,1" Chip A14 Bionic con Neural Engine 16-core Riproduzione video: fino a 17 ore 5G, Gigabit LTE e Wi‑Fi 802.11ax con tecnologia MIMO 2x2 Tecnologia wireless Bluetooth 5.0 NFC con modalità lettore Sistema di fotocamere Pro da 12MP con ultra‑grandangolo, grandangolo e teleobiettivo Zoom digitale: fino a 10x Registrazione video 4K, registrazione video HD a 1080p Face ID Siri Apple Pay 189 grammi e 7,4 mm',
                categories: {connect: [{id: 11}, {id: 30}]},
                images: {
                    create: [
                        {path: '/crud/demo/products/refurb-iphone-12-pro-max-gold-2020_AV1.jfif'},
                    ]
                }
            }
        }),
    )


    /*
     |--------------------------------------------------------------------------
     | Create Demo Product Combinations
     |------------------------------------------------------------------------*/

})()


