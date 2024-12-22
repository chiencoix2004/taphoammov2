<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    // Hiển thị giao diện chat
    public function messengerAll()
    {
        $userId = Auth::id(); // ID của người dùng hiện tại

        // Lấy danh sách người dùng đã từng nhắn tin với tin nhắn mới nhất
        $chatUsers = Message::where('sender_id', $userId)
            ->orWhere('receiver_id', $userId)
            ->orderBy('created_at', 'desc') // Sắp xếp theo thời gian gửi tin nhắn
            ->get()
            ->groupBy(function ($message) use ($userId) {
                return $message->sender_id === $userId ? $message->receiver_id : $message->sender_id;
            })
            ->map(function ($messages) {
                $latestMessage = $messages->first(); // Tin nhắn mới nhất trong nhóm
                $chatUserId = $latestMessage->sender_id === Auth::id() ? $latestMessage->receiver_id : $latestMessage->sender_id;

                return [
                    'user' => User::find($chatUserId),
                    'last_message' => $latestMessage->message,
                    'last_message_time' => $latestMessage->created_at,
                ];
            });

        return view('client.contents.messenger.messenger', compact('chatUsers'));
    }

    public function messenger($receiverId)
    {
        $messages = Message::where(function ($query) use ($receiverId) {
            $query->where('sender_id', Auth::id())
                ->where('receiver_id', $receiverId);
        })->orWhere(function ($query) use ($receiverId) {
            $query->where('sender_id', $receiverId)
                ->where('receiver_id', Auth::id());
        })->orderBy('created_at', 'asc')->get();

        return view('client.contents.messenger.messenger', compact('messages', 'receiverId'));
    }

    // Lưu tin nhắn
    public function sendMessage(Request $request)
    {
        $request->validate([
            'receiver_id' => 'required|exists:users,id',
            'message' => 'required|string|max:500',
        ]);

        $message = Message::create([
            'sender_id' => Auth::id(),
            'receiver_id' => $request->receiver_id,
            'message' => $request->message,
        ]);

        return response()->json(['message' => $message]);
    }


    // Lấy tin nhắn mới
    public function fetchMessages($userId)
    {
        $authId = Auth::id();

        // Lấy tin nhắn giữa người dùng hiện tại và người được chọn
        $messages = Message::where(function ($query) use ($authId, $userId) {
            $query->where('sender_id', $authId)
                ->where('receiver_id', $userId);
        })
            ->orWhere(function ($query) use ($authId, $userId) {
                $query->where('sender_id', $userId)
                    ->where('receiver_id', $authId);
            })
            ->orderBy('created_at', 'asc')
            ->with('sender') // Eager load thông tin người gửi
            ->get();

        return response()->json($messages);
    }
}
