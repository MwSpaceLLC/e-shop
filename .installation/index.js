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
                    thumbnail: '/crud/demo/categories/MN6L3_FV402.png',
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

            ]
        })
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
                price: 9.939,
                discount: 20.00,
                name: 'MacBook Air 13,3" ricondizionato con chip Apple M1, CPU 8‑core e GPU 7‑core',
                thumbnail: '/crud/demo/products/refurb-macbook-air-space-gray-m1-202010.jfif',
                description: 'Data iniziale di immissione sul mercato: novembre 2020 Display retroilluminato LED da 13,3" (diagonale) con tecnologia IPS; risoluzione nativa 2560×1600 a 227 pixel per pollice 8GB di memoria unificata Unità SSD da 256GB1 Sensore Touch ID Videocamera FaceTime HD a 720p.',
                categories: {connect: [{id: 1}, {id: 2}]},
                images: {
                    create: [
                        {path: '/crud/demo/products/refurb-macbook-air-space-gray-m1-202010_AV1.jfif'},
                        {path: '/crud/demo/products/refurb-macbook-air-space-gray-m1-202010_AV2.jfif'},
                        {path: '/crud/demo/products/refurb-macbook-air-space-gray-m1-202010_AV3.jfif'},
                        {path: '/crud/demo/products/refurb-macbook-air-space-gray-m1-202010_AV4.jfif'},
                        {path: '/crud/demo/products/refurb-macbook-air-space-gray-m1-202010_AV5.jfif'},
                    ]
                }
            }
        })
    )

})()


