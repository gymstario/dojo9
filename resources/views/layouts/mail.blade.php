<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>{{ env('APP_NAME', 'Dojo9') }}!</title>
    <meta name="viewport" content="width=device-width" />
    <style type="text/css">
        @media only screen and (max-width: 550px), screen and (max-device-width: 550px) {
            body[yahoo] .buttonwrapper { background-color: transparent !important; }
            body[yahoo] .button { padding: 0 !important; }
            body[yahoo] .button a { background-color: #1bbae1; padding: 15px 25px !important; }
        }

        @media only screen and (min-device-width: 601px) {
            .content { width: 600px !important; }
            .col387 { width: 387px !important; }
        }
    </style>
</head>
<body bgcolor="#394263" style="margin: 0; padding: 0;" yahoo="fix">
<!--[if (gte mso 9)|(IE)]>
<table width="600" align="center" cellpadding="0" cellspacing="0" border="0">
    <tr>
        <td>
<![endif]-->
<table align="center" border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse; width: 100%; max-width: 600px;" class="content">
    <tr>
        <td style="padding: 15px 10px 15px 10px;">
            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                <tr>
                    <td>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td align="center" bgcolor="#1bbae1" style="padding: 20px 20px 20px 20px; color: #ffffff; font-family: Tahoma, Geneva, sans-serif; font-size: 36px; font-weight: bold;">
        <h2 style="font-size: 24px; font-family: Tahoma, Geneva, sans-serif; color: #ffffff;">{{ env('APP_NAME', 'Dojo9') }}</h2>
        </td>
    </tr>
    <tr>
        <td align="left" bgcolor="#ffffff" style="padding: 40px 20px 40px 20px; color: #555555; font-family: Tahoma, Geneva, sans-serif; font-size: 20px; line-height: 30px; border-bottom: 1px solid #f6f6f6;">
            @yield("content")
        </td>
    </tr>
    @yield("content-after")
    <tr>
        <td align="center" bgcolor="#dddddd" style="padding: 15px 10px 15px 10px; color: #555555; font-family: Tahoma, Geneva, sans-serif; font-size: 12px; line-height: 18px;">
            <b>{{ env('APP_NAME', 'Dojo9') }}.</b><br/>xyz Address TX 78665 USA
        </td>
    </tr>
    <tr>
        <td style="padding: 15px 10px 15px 10px;">
            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                <tr>
                    <td align="center" width="100%" style="color: #999999; font-family: Tahoma, Geneva, sans-serif; font-size: 12px;">
                        {{ date("Y") }} &copy; <a href="http://dojo9.com" style="color: #1bbae1;">{{ env('APP_NAME', 'Dojo9') }}</a>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
<!--[if (gte mso 9)|(IE)]>
</td>
</tr>
</table>
<![endif]-->
</body>
</html>
