<?php

namespace App\Http\Controllers;

use App\Models\Tin;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TinController extends Controller
{
    private const LOAI_TIN = [
        1 => 'Xã hội',
        3 => 'Du lịch',
    ];

    public function index(): View
    {
        $dsTin = Tin::query()
            ->orderByDesc('Ngay')
            ->orderByDesc('idTin')
            ->get();

        return view('Tin.danhsach', [
            'dsTin' => $dsTin,
            'loaiTin' => self::LOAI_TIN,
        ]);
    }

    public function create(): View
    {
        return view('Tin.them', [
            'loaiTin' => self::LOAI_TIN,
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $this->validateTin($request);

        Tin::create($this->mapDataToTin($validated));

        return redirect()
            ->route('tin.index')
            ->with('success', 'Đã thêm tin mới.');
    }

    public function edit(int $idTin): View
    {
        return view('Tin.capnhattin', [
            'tin' => Tin::findOrFail($idTin),
            'loaiTin' => self::LOAI_TIN,
        ]);
    }

    public function update(Request $request, int $idTin): RedirectResponse
    {
        $validated = $this->validateTin($request);
        $tin = Tin::findOrFail($idTin);

        $tin->update($this->mapDataToTin($validated, $tin));

        return redirect()
            ->route('tin.index')
            ->with('success', 'Đã cập nhật tin.');
    }

    public function destroy(int $idTin): RedirectResponse
    {
        $tin = Tin::findOrFail($idTin);
        $tin->delete();

        return redirect()
            ->route('tin.index')
            ->with('success', 'Đã xóa tin.');
    }

    private function validateTin(Request $request): array
    {
        return $request->validate([
            'tieuDe' => ['required', 'string', 'max:255'],
            'tomTat' => ['required', 'string'],
            'urlHinh' => ['nullable', 'string', 'max:255'],
            'idLT' => ['required', 'integer', 'in:1,3'],
        ], [
            'tieuDe.required' => 'Bạn chưa nhập tiêu đề.',
            'tomTat.required' => 'Bạn chưa nhập tóm tắt.',
            'idLT.in' => 'Loại tin không hợp lệ.',
        ]);
    }

    private function mapDataToTin(array $validated, ?Tin $tin = null): array
    {
        return [
            'TieuDe' => $validated['tieuDe'],
            'TomTat' => $validated['tomTat'],
            'Content' => $tin?->Content ?? $validated['tomTat'],
            'urlHinh' => $validated['urlHinh'] ?: null,
            'Ngay' => $tin?->Ngay ?? now(),
            'idLT' => (int) $validated['idLT'],
            'idTL' => $tin?->idTL ?? 1,
            'SoLanXem' => $tin?->SoLanXem ?? 0,
            'TinNoiBat' => $tin?->TinNoiBat ?? false,
            'AnHien' => $tin?->AnHien ?? true,
        ];
    }
}
