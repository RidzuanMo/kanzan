<?php

return [
    "title" => "Kanzan",
    "timezone" => "Asia/Kuala_Lumpur",
    "style" => [],
    "script" => [
        "pre" => [],
        "post" => [
            
        ]
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