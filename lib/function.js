import slugify from "slugify";

export const classNames = (...classes) => classes.filter(Boolean).join(' ');

export const fetcher = (url) => fetch(url).then((res) => res.json());

export const slugProduct = (product) => '/search/' + slugify(product.id + '-' + product.name).toLowerCase()

export const slugCategory = (category) => '/search/' + slugify(category.id + '-' + category.name).toLowerCase()

export const slugCategoryProduct = (product) => '/search/' + product.categories.map((category) => slugify(category.id + '-' + category.name)).join('_').toLowerCase() + '/' + slugify(product.id + '-' + product.name).toLowerCase()