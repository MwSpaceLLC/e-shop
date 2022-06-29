import AppLayout from "../../../components/AppLayout";
import {useTranslation} from "next-i18next";
import AdminAuthServerSideProps from "../../../lib/props/AdminAuthServerSideProps";

// This gets called on every request
export const getServerSideProps = AdminAuthServerSideProps

export default function AdminSales() {

    const {t} = useTranslation();

    return (
        <AppLayout title="Vendite">
            <section>
                Vendite
            </section>
        </AppLayout>
    )
}