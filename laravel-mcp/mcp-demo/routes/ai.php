<?php
use App\Mcp\Servers\DemoServer;
use Laravel\Mcp\Facades\Mcp;

Mcp::web('/mcp/demo', DemoServer::class);
Mcp::local('demo', DemoServer::class);
