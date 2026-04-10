@extends('admin.layouts.app')

@section('title', 'Sửa danh mục')

@section('content')
    <div class="d-flex justify-content-between align-items-center gap-3 mb-4">
        <div>
            <span class="badge-soft mb-2">Sửa danh mục</span>
            <h1 class="display-6 mb-2">Cập nhật danh mục</h1>
            <p class="section-copy mb-0">Cập nhật tên hoặc mô tả.</p>
        </div>

        <a href="{{ route('categories.index') }}" class="btn btn-outline-secondary rounded-pill px-4">Quay lại</a>
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

    <form action="{{ route('categories.update', $category) }}" method="POST" class="row g-4">
        @csrf
        @method('PUT')

        <div class="col-12">
            <label for="name" class="form-label fw-semibold">Tên danh mục</label>
            <input type="text" name="name" id="name" class="form-control form-control-lg rounded-4" value="{{ old('name', $category->name) }}" required>
        </div>

        <div class="col-12">
            <label for="description" class="form-label fw-semibold">Mô tả</label>
            <textarea name="description" id="description" class="form-control rounded-4" rows="5" placeholder="Mô tả ngắn...">{{ old('description', $category->description) }}</textarea>
        </div>

        <div class="col-12 d-flex gap-2">
            <button type="submit" class="btn btn-primary rounded-pill px-4">Cập nhật</button>
            <a href="{{ route('categories.index') }}" class="btn btn-outline-secondary rounded-pill px-4">Hủy</a>
        </div>
    </form>
@endsection
