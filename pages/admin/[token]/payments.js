import AppLayout from "../../../components/admin/AppLayout";
import {useTranslation} from "next-i18next";
import AdminAuthServerSideProps from "../../../lib/props/AdminAuthServerSideProps";

// This gets called on every request
export const getServerSideProps = AdminAuthServerSideProps

export default function AdminPayment() {

    const {t} = useTranslation();

    return (
        <AppLayout title="Pagamenti">
            <section>
                Pagamenti
            </section>
        </AppLayout>
    )
}