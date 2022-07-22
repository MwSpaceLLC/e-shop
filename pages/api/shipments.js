import {getAppSettings} from "../../lib/helpers";
import {Carrier, Packlink, Stat} from "../../node_packages/packlink-js";
import PostalZone from "../../node_packages/packlink-js/src/Models/PostalZone";
import PostalCode from "../../node_packages/packlink-js/src/Models/PostalCode";
import Warehouse from "../../node_packages/packlink-js/src/Models/Warehouse.mjs";
import Shipment from "../../node_packages/packlink-js/src/Models/Shipment.mjs";

export default async function handler(req, res) {

    const {ShopPackLinkApiKey} = await getAppSettings();

    /*
     | Packlink Logic apis
     |------------------------------------------------------------------------*/

    Packlink.setApiKey(ShopPackLinkApiKey);

    /**
     *
     * Shipment test
     */
    // const shipments = await Shipment.all()
    // return res.json(shipments)

    // const shipments = await Shipment.create({
    //
    //         // carrier for shipping
    //         service_id: 20127,
    //
    //         // to address shipping
    //         to: {
    //             name: 'Mario',
    //             surname: 'Rossi',
    //             street1: 'Via camillo bozza, 14',
    //             zip_code: '06073',
    //             city: 'Perugia',
    //             country: 'IT',
    //             phone: '02 3056 7684',
    //             email: 'dev@mwspace.com'
    //         },
    //
    //         // package shipping
    //         packages: [{width: 20, height: 20, length: 20, weight: 0.3}]
    //     })
    // return res.json(shipments)

    // const shipments = await Shipment.find('IT2022PRO0003317712')
    // return res.json(shipments)

    const shipments = await Shipment.delete('IT2022PRO0003317712')
    return res.json(shipments)

    /**
     * Carrier test | quote */
    // const carriers = await Carrier.quote(50)
    // carriers.from({
    //     country: 'IT',
    //     zip: '20900'
    // })
    // carriers.to({
    //     country: 'IT',
    //     zip: '06073'
    // });
    // return res.json(await carriers.all())

    /**
     * Carrier test | quote */
    // const packages = [[]];
    // const carriers = await Carrier.ship(packages)
    // carriers.from({
    //     country: 'IT',
    //     zip: '20900'
    // })
    // carriers.to({
    //     country: 'IT',
    //     zip: '06073'
    // });
    // return res.json(await carriers.all())

    /**
     *
     * Stats test
     */
    // const stats = await Stat.all()
    // return res.json(stats)

    /**
     *
     * PostalZone test
     */
    // const postalzones = await PostalZone.all()
    // return res.json(postalzones)

    /**
     *
     * PostalCode test
     */
    // const postalcodes = await PostalCode.all()
    // return res.json(postalcodes)

    /**
     *
     * Warehouse test
     */
    // const warehouses = await Warehouse.all()
    // return res.json(warehouses)

    // const warehouses = await Warehouse.find('YOUR_WAREHOUSE_ID')
    // return res.json(warehouses)

    // const warehouse = await Warehouse.first()
    // return res.json(warehouse)

    // const warehouse = await Warehouse.create({
    //         "alias": "MwSpace srl",
    //         "name": "Dev",
    //         "surname": "Team",
    //         "company": "MwSpace srl",
    //         "country": "IT",
    //         "city": "Milano",
    //         "postal_code": "20126",
    //         "address": "Via Libero Temolo, 4, 20126 Milano MI",
    //         "phone": "02 3056 7684",
    //         "email": "dev@mwspace.com"
    //     })
    // return res.json(warehouse)

    // const warehouse = await Warehouse.first()
    // const update = await Warehouse.update(warehouse.id, {
    //     alias: 'MwSpace llc',
    // })
    // return res.json(update)

    // const warehouse = await Warehouse.first()
    // return res.json(await Warehouse.delete(warehouse.id))


}