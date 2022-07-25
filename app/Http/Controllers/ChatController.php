<?php

namespace App\Http\Controllers;

use App\Services\ChatService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ChatController extends Controller
{
    public $chatService;
    public function __construct(ChatService $chatService)
    {
        $this->chatService = $chatService;
    }

    public function index()
    {
        $conversation = $this->chatService->getConversation();
        return Inertia::render('Chat', [
            'conversation' => $conversation,
        ]);
    }

    public function messages()
    {
        $conversation = $this->chatService->getConversation();
        if ($conversation == null) {
            return response()->json([]);
        } else
            return response()->json($this->chatService->getMessages());
    }

    public function registerChat(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'tag' => 'required',
        ]);
        $this->chatService->setConversationId($request->all());
        return redirect()->route('chat.index')->with('success', 'Conversation started');
    }

    public function sendMessage(Request $request)
    {
        $request->validate([
            'message' => 'required',
        ]);

        $conversation = $this->chatService->getConversation();
        if ($conversation == null) {
            return response()->json([]);
        }
        // Add sender message
        $this->chatService->addMessage($request->message, $request->clientId);

        // Add bot message
        $botResponse = $this->chatService->getBotResponse($request->message);
        $this->chatService->addMessage($botResponse, null);

        $messages = [
            [
                'client_id' => $request->clientId,
                'message' => $request->message,
            ],
            [
                'client_id' => null,
                'message' => $botResponse,
            ],
        ];
        return response()->json(['status' => 'success', 'data' => $messages]);
    }

    public function endChat()
    {
        // Add bot message
        $botResponse = "Thank you for using our service! I hope to see you again.";
        $this->chatService->addMessage($botResponse, null);
        $this->chatService->removeConversationId();
        $messages = [
            [
                'client_id' => null,
                'message' => $botResponse,
            ],
        ];
        return response()->json(['status' => 'success', 'data' => $messages, 'message' => 'Conversation ended']);
    }
}
