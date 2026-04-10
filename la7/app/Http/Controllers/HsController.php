<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HsController extends Controller
{
    public function hs()
    {
        return view('nhaphs');
    }

    public function hs_store(Request $request)
    {
        $request->validate([
            'hoten' => ['required', 'string', 'min:3', 'max:20'],
            'tuoi' => ['required', 'integer', 'min:16', 'max:100'],
            'ngaysinh' => ['required', 'date'],
        ]);

        return back()->with('success', 'Code xử lý lưu thông tin học sinh');
    }
}
