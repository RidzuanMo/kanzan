<?php

return [
    "title" => "Kanzan",
    "timezone" => "Asia/Kuala_Lumpur",
    "style" => [],
    "script" => [
        "pre" => [],
        "post" => []
    ],
    "database" => [
        "default" => [
            "driver" => "mysql",
            "host" => "127.0.0.1",
            "database" => "kanzandb",
            "username" => "admin",
            "password" => "xs2admin",
            "charset" => "utf8",
            "collation" => "utf8_unicode_ci"
        ]
    ],
    "sourcecode" => [
        "config" => [
            "path" => __DIR__
        ],
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
        ],
		"migration" => [
			"path" => __DIR__ . "/db/migrations"
		],
		"seed" => [
			"path" => __DIR__ . "/db/seeds"
		]
    ],
    "view" => [
        "template" => __DIR__ . "/templates",
        "cache" => false
    ],
    "logger" => [
        "level" => "DEBUG",
        "path" => __DIR__ . "/logs/event.log"
    ]
];