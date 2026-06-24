<?php

return [
    'temporary_file_upload' => [
        'disk' => 'local', // Changed from 'public' to 'local'
        'rules' => ['required', 'image', 'max:10240'],
        'directory' => 'livewire-tmp',
        'middleware' => null,
        'preview_mimes' => [
            'png', 'gif', 'bmp', 'svg', 'wav', 'mp4',
            'mov', 'avi', 'wmv', 'mp3', 'm4a',
            'jpg', 'jpeg', 'mpga', 'webp', 'wma',
        ],
        'max_upload_time' => 5, // minutes
    ],
];