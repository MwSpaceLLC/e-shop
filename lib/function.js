import slugify from "slugify";

export const fetcher = (url) => fetch(url).then((res) => res.json());

export const classNames = (...classes) => classes.filter(Boolean).join(' ')

export const slugCategory = (category) => '/' + slugify(category.id + '-' + category.name).toLowerCase()

export const slugProduct = (product) => '/' + slugify(product.id + '-' + product.name).toLowerCase()

export const slugCategoryProduct = (category,product) => '/' + slugCategory(category) + '/' + slugProduct(product)