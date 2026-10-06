<?php

namespace App\Mcp\Tools;

use Illuminate\Contracts\JsonSchema\JsonSchema;
use Illuminate\Support\Facades\Http;
use Laravel\Mcp\Request;
use Laravel\Mcp\Response;
use Laravel\Mcp\Server\Tool;

class GetUserTool extends Tool
{
    protected string $description = 'Fetches a single user by ID from the users API.';

    public function schema(JsonSchema $schema): array
    {
        return [
            'id' => $schema->integer()->description('User ID')->required(),
        ];
    }

    public function handle(Request $request): Response
    {
        $data = $request->validate(['id' => 'required|integer']);

        $res = Http::acceptJson()
            ->timeout(10)
            ->get(config('app.url') . "/users/{$data['id']}");

        if ($res->status() === 404) {
            return Response::error("User {$data['id']} not found.");
        }

        if ($res->failed()) {
            return Response::error("API failed with status {$res->status()}");
        }

        return Response::text($res->body());
    }
}