@extends('admin.layouts.app')

@section('title', 'Sửa sản phẩm')

@section('content')
    <div class="d-flex justify-content-between align-items-center gap-3 mb-4">
        <div>
            <span class="badge-soft mb-2">Sửa sản phẩm</span>
            <h1 class="display-6 mb-2">Cập nhật sản phẩm</h1>
            <p class="section-copy mb-0">Cập nhật thông tin và ảnh sản phẩm.</p>
        </div>

        <a href="{{ route('products.index') }}" class="btn btn-outline-secondary rounded-pill px-4">Quay lại</a>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger rounded-4">
            <ul class="mb-0 ps-3">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data" class="row g-4">
        @csrf
        @method('PUT')

        <div class="col-lg-8">
            <label for="name" class="form-label fw-semibold">Tên sản phẩm</label>
            <input type="text" name="name" id="name" class="form-control form-control-lg rounded-4" value="{{ old('name', $product->name) }}" required>
        </div>

        <div class="col-lg-4">
            <label for="category_id" class="form-label fw-semibold">Danh mục</label>
            <select name="category_id" id="category_id" class="form-select form-select-lg rounded-4" required>
                <option value="">-- Chọn danh mục --</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @selected((string) old('category_id', $product->category_id) === (string) $category->id)>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-md-6 col-lg-4">
            <label for="price" class="form-label fw-semibold">Giá</label>
            <input type="number" step="0.01" name="price" id="price" class="form-control form-control-lg rounded-4" value="{{ old('price', $product->price) }}" required>
        </div>

        <div class="col-md-6 col-lg-4">
            <label for="quantity" class="form-label fw-semibold">Số lượng</label>
            <input type="number" name="quantity" id="quantity" class="form-control form-control-lg rounded-4" value="{{ old('quantity', $product->quantity) }}" required>
        </div>

        <div class="col-lg-4">
            <label for="image" class="form-label fw-semibold">Đổi ảnh</label>
            <input type="file" name="image" id="image" class="form-control form-control-lg rounded-4" accept=".jpg,.jpeg,.png">
        </div>

        <div class="col-lg-4">
            <label class="form-label fw-semibold d-block">Ảnh hiện tại</label>
            @if ($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="rounded-4 border" style="width: 180px; height: 180px; object-fit: cover;">
            @else
                <div class="rounded-4 border d-flex align-items-center justify-content-center section-copy" style="width: 180px; height: 180px;">
                    Chưa có ảnh
                </div>
            @endif
        </div>

        <div class="col-lg-8">
            <label for="description" class="form-label fw-semibold">Mô tả</label>
            <textarea name="description" id="description" class="form-control rounded-4" rows="6" placeholder="Mô tả ngắn về sản phẩm...">{{ old('description', $product->description) }}</textarea>
        </div>

        <div class="col-12 d-flex gap-2">
            <button type="submit" class="btn btn-primary rounded-pill px-4">Cập nhật</button>
            <a href="{{ route('products.index') }}" class="btn btn-outline-secondary rounded-pill px-4">Hủy</a>
        </div>
    </form>
@endsection
