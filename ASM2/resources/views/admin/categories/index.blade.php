@extends('admin.layouts.app')

@section('title', 'Quản lý danh mục')

@section('content')
    <div class="d-flex flex-column flex-lg-row justify-content-between align-items-lg-end gap-3 mb-4">
        <div>
            <span class="badge-soft mb-2">Danh mục</span>
            <h1 class="display-6 mb-2">Quản lý danh mục</h1>
            <p class="section-copy mb-0">Sắp xếp danh mục gọn hơn.</p>
        </div>

        <div class="d-flex flex-wrap gap-2 align-items-center">
            <span class="badge-soft">Tổng: {{ $categories->total() }} danh mục</span>
            <a href="{{ route('categories.create') }}" class="btn btn-primary rounded-pill px-4">Thêm danh mục</a>
        </div>
    </div>

    <form action="{{ route('categories.index') }}" method="GET" class="row g-3 align-items-center mb-4">
        <div class="col-md-8 col-xl-6">
            <input type="text" name="search" class="form-control form-control-lg rounded-pill px-4" placeholder="Tìm tên hoặc mô tả danh mục..." value="{{ request('search') }}">
        </div>
        <div class="col-md-auto">
            <button type="submit" class="btn btn-outline-primary btn-lg rounded-pill px-4">Tìm</button>
        </div>
        @if (request('search'))
            <div class="col-md-auto">
                <a href="{{ route('categories.index') }}" class="btn btn-outline-secondary btn-lg rounded-pill px-4">Bỏ lọc</a>
            </div>
        @endif
    </form>

    <div class="table-responsive">
        <table class="table align-middle">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên danh mục</th>
                    <th>Mô tả</th>
                    <th>Số sản phẩm</th>
                    <th class="text-end">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($categories as $category)
                    <tr>
                        <td class="fw-semibold">{{ $category->id }}</td>
                        <td>
                            <div class="fw-semibold">{{ $category->name }}</div>
                            <div class="small section-copy">Hiển thị ngoài shop.</div>
                        </td>
                        <td class="section-copy">{{ $category->description ?: 'Chưa có mô tả.' }}</td>
                        <td><span class="badge-soft">{{ $category->products_count }}</span></td>
                        <td class="text-end">
                            <div class="d-inline-flex flex-wrap gap-2 justify-content-end">
                                <a href="{{ route('categories.edit', $category) }}" class="btn btn-sm btn-outline-primary rounded-pill px-3">Sửa</a>
                                <form action="{{ route('categories.destroy', $category) }}" method="POST" class="m-0">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger rounded-pill px-3" onclick="return confirm('Bạn có chắc muốn xóa danh mục này không?')">
                                        Xóa
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-4 section-copy">Chưa có danh mục nào.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $categories->links() }}
    </div>
@endsection
