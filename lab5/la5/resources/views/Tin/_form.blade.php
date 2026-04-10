@php
    $action = $action ?? route('tin.store');
    $buttonLabel = $buttonLabel ?? 'Lưu';
@endphp

<form action="{{ $action }}" method="post" class="card card-shadow p-4">
    @csrf
    <div class="mb-3">
        <label for="tieuDe" class="form-label">Tiêu đề</label>
        <input
            id="tieuDe"
            name="tieuDe"
            class="form-control"
            value="{{ old('tieuDe', $tin->TieuDe ?? '') }}"
            required
        >
    </div>

    <div class="mb-3">
        <label for="tomTat" class="form-label">Tóm tắt</label>
        <textarea
            id="tomTat"
            name="tomTat"
            class="form-control"
            rows="5"
            required
        >{{ old('tomTat', $tin->TomTat ?? '') }}</textarea>
    </div>

    <div class="mb-3">
        <label for="urlHinh" class="form-label">urlHinh</label>
        <input
            id="urlHinh"
            name="urlHinh"
            class="form-control"
            value="{{ old('urlHinh', $tin->urlHinh ?? '') }}"
        >
    </div>

    <div class="mb-4">
        <label for="idLT" class="form-label">Loại tin</label>
        <select id="idLT" name="idLT" class="form-select">
            @foreach ($loaiTin as $id => $ten)
                <option value="{{ $id }}" @selected((int) old('idLT', $tin->idLT ?? 1) === $id)>{{ $ten }}</option>
            @endforeach
        </select>
    </div>

    <div class="d-flex gap-2">
        <button type="submit" class="btn btn-warning px-4">{{ $buttonLabel }}</button>
        <a href="{{ route('tin.index') }}" class="btn btn-outline-secondary">Quay lại</a>
    </div>
</form>
