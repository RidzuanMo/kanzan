<?php

return [
    "title" => "Kanzan",
    "timezone" => "Asia/Kuala_Lumpur",
    "style" => [],
    "script" => [
        "pre" => [],
        "post" => []
    ],
    "sourcecode" => [
        "controller" => [
            "path" => __DIR__ . "/app/Controllers"
        ],
        "model" => [
            "path" => __DIR__ . "/app/Models"
        ],
        "module" => [
            "path" => __DIR__ . "/app/Modules"
        ],
        "portal" => [
            "path" => __DIR__ . "/templates/portal"
        ],
        "application" => [
            "path" => __DIR__ . "/templates/app"
        ]
    ],
    "view" => [
        "template" => __DIR__ . '/templates',
        "cache" => false
    ],
    "logger" => [
        "level" => "DEBUG",
        "path" => __DIR__ . "/logs/event.log"
    ]
];