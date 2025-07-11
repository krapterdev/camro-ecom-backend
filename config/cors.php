<?php

// return [
//     // 'paths' => ['*'],   
//     'paths' => ['api/*', 'login', 'logout', 'register', 'sanctum/csrf-cookie', 'user'],

//     'allowed_methods' => ['*'],

//     'allowed_origins' => ['http://localhost:5173'],

//     // 'allowed_origins_patterns' => [],

//     'allowed_headers' => ['*'],

//     // 'exposed_headers' => [],

//     // 'max_age' => 0,

//     'supports_credentials' => true, // ✅ This must be true for cookies/session

// ];


return [

    'paths' => ['api/*', 'sanctum/csrf-cookie', '*'], // You can also add '*' if you're not using API routes

    'allowed_methods' => ['*'], // Allow all methods (GET, POST, PUT, DELETE...)

    'allowed_origins' => ['http://localhost:5173'], // React app origin (Vite)

    'allowed_origins_patterns' => [],

    'allowed_headers' => ['*'],

    'exposed_headers' => [],

    'max_age' => 0,

    'supports_credentials' => true,

];
