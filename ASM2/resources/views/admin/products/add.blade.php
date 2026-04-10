@extends('admin.layouts.app')

@section('title', 'Thêm sản phẩm')

@section('content')
    <div class="d-flex justify-content-between align-items-center gap-3 mb-4">
        <div>
            <span class="badge-soft mb-2">Sản phẩm mới</span>
            <h1 class="display-6 mb-2">Thêm sản phẩm</h1>
            <p class="section-copy mb-0">Nhập thông tin sản phẩm mới.</p>
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

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="row g-4">
        @csrf

        <div class="col-lg-8">
            <label for="name" class="form-label fw-semibold">Tên sản phẩm</label>
            <input type="text" name="name" id="name" class="form-control form-control-lg rounded-4" value="{{ old('name') }}" placeholder="Ví dụ: Serum phục hồi, son kem..." required>
        </div>

        <div class="col-lg-4">
            <label for="category_id" class="form-label fw-semibold">Danh mục</label>
            <select name="category_id" id="category_id" class="form-select form-select-lg rounded-4" required>
                <option value="">-- Chọn danh mục --</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @selected((string) old('category_id') === (string) $category->id)>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-md-6 col-lg-4">
            <label for="price" class="form-label fw-semibold">Giá</label>
            <input type="number" step="0.01" name="price" id="price" class="form-control form-control-lg rounded-4" value="{{ old('price') }}" required>
        </div>

        <div class="col-md-6 col-lg-4">
            <label for="quantity" class="form-label fw-semibold">Số lượng</label>
            <input type="number" name="quantity" id="quantity" class="form-control form-control-lg rounded-4" value="{{ old('quantity') }}" required>
        </div>

        <div class="col-lg-4">
            <label for="image" class="form-label fw-semibold">Ảnh sản phẩm</label>
            <input type="file" name="image" id="image" class="form-control form-control-lg rounded-4" accept=".jpg,.jpeg,.png" required>
        </div>

        <div class="col-12">
            <label for="description" class="form-label fw-semibold">Mô tả</label>
            <textarea name="description" id="description" class="form-control rounded-4" rows="6" placeholder="Mô tả ngắn về sản phẩm...">{{ old('description') }}</textarea>
        </div>

        <div class="col-12 d-flex gap-2">
            <button type="submit" class="btn btn-primary rounded-pill px-4">Lưu</button>
            <a href="{{ route('products.index') }}" class="btn btn-outline-secondary rounded-pill px-4">Hủy</a>
        </div>
    </form>
@endsection
