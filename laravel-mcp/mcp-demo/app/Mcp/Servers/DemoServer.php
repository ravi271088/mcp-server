<?php

namespace App\Mcp\Servers;

use App\Mcp\Tools\GreetTool;
use App\Mcp\Tools\GetUserTool;
use App\Mcp\Tools\ListUsersTool;
use App\Mcp\Prompts\GreetPrompt;
use Laravel\Mcp\Server;
use Laravel\Mcp\Server\Attributes\Instructions;
use Laravel\Mcp\Server\Attributes\Name;
use Laravel\Mcp\Server\Attributes\Version;

#[Name('Demo Server')]
#[Version('0.0.1')]
#[Instructions('Instructions describing how to use the server and its features.')]
class DemoServer extends Server
{
    protected array $tools = [
        GreetTool::class,
        GetUserTool::class,
        ListUsersTool::class,
    ];

    protected array $resources = [
        //
    ];

    protected array $prompts = [
        GreetPrompt::class,
    ];
}
