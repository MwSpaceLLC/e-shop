import AppLayout from "../../../components/admin/AppLayout";
import {useTranslation} from "next-i18next";
import AdminAuthServerSideProps from "../../../lib/props/AdminAuthServerSideProps";

// This gets called on every request
export const getServerSideProps = AdminAuthServerSideProps

export default function AdminShipments() {

    const {t} = useTranslation();

    return (
        <AppLayout title="Spedizioni">
            <section>
                Spedizioni
            </section>
        </AppLayout>
    )
}