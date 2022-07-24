<?php

namespace App\Http\Controllers;

use App\Models\BotQuery;
use App\Models\BotResponse;
use App\Services\BotService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class BotController extends Controller
{
    protected $botService;

    public function __construct(BotService $botService)
    {
        $this->botService = $botService;
    }

    public function index()
    {
        $responses = $this->botService->getResponses();
        return Inertia::render('Admin/ManageBot', [
            'responses' => $responses,
        ]);
    }

    public function storeResponse(Request $request)
    {
        $request->validate([
            'text' => 'required',
            'tag' => 'required'
        ]);

        $this->botService->addResponse($request->text, $request->tag);

        return back()->with('success', 'Bot Response added successfully!');
    }

    public function updateResponse(BotResponse $botResponse, Request $request)
    {
        $request->validate([
            'text' => 'required',
            'tag' => 'required'
        ]);

        $this->botService->updateResponse($botResponse, $request->text, $request->tag);

        return back()->with('success', 'Bot response updated successfully!');
    }

    public function destroyResponse(BotResponse $botResponse, Request $request)
    {
        $this->botService->deleteResponse($botResponse);

        return back()->with('success', 'Bot response deleted successfully!');
    }

    public function storeQuery(BotResponse $botResponse, Request $request)
    {
        $request->validate([
            'text' => 'required'
        ]);

        $this->botService->addQuery($request->text, $botResponse);

        return back()->with('success', 'Bot query added successfully!');
    }

    public function updateQuery(BotQuery $botQuery, Request $request)
    {
        $request->validate([
            'text' => 'required',
        ]);

        $this->botService->updateQuery($botQuery, $request->text);

        return back()->with('success', 'Bot query updated successfully!');
    }

    public function destroyQuery(BotQuery $botQuery)
    {
        $this->botService->deleteQuery($botQuery);

        return back()->with('success', 'Bot query deleted successfully!');
    }
}
