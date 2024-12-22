<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Intervention\Image\Facades\Image;


class ResetPasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    public $resetCode;

    // Constructor nhận mã xác nhận
    public function __construct($resetCode)
    {
        $this->resetCode = $resetCode;
    }

    public function build()
    {
        return $this->subject('Mã xác nhận quên mật khẩu')
            ->view('client.contents.emails.reset-password')
            ->attach(public_path('assets2/images/account/01.png'), [
                'as' => 'account-image.png',  // Tên tệp trong email
                'mime' => 'image/png',
            ]);
    }


    // public function build()
    // {
    //     // Đổi kích thước ảnh
    //     $imagePath = public_path('assets2/images/account/01.png');
    //     $image = Image::make($imagePath)->resize(200, 200); // Thay đổi kích thước theo ý muốn

    //     // Lưu ảnh đã chỉnh sửa vào tệp tạm
    //     $tmpPath = public_path('assets2/images/account/tmp_image.png');
    //     $image->save($tmpPath);

    //     return $this->subject('Mã xác nhận quên mật khẩu')
    //         ->view('client.contents.emails.reset-password')
    //         ->attach($tmpPath, [
    //             'as' => 'account-image.png',
    //             'mime' => 'image/png',
    //         ]);
    // }
}
