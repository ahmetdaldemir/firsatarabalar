<?php

return [
    'active_env' => env('HYPER_ENV', 'testing'),
    'env' => [
        'testing' => [
            'initial_tracking_delay' => 1000,
        ],
        'production' => [
            'initial_tracking_delay' => 1000,
        ],
    ],
    'parasut' => [
        'version' => '1.0.0',
        'env' => [
            'testing' => [
                'path' => 'https://api.parasut.com',
                'send_delay' => 5000,
                'api_version'  => 'v4',
                'content_type'  => 'application/json',
                'crediantials' => ['id' =>'499592' ,'username' => 'QomP4FL8IdJDQYcLcciuqJdkkZqr80YLMvPWhsRZqK4', 'password' => 'xh74qlScaMPxmey9f22nmV_crSWetHNigQveHodOTcU']
            ],
            'production' => [
                'path' => 'https://api.parasut.com',
                'send_delay' => 5000,
                'api_version'  => 'v4',
                'content_type'  => 'application/json',
                'crediantials' => ['id' =>'499592' ,'username' => 'QomP4FL8IdJDQYcLcciuqJdkkZqr80YLMvPWhsRZqK4', 'password' => 'xh74qlScaMPxmey9f22nmV_crSWetHNigQveHodOTcU']
            ],
        ],
        'type' => 'rest',
        'docs' => [
            'api_doc' => 'https://apidocs.parasut.com',
            'developer_doc' => 'https://apidocs.parasut.com',
        ],
    ],

];