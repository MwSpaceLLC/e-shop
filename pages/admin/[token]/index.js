import AppLayout from "../../../components/AppLayout";
import {useTranslation} from "next-i18next";
import AdminAuthServerSideProps from "../../../lib/props/AdminAuthServerSideProps";

// This gets called on every request
export const getServerSideProps = AdminAuthServerSideProps

export default function AdminIndex() {

    const {t} = useTranslation();

    return (
        <AppLayout title="Dashboard">
            <section>
                Dashboard
            </section>
        </AppLayout>
    )
}