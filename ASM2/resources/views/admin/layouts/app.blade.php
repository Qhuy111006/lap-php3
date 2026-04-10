<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@500;600;700&family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        :root {
            --rose-main: #c9806a;
            --rose-dark: #6f4337;
            --rose-muted: #8f6d63;
            --rose-soft: #f6e3da;
            --rose-bg: rgba(255, 250, 247, 0.92);
            --line: rgba(174, 116, 97, 0.16);
            --shadow: 0 28px 70px rgba(134, 82, 67, 0.12);
        }

        body {
            min-height: 100vh;
            margin: 0;
            font-family: "Manrope", Arial, sans-serif;
            color: var(--rose-dark);
            background:
                radial-gradient(circle at top left, rgba(245, 209, 198, 0.75), transparent 28%),
                radial-gradient(circle at bottom right, rgba(224, 176, 158, 0.48), transparent 22%),
                linear-gradient(180deg, #fffaf7 0%, #fff4ee 58%, #fffaf7 100%);
        }

        h1, h2, h3, .brand-heading {
            font-family: "Cormorant Garamond", Georgia, serif;
        }

        .admin-shell,
        .content-card,
        .summary-card {
            background: var(--rose-bg);
            border: 1px solid var(--line);
            border-radius: 30px;
            box-shadow: var(--shadow);
        }

        .summary-card {
            padding: 1rem 1.05rem;
        }

        .summary-card .small {
            color: var(--rose-muted);
        }

        .admin-nav .btn {
            border-radius: 999px;
        }

        .btn-primary {
            border: none;
            background: linear-gradient(135deg, #cb7f69, #a95c49);
            box-shadow: 0 16px 32px rgba(169, 92, 73, 0.22);
        }

        .btn-primary:hover,
        .btn-primary:focus {
            background: linear-gradient(135deg, #bb715c, #96503f);
        }

        .btn-outline-primary {
            border-color: rgba(169, 92, 73, 0.24);
            color: var(--rose-dark);
        }

        .btn-outline-primary:hover,
        .btn-outline-primary:focus {
            border-color: rgba(169, 92, 73, 0.28);
            background: var(--rose-soft);
            color: #8f4f3f;
        }

        .btn-outline-secondary {
            border-color: rgba(169, 92, 73, 0.16);
            color: var(--rose-muted);
        }

        .btn-outline-secondary:hover,
        .btn-outline-secondary:focus {
            border-color: rgba(169, 92, 73, 0.24);
            background: rgba(255,255,255,0.76);
            color: var(--rose-dark);
        }

        .btn-dark {
            border: none;
            background: #6f4337;
        }

        .table {
            --bs-table-bg: transparent;
            --bs-table-color: var(--rose-dark);
            --bs-table-border-color: rgba(174, 116, 97, 0.12);
        }

        .table thead th {
            color: var(--rose-muted);
            font-size: .88rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: .05em;
            padding-bottom: 1rem;
        }

        .table tbody tr {
            vertical-align: middle;
        }

        .table tbody tr:hover {
            background: rgba(246, 227, 218, 0.24);
        }

        .form-control,
        .form-select,
        .form-control:focus,
        .form-select:focus {
            border-color: rgba(169, 92, 73, 0.22);
            box-shadow: none;
        }

        .badge-soft {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: .45rem .82rem;
            border-radius: 999px;
            background: rgba(246, 227, 218, 0.92);
            color: #9d5a48;
            font-weight: 700;
            font-size: .82rem;
        }

        .section-copy {
            color: var(--rose-muted);
        }

        .pagination {
            --bs-pagination-color: var(--rose-dark);
            --bs-pagination-border-color: rgba(169, 92, 73, 0.16);
            --bs-pagination-active-bg: #b96c59;
            --bs-pagination-active-border-color: #b96c59;
            --bs-pagination-hover-color: var(--rose-dark);
            --bs-pagination-hover-bg: #f6e3da;
            --bs-pagination-hover-border-color: rgba(169, 92, 73, 0.22);
        }
    </style>
</head>
<body>
    <div class="container py-4 py-lg-5">
        <header class="admin-shell p-3 p-lg-4 mb-4">
            <div class="d-flex flex-column gap-4 flex-xl-row align-items-xl-center justify-content-xl-between">
                <div class="d-flex flex-column gap-3">
                    <a href="{{ route('products.index') }}" class="text-decoration-none">
                        <x-brand-logo text="Roselle Beauty Admin" caption="Quản trị sản phẩm và danh mục" />
                    </a>

                    <nav class="admin-nav d-flex flex-wrap gap-2">
                        <a href="{{ route('categories.index') }}" class="btn btn-outline-primary px-4">Danh mục</a>
                        <a href="{{ route('products.index') }}" class="btn btn-outline-primary px-4">Sản phẩm</a>
                        <a href="{{ route('client.product.index') }}" class="btn btn-outline-secondary px-4">Xem cửa hàng</a>
                    </nav>
                </div>

                <div class="d-flex flex-column flex-md-row gap-3 align-items-md-center">
                    <div class="summary-card">
                        <div class="small mb-1">Đang quản lý</div>
                        <div class="fw-semibold">{{ auth()->user()->name }}</div>
                    </div>

                    <form action="{{ route('logout') }}" method="POST" class="m-0">
                        @csrf
                        <button type="submit" class="btn btn-dark rounded-pill px-4">Đăng xuất</button>
                    </form>
                </div>
            </div>
        </header>

        <main class="content-card p-4 p-lg-5">
            @include('partials.flash')
            @yield('content')
        </main>
    </div>
</body>
</html>
