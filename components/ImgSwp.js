import Image from "next/image";
import {useState} from "react";
import useSWR from "swr";
import {fetcher} from "../lib/function";
import {HoverSlideshow} from "react-hover-slideshow";

export default function ImgSwp({thumbnail, images, alt, className}) {

    // const [swipe, setSwipe] = useState(0)
    // const [index, setIndex] = useState(0)
    // const [src, setSrc] = useState(thumbnail ?? '')
    //
    // const {data: ShopIntervalSwiperTime} = useSWR(`/api/json/settings/ShopIntervalSwiperTime`, fetcher)
    //
    // const increment = () => {
    //     console.log('increment: ', index)
    //
    //     setIndex((index) => index + 1);
    //     setSrc(images[index].path);
    // };
    //
    // const setter = () => {
    //     console.log('setter: ', index)
    //
    //     setIndex(0)
    //     setSrc(thumbnail)
    // };

    const layers = [...images.map(img => img.path), thumbnail]

    return (

        <HoverSlideshow
            aria-label="My pretty picture slideshow"
            images={layers}
            style={{width: "400px", height: "400px"}}
        />

        // <img
        //     src={src}
        //     alt={name}
        //     className={className}
        //     onMouseLeave={() => images.length > 0 && clearInterval(swipe)}
        //     onMouseEnter={() => images.length > 0 && setSwipe(setInterval(() => index >= images.length ? setter() : increment(), ShopIntervalSwiperTime?.value ?? 2000))}
        // />
    )
}