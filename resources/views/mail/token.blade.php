@extends('eshop::mail.theme')

@section('content')
    <div style="background-color:transparent;">
        <div class="block-grid"
             style="Margin: 0 auto; min-width: 320px; max-width: 650px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: #FFFFFF;">
            <div style="border-collapse: collapse;display: table;width: 100%;background-color:#FFFFFF;">
                <!--[if (mso)|(IE)]>
                <table width="100%" cellpadding="0" cellspacing="0" border="0"
                       style="background-color:transparent;">
                    <tr>
                        <td align="center">
                            <table cellpadding="0" cellspacing="0" border="0" style="width:650px">
                                <tr class="layout-full-width" style="background-color:#FFFFFF"><![endif]-->
                <!--[if (mso)|(IE)]>
                <td align="center" width="650"
                    style="background-color:#FFFFFF;width:650px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;"
                    valign="top">
                    <table width="100%" cellpadding="0" cellspacing="0" border="0">
                        <tr>
                            <td style="padding-right: 30px; padding-left: 30px; padding-top:20px; padding-bottom:5px;">
                <![endif]-->
                <div class="col num12"
                     style="min-width: 320px; max-width: 650px; display: table-cell; vertical-align: top; width: 650px;">
                    <div style="width:100% !important;">
                        <!--[if (!mso)&(!IE)]><!-->
                        <div
                            style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:20px; padding-bottom:5px; padding-right: 30px; padding-left: 30px;">
                            <!--<![endif]-->
                            <!--[if mso]>
                            <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                <tr>
                                    <td style="padding-right: 10px; padding-left: 10px; padding-top: 0px; padding-bottom: 0px; font-family: Tahoma, Verdana, sans-serif">
                            <![endif]-->
                            <div
                                style="color:#454562;font-family:'Roboto', Tahoma, Verdana, Segoe, sans-serif;line-height:1.2;padding-top:0px;padding-right:10px;padding-bottom:0px;padding-left:10px;">
                                <div
                                    style="line-height: 1.2; font-family: 'Roboto', Tahoma, Verdana, Segoe, sans-serif; font-size: 12px; color: #454562; mso-line-height-alt: 14px;">
                                    <p style="line-height: 1.2; text-align: center; font-size: 34px; word-break: break-word; font-family: Roboto, Tahoma, Verdana, Segoe, sans-serif; mso-line-height-alt: 41px; margin: 0;">
                                        <span style="font-size: 34px;">@lang('eshop::global.mail.Token')</span></p>
                                </div>
                            </div>
                            <!--[if mso]></td></tr></table><![endif]-->
                            <!--[if mso]>
                            <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                <tr>
                                    <td style="padding-right: 10px; padding-left: 10px; padding-top: 0px; padding-bottom: 15px; font-family: Arial, sans-serif">
                            <![endif]-->
                            <div
                                style="color:#555555;font-family:Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif;line-height:1.5;padding-top:0px;padding-right:10px;padding-bottom:15px;padding-left:10px;">
                                <div
                                    style="font-size: 14px; line-height: 1.5; color: #555555; font-family: Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif; mso-line-height-alt: 21px;">
                                    <p style="font-size: 14px; line-height: 1.5; text-align: center; word-break: break-word; mso-line-height-alt: 21px; margin: 0;">
                                        @lang('eshop::global.mail.TokenText')</p>
                                </div>
                            </div>
                            <!--[if mso]></td></tr></table><![endif]-->
                            <div align="center" class="button-container"
                                 style="padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
                                <!--[if mso]>
                                <table width="100%" cellpadding="0" cellspacing="0" border="0"
                                       style="border-spacing: 0; border-collapse: collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;">
                                    <tr>
                                        <td style="padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px"
                                            align="center">
                                            <v:roundrect xmlns:v="urn:schemas-microsoft-com:vml"
                                                         xmlns:w="urn:schemas-microsoft-com:office:word"
                                                         href="{AUTH TOKEN}"
                                                         style="height:31.5pt; width:223.5pt; v-text-anchor:middle;"
                                                         arcsize="120%" stroke="false" fillcolor="#C059FF">
                                                <w:anchorlock/>
                                                <v:textbox inset="0,0,0,0">
                                                    <center
                                                        style="color:#ffffff; font-family:Arial, sans-serif; font-size:16px">
                                <![endif]--><a href="{{route('eshop-auth-admin',['token' => $admin->payload()->token])}}"
                                               style="-webkit-text-size-adjust: none; text-decoration: none; display: inline-block; color: #ffffff; background-color: #C059FF; border-radius: 50px; -webkit-border-radius: 50px; -moz-border-radius: 50px; width: auto; width: auto; border-top: 1px solid #C059FF; border-right: 1px solid #C059FF; border-bottom: 1px solid #C059FF; border-left: 1px solid #C059FF; padding-top: 5px; padding-bottom: 5px; font-family: Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif; text-align: center; mso-border-alt: none; word-break: keep-all;"
                                               target="_blank"><span
                                        style="padding-left:50px;padding-right:50px;font-size:16px;display:inline-block;"><span
                                            style="font-size: 16px; line-height: 2; word-break: break-word; mso-line-height-alt: 32px;"><strong>AUTH LOGIN</strong></span></span></a>
                                <!--[if mso]></center></v:textbox></v:roundrect></td></tr></table><![endif]-->
                            </div>
                            <!--[if (!mso)&(!IE)]><!-->
                        </div>
                        <!--<![endif]-->
                    </div>
                </div>
                <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
            </div>
        </div>
    </div>
@endsection
