import {getAppSettings} from "../../lib/helpers";
import {Carrier, Packlink, Stat} from "../../node_packages/packlink-js";
import PostalZone from "../../node_packages/packlink-js/src/Models/PostalZone";
import PostalCode from "../../node_packages/packlink-js/src/Models/PostalCode";

export default async function handler(req, res) {

    const {ShopPackLinkApiKey} = await getAppSettings();

    /*
     | Logic apis
     |------------------------------------------------------------------------*/

    Packlink.setApiKey(ShopPackLinkApiKey);

    try {

        /**
         * Carrier test | quote */
        // const carriers = await Carrier.quote(50)
        //
        // carriers.from({
        //     country: 'IT',
        //     zip: '20900'
        // })
        //
        // carriers.to({
        //     country: 'IT',
        //     zip: '06073'
        // });
        //
        // return res.json(await carriers.all())

        /**
         * Carrier test | quote */
        // const packages = [[]];
        //
        // const carriers = await Carrier.ship(packages)
        //
        // carriers.from({
        //     country: 'IT',
        //     zip: '20900'
        // })
        //
        // carriers.to({
        //     country: 'IT',
        //     zip: '06073'
        // });
        //
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
        //
        // return res.json(postalzones)

        /**
         *
         * PostalCode test
         */
        const postalcodes = await PostalCode.all()

        return res.json(postalcodes)

    } catch (e) {

        return res.json(e)
    }
}