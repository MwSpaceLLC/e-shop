import axios from "axios";

export default async function prefetchSsr(url) {
    return {
        menuCategories: (await axios.get(`${url}/api/json/categories?recursive=true&menu=true&orderBy=createdAt`)).data,
        footerCategories: (await axios.get(`${url}/api/json/categories?recursive=true&footer=true&orderBy=createdAt`)).data,
        products: (await axios.get(`${url}/api/json/products?orderBy=createdAt`)).data,
        carts: (await axios.get(`${url}/api/json/carts`)).data,

        ShopSeoIndexTitle: (await axios.get(`${url}/api/json/settings/ShopSeoIndexTitle`)).data,
        ShopSeoIndexDescription: (await axios.get(`${url}/api/json/settings/ShopSeoIndexDescription`)).data,

        ShopName: (await axios.get(`${url}/api/json/settings/ShopName`)).data,
        ShopFavicon: (await axios.get(`${url}/api/json/settings/ShopFavicon`)).data,
        ShopFavicon16: (await axios.get(`${url}/api/json/settings/ShopFavicon16`)).data,
        ShopFavicon32: (await axios.get(`${url}/api/json/settings/ShopFavicon32`)).data,
        ShopAppleTouchIcon: (await axios.get(`${url}/api/json/settings/ShopAppleTouchIcon`)).data,
        ShopWebManifest: (await axios.get(`${url}/api/json/settings/ShopWebManifest`)).data,
        ShopFooterTextColor: (await axios.get(`${url}/api/json/settings/ShopFooterTextColor`)).data,
        ShopFooterBackgroundColor: (await axios.get(`${url}/api/json/settings/ShopFooterBackgroundColor`)).data,
        ShopTopTextColor: (await axios.get(`${url}/api/json/settings/ShopTopTextColor`)).data,

        ShopTopBackgroundColor: (await axios.get(`${url}/api/json/settings/ShopTopBackgroundColor`)).data,
        ShopBackgroundColor: (await axios.get(`${url}/api/json/settings/ShopBackgroundColor`)).data,
        MainBackgroundImage: (await axios.get(`${url}/api/json/sections/MainBackgroundImage`)).data,
    }
}