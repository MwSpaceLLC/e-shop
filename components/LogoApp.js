import Image from "next/image";
import useSWR from "swr";
import {fetcher} from "../lib/function";

export function LogoApp({className}) {

    const {data: ShopLogo} = useSWR(`/api/json/settings/ShopLogo`, fetcher)

    return (
        <div className="w-full flex items-center justify-center">
            {ShopLogo && (
                <Image
                    className={className}
                    src={ShopLogo.value}
                    alt="Shop logo"
                    width={50} height={50}/>
            )}
        </div>
    )
}