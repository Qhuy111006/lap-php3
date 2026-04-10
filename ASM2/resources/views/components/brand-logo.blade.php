@props([
    'size' => 54,
    'showText' => true,
    'text' => 'Roselle Beauty',
    'caption' => 'Mỹ phẩm mỗi ngày',
])

<div {{ $attributes->merge(['class' => 'd-inline-flex align-items-center gap-3']) }}>
    <span
        class="d-inline-flex align-items-center justify-content-center rounded-circle flex-shrink-0"
        style="
            width: {{ $size }}px;
            height: {{ $size }}px;
            background: linear-gradient(135deg, #f7d8cf, #c9806a);
            box-shadow: 0 14px 32px rgba(169, 92, 73, 0.24);
        "
    >
        <svg
            xmlns="http://www.w3.org/2000/svg"
            width="{{ (int) round($size * 0.54) }}"
            height="{{ (int) round($size * 0.54) }}"
            viewBox="0 0 24 24"
            fill="none"
            aria-hidden="true"
        >
            <path d="M8.5 4.5c0-1.38 1.12-2.5 2.5-2.5h2.4c.88 0 1.6.72 1.6 1.6v2.4c0 1.38-1.12 2.5-2.5 2.5h-.2v2.35l3.6 7.65a2 2 0 0 1-1.81 2.85H8.91a2 2 0 0 1-1.81-2.85l3.6-7.65V8.5h-.2A2 2 0 0 1 8.5 6.5v-2Z" fill="#fff7f2"/>
            <path d="M10.7 10.85h1.6v-2.3h.2c1.38 0 2.5-1.12 2.5-2.5v-2.4c0-.88-.72-1.6-1.6-1.6H11c-1.38 0-2.5 1.12-2.5 2.5v2c0 1.1.9 2 2 2h.2v2.3Z" stroke="#8f4f3f" stroke-width="1.2"/>
            <path d="M8.2 18.15h7.6" stroke="#d68f7a" stroke-width="1.4" stroke-linecap="round"/>
            <path d="M9.3 15.6h5.4" stroke="#d68f7a" stroke-width="1.2" stroke-linecap="round"/>
        </svg>
    </span>

    @if ($showText)
        <div class="lh-sm">
            <span
                class="d-block fw-semibold"
                style="font-family: 'Cormorant Garamond', Georgia, serif; font-size: 1.35rem; letter-spacing: .06em; color: #5d342a;"
            >
                {{ $text }}
            </span>
            <small style="color: #8b6b63;">{{ $caption }}</small>
        </div>
    @endif
</div>
