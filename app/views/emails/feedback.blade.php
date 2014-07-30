<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title></title>

    <style>
        body {
            margin: 0;
            padding: 0;
        }

        body, h1, h2, h3, p, a {
            font-family: Helvetica, Arial, 'sans-serif';
        }
    </style>
</head>

<body style="margin:0;padding:0;" bgcolor="#ffffff">

<table cellpadding="0" cellspacing="0" border="0" width="100%" align="center">
    <tr>
        <td align="center">
            <table cellpadding="0" cellspacing="0" border="0" width="600" height="300" bgcolor="#fff">
                <tbody>
                <tr>
                    <td>
                        <table cellpadding="5" cellspacing="0">
                            <tr>
                                <td>
                                    <h1>Feedback</h1>

                                    <p>Sändare: {{ $email }}</p>

                                    <h2>Meddelande</h2>

                                    <p>{{ $message_text }}</p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                </tbody>
                <tfoot>
                <tr>
                    <td>
                        <p>
                            Avsändare var {{ $email }}
                        </p>
                    </td>
                </tr>
                </tfoot>
            </table>
        </td>
    </tr>
</table>
</body>
</html>