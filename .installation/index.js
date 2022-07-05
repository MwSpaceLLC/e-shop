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
                    value: '/crud/demo/settings/logo-1080-hd.webp',
                }, {
                    key: 'ShopFavicon',
                    value: '/crud/demo/settings/favicon/favicon.ico',
                }, {
                    key: 'ShopFavicon16',
                    value: '/crud/demo/settings/favicon/favicon-16x16.png',
                }, {
                    key: 'ShopFavicon32',
                    value: '/crud/demo/settings/favicon/favicon-32x32.png',
                }, {
                    key: 'ShopAppleTouchIcon',
                    value: '/crud/demo/settings/favicon/apple-touch-icon.png',
                }, {
                    key: 'ShopWebManifest',
                    value: '/crud/demo/settings/favicon/site.webmanifest',
                }, {
                    key: 'ShopBackgroundColor',
                    value: '#ffffff',
                }, {
                    key: 'ShopMainTextColor',
                    value: '#ffffff',
                }, {
                    key: 'ShopMainBackgroundColor',
                    value: '#ff9800',
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
                    cover: '/crud/demo/categories/apple-refurb-products-home-201810.png',
                    thumbnail: '/crud/demo/categories/ipad-air-select-202203.jfif',
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
                type: 'color', // color, button, checkbox, range, radio
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
                type: 'range', // color, button, checkbox, range, radio
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
                type: 'button', // color, button, checkbox, range, radio
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
                quantity: 35,
                price: 6599,
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
        await prisma.product.create({
            data: {
                uuid: crypto.randomUUID(),
                quantity: 2,
                price: 6599,
                discount: 10.00,
                name: 'Mac Pro ricondizionato con Intel Xeon W 28‑core a 2,5GHz, due Radeon Pro Vega II Duo e Apple Afterburner',
                thumbnail: '/crud/demo/products/mac-pro-2019-gallery1.jfif',
                description: 'Data iniziale di immissione sul mercato: dicembre 2019 Processore Intel Xeon W 28‑core a 2,5GHz (Turbo Boost fino a 4,4GHz) 1,5TB (12x128GB) di memoria ECC DDR4 Due Radeon Pro Vega II Duo con 2x32GB di memoria HBM2 ciascuna Archiviazione SSD da 8TB1 Telaio in acciaio inossidabile con piedini Apple Afterburner',
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
    )

    /*
     |--------------------------------------------------------------------------
     | Create Demo Product Combinations
     |------------------------------------------------------------------------*/
    // console.log("\n======= Create Default Attribute =======")
    // console.log(
    //     await prisma.combination.create({
    //         data: {
    //             name: 'Color',
    //             type: 'color', // color, button, checkbox, range, radio
    //             values: {
    //                 create: [
    //                     {
    //                         spec: '#b90000'
    //                     }, {
    //                         spec: '#FF9800'
    //                     }, {
    //                         spec: '#0040ef'
    //                     }, {
    //                         spec: '#b700ef'
    //                     }, {
    //                         spec: '#828282'
    //                     }, {
    //                         spec: '#000000'
    //                     }, {
    //                         spec: '#ffffff'
    //                     },
    //                 ]
    //             },
    //         }
    //     }),
    //     await prisma.attribute.create({
    //         data: {
    //             name: 'Ram',
    //             type: 'range', // color, button, checkbox, range, radio
    //             values: {
    //                 create: [
    //                     {
    //                         spec: '128GB'
    //                     }, {
    //                         spec: '256GB'
    //                     }, {
    //                         spec: '512GB'
    //                     }, {
    //                         spec: '768GB'
    //                     }, {
    //                         spec: '1024GB'
    //                     },
    //                 ]
    //             },
    //         }
    //     }),
    //     await prisma.attribute.create({
    //         data: {
    //             name: 'Connessione',
    //             type: 'button', // color, button, checkbox, range, radio
    //             values: {
    //                 create: [
    //                     {
    //                         spec: 'Wi-Fi'
    //                     }, {
    //                         spec: 'Wi-Fi+Cellular'
    //                     },
    //                 ]
    //             },
    //         }
    //     }),
    // )

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


                {
                    slug: 'MainBackgroundImage',
                    name: 'Main Background Image',
                    body: {
                        image: '/crud/demo/sections/laptop-ge705b6c1e_1920.jpg',
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


})()


