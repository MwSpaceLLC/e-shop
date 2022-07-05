import Link from "next/link";
import {fetcher, slugCategory} from "../lib/function";
import useSWR from "swr";
import {useRouter} from "next/router";

export default function SideCategoriesNested({categoryId}) {

    const router = useRouter()
    const {data: categories} = useSWR(`/api/json/categories?recursive=true`, fetcher)

    const CategoryItem = ({item}) => (
        <li key={item.id}>
            <Link href={slugCategory(item)} className="items-center">
                <a className="cursor-default">
                    <input
                        onChange={() => router.push(slugCategory(item))}
                        checked={parseInt(item.id) === parseInt(categoryId)}
                        name={`${item.id}[]`}
                        type="checkbox"
                        className="h-4 w-4 border-gray-300 rounded-full text-orange-600 focus:ring-orange-500"
                    />
                    <label htmlFor={item.id} className="ml-3 text-sm text-gray-600">
                        {item.name}
                    </label>
                </a>
            </Link>
        </li>
    )

    const CategoryReflection = ({items}) => (
        <ul className="space-y-3">
            {items?.map((item, idx) => item.children.length > 0 ? (
                <>
                    <CategoryItem key={idx} item={item}/>
                    <div className="ml-2">
                        <CategoryReflection items={item.children}/>
                    </div>
                </>
            ) : (
                <CategoryItem key={idx} item={item}/>
            ))}
        </ul>
    )
    return (
        <CategoryReflection items={categories}/>
    )
}