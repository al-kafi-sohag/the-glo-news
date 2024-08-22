<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Welcome to Our Platform</title>
    <style>
        /* Inline styles for simplicity, consider using CSS classes for larger templates */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f1f1f1;
        }

        .logo {
            text-align: center;
            margin-bottom: 20px;
        }

        .logo img {
            max-width: 200px;
        }

        .message {
            padding: 20px;
            background-color: #ffffff;
        }

        .message p {
            margin-bottom: 10px;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container">

        <div class="message">
            {{-- <p>Dear {{ $mailData['name'] }},</p> --}}
            <p>Dear Admin,</p>
            <p>We have received a contact request. The details are given below:</p>
            <table class="table table-striped">
                <tr>
                    <th class="text-nowrap">Name</th>
                    <th>:</th>
                    <td>{{ $mailData['name'] }}</td>
                </tr>
                <tr>
                    <th class="text-nowrap">City</th>
                    <th>:</th>
                    <td>{{ $mailData['city'] }}</td>
                </tr>
                <tr>
                    <th class="text-nowrap">Email</th>
                    <th>:</th>
                    <td>{{ $mailData['email'] }}</td>
                </tr>
                <tr>
                    <th class="text-nowrap"  style="vertical-align: top;">Message</th>
                    <th style="vertical-align: top;">:</th>
                    <td>{{ $mailData['message'] }}</td>
                </tr>
            </table>
            <p>Please contact as soon as possible.</p>
            <p>Best regards,</p>
            <p>{{ config('app.name') }}</p>
            <p>This is a software generated email.</p>
        </div>

    </div>
</body>

</html>
