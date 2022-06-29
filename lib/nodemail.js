require('dotenv').config()

const nodemailer = require('nodemailer')

const transporter = nodemailer.createTransport({
    port: process.env.MAIL_PORT,
    host: process.env.MAIL_HOST,
    auth: {
        user: process.env.MAIL_USERNAME,
        pass: process.env.MAIL_PASSWORD,
    },
    secure: process.env.MAIL_SECURE.toLowerCase() === 'true',
})

export default function nodemail(to, subject, html, callback) {

    html = "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Strict//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\">\n" +
        "<html xmlns=\"http://www.w3.org/1999/xhtml\">\n" +
        "  <head>\n" +
        "    <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />\n" +
        "    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\"/>\n" +
        "   <style>\n" +
        "       @import url('https://fonts.googleapis.com/css2?family=Nunito:wght@200;300&display=swap');\n" +
        "       p {font-family: 'Nunito', sans-serif; }" +
        "   </style>" +
        "  </head>\n" +
        "  <body>\n" +
        html + "\n" +
        "  </body>\n" +
        "</html>"

    return transporter.sendMail({
        from: process.env.MAIL_FROM_ADDRESS,
        to: to,
        subject: subject,
        text: html.replace(/<[^>]*>?/gm, ' '),
        html: html
    }, callback)
}