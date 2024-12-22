<?php

namespace App\Http\Controllers;

date_default_timezone_set('Asia/Ho_Chi_Minh'); // Múi giờ Việt Nam

use App\Models\Bank;
use App\Models\Transaction;
use App\Models\User;

class TransactionController extends Controller
{

    // public function fetchAndStoreTransactions()
    // {
    //     $url = 'https://thueapi.dailysieure.com/api-acbank';
    //     // $data = [
    //     //     'taikhoan' => '',
    //     //     'matkhau'  => '',
    //     //     'sotaikhoan' => ''
    //     // ];

    //     $data = [
    //         'taikhoan' => '',
    //         'matkhau'  => '',
    //         'sotaikhoan' => ''
    //     ];

    //     // Lấy dữ liệu từ bảng `users`
    //     $bank = Bank::where('id', 2)->first(); // Thay `1` bằng id hoặc điều kiện phù hợp

    //     if ($bank) {
    //         $data['taikhoan'] = $bank->account_name;    // Thay bằng cột trong bảng
    //         $data['matkhau'] = $bank->account_password;      // Thay bằng cột trong bảng
    //         $data['sotaikhoan'] = $bank->account_number; // Thay bằng cột trong bảng
    //     }

    //     // Khởi tạo cURL
    //     $ch = curl_init($url);

    //     // Thiết lập cURL
    //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Trả về dữ liệu dưới dạng chuỗi
    //     curl_setopt($ch, CURLOPT_POST, true); // Phương thức POST
    //     curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data)); // Gửi dữ liệu POST
    //     curl_setopt($ch, CURLOPT_TIMEOUT, 20); // Thời gian timeout

    //     // Thực hiện cURL và lưu kết quả
    //     $response = curl_exec($ch);

    //     // Kiểm tra lỗi cURL
    //     if (curl_errno($ch)) {
    //         echo 'Error:' . curl_error($ch);
    //     } else {
    //         // Xử lý phản hồi từ API
    //         $responseData = json_decode($response, true); // Chuyển đổi JSON thành mảng

    //         if (isset($responseData['transactions']) && is_array($responseData['transactions'])) {
    //             echo "Cập Nhật Lịch Sử Thành Công\n";

    //             foreach ($responseData['transactions'] as $transaction) {
    //                 // Chỉ xử lý giao dịch có type = IN
    //                 if (strtoupper($transaction['type']) === 'IN') {
    //                     // Lưu giao dịch vào DB
    //                     $savedTransaction = Transaction::updateOrCreate(
    //                         [
    //                             'transaction_id' => $transaction['transactionID'],
    //                         ],
    //                         [
    //                             'bank_name' => $bank['bank_name'] ?? null,
    //                             'account_number' => $bank['account_number'] ?? null,
    //                             'description' => $transaction['description'] ?? null,
    //                             'amount' => $transaction['amount'],
    //                             'currency' => $transaction['currency'],
    //                             'transaction_date' => date('Y-m-d H:i:s', $transaction['transactionDate'] / 1000),
    //                         ]
    //                     );

    //                     $description = $transaction['description'] ?? null;

    //                     if ($description) {
    //                         // Trích xuất username và id từ nội dung giao dịch, bỏ qua các phần thừa
    //                         preg_match('/^(\w+)\s+(\d+)/', $description, $matches);

    //                         $username = $matches[1] ?? null; // Lấy username
    //                         $userId = $matches[2] ?? null;  // Lấy ID

    //                         if ($username && $userId) {
    //                             // Kiểm tra nếu giao dịch đã được xử lý
    //                             $existingTransaction = Transaction::where('transaction_id', $transaction['transactionID'])->first();

    //                             if ($existingTransaction) {
    //                                 echo "Giao dịch đã được xử lý trước đó: " . $transaction['transactionID'] . "\n";
    //                                 return; // Bỏ qua giao dịch
    //                             }

    //                             // Tìm user trong cơ sở dữ liệu
    //                             $user = User::where('username', $username)->where('id', $userId)->first();

    //                             if ($user) {
    //                                 // Kiểm tra ví của user
    //                                 if (!$user->wallet) {
    //                                     // Tạo ví mới nếu chưa có
    //                                     $user->wallet()->create(['cash' => $transaction['amount']]);
    //                                 } else {
    //                                     // Cộng tiền vào ví hiện tại
    //                                     $user->wallet->cash += $transaction['amount'];
    //                                     $user->wallet->save();
    //                                 }

    //                                 // Lưu giao dịch vào bảng transactions
    //                                 Transaction::create([
    //                                     'transaction_id' => $transaction['transactionID'],
    //                                     'description' => $description,
    //                                     'amount' => $transaction['amount'],
    //                                     'user_id' => $user->id,
    //                                     'transaction_date' => now(),
    //                                 ]);

    //                                 echo "Cộng thêm " . $transaction['amount'] . " VNĐ cho user: " . $username . " (ID: " . $userId . ")\n";
    //                             } else {
    //                                 echo "Không tìm thấy user với username: " . $username . " và ID: " . $userId . "\n";
    //                             }
    //                         } else {
    //                             echo "Không tìm thấy username hoặc ID trong nội dung giao dịch.\n";
    //                         }
    //                     }

    //                 }
    //             }
    //         } else {
    //             echo "Không có giao dịch nào hoặc phản hồi không hợp lệ.\n";
    //         }
    //     }

    //     // Đóng cURL
    //     curl_close($ch);
    // }


    public function fetchAndStoreTransactions()
    {
        $url = 'https://thueapi.dailysieure.com/api-acbank';

        // Lấy thông tin từ bảng `banks`
        $bank = Bank::where('id', 2)->first(); // Cập nhật điều kiện phù hợp
        if (!$bank) {
            echo "Không tìm thấy thông tin ngân hàng.\n";
            return;
        }

        $data = [
            'taikhoan' => $bank->account_name ?? '',
            'matkhau'  => $bank->account_password ?? '',
            'sotaikhoan' => $bank->account_number ?? '',
        ];

        // Khởi tạo cURL
        $ch = curl_init($url);

        // Thiết lập cURL
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_TIMEOUT, 20);

        // Thực hiện cURL và lưu kết quả
        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            echo 'Lỗi cURL: ' . curl_error($ch) . "\n";
            curl_close($ch);
            return;
        }

        curl_close($ch);

        // Xử lý phản hồi từ API
        $responseData = json_decode($response, true);
        if (!isset($responseData['transactions']) || !is_array($responseData['transactions'])) {
            echo "Không có giao dịch nào hoặc phản hồi không hợp lệ.\n";
            return;
        }

        echo "Cập Nhật Lịch Sử Thành Công\n";

        foreach ($responseData['transactions'] as $transaction) {
            if (strtoupper($transaction['type']) !== 'IN') {
                continue; // Chỉ xử lý giao dịch có type = IN
            }

            // Kiểm tra giao dịch đã được xử lý
            $existingTransaction = Transaction::where('transaction_id', $transaction['transactionID'])->first();
            if ($existingTransaction) {
                echo "Giao dịch đã được xử lý trước đó: " . $transaction['transactionID'] . "\n";
                continue; // Bỏ qua giao dịch
            }

            // Lưu giao dịch vào DB
            $savedTransaction = Transaction::create([
                'transaction_id' => $transaction['transactionID'],
                'bank_name' => $bank->bank_name ?? null,
                'account_number' => $bank->account_number ?? null,
                'description' => $transaction['description'] ?? null,
                'amount' => $transaction['amount'],
                'currency' => $transaction['currency'],
                'transaction_date' => date('Y-m-d H:i:s', $transaction['transactionDate'] / 1000),
            ]);

            $description = $transaction['description'] ?? null;

            if ($description) {
                // Trích xuất username và id từ nội dung giao dịch
                preg_match('/^(\w+)\s+(\d+)/', $description, $matches);
                $username = $matches[1] ?? null;
                $userId = $matches[2] ?? null;

                if ($username && $userId) {
                    // Tìm user trong cơ sở dữ liệu
                    $user = User::where('username', $username)->where('id', $userId)->first();

                    if ($user) {
                        // Kiểm tra ví của user
                        if (!$user->wallet) {
                            // Tạo ví mới nếu chưa có
                            $user->wallet()->create(['cash' => $transaction['amount']]);
                        } else {
                            // Cộng tiền vào ví hiện tại
                            $user->wallet->cash += $transaction['amount'];
                            $user->wallet->save();
                        }

                        echo "Cộng thêm " . $transaction['amount'] . " VNĐ cho user: " . $username . " (ID: " . $userId . ")\n";
                    } else {
                        echo "Không tìm thấy user với username: " . $username . " và ID: " . $userId . "\n";
                    }
                } else {
                    echo "Không tìm thấy username hoặc ID trong nội dung giao dịch.\n";
                }
            }
        }
    }


    public function listTransaction()
    {
        $listTransaction = Transaction::orderBy('created_at', 'desc')->paginate(15);
        return view('admin.contents.transaction.transactionHistory')->with(['listTransaction' => $listTransaction]);
    }
}
