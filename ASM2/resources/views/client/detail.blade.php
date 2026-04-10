<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->name }} - Roselle Beauty</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@500;600;700&family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --rose-cream: #fff7f3;
            --rose-main: #c9806a;
            --rose-dark: #6f4337;
            --rose-muted: #8f6d63;
            --line: rgba(174, 116, 97, 0.16);
            --shadow: 0 28px 70px rgba(134, 82, 67, 0.12);
        }

        body {
            margin: 0;
            font-family: "Manrope", Arial, sans-serif;
            color: var(--rose-dark);
            background:
                radial-gradient(circle at top right, rgba(245, 209, 198, 0.7), transparent 24%),
                radial-gradient(circle at left center, rgba(232, 194, 181, 0.45), transparent 18%),
                linear-gradient(180deg, #fffaf7 0%, #fff4ef 55%, #fffaf7 100%);
        }

        h1, h2, h3, .brand-heading {
            font-family: "Cormorant Garamond", Georgia, serif;
        }

        .topbar,
        .detail-shell,
        .info-card,
        .related-card {
            background: rgba(255, 250, 247, 0.92);
            border: 1px solid var(--line);
            border-radius: 30px;
            box-shadow: var(--shadow);
        }

        .topbar {
            background: rgba(255, 248, 244, 0.9);
        }

        .detail-shell {
            overflow: hidden;
        }

        .media-wrap {
            height: 100%;
            min-height: 460px;
            padding: 1.2rem;
            background:
                radial-gradient(circle at top right, rgba(255,255,255,.96), transparent 36%),
                linear-gradient(145deg, #f7d9ce, #f4ebe6);
        }

        .product-image {
            width: 100%;
            height: 100%;
            min-height: 430px;
            object-fit: cover;
            border-radius: 24px;
            border: 1px solid rgba(201, 128, 106, 0.16);
        }

        .placeholder-card {
            width: 100%;
            min-height: 430px;
            border-radius: 24px;
            border: 1px dashed rgba(201, 128, 106, 0.35);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            background: rgba(255, 252, 250, 0.82);
            color: var(--rose-dark);
        }

        .placeholder-icon {
            width: 72px;
            height: 72px;
            border-radius: 50%;
            display: grid;
            place-items: center;
            margin-bottom: 1rem;
            background: linear-gradient(135deg, #f8e1d9, #d59583);
            color: white;
            font-size: 1.6rem;
            font-weight: 800;
        }

        .label-soft {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: .48rem .85rem;
            border-radius: 999px;
            background: rgba(246, 227, 218, 0.92);
            color: #9d5a48;
            font-weight: 700;
            font-size: .82rem;
        }

        .detail-title {
            font-size: clamp(2.6rem, 4vw, 4.6rem);
            line-height: .94;
        }

        .detail-copy {
            color: var(--rose-muted);
            line-height: 1.9;
        }

        .price-line {
            font-size: 1.9rem;
            font-weight: 800;
            color: var(--rose-dark);
        }

        .info-card {
            padding: 1.15rem;
            height: 100%;
        }

        .info-card .small {
            color: var(--rose-muted);
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
            background: rgba(255,255,255,0.68);
        }

        .btn-ghost-rose:hover {
            background: rgba(246, 227, 218, 0.78);
            color: #8f4f3f;
        }

        .related-card {
            overflow: hidden;
            transition: transform .26s ease, box-shadow .26s ease;
        }

        .related-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 32px 72px rgba(134, 82, 67, 0.15);
        }

        .related-media {
            height: 190px;
            object-fit: cover;
            width: 100%;
            border-radius: 22px;
            background: linear-gradient(145deg, #f7d9ce, #f4ebe6);
        }

        @media (max-width: 991.98px) {
            .media-wrap,
            .product-image,
            .placeholder-card {
                min-height: 320px;
            }
        }
    </style>
</head>
<body>
    <div class="container py-4 py-lg-5">
        <div class="topbar p-3 p-lg-4 mb-4">
            <div class="d-flex flex-column gap-3 flex-lg-row align-items-lg-center justify-content-lg-between">
                <a href="{{ route('client.product.index') }}" class="text-decoration-none">
                    <x-brand-logo text="Roselle Beauty" caption="Chi tiết sản phẩm" />
                </a>

                <div class="d-flex flex-wrap gap-2">
                    <a href="{{ route('client.product.index') }}" class="btn btn-ghost-rose rounded-pill px-4">Về shop</a>

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

        @include('partials.flash')

        <section class="detail-shell p-0 mb-4 mb-lg-5">
            <div class="row g-0 align-items-stretch">
                <div class="col-lg-5">
                    <div class="media-wrap">
                        @if ($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" class="product-image" alt="{{ $product->name }}">
                        @else
                            <div class="placeholder-card">
                                <div class="placeholder-icon">{{ strtoupper(\Illuminate\Support\Str::substr($product->name, 0, 1)) }}</div>
                                <div class="fw-semibold mb-2">{{ $product->category->name ?? 'Mỹ phẩm' }}</div>
                                <div class="detail-copy small px-4">Chưa có ảnh sản phẩm.</div>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="col-lg-7 p-4 p-lg-5">
                    <div class="d-flex flex-wrap gap-2 mb-3">
                        <span class="label-soft">{{ $product->category->name ?? 'Chưa phân loại' }}</span>
                        <span class="label-soft">Tồn kho: {{ $product->quantity }}</span>
                        <span class="label-soft">{{ $product->quantity > 0 ? 'Còn hàng' : 'Tạm hết' }}</span>
                    </div>

                    <h1 class="detail-title mb-3">{{ $product->name }}</h1>
                    <p class="detail-copy mb-3">
                        Thông tin ngắn gọn để bạn xem nhanh trước khi chọn.
                    </p>

                    <div class="price-line mb-4">{{ number_format($product->price, 0, ',', '.') }} VND</div>

                    <div class="row g-3 mb-4">
                        <div class="col-sm-6">
                            <div class="info-card">
                                <div class="small mb-2">Danh mục</div>
                                <div class="fw-semibold fs-5">{{ $product->category->name ?? 'Chưa phân loại' }}</div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="info-card">
                                <div class="small mb-2">Tình trạng</div>
                                <div class="fw-semibold fs-5">{{ $product->quantity > 0 ? 'Có sẵn' : 'Hết hàng' }}</div>
                            </div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <span class="label-soft mb-3">Mô tả</span>
                        <p class="detail-copy mb-0">
                            {{ $product->description ?: 'Chưa có mô tả.' }}
                        </p>
                    </div>

                    <div class="d-flex flex-wrap gap-3">
                        <a href="{{ route('client.product.index') }}" class="btn btn-ghost-rose rounded-pill px-4 py-3">Xem thêm</a>
                        <a href="{{ route('client.product.index', ['category' => $product->category_id]) }}" class="btn btn-blush rounded-pill px-4 py-3">Cùng danh mục</a>
                    </div>
                </div>
            </div>
        </section>

        @if ($relatedProducts->isNotEmpty())
            <section>
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-end gap-3 mb-4">
                    <div>
                        <span class="label-soft mb-2">Gợi ý</span>
                        <h2 class="brand-heading display-6 mb-1">Cùng danh mục</h2>
                        <p class="detail-copy mb-0">Một vài sản phẩm tương tự.</p>
                    </div>
                </div>

                <div class="row g-4">
                    @foreach ($relatedProducts as $relatedProduct)
                        <div class="col-md-6 col-xl-3">
                            <article class="related-card h-100 p-3">
                                @if ($relatedProduct->image)
                                    <img src="{{ asset('storage/' . $relatedProduct->image) }}" alt="{{ $relatedProduct->name }}" class="related-media mb-3">
                                @else
                                    <div class="placeholder-card mb-3" style="min-height: 190px;">
                                        <div class="placeholder-icon">{{ strtoupper(\Illuminate\Support\Str::substr($relatedProduct->name, 0, 1)) }}</div>
                                        <div class="small detail-copy px-4">Chưa có ảnh</div>
                                    </div>
                                @endif

                                <span class="label-soft mb-2">{{ $relatedProduct->category->name ?? 'Chưa phân loại' }}</span>
                                <h3 class="brand-heading fs-2 mb-2">{{ $relatedProduct->name }}</h3>
                                <p class="detail-copy small mb-3">
                                    {{ \Illuminate\Support\Str::limit($relatedProduct->description, 82) ?: 'Chưa có mô tả.' }}
                                </p>

                                <div class="d-flex justify-content-between align-items-center gap-2">
                                    <span class="fw-bold">{{ number_format($relatedProduct->price, 0, ',', '.') }} VND</span>
                                    <a href="{{ route('client.product.detail', $relatedProduct) }}" class="btn btn-ghost-rose rounded-pill px-3">Xem</a>
                                </div>
                            </article>
                        </div>
                    @endforeach
                </div>
            </section>
        @endif
    </div>
</body>
</html>
