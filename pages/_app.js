import '../styles/globals.css'

import {appWithTranslation} from 'next-i18next';

export default appWithTranslation(({Component, pageProps}) => {
    return (
        <Component {...pageProps} />
    )
});