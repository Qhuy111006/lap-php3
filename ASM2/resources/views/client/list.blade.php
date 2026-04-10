<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Roselle Beauty - Mỹ phẩm chính hãng</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@500;600;700&family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --rose-cream: #fff7f3;
            --rose-soft: #f6e3da;
            --rose-card: rgba(255, 250, 247, 0.92);
            --rose-main: #c9806a;
            --rose-dark: #6f4337;
            --rose-muted: #8f6d63;
            --line: rgba(174, 116, 97, 0.16);
            --shadow: 0 28px 70px rgba(134, 82, 67, 0.12);
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: "Manrope", Arial, sans-serif;
            color: var(--rose-dark);
            background:
                radial-gradient(circle at top left, rgba(245, 209, 198, 0.8), transparent 28%),
                radial-gradient(circle at top right, rgba(229, 183, 165, 0.55), transparent 22%),
                linear-gradient(180deg, #fffaf7 0%, #fff4ee 54%, #fffaf7 100%);
        }

        h1, h2, h3, .brand-heading {
            font-family: "Cormorant Garamond", Georgia, serif;
        }

        .topbar,
        .hero-shell,
        .filter-card,
        .story-card,
        .product-card,
        .empty-card {
            background: var(--rose-card);
            border: 1px solid var(--line);
            box-shadow: var(--shadow);
        }

        .topbar {
            position: sticky;
            top: 0;
            z-index: 30;
            backdrop-filter: blur(18px);
            background: rgba(255, 248, 244, 0.88);
            border-bottom: 1px solid var(--line);
        }

        .hero-shell,
        .filter-card,
        .story-card,
        .product-card,
        .empty-card {
            border-radius: 30px;
        }

        .hero-shell {
            overflow: hidden;
            position: relative;
        }

        .hero-shell::before,
        .hero-shell::after {
            content: "";
            position: absolute;
            border-radius: 999px;
            pointer-events: none;
        }

        .hero-shell::before {
            width: 260px;
            height: 260px;
            right: -60px;
            top: -80px;
            background: rgba(214, 143, 122, 0.18);
        }

        .hero-shell::after {
            width: 180px;
            height: 180px;
            left: -40px;
            bottom: -70px;
            background: rgba(245, 218, 208, 0.7);
        }

        .kicker {
            display: inline-flex;
            align-items: center;
            gap: .55rem;
            padding: .7rem 1rem;
            border-radius: 999px;
            background: rgba(255, 255, 255, 0.74);
            border: 1px solid rgba(201, 128, 106, 0.2);
            font-size: .88rem;
            font-weight: 700;
            letter-spacing: .08em;
            text-transform: uppercase;
            color: var(--rose-main);
        }

        .hero-title {
            font-size: clamp(2rem, 3.8vw, 3.6rem);
            line-height: .92;
            letter-spacing: .02em;
        }

        .hero-copy {
            max-width: 48rem;
            color: var(--rose-muted);
            font-size: 1rem;
            line-height: 1.8;
        }

        .pill-card {
            border-radius: 24px;
            background: rgba(255, 255, 255, 0.74);
            border: 1px solid rgba(201, 128, 106, 0.16);
            padding: 1rem 1.05rem;
        }

        .story-card {
            padding: 1.3rem 1.35rem;
            position: relative;
            overflow: hidden;
            min-height: 286px;
        }

        .story-card::after {
            content: "";
            position: absolute;
            inset: auto -36px -46px auto;
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background: rgba(201, 128, 106, 0.08);
        }

        .story-carousel {
            position: relative;
            z-index: 1;
        }

        .story-slide {
            display: grid;
            grid-template-columns: minmax(180px, 220px) 1fr;
            gap: 1.25rem;
            align-items: center;
        }

        .story-media {
            height: 220px;
            padding: .8rem;
            border-radius: 24px;
            background:
                radial-gradient(circle at top right, rgba(255,255,255,.96), transparent 42%),
                linear-gradient(145deg, #f7d9ce, #f4ebe6);
            border: 1px solid rgba(201, 128, 106, 0.16);
        }

        .story-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 18px;
            border: 1px solid rgba(201, 128, 106, 0.14);
        }

        .story-placeholder {
            width: 100%;
            height: 100%;
            border-radius: 18px;
            border: 1px dashed rgba(201, 128, 106, 0.3);
            background: rgba(255, 252, 250, 0.78);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: var(--rose-dark);
            padding: 1rem;
        }

        .story-heading {
            font-size: clamp(1.75rem, 2.4vw, 2.55rem);
            line-height: .95;
        }

        .story-copy {
            color: var(--rose-muted);
            line-height: 1.6;
            max-width: 28rem;
        }

        .story-price {
            font-size: 1.45rem;
            font-weight: 800;
            color: var(--rose-dark);
        }

        .story-footer {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
        }

        .story-controls {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            margin-top: 1.2rem;
        }

        .story-indicators {
            position: static;
            margin: 0;
            justify-content: flex-start;
            gap: .45rem;
        }

        .story-indicators [data-bs-target] {
            width: 10px;
            height: 10px;
            margin: 0;
            border: none;
            border-radius: 999px;
            background: rgba(201, 128, 106, 0.28);
            opacity: 1;
        }

        .story-indicators .active {
            width: 28px;
            background: linear-gradient(135deg, #cb7f69, #a95c49);
        }

        .story-nav {
            display: flex;
            gap: .55rem;
        }

        .story-control {
            position: static;
            width: 44px;
            height: 44px;
            border: 1px solid rgba(169, 92, 73, 0.18);
            border-radius: 50%;
            background: rgba(255,255,255,0.82);
            opacity: 1;
        }

        .story-control-icon {
            font-size: 1.35rem;
            line-height: 1;
            color: var(--rose-dark);
        }

        .filter-card {
            position: sticky;
            top: 112px;
            padding: 1.35rem;
        }

        .category-link {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            padding: .95rem 1rem;
            text-decoration: none;
            color: var(--rose-dark);
            border-radius: 18px;
            border: 1px solid transparent;
            transition: transform .24s ease, background-color .24s ease, border-color .24s ease;
        }

        .category-link:hover,
        .category-link.active {
            transform: translateX(4px);
            background: rgba(246, 227, 218, 0.72);
            border-color: rgba(201, 128, 106, 0.22);
            color: #8f4f3f;
        }

        .category-badge,
        .label-soft {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: .45rem .78rem;
            border-radius: 999px;
            background: rgba(246, 227, 218, 0.9);
            color: #9d5a48;
            font-weight: 700;
            font-size: .82rem;
        }

        .product-card {
            overflow: hidden;
            transition: transform .28s ease, box-shadow .28s ease;
            animation: riseIn .65s ease both;
        }

        .product-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 34px 78px rgba(134, 82, 67, 0.16);
        }

        .product-media {
            height: 228px;
            padding: 1.1rem;
            background:
                radial-gradient(circle at top right, rgba(255,255,255,.95), transparent 42%),
                linear-gradient(145deg, #f7d9ce, #f4ebe6);
        }

        .product-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 22px;
            border: 1px solid rgba(201, 128, 106, 0.16);
        }

        .placeholder-card {
            width: 100%;
            height: 100%;
            border-radius: 22px;
            border: 1px dashed rgba(201, 128, 106, 0.35);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            background: rgba(255, 252, 250, 0.76);
            color: var(--rose-dark);
        }

        .placeholder-icon {
            width: 64px;
            height: 64px;
            border-radius: 50%;
            display: grid;
            place-items: center;
            margin-bottom: .95rem;
            background: linear-gradient(135deg, #f8e1d9, #d59583);
            color: white;
            font-size: 1.45rem;
            font-weight: 800;
        }

        .product-body {
            padding: 1.15rem;
        }

        .product-title {
            font-size: 1.38rem;
            line-height: .95;
            margin: .3rem 0 .5rem;
        }

        .product-copy {
            color: var(--rose-muted);
            line-height: 1.65;
            font-size: .96rem;
            min-height: 2.9rem;
            margin-bottom: .9rem;
        }

        .price-tag {
            font-size: 1.15rem;
            font-weight: 800;
            color: var(--rose-dark);
        }

        .product-meta {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: .75rem;
            margin-top: auto;
            margin-bottom: .9rem;
        }

        .product-actions {
            display: flex;
            flex-wrap: wrap;
            gap: .65rem;
        }

        .product-actions .btn {
            flex: 1 1 140px;
            padding: .72rem 1rem;
            font-size: .95rem;
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

        .btn-ghost-rose {
            border: 1px solid rgba(169, 92, 73, 0.22);
            color: var(--rose-dark);
            background: rgba(255,255,255,0.65);
        }

        .btn-ghost-rose:hover {
            border-color: rgba(169, 92, 73, 0.34);
            background: rgba(246, 227, 218, 0.72);
            color: #8f4f3f;
        }

        .form-control,
        .form-control:focus {
            border-color: rgba(169, 92, 73, 0.22);
            box-shadow: none;
        }

        .input-shell {
            padding: .35rem;
            border-radius: 999px;
            background: rgba(255,255,255,0.72);
            border: 1px solid rgba(169, 92, 73, 0.12);
        }

        .input-shell .form-control {
            border: none;
            background: transparent;
        }

        .surface-note {
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

        @keyframes riseIn {
            from {
                opacity: 0;
                transform: translateY(22px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media (max-width: 991.98px) {
            .filter-card {
                position: static;
            }

            .product-title {
                font-size: 1.3rem;
            }

            .story-slide {
                grid-template-columns: 1fr;
            }

            .story-media {
                height: 190px;
            }
        }
    </style>
</head>
<body>
    <nav class="topbar">
        <div class="container py-3">
            <div class="d-flex flex-column gap-3 flex-xl-row align-items-xl-center justify-content-xl-between">
                <a href="{{ route('client.product.index') }}" class="text-decoration-none">
                    <x-brand-logo text="Roselle Beauty" caption="Chăm da và trang điểm" />
                </a>

                <form class="d-flex flex-column flex-lg-row align-items-stretch gap-2 w-100 w-xl-50" action="{{ route('client.product.index') }}" method="GET">
                    @if ($selectedCategory)
                        <input type="hidden" name="category" value="{{ $selectedCategory }}">
                    @endif

                    <div class="input-shell flex-grow-1">
                        <input
                            class="form-control form-control-lg"
                            type="search"
                            name="search"
                            placeholder="Tìm serum, son, kem chống nắng..."
                            value="{{ request('search') }}"
                        >
                    </div>
                    <button class="btn btn-blush px-4 rounded-pill" type="submit">Tìm</button>
                </form>

                <div class="d-flex flex-wrap gap-2">
                    @guest
                        <a href="{{ route('login') }}" class="btn btn-ghost-rose rounded-pill px-4">Đăng nhập</a>
                    @endguest

                    @auth
                        @if ((int) auth()->user()->role === 1)
                            <a href="{{ route('products.index') }}" class="btn btn-ghost-rose rounded-pill px-4">Quản trị</a>
                        @endif

                        <form action="{{ route('logout') }}" method="POST" class="m-0">
                            @csrf
                            <button type="submit" class="btn btn-blush rounded-pill px-4">Đăng xuất</button>
                        </form>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <main class="container py-4 py-lg-5">
        @include('partials.flash')

        <section class="hero-shell p-4 p-lg-5 mb-4 mb-lg-5">
            <div class="row g-4 align-items-center position-relative">
                <div class="col-lg-7">
                    <span class="kicker">Roselle Beauty</span>
                    <h1 class="hero-title mt-3 mb-3">Mỹ phẩm đẹp, dễ chọn mỗi ngày.</h1>
                    <p class="hero-copy mb-4">
                        Lọc nhanh theo danh mục, tìm sản phẩm phù hợp và đăng nhập để xem chi tiết.
                    </p>

                    <div class="d-flex flex-wrap gap-3">
                        <a href="#san-pham" class="btn btn-blush rounded-pill px-4 py-3">Xem sản phẩm</a>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="row g-3">
                        <div class="col-12">
                            <div class="story-card">
                                @if ($featuredProducts->isNotEmpty())
                                    <div id="beautyHeroCarousel" class="carousel slide story-carousel" data-bs-ride="carousel" data-bs-interval="4500">
                                        <div class="carousel-inner">
                                            @foreach ($featuredProducts as $featuredProduct)
                                                <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                                    <div class="story-slide">
                                                        <div class="story-media">
                                                            @if ($featuredProduct->image)
                                                                <img
                                                                    src="{{ asset('storage/' . $featuredProduct->image) }}"
                                                                    alt="{{ $featuredProduct->name }}"
                                                                    class="story-image"
                                                                >
                                                            @else
                                                                <div class="story-placeholder">
                                                                    <div class="placeholder-icon">
                                                                        {{ strtoupper(\Illuminate\Support\Str::substr($featuredProduct->name, 0, 1)) }}
                                                                    </div>
                                                                    <div class="fw-semibold">{{ $featuredProduct->category->name ?? 'Mỹ phẩm' }}</div>
                                                                    <div class="surface-note small mt-2">Chưa có ảnh sản phẩm.</div>
                                                                </div>
                                                            @endif
                                                        </div>

                                                        <div>
                                                            <h2 class="brand-heading story-heading mb-2">{{ $featuredProduct->name }}</h2>
                                                            <p class="story-copy mb-4">
                                                                {{ \Illuminate\Support\Str::limit($featuredProduct->description ?: 'Sản phẩm nổi bật đang được hiển thị tại Roselle Beauty.', 90) }}
                                                            </p>

                                                            <div class="story-footer">
                                                                <div>
                                                                    <div class="surface-note small mb-1">Giá</div>
                                                                    <div class="story-price">{{ number_format($featuredProduct->price, 0, ',', '.') }} VND</div>
                                                                </div>

                                                                <a
                                                                    href="{{ auth()->check() ? route('client.product.detail', $featuredProduct) : route('login') }}"
                                                                    class="btn btn-blush rounded-pill px-4"
                                                                >
                                                                    {{ auth()->check() ? 'Xem chi tiết' : 'Đăng nhập để xem' }}
                                                                </a>
                                                            </div>

                                                            <div class="surface-note small mt-3">Tồn kho: {{ $featuredProduct->quantity }}</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>

                                        @if ($featuredProducts->count() > 1)
                                            <div class="story-controls">
                                                <div class="carousel-indicators story-indicators">
                                                    @foreach ($featuredProducts as $featuredProduct)
                                                        <button
                                                            type="button"
                                                            data-bs-target="#beautyHeroCarousel"
                                                            data-bs-slide-to="{{ $loop->index }}"
                                                            class="{{ $loop->first ? 'active' : '' }}"
                                                            aria-current="{{ $loop->first ? 'true' : 'false' }}"
                                                            aria-label="Slide {{ $loop->iteration }}"
                                                        ></button>
                                                    @endforeach
                                                </div>

                                                <div class="story-nav">
                                                    <button class="carousel-control-prev story-control" type="button" data-bs-target="#beautyHeroCarousel" data-bs-slide="prev">
                                                        <span class="story-control-icon" aria-hidden="true">&#8249;</span>
                                                        <span class="visually-hidden">Trước</span>
                                                    </button>
                                                    <button class="carousel-control-next story-control" type="button" data-bs-target="#beautyHeroCarousel" data-bs-slide="next">
                                                        <span class="story-control-icon" aria-hidden="true">&#8250;</span>
                                                        <span class="visually-hidden">Sau</span>
                                                    </button>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                @else
                                    <span class="label-soft mb-3">Gợi ý</span>
                                    <h2 class="brand-heading fs-2 mb-2">Chọn nhanh món bạn cần.</h2>
                                    <p class="surface-note mb-0">
                                        Gọn, dễ nhìn và dễ tìm.
                                    </p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div id="san-pham">
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-end gap-3 mb-4">
                    <div>
                        <span class="label-soft mb-2">Sản phẩm</span>
                        <h2 class="brand-heading display-6 mb-2">Sản phẩm đang có</h2>
                        <p class="surface-note mb-0">
                            @if (request('search') || $selectedCategory)
                                Kết quả theo bộ lọc.
                            @else
                                Danh sách mới nhất.
                            @endif
                        </p>
                    </div>
                    <div class="pill-card">
                        <div class="surface-note small">Hiển thị</div>
                        <div class="fw-bold">{{ $products->count() }} / {{ $products->total() }} sản phẩm</div>
                    </div>
                </div>

                @if ($products->isEmpty())
                    <div class="empty-card p-4 p-lg-5 text-center">
                        <span class="label-soft mb-3">Không có</span>
                        <h3 class="brand-heading display-6 mb-3">Không tìm thấy sản phẩm.</h3>
                        <p class="surface-note mb-4">Thử từ khóa khác hoặc bỏ lọc.</p>
                        <a href="{{ route('client.product.index') }}" class="btn btn-blush rounded-pill px-4">Xem tất cả</a>
                    </div>
                @else
                    <div class="row g-4">
                        @foreach ($products as $index => $product)
                            <div class="col-md-6 col-xl-4">
                                <article class="product-card h-100" style="animation-delay: {{ $index * 0.06 }}s;">
                                    <div class="product-media">
                                        @if ($product->image)
                                            <img src="{{ asset('storage/' . $product->image) }}" class="product-image" alt="{{ $product->name }}">
                                        @else
                                            <div class="placeholder-card">
                                                <div class="placeholder-icon">{{ strtoupper(\Illuminate\Support\Str::substr($product->name, 0, 1)) }}</div>
                                                <div class="fw-semibold mb-1">{{ $product->category->name ?? 'Mỹ phẩm' }}</div>
                                                <div class="surface-note small">Chưa có ảnh.</div>
                                            </div>
                                        @endif
                                    </div>

                                    <div class="product-body d-flex flex-column h-100">
                                        <div class="d-flex justify-content-between align-items-center gap-3 mb-2">
                                            <span class="label-soft">{{ $product->category->name ?? 'Chưa phân loại' }}</span>
                                            <span class="surface-note small">Tồn kho: {{ $product->quantity }}</span>
                                        </div>

                                        <h3 class="product-title">{{ $product->name }}</h3>
                                        <p class="product-copy">
                                            {{ \Illuminate\Support\Str::limit($product->description, 88) ?: 'Chưa có mô tả.' }}
                                        </p>

                                        <div class="product-meta">
                                            <div>
                                                <div class="surface-note small mb-1">Giá</div>
                                                <div class="price-tag">{{ number_format($product->price, 0, ',', '.') }} VND</div>
                                            </div>
                                            <span class="surface-note small">Tồn kho: {{ $product->quantity }}</span>
                                        </div>

                                        <div class="product-actions">
                                            <a href="{{ route('client.product.detail', $product) }}" class="btn btn-ghost-rose rounded-pill">
                                                Xem chi tiết
                                            </a>
                                            <a href="{{ route('client.product.detail', $product) }}" class="btn btn-blush rounded-pill">
                                                Mua hàng
                                            </a>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        @endforeach
                    </div>

                    <div class="mt-4 pt-2">
                        {{ $products->links() }}
                    </div>
                @endif
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
