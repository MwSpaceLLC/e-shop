import BodyEmail from "../components/BodyEmail";

export default function ConfirmCodeMail({email, random}) {
    return (
        <BodyEmail>
            <tr>
                <td className="content-cell" style={{
                    boxSizing: 'border-box',
                    fontFamily: '-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol"',
                    position: 'relative',
                    maxWidth: '100vw',
                    padding: '32px'
                }}>
                    <h1 style={{
                        boxSizing: 'border-box',
                        fontFamily: '-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol"',
                        position: 'relative',
                        color: '#3d4852',
                        fontSize: '18px',
                        fontWeight: 'bold',
                        marginTop: 0,
                        textAlign: 'left'
                    }}>Codice per: {email}</h1>
                    <p style={{
                        boxSizing: 'border-box',
                        fontFamily: '-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol"',
                        position: 'relative',
                        fontSize: '16px',
                        lineHeight: '1.5em',
                        marginTop: 0,
                        textAlign: 'left'
                    }}>Ecco il tuo codice di conferma:</p>
                    <table className="action" align="center" width="100%" cellPadding={0}
                           cellSpacing={0} role="presentation" style={{
                        boxSizing: 'border-box',
                        fontFamily: '-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol"',
                        position: 'relative',
                        PremailerCellpadding: 0,
                        PremailerCellspacing: 0,
                        PremailerWidth: '100%',
                        margin: '30px auto',
                        padding: 0,
                        textAlign: 'center',
                        width: '100%'
                    }}>
                        <tbody>
                        <tr>
                            <td align="center" style={{
                                boxSizing: 'border-box',
                                fontFamily: '-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol"',
                                position: 'relative'
                            }}>
                                <table width="100%" border={0} cellPadding={0} cellSpacing={0}
                                       role="presentation" style={{
                                    boxSizing: 'border-box',
                                    fontFamily: '-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol"',
                                    position: 'relative'
                                }}>
                                    <tbody>
                                    <tr>
                                        <td align="center" style={{
                                            boxSizing: 'border-box',
                                            fontFamily: '-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol"',
                                            position: 'relative'
                                        }}>
                                            <table border={0} cellPadding={0} cellSpacing={0}
                                                   role="presentation" style={{
                                                boxSizing: 'border-box',
                                                fontFamily: '-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol"',
                                                position: 'relative'
                                            }}>
                                                <tbody>
                                                <tr>
                                                    <td style={{
                                                        boxSizing: 'border-box',
                                                        fontFamily: '-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol"',
                                                        position: 'relative'
                                                    }}>
                                                        <pre
                                                            className="button button-primary"
                                                            style={{
                                                                boxSizing: 'border-box',
                                                                fontFamily: '-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol"',
                                                                position: 'relative',
                                                                WebkitTextSizeAdjust: 'none',
                                                                color: '#fff',
                                                                display: 'inline-block',
                                                                overflow: 'hidden',
                                                                textDecoration: 'none',

                                                                padding: 12,
                                                                borderRadius: '15px',
                                                                backgroundColor: '#ff9800',
                                                            }}>{random}</pre>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        </tbody>
                    </table>

                </td>
            </tr>
        </BodyEmail>
    )
}