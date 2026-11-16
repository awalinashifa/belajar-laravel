
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Manajemen Produk')</title>

    <style>
        
        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background: #fff5f8;
            margin: 0;
            color: #51404a;
        }

        .navbar {
            background: linear-gradient(135deg, #ec8eae, #d96b98);
            padding: 20px 40px;
            box-shadow: 0 3px 12px rgba(180, 80, 120, 0.15);
        }

        .navbar a {
            color: white;
            text-decoration: none;
            font-weight: bold;
            font-size: 20px;
        }

        .container {
            max-width: 1100px;
            margin: 40px auto;
            padding: 30px;
            background: white;
            border-radius: 16px;
            box-shadow: 0 5px 25px rgba(180, 80, 120, 0.08);
        }

        h1 {
            color: #b94f7b;
            margin-top: 0;
        }

        p {
            color: #88717c;
        }

        .success {
            background: #fce7f0;
            color: #a33c68;
            padding: 14px 18px;
            border-radius: 9px;
            margin-bottom: 20px;
        }

        .btn {
            display: inline-block;
            padding: 10px 16px;
            border-radius: 8px;
            text-decoration: none;
            border: none;
            cursor: pointer;
            font-size: 14px;
            font-weight: 600;
            transition: 0.2s;
        }

        .btn-primary {
            background: #d96b98;
            color: white;
        }

        .btn-primary:hover {
            background: #bd507e;
        }

        .btn-warning {
            background: #f3b45f;
            color: white;
        }

        .btn-danger {
            background: #e36b7d;
            color: white;
        }

        .btn:hover {
            opacity: 0.85;
            transform: translateY(-1px);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            margin-top: 22px;
            border-radius: 10px;
            overflow: hidden;
        }

        th, td {
            padding: 15px;
            border-bottom: 1px solid #f4e4eb;
            text-align: left;
        }

        th {
            background: #fce7f0;
            color: #a33c68;
        }

        tr:hover td {
            background: #fff8fb;
        }

        input, select {
            width: 100%;
            padding: 12px;
            margin-top: 6px;
            border: 1px solid #e8c6d5;
            border-radius: 8px;
            outline: none;
            font-size: 16px;
            color: #51404a;
        }

        input::placeholder {
            font-size: 14px;
            color: #b5a4ac;
        }

        .form-group label {
            font-size: 16px;
            font-weight: 500;
        }

        input:focus, select:focus {
            border-color: #d96b98;
            box-shadow: 0 0 0 3px #fce7f0;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .error {
            color: #d94365;
            font-size: 13px;
            margin-top: 5px;
        }

        .container nav[role="navigation"] {
            background: transparent;
            color: #51404a;
            padding: 15px 0;
            box-shadow: none;
        }

        .container nav[role="navigation"] a {
            color: #bd507e;
            font-size: 14px;
        }

        /* Memperbaiki ukuran ikon pagination */
        svg {
            width: 18px !important;
            height: 18px !important;
            display: inline-block;
        }

        /* Tampilan pagination */
        .container nav[role="navigation"] {
            background: transparent;
            color: #51404a;
            padding: 15px 0;
            box-shadow: none;
        }

        .container nav[role="navigation"] a,
        .container nav[role="navigation"] span {
            font-size: 14px;
        }

        /* Dropdown kategori */
        select {
            font-size: 16px;
            color: #51404a;
            background: #fffafd;
            cursor: pointer;
        }

        select option {
            font-size: 16px;
            padding: 10px;
        }

        /* Tombol kembali */
        .btn-secondary {
            background: #fce7f0;
            color: #b94f7b;
            margin-left: 8px;
        }

        .btn-secondary:hover {
            background: #f5d2e1;
            color: #963b66;
        }

    </style>
</head>
<body>

    <nav class="navbar">
        <a href="{{ route('produk.index') }}">Manajemen Produk</a>
    </nav>

    <div class="container">

        @if(session('success'))
            <div class="success">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')

    </div>

</body>
</html>
