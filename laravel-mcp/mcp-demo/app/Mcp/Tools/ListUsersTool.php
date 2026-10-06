<?php

namespace App\Mcp\Tools;

use Illuminate\Contracts\JsonSchema\JsonSchema;
use Illuminate\Support\Facades\Http;
use Laravel\Mcp\Request;
use Laravel\Mcp\Response;
use Laravel\Mcp\Server\Tool;

class ListUsersTool extends Tool
{
    protected string $description = 'Lists all users from the users API.';

    public function schema(JsonSchema $schema): array
    {
        return [];
    }

    public function handle(Request $request): Response
    {
        $res = Http::acceptJson()
            ->timeout(10)
            ->get(config('app.url') . '/users');

        if ($res->failed()) {
            return Response::error("API failed with status {$res}");
        }

        return Response::text($res->body());
    }
}