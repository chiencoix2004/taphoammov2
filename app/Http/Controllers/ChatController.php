<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function messengerAll(Request $request)
    {
        $userId = Auth::id();

        if (!$userId) {
            return redirect()->route('login')->with('error', 'Please log in to access messenger.');
        }

        // Lấy tất cả tin nhắn gửi và nhận của người dùng
        $messages = Message::where('sender_id', $userId)
            ->orWhere('receiver_id', $userId)
            ->latest('created_at')
            ->get();

        // Nhóm tin nhắn theo người đối diện (receiver hoặc sender)
        $chatUsers = $messages->groupBy(function ($message) use ($userId) {
            // Nếu người gửi là user hiện tại thì người nhận là đối tượng khác
            return $message->sender_id === $userId ? $message->receiver_id : $message->sender_id;
        })->map(function ($messages, $chatUserId) use ($userId) {
            $latestMessage = $messages->first();

            // Tìm thông tin người nhận hoặc người gửi
            $chatUser = User::find($chatUserId);

            // Nếu không tìm thấy người dùng, bỏ qua
            if (!$chatUser) {
                return null;
            }

            // Kiểm tra trạng thái đọc (is_read)
            $isRead = $latestMessage->sender_id === $userId
                ? 1 // Tin nhắn cuối được gửi bởi bạn
                : ($latestMessage->is_read ?? 0); // Tin nhắn cuối được gửi bởi người kia, kiểm tra trạng thái đọc

            // Đếm số lượng tin nhắn chưa đọc từ người dùng này
            $unreadMessagesCount = $messages->where('receiver_id', $userId)
                ->where('is_read', 0)
                ->count();

            return [
                'user' => $chatUser,
                'last_message' => $latestMessage->message,
                'last_message_time' => $latestMessage->created_at,
                'last_message_read' => $isRead,
                'unread_count' => $unreadMessagesCount, // Số tin nhắn chưa đọc từ người này
            ];
        })
            ->filter()  // Loại bỏ giá trị null trong trường hợp không tìm thấy người dùng
            ->values(); // Reset các chỉ số mảng

        // Tổng số tin nhắn chưa đọc (tất cả người dùng)
        $totalUnreadMessages = $chatUsers->sum('unread_count');


        $userAgent = $request->header('User-Agent');

        if (preg_match('/mobile/i', $userAgent)) {
            return view('client.contents.messenger.mobileChat.messenger', compact('chatUsers', 'totalUnreadMessages'));
        }

        return view('client.contents.messenger.messenger', compact('chatUsers', 'totalUnreadMessages'));
    }

    public function fetchMessages(Request $request, $username)
{
    $userId = Auth::id();

    // Kiểm tra người dùng đã đăng nhập chưa
    if (!$userId) {
        return redirect()->route('login')->with('error', 'Please log in to access messenger.');
    }

    // Lấy thông tin người nhận
    $receiver = User::where('username', $username)->first();

    if (!$receiver) {
        return redirect()->back()->with('error', 'User not found.');
    }

    // Lấy tin nhắn giữa người dùng hiện tại và người nhận
    $messages = Message::where(function ($query) use ($userId, $receiver) {
        $query->where('sender_id', $userId)
            ->where('receiver_id', $receiver->id);
    })
        ->orWhere(function ($query) use ($userId, $receiver) {
            $query->where('sender_id', $receiver->id)
                ->where('receiver_id', $userId);
        })
        ->orderBy('created_at', 'desc') // Hiển thị theo thứ tự thời gian
        ->get();

    // Đánh dấu các tin nhắn từ người nhận là đã đọc
    Message::where('sender_id', $receiver->id)
        ->where('receiver_id', $userId)
        ->where('is_read', 0)
        ->update(['is_read' => 1]);

    // Lấy danh sách người dùng đã trò chuyện
    $chatUsers = Message::where('sender_id', $userId)
        ->orWhere('receiver_id', $userId)
        ->latest('created_at')
        ->get()
        ->groupBy(function ($message) use ($userId) {
            return $message->sender_id === $userId ? $message->receiver_id : $message->sender_id;
        })
        ->map(function ($messages, $chatUserId) use ($userId) {
            $latestMessage = $messages->first();
            $chatUser = User::find($chatUserId);

            if (!$chatUser) {
                return null;
            }

            // Kiểm tra trạng thái đọc (is_read)
            $isRead = ($latestMessage->sender_id === $userId)
                ? 1 // Nếu bạn là người gửi tin nhắn cuối cùng, mặc định đã đọc
                : ($latestMessage->is_read ?? 0);

            // Tính số lượng tin nhắn chưa đọc của từng người
            $unreadCount = $messages->where('receiver_id', $userId)
                ->where('is_read', 0)
                ->count();

            return [
                'user' => $chatUser,
                'last_message' => $latestMessage->message,
                'last_message_time' => $latestMessage->created_at,
                'last_message_read' => $isRead, // Trạng thái đọc của tin nhắn cuối
                'unread_count' => $unreadCount, // Số tin nhắn chưa đọc từ người dùng này
            ];
        })
        ->filter()
        ->values();

    // Tính tổng số tin nhắn chưa đọc từ tất cả người dùng
    $totalUnreadMessages = $chatUsers->sum('unread_count');

    $userAgent = $request->header('User-Agent');

    // Kiểm tra nếu người dùng đang sử dụng thiết bị di động
    if (preg_match('/mobile/i', $userAgent)) {
        return view('client.contents.messenger.mobileChat.content', compact('chatUsers', 'messages', 'receiver', 'totalUnreadMessages'));
    }

    // Trả về view hiển thị danh sách người dùng và tin nhắn
    return view('client.contents.messenger.content', compact('chatUsers', 'messages', 'receiver', 'totalUnreadMessages'));
}


    public function uploadImage(Request $request)
    {
        $request->validate([
            'image' => 'required|file|image|max:2048', // Kiểm tra tệp hình ảnh
            'user_id' => 'required|exists:users,id', // ID của người nhận
        ]);

        $imgMessPath = '';
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $nameImage = time() . "." . $image->getClientOriginalExtension();
            $link = "uploads/imgMess/";
            $image->move(public_path($link), $nameImage);

            $imgMessPath = $link . $nameImage;
        }

        // Lưu tin nhắn vào bảng messages
        $message = Message::create([
            'sender_id' => auth()->id(), // Người gửi
            'receiver_id' => $request->user_id, // Người nhận
            'message' => $imgMessPath, // Đường dẫn ảnh
        ]);
        return response()->json([
            'success' => true,
            'image_url' => asset($imgMessPath),
        ]);
    }
    public function send(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'message' => 'required|string|max:1000',
        ]);

        // Lấy nội dung tin nhắn
        $message = $request->message;

        // Kiểm tra nếu message là số điện thoại (10-15 chữ số liên tục)
        if (preg_match('/^\d{9,15}$/', $message)) {
            // Mã hóa số điện thoại bằng dấu *
            $message = substr($message, 0, 2) . str_repeat('*', strlen($message) - 4) . substr($message, -2);
        }

        // Lưu tin nhắn vào cơ sở dữ liệu
        Message::create([
            'sender_id' => auth()->id(),
            'receiver_id' => $request->user_id,
            'message' => $message,
        ]);

        // Điều hướng quay lại trang hiện tại
        return redirect()->back();
    }
}
