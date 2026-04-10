<!doctype html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Lab 5 Eloquent ORM')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <style>
        body {
            background: linear-gradient(180deg, #f6f8fb 0%, #eef3f8 100%);
            min-height: 100vh;
        }

        .page-shell {
            max-width: 1100px;
            margin: 0 auto;
            padding: 40px 16px 56px;
        }

        .card-shadow {
            border: 0;
            border-radius: 18px;
            box-shadow: 0 18px 45px rgba(26, 54, 93, 0.08);
        }

        .table img {
            width: 96px;
            height: 60px;
            object-fit: cover;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <main class="page-shell">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 gap-3">
            <div>
                <p class="text-uppercase text-muted fw-bold mb-1">LAB 5 PHP3</p>
                <h1 class="h3 mb-0">Quản lý tin với Eloquent ORM</h1>
            </div>
            <div class="d-flex gap-2">
                <a href="{{ route('tin.index') }}" class="btn btn-outline-dark">Danh sách tin</a>
                <a href="{{ route('tin.create') }}" class="btn btn-warning">Thêm tin</a>
            </div>
        </div>

        @if (session('success'))
            <div class="alert alert-success card-shadow">{{ session('success') }}</div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger card-shadow">
                <strong>Vui lòng kiểm tra lại dữ liệu:</strong>
                <ul class="mb-0 mt-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')
    </main>
</body>
</html>
