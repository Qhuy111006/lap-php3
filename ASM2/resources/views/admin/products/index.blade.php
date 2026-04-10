@extends('admin.layouts.app')

@section('title', 'Quản lý sản phẩm')

@section('content')
    <div class="d-flex flex-column flex-lg-row justify-content-between align-items-lg-end gap-3 mb-4">
        <div>
            <span class="badge-soft mb-2">Sản phẩm</span>
            <h1 class="display-6 mb-2">Quản lý sản phẩm</h1>
            <p class="section-copy mb-0">Cập nhật nhanh tên, giá và tồn kho.</p>
        </div>

        <div class="d-flex flex-wrap gap-2 align-items-center">
            <span class="badge-soft">Tổng: {{ $products->total() }} sản phẩm</span>
            <a href="{{ route('products.create') }}" class="btn btn-primary rounded-pill px-4">Thêm sản phẩm</a>
        </div>
    </div>

    <form action="{{ route('products.index') }}" method="GET" class="row g-3 align-items-center mb-4">
        <div class="col-md-8 col-xl-6">
            <input type="text" name="search" class="form-control form-control-lg rounded-pill px-4" placeholder="Tìm tên sản phẩm hoặc danh mục..." value="{{ request('search') }}">
        </div>
        <div class="col-md-auto">
            <button type="submit" class="btn btn-outline-primary btn-lg rounded-pill px-4">Tìm</button>
        </div>
        @if (request('search'))
            <div class="col-md-auto">
                <a href="{{ route('products.index') }}" class="btn btn-outline-secondary btn-lg rounded-pill px-4">Bỏ lọc</a>
            </div>
        @endif
    </form>

    <div class="table-responsive">
        <table class="table align-middle">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Ảnh</th>
                    <th>Sản phẩm</th>
                    <th>Danh mục</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th class="text-end">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $product)
                    <tr>
                        <td class="fw-semibold">{{ $product->id }}</td>
                        <td>
                            @if ($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" width="76" height="76" class="rounded-4 border" style="object-fit: cover;">
                            @else
                                <div class="rounded-4 border d-flex align-items-center justify-content-center section-copy" style="width: 76px; height: 76px;">
                                    Chưa có ảnh
                                </div>
                            @endif
                        </td>
                        <td>
                            <div class="fw-semibold">{{ $product->name }}</div>
                            <div class="small section-copy">{{ \Illuminate\Support\Str::limit($product->description, 60) ?: 'Chưa có mô tả.' }}</div>
                        </td>
                        <td><span class="badge-soft">{{ $product->category->name ?? 'Chưa phân loại' }}</span></td>
                        <td>{{ number_format($product->price, 0, ',', '.') }} VND</td>
                        <td>
                            <span class="badge {{ $product->quantity > 0 ? 'text-bg-success' : 'text-bg-secondary' }} rounded-pill px-3 py-2">
                                {{ $product->quantity }}
                            </span>
                        </td>
                        <td class="text-end">
                            <div class="d-inline-flex flex-wrap gap-2 justify-content-end">
                                <a href="{{ route('products.edit', $product) }}" class="btn btn-sm btn-outline-primary rounded-pill px-3">Sửa</a>

                                <form action="{{ route('products.destroy', $product) }}" method="POST" class="m-0">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger rounded-pill px-3" onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này không?')">
                                        Xóa
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center py-4 section-copy">Chưa có sản phẩm nào.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $products->links() }}
    </div>
@endsection
