import '../styles/globals.css'

export default function ConfirmCode({name, email, password, random}, borderCollapse = 'collapse') {
    return (
        <table width="100%" valign="top" align="center" style={{borderCollapse: 'collapse'}}>
            <tbody>

            <tr>
                <td width="100%" valign="top" align="center" style={{borderCollapse: 'collapse'}}>
                    <table width="100%" valign="top" align="center" style={{borderCollapse: 'collapse'}}>
                        <tr><p>Ciao {name}</p></tr>
                        <tr>
                            <p>Il codice per confermare la tua identità è: <b>{random}</b></p>
                        </tr>
                    </table>
                </td>
            </tr>
            </tbody>
        </table>
    )
}