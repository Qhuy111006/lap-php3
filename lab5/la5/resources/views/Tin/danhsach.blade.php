@extends('layouts.lab5')

@section('title', 'Danh sách tin')

@section('content')
    <div class="card card-shadow">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="ps-3">ID</th>
                            <th>Tiêu đề</th>
                            <th>Tóm tắt</th>
                            <th>Ảnh</th>
                            <th>Loại</th>
                            <th>Ngày đăng</th>
                            <th>Cập nhật</th>
                            <th class="text-end pe-3">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dsTin as $tin)
                            <tr>
                                <td class="ps-3">{{ $tin->idTin }}</td>
                                <td class="fw-semibold">{{ $tin->TieuDe }}</td>
                                <td>{{ \Illuminate\Support\Str::limit($tin->TomTat, 90) }}</td>
                                <td>
                                    @if ($tin->urlHinh)
                                        <img src="{{ $tin->urlHinh }}" alt="{{ $tin->TieuDe }}">
                                    @else
                                        <span class="text-muted">Không có</span>
                                    @endif
                                </td>
                                <td>{{ $loaiTin[$tin->idLT] ?? 'Khác' }}</td>
                                <td>{{ optional($tin->Ngay)->format('d/m/Y H:i') }}</td>
                                <td>{{ optional($tin->updated_at)->format('d/m/Y H:i') }}</td>
                                <td class="text-end pe-3">
                                    <a href="{{ route('tin.edit', $tin->idTin) }}" class="btn btn-sm btn-outline-primary">Sửa</a>
                                    <a
                                        href="{{ route('tin.destroy', $tin->idTin) }}"
                                        class="btn btn-sm btn-outline-danger"
                                        onclick="return confirm('Bạn có chắc muốn xóa tin này?')"
                                    >
                                        Xóa
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center py-5 text-muted">
                                    Chưa có dữ liệu trong bảng tin. Bạn có thể bấm "Thêm tin" để tạo bản ghi đầu tiên.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
