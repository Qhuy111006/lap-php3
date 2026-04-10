<?php

namespace App\Http\Controllers;

use App\Http\Requests\RuleNhapSV;

class SvController extends Controller
{
    public function sv()
    {
        return view('nhapsv');
    }

    public function sv_store(RuleNhapSV $request)
    {
        return back()->with('success', 'Code xử lý lưu thông tin sinh viên');
    }
}
