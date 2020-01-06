@extends("layouts.mail")
@section("content")
    <p>Hi {{ $name }},</p>
    <p>{{ $studio }} has invited to you to subscribe. </p>
@endsection
@section("content-after")
    <tr>
        <td align="center" bgcolor="#f9f9f9" style="padding: 30px 20px 30px 20px; font-family: Arial, sans-serif; border-bottom: 1px solid #f6f6f6;">
            <table bgcolor="#1bbae1" border="0" cellspacing="0" cellpadding="0" class="buttonwrapper">
                <tr>
                    <td align="center" height="50" style=" padding: 0 25px 0 25px; font-family: Arial, sans-serif; font-size: 16px; font-weight: bold;" class="button">
                        <a href="{{ $studioLink }}" style="color: #ffffff; text-align: center; text-decoration: none;">Register</a>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
@endsection
