import {prisma} from "../../../lib/database";

export default async function handler(req, res) {

    /*
     | Logic apis
     |------------------------------------------------------------------------*/

    const ShopMainBackgroundColor = await prisma.setting.findFirst({where: {key: 'ShopMainBackgroundColor'}}) ?? `#${process.env.NEXT_PUBLIC_APPLICATION_COLOR}`;
    const ShopTopTextColor = await prisma.setting.findFirst({where: {key: 'ShopMainBackgroundColor'}}) ?? `inherit`;

    return res.send(
        `
:root {
    --ShopMainBackgroundColor: ${ShopMainBackgroundColor?.value};
    --ShopTopTextColor: ${ShopTopTextColor?.value};
}`
            .trim())
}