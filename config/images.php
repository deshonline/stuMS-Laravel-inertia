<?php

return [
    'driver' => env('IMAGE_DRIVER','gd'),
    'upload' => env('IMAGE_UPLOAD_PATH','/upload'),
    'access_path' => env('IMAGE_PATH','http://stud.in/stud/upload'),

    1 => ['width' => 35, 'height' => 35],
    2 => ['width' => 480, 'height' => 635],
    3 => ['width' => 1920, 'height' => 700],
    4 => ['width' => 960, 'height' => 960],
    5 => ['width' => 105, 'height' => 140],
];
