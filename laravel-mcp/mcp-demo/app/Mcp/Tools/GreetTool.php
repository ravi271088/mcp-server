<?php

namespace App\Mcp\Tools;

use Illuminate\Contracts\JsonSchema\JsonSchema;
use Laravel\Mcp\Request;
use Laravel\Mcp\Response;
use Laravel\Mcp\Server\Tool;

class GreetTool extends Tool
{
    protected string $description = 'Greets a person by name.';

    public function schema(JsonSchema $schema): array
    {
        return [
            'name' => $schema->string()->description('Name of the person')->required(),
        ];
    }

    public function handle(Request $request): Response
    {
        $data = $request->validate(['name' => 'required|string']);

        return Response::text("Hello, {$data['name']}! MCP server is working.");
    }
}