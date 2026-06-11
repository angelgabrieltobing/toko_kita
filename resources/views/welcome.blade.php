<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Laravel</title>
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', Tahoma, sans-serif;
            background: linear-gradient(135deg, #667eea, #4ba29b);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .card {
            background: #ffffff;
            padding: 40px;
            border-radius: 15px;
            text-align: center;
            width: 350px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
            animation: fadeIn 0.8s ease-in-out;
        }

        h1 {
            margin-bottom: 10px;
            color: #333;
        }

        h2 {
            margin: 0;
            font-size: 16px;
            color: #777;
        }

        .info {
            margin-top: 20px;
            text-align: left;
        }

        .info p {
            margin: 8px 0;
            font-size: 15px;
            color: #444;
        }

        .label {
            font-weight: bold;
            color: #555;
        }

        .footer {
            margin-top: 20px;
            font-size: 13px;
            color: #888;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>

<div class="card">
    <h1>Selamat Datang</h1>
    <h2>UNIVERSITAS METHODIST INDONESIA</h2>

    <div class="info">
        <p><span class="label">Nama:</span> Angel Gabriel Tobing</p>
        <p><span class="label">NPM:</span> 224520005</p>
        <p><span class="label">Aplikasi:</span> Laravel 12</p>
    </div>

    <div class="footer">
        © 2026 - Tugas Pemrograman Web
    </div>
</div>

</body>
</html>