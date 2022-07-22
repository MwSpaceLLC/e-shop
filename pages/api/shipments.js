import {getAppSettings} from "../../lib/helpers";

// import {Stat, Packlink} from "packlink-js";

const {Packlink, Stat} = require("packlink-js")

export default async function handler(req, res) {

    const {ShopPackLinkApiKey} = await getAppSettings();

    /*
     | Logic apis
     |------------------------------------------------------------------------*/

    Packlink.setApiKey(ShopPackLinkApiKey);

    // const packages = []
    //
    // const carriers = Carrier.quote(3)
    // // const carriers = Carrier.ship(packages)
    //
    // carriers.from({
    //     country: 'IT',
    //     zip: '06073'
    // })
    //
    // carriers.to({
    //     country: 'IT',
    //     zip: '06073'
    // });

    try {

        const stats = await Stat.all();

        return res.json(stats)

    } catch (e) {

        return res.json(e)
    }
}