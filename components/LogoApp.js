import Image from "next/image";
import useSWR from "swr";
import {fetcher} from "../lib/function";

export function LogoApp({className}) {

    const {data: ShopSeoIndexTitle} = useSWR(`/api/json/settings/ShopSeoIndexTitle`, fetcher)

    const {data: ShopLogo} = useSWR(`/api/json/settings/ShopLogo`, fetcher)
    const {data: ShopName} = useSWR(`/api/json/settings/ShopName`, fetcher)

    return (
        <div className="w-full flex items-center justify-center">
            {ShopSeoIndexTitle && ShopLogo && ShopName && (
                <Image
                    quality={100}
                    className={className}
                    src={ShopLogo.value}
                    alt={ShopName.value + ' ' + ShopSeoIndexTitle.value}
                    width={50} height={50}/>
            )}
        </div>
    )
}