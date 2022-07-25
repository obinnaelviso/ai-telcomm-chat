<?php

namespace App\Services;

use App\Models\BotQuery;
use App\Models\Client;
use App\Models\Conversation;
use App\Models\Message;

class ChatService
{

    public function getConversation()
    {
        $conversationId = session('conversation_id');
        if (!$conversationId) {
            return null;
        } else {
            $conversation = Conversation::where('id', $conversationId)->with('client')->first();
            return $conversation;
        }
    }

    public function setConversationId($data)
    {
        $client = Client::where('email', $data['email'])->first();
        if ($client != null) {
            $client->update([
                'name' => $data['name'],
            ]);
        } else {
            $client = Client::create([
                'name' => $data['name'],
                'email' => $data['email']
            ]);
        }
        $conversation = Conversation::create([
            'client_id' => $client->id,
            'tag' => $data['tag'],
            'expired_at' => now()->addMinutes(10),
        ]);
        session(['conversation_id' => $conversation->id]);
        $this->addMessage("Hello {$conversation->client->name}! I am Jukabot. I can help you with your queries. Type 'help' to see what I can do.");
    }

    public function addMessage($message, $clientId = null)
    {
        $conversation = $this->getConversation();
        $message = Message::create([
            'conversation_id' => $conversation->id,
            'client_id' => $clientId,
            'message' => $message,
        ]);
        $conversation->update([
            'expired_at' => now()->addMinutes(10),
        ]);
    }

    public function getMessages()
    {
        $conversation = $this->getConversation();
        // reversing conversations because flex is upside down
        $messages = Message::where('conversation_id', $conversation->id)->get(['client_id', 'message'])->reverse()->values();
        return $messages;
    }

    public function getBotResponse($message)
    {
        $tag = $this->getConversation()->tag;
        $botQuery = BotQuery::where('text', 'like', "%{$message}%")->first();
        if ($botQuery) {
            $botResponse = $botQuery->botResponse;
            if (($tag == $botResponse->tag) || (!in_array($botResponse->tag, $this->networkTypes()))) {
                return $botResponse->text;
            }
        }
        return 'Sorry, I don\'t understand you. Could you please rephrase the question or type "help" to see what you can do?';
    }

    public function networkTypes(): array
    {
        return ['mtn', 'airtel', 'glo', '9mobile'];
    }

    public function removeConversationId() {
        session()->forget('conversation_id');
    }
}
