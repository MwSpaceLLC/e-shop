export const fetcher = (url) => fetch(url).then((res) => res.json());

export const classNames = (...classes) => classes.filter(Boolean).join(' ')