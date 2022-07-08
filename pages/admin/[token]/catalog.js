import {useTranslation} from "next-i18next";
import AdminAuthServerSideProps from "../../../lib/props/AdminAuthServerSideProps";

import {useState} from "react";
import ViewProducts from "../../../components/admin/ViewProducts";
import ViewCategories from "../../../components/admin/ViewCategories";
import AppLayout from "../../../components/AppLayout";
import {classNames} from "../../../lib/function"
import {useRouter} from "next/router";

// This gets called on every request
export const getServerSideProps = AdminAuthServerSideProps

export default function AdminCatalog() {

    const [tab, setTab] = useState(1);

    const router = useRouter()
    const {parentId} = router.query

    const tabs = [
        {name: 'Categorie', current: tab === 1},
        {name: 'Prodotti', current: tab === 2},
    ]

    return (
        <AppLayout title="Catalogo">

            <div>
                <div className="sm:hidden">
                    <label htmlFor="tabs" className="sr-only">
                        Select a tab
                    </label>

                    {/* Use an "onChange" listener to redirect the user to the selected tab URL. */}
                    <select
                        id="tabs"
                        name="tabs"
                        onChange={e => setTab(parseInt(e.target.value))}
                        className="block w-full focus:ring-orange-500 focus:border-orange-500 border-gray-300 rounded-md"
                        defaultValue={tabs.find((tab) => tab.current).name}
                    >
                        {tabs.map((tab, idx) => (
                            <option value={idx + 1} onChangeCapture={tab.onClick} key={tab.name}>{tab.name}</option>
                        ))}
                    </select>
                </div>
                <div className="hidden sm:block">
                    <nav className="flex space-x-4" aria-label="Tabs">
                        {tabs.map((tab, idx) => (
                            <button
                                key={tab.name}
                                onClick={() => setTab(idx + 1)}
                                className={classNames(
                                    tab.current ? 'bg-orange-100 text-orange-700' : 'text-gray-500 hover:text-gray-700',
                                    'px-3 py-2 font-medium text-sm rounded-md'
                                )}
                                aria-current={tab.current ? 'page' : undefined}
                            >
                                {tab.name}
                            </button>
                        ))}
                    </nav>
                </div>
            </div>

            <section>
                {tab === 1 && <ViewCategories parentId={parentId}/>}

                {tab === 2 && <ViewProducts/>}
            </section>

        </AppLayout>
    )
}