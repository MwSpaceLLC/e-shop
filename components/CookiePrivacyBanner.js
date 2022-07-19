import Link from "next/link";

export const CookiePrivacyBanner = ({intro}) => (
    <p>{intro} dichiari di aver letto e accetti le nostre <Link href="/terms">
        <a className="text-shop">Condizioni generali di uso e vendita</a></Link>.
        Prendi visione della nostra <Link href="/privacy">
            <a className="text-shop">Informativa sulla privacy</a></Link>, della nostra
        <Link href="/cookies"><a className="text-shop">Informativa sui Cookie</a></Link> e della
        nostra <Link href="/advertising"><a className="text-shop">Informativa sulla Pubblicità</a></Link> definita in
        base agli interessi.
    </p>
)