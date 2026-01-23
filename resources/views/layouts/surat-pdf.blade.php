<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>

    <style>
        body {
            font-family: "Times New Roman", serif;
            font-size: 12pt;
        }
        .kop {
            width: 100%;
            border-bottom: 3px solid black;
            padding-bottom: 10px;
            margin-bottom: 10px;
        }
        .kop-table { width: 100%; }
        .kop-logo { width: 80px; }
        .kop-text { text-align: center; }
        .kop-text h1 { font-size: 16pt; margin: 0; font-size: 16pt; font-weight: bold;}
        .kop-text h2 { font-size: 14pt; margin: 0; }
        .kop-text p { font-size: 10pt; margin-top: 5px; }
        .judul { text-align: center; margin: 20px 0 10px; }
        .judul h3 { text-decoration: underline; margin-bottom: 5px; }
        .isi { margin-top: 20px; text-align: justify; }
        .ttd { width: 100%; margin-top: 40px; }
        .ttd-kanan { width: 40%; float: right; text-align: center; }
    </style>
</head>
<body>

    @yield('content')

</body>
</html>
