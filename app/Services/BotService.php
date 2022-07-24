<?php

namespace App\Services;

use App\Models\BotQuery;
use App\Models\BotResponse;

class BotService {

    public function getResponses() {
        return BotResponse::with('queries')->get();
    }

    public function addResponse($text, $tag)
    {
        BotResponse::create([
            'text' => $text,
            'tag' => $tag
        ]);
    }

    public function updateResponse(BotResponse $bot, $text, $tag)
    {
        $bot->update([
            'text' => $text,
            'tag' => $tag
        ]);
    }

    public function deleteResponse(BotResponse $bot)
    {
        $bot->queries()->delete();
        $bot->delete();
    }

    public function addQuery($text, BotResponse $botResponse)
    {
        BotQuery::create([
            'text' => $text,
            'bot_response_id' => $botResponse->id
        ]);
    }

    public function updateQuery(BotQuery $botQuery, $text)
    {
        $botQuery->update([
            'text' => $text
        ]);
    }

    public function deleteQuery(BotQuery $botQuery)
    {
        $botQuery->delete();
    }
}
