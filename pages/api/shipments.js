import {getAppSettings} from "../../lib/helpers";
import {Carrier, Packlink, Stat} from "../../node_packages/packlink-js";

export default async function handler(req, res) {

    const {ShopPackLinkApiKey} = await getAppSettings();

    /*
     | Logic apis
     |------------------------------------------------------------------------*/

    Packlink.setApiKey(ShopPackLinkApiKey);

    try {

        // const carriers = Carrier.quote(3)
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

        const stats = await Stat.all()

        return res.json(stats)

    } catch (e) {

        return res.json(e)
    }
}