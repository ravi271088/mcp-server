<?php

namespace App\Mcp\Prompts;

use Laravel\Mcp\Request;
use Laravel\Mcp\Response;
use Laravel\Mcp\Server\Prompt;
use Laravel\Mcp\Server\Prompts\Argument;

class GreetPrompt extends Prompt
{
    protected string $description = 'Template to write a friendly greeting message.';

    public function arguments(): array
    {
        return [
            new Argument(name: 'name', description: 'Person to greet', required: true),
        ];
    }

    public function handle(Request $request): Response
    {
        $name = $request->get('name');

        return Response::text("Write a short, friendly greeting message for {$name}.");
    }
}