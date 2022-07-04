import slugify from "slugify";

export const classNames = (...classes) => classes.filter(Boolean).join(' ');

export const fetcher = (url) => fetch(url).then((res) => res.json());

export const slugProduct = (product) => '/' + slugify(product.id + '-' + product.name).toLowerCase()

export const slugCategory = (category) => '/' + slugify(category.id + '-' + category.name).toLowerCase()

export const slugCategoryProduct = (product) => '/' + product.categories.map((category) => slugify(category.id + '-' + category.name)).join('_').toLowerCase() + '/' + slugify(product.id + '-' + product.name).toLowerCase()