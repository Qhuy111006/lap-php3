<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập - Roselle Beauty</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@500;600;700&family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --rose-main: #c9806a;
            --rose-dark: #6f4337;
            --rose-muted: #8f6d63;
            --line: rgba(174, 116, 97, 0.16);
        }

        body {
            min-height: 100vh;
            margin: 0;
            font-family: "Manrope", Arial, sans-serif;
            color: var(--rose-dark);
            background:
                radial-gradient(circle at top left, rgba(245, 209, 198, 0.92), transparent 30%),
                radial-gradient(circle at bottom right, rgba(224, 176, 158, 0.55), transparent 26%),
                linear-gradient(135deg, #fffaf7 0%, #fff1ea 100%);
        }

        h1, h2 {
            font-family: "Cormorant Garamond", Georgia, serif;
        }

        .auth-shell {
            border-radius: 34px;
            overflow: hidden;
            border: 1px solid var(--line);
            box-shadow: 0 32px 84px rgba(134, 82, 67, 0.16);
            background: rgba(255, 250, 247, 0.92);
        }

        .showcase {
            position: relative;
            padding: 3rem;
            min-height: 100%;
            background:
                radial-gradient(circle at top right, rgba(255,255,255,.92), transparent 42%),
                linear-gradient(160deg, #f1d1c6, #cb856f);
            color: #fff9f7;
        }

        .showcase::after {
            content: "";
            position: absolute;
            right: -50px;
            bottom: -60px;
            width: 220px;
            height: 220px;
            border-radius: 50%;
            background: rgba(255,255,255,0.18);
        }

        .showcase-copy {
            max-width: 24rem;
            color: rgba(255, 249, 247, 0.88);
            line-height: 1.8;
        }

        .auth-panel {
            padding: 2.6rem;
        }

        .soft-pill {
            display: inline-flex;
            align-items: center;
            gap: .55rem;
            padding: .65rem .95rem;
            border-radius: 999px;
            background: rgba(255,255,255,0.18);
            border: 1px solid rgba(255,255,255,0.28);
            font-size: .86rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: .08em;
        }

        .btn-blush {
            border: none;
            color: white;
            background: linear-gradient(135deg, #cb7f69, #a95c49);
            box-shadow: 0 16px 32px rgba(169, 92, 73, 0.22);
        }

        .btn-blush:hover {
            color: white;
            background: linear-gradient(135deg, #bb715c, #96503f);
        }

        .form-control,
        .form-control:focus {
            border-color: rgba(169, 92, 73, 0.22);
            box-shadow: none;
        }

        @media (max-width: 991.98px) {
            .showcase {
                min-height: auto;
            }
        }
    </style>
</head>
<body class="d-flex align-items-center">
    <main class="container py-5">
        <section class="auth-shell">
            <div class="row g-0">
                <div class="col-lg-5 d-none d-lg-block">
                    <div class="showcase h-100 d-flex flex-column justify-content-between">
                        <div>
                            <span class="soft-pill">Roselle Beauty</span>
                            <h1 class="display-4 mt-4 mb-3">Đăng nhập để tiếp tục.</h1>
                            <p class="showcase-copy mb-0">
                                Xem sản phẩm và vào quản trị trong giao diện gọn, sáng.
                            </p>
                        </div>

                        <div>
                            <div class="fw-semibold mb-2">Điểm nhấn</div>
                            <div class="showcase-copy">Gọn, đẹp và dễ xem.</div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-7">
                    <div class="auth-panel">
                        <div class="mb-4">
                            <x-brand-logo text="Roselle Beauty" caption="Đăng nhập để xem chi tiết" />
                        </div>

                        <div class="mb-4">
                            <h2 class="display-6 mb-2">Chào mừng trở lại</h2>
                            <p class="text-secondary mb-0">Đăng nhập để xem chi tiết sản phẩm hoặc vào quản trị.</p>
                        </div>

                        @include('partials.flash')

                        @if ($errors->any())
                            <div class="alert alert-danger rounded-4">
                                {{ $errors->first() }}
                            </div>
                        @endif

                        <form action="{{ route('login') }}" method="POST" class="d-grid gap-3">
                            @csrf

                            <div>
                                <label for="email" class="form-label fw-semibold">Email</label>
                                <input type="email" name="email" id="email" class="form-control form-control-lg rounded-4" value="{{ old('email') }}" autocomplete="email" required>
                            </div>

                            <div>
                                <label for="password" class="form-label fw-semibold">Mật khẩu</label>
                                <input type="password" name="password" id="password" class="form-control form-control-lg rounded-4" autocomplete="current-password" required>
                            </div>

                            <button type="submit" class="btn btn-blush btn-lg rounded-pill mt-2">Đăng nhập</button>
                        </form>

                        <div class="text-center mt-4">
                            <a href="{{ route('client.product.index') }}" class="text-decoration-none" style="color: #8f6d63;">Quay lại trang chủ</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>
</html>
