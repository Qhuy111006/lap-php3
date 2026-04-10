<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RuleNhapSV extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'masv' => ['required', 'string', 'max:20'],
            'hoten' => ['required', 'string', 'min:3', 'max:50'],
            'tuoi' => ['required', 'integer', 'min:16', 'max:100'],
            'ngaysinh' => ['required', 'date'],
            'cmnd' => ['required', 'string', 'min:9', 'max:12'],
            'email' => ['required', 'email'],
        ];
    }

    public function messages(): array
    {
        return [
            'masv.required' => 'Mã SV không được để trống.',
            'hoten.required' => 'Họ tên không được để trống.',
            'hoten.min' => 'Họ tên phải có ít nhất :min ký tự.',
            'hoten.max' => 'Họ tên không được vượt quá :max ký tự.',
            'tuoi.required' => 'Tuổi là bắt buộc.',
            'tuoi.integer' => 'Tuổi phải là số nguyên.',
            'tuoi.min' => 'Tuổi phải lớn hơn hoặc bằng :min.',
            'tuoi.max' => 'Tuổi phải nhỏ hơn hoặc bằng :max.',
            'ngaysinh.required' => 'Ngày sinh không được để trống.',
            'ngaysinh.date' => 'Ngày sinh phải có định dạng ngày hợp lệ.',
            'cmnd.required' => 'CMND không được để trống.',
            'cmnd.min' => 'CMND phải có ít nhất :min ký tự.',
            'cmnd.max' => 'CMND không được vượt quá :max ký tự.',
            'email.required' => 'Email không được để trống.',
            'email.email' => 'Email phải đúng định dạng email.',
        ];
    }

    public function attributes(): array
    {
        return [
            'masv' => 'Mã sinh viên',
            'hoten' => 'Họ tên',
            'tuoi' => 'Tuổi',
            'ngaysinh' => 'Ngày sinh',
            'cmnd' => 'CMND',
            'email' => 'Email',
        ];
    }
}
