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
     | Create Admin User */
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
     | Create Default Lang */
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
     | Create Demo Categories */
    console.log("\n======= Create Demo Categories =======")
    console.log(
        await prisma.category.create({
            data: {
                uuid: crypto.randomUUID(),
                name: 'ABITI',
                cover: '/crud/demo/categories/clothes.jpg',
                thumbnail: '/crud/demo/categories/clothes.jpg',
                description: 'Scopri le nostre scoperte alla moda preferite, una selezione di capi cool da integrare nel tuo guardaroba. Componi uno stile unico con personalità che corrisponda al tuo.',
            }
        })
    )
    console.log(
        await prisma.category.create({
            data: {
                uuid: crypto.randomUUID(),
                name: 'ACCESSORI',
                cover: '/crud/demo/categories/accessories.jpg',
                thumbnail: '/crud/demo/categories/accessories.jpg',
                description: 'Articoli e accessori per la tua scrivania, cucina o soggiorno. Rendi la tua casa una casa con i nostri design accattivanti.',
            }
        })
    )
    console.log(
        await prisma.category.create({
            data: {
                uuid: crypto.randomUUID(),
                name: 'ARTE',
                cover: '/crud/demo/categories/art.jpg',
                thumbnail: '/crud/demo/categories/art.jpg',
                description: 'Poster incorniciati e immagini vettoriali, tutto ciò che ti serve per dare personalità alle tue pareti o dare vita ai tuoi progetti creativi.',
            }
        })
    )
    console.log(
        await prisma.category.create({
            data: {
                uuid: crypto.randomUUID(),
                name: 'LAVORO',
                cover: '/crud/demo/categories/workspaces.jpg',
                thumbnail: '/crud/demo/categories/workspaces.jpg',
                description: 'Lo spazio di lavoro è un termine comunemente usato in vari ambiti dell\'ingegneria e in economia con due significati completamente differenti.',
            }
        })
    )
    console.log(
        await prisma.category.create({
            data: {
                uuid: crypto.randomUUID(),
                name: 'OROLOGI',
                cover: '/crud/demo/categories/clocks.jpg',
                thumbnail: '/crud/demo/categories/clocks.jpg',
                description: 'Oscillatore che genera un segnale di frequenza nota e stabile, dal quale si ricavano impulsi succedentisi a intervalli noti e stabili.',
            }
        })
    )

    /*
     |--------------------------------------------------------------------------
     | Create Demo Products */
    console.log("\n======= Create Demo Products =======")
    console.log(
        await prisma.product.create({
            data: {
                uuid: crypto.randomUUID(),
                quantity: 20,
                price: 22.94,
                name: 'HUMMINGBIRD PRINTED T-SHIRT',
                cover: '/crud/demo/products/hummingbird-printed-t-shirt.jpg',
                description: 'Vestibilità regolare, scollo tondo, maniche corte. Realizzato in cotone pima a fiocco extra lungo.',
                categories: {connect: [{id: 1}]}
            }
        })
    )
    console.log(
        await prisma.product.create({
            data: {
                uuid: crypto.randomUUID(),
                quantity: 5,
                price: 34.94,
                name: 'HUMMINGBIRD PRINTED SWEATER',
                cover: '/crud/demo/products/brown-bear-printed-sweater.jpg',
                description: 'Vestibilità regolare, scollo tondo, maniche lunghe. 100% cotone, lato interno spazzolato per un comfort extra.',
                categories: {connect: [{id: 1}]}
            }
        })
    )
    console.log(
        await prisma.product.create({
            data: {
                uuid: crypto.randomUUID(),
                quantity: 15,
                price: 14.94,
                name: 'MUG THE ADVENTURE BEGINS',
                cover: '/crud/demo/products/mug-the-adventure-begins.jpg',
                description: 'L\'avventura inizia con una tazza di caffè. Parti alla conquista della giornata! Diametro 8,2 cm / Altezza 9,5 cm / 0,43 kg. A prova di lavastoviglie.',
                categories: {connect: [{id: 2}]}
            }
        })
    )
    console.log(
        await prisma.product.create({
            data: {
                uuid: crypto.randomUUID(),
                quantity: 8,
                price: 25.94,
                name: 'MOUNTAIN FOX CUSHION',
                cover: '/crud/demo/products/mountain-fox-cushion.jpg',
                description: 'Il cuscino Mountain Fox aggiungerà un tocco grafico e colorato al tuo divano, poltrona o letto. Crea un\'atmosfera moderna e zen che ispira relax. Fodera 100% cotone, lavabile in lavatrice a 60° / Imbottitura 100% poliestere anallergico.',
                categories: {connect: [{id: 2}]}
            }
        })
    )
    console.log(
        await prisma.product.create({
            data: {
                uuid: crypto.randomUUID(),
                quantity: 2,
                price: 32.94,
                name: 'Scrivania di design ARISTOTELE 4pz',
                cover: '/crud/demo/products/Aristotele-4pz-K12-1.jpg',
                description: 'Questo splendido set di accessori da scrivania prende il nome da una delle menti più geniali di tutti i tempi. ARISTOTELE 4pz è l’idea LIMAC Design per studio o ufficio dal design classico e ricercato.',
                categories: {connect: [{id: 4}]}
            }
        })
    )
    console.log(
        await prisma.product.create({
            data: {
                uuid: crypto.randomUUID(),
                quantity: 15,
                price: 20.94,
                name: 'Organizer tavolo esagonale',
                cover: '/crud/demo/products/shopping.webp',
                description: 'Home Ufficio Accessori da scrivania organizer tavolo esagonale in legno organizzazione scrivania ambiente di lavoro decoro scrivania',
                categories: {connect: [{id: 4}]}
            }
        })
    )
    console.log(
        await prisma.product.create({
            data: {
                uuid: crypto.randomUUID(),
                quantity: 8,
                price: 569.94,
                name: 'GRANITE BLUE TITANIUM',
                cover: '/crud/demo/products/123456shopping.webp',
                description: 'Suunto 9 è la nostra gamma di punta di orologi per lo sport GPS dotati di tutte le funzionalità, con durata della batteria superiore e resistenza alle condizioni più impegnative. Suunto 9 Peak è l\'orologio più sottile e resistente che Suunto abbia mai realizzato.',
                categories: {connect: [{id: 5}]}
            }
        })
    )
    console.log(
        await prisma.product.create({
            data: {
                uuid: crypto.randomUUID(),
                quantity: 5,
                price: 469.94,
                name: 'ALL BLACK\n',
                cover: '/crud/demo/products/ss05052200ay-01.jfif',
                description: 'Suunto 9 Peak All Black si avvale dell\'acciaio inossidabile per una robusta struttura in metallo costruita appositamente. Il rivestimento di alta qualità in tinta abbinata conferisce all\'orologio un\'estetica e una modalità di interazione impossibili da quantificare.',
                categories: {connect: [{id: 5}]}
            }
        })
    )

})()


