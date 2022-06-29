import '../styles/globals.css'
import {appWithTranslation} from 'next-i18next';

const VatMaster = ({Component, pageProps}) => <Component {...pageProps} />;

export default appWithTranslation(VatMaster);