# Lab 7: Validation & Send Mail

## Mục tiêu
- Triển khai validate các loại dữ liệu đầu vào
- Send mail qua API Server (Mailgun)

## Hoàn thành

### ✅ Bài 1: Kiểm tra dữ liệu với hàm validate() của đối tượng Request
- **Controller**: `HsController`
- **Action**: `hs()` - hiển thị form, `hs_store()` - xử lý validation
- **Route**: `GET /hs`, `POST /hs`
- **View**: `nhaphs.blade.php`
- **Validation rules**:
  - Họ tên: required, min:3, max:20
  - Tuổi: required, integer, min:16, max:100
  - Ngày sinh: required, date

### ✅ Bài 2: Validate dùng request class
- **Controller**: `SvController`
- **Request class**: `RuleNhapSV`
- **Action**: `sv()` - hiển thị form, `sv_store()` - xử lý validation
- **Route**: `GET /sv`, `POST /sv`
- **View**: `nhapsv.blade.php`
- **Validation rules**:
  - Mã SV: required, max:20
  - Họ tên: required, min:3, max:50
  - Tuổi: required, integer, min:16, max:100
  - Ngày sinh: required, date
  - CMND: required, min:9, max:12
  - Email: required, email
- **Custom messages**: Có
- **Custom attributes**: Có
- **Field-specific errors**: Có

### ✅ Bài 3: Gửi mail với Mailgun
- **Mailable class**: `GuiMail`
- **Route**: `GET /guimail`
- **Mail template**: `guimail.blade.php`
- **Attachment**: `hinh1.jpg`
- **Configuration**: Đã cấu hình mailgun trong `config/mail.php` và `config/services.php`
- **Package**: Đã cài `symfony/mailgun-mailer`

## Cấu hình Database
- Database: `la7`
- Connection: MySQL
- Session driver: database

## Cấu hình Mail
- Mailer: log (để test, có thể đổi thành mailgun khi có API key thật)
- From: postmaster@sandbox.mailgun.org

## Chạy project
```bash
php artisan serve --host=127.0.0.1 --port=8000
```

## Test URLs
- Form học sinh: http://127.0.0.1:8000/hs
- Form sinh viên: http://127.0.0.1:8000/sv
- Gửi mail: http://127.0.0.1:8000/guimail

## Lưu ý
Để gửi mail thật qua Mailgun:
1. Đăng ký tài khoản Mailgun
2. Lấy domain và API key
3. Cập nhật `.env`:
   ```
   MAIL_MAILER=mailgun
   MAILGUN_DOMAIN=your-domain.mailgun.org
   MAILGUN_SECRET=your-api-key
   ```