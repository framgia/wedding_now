<?php

return [
    'role' => [
        'admin' => 1,
        'vendor' => 2,
        'client' => 3,
    ],
    'user' => [
        'image_default' => 'user_default.png',
    ],
    'api_location' => 'https://thongtindoanhnghiep.co',
    'type' => [
        'admin' => 'administrator',
        'vendor' => 'vendor',
        'client' => 'client',
    ],
    'type_schedule' => [
        'default' => 'default',
        'custom' => 'custom',
        'combo' => 'combo',
        'package' => 'package',
    ],
    'wedding' => [
        'of' => 'Wedding Of ',
        'slug' => 'wedding-of-',
        'default_image' => 'default-image.jpg',
    ],
    'image' => [
        'default' => 'storage/wedding/news-update-1.jpg',
        'custom' => 'storage/wedding/news-update-2.jpg',
        'combo' => 'storage/wedding/news-update-3.jpg',
    ],
    'main_schedule' => 'storage/wedding/main-schedule.jpg',
    'ring_img' => 'storage/wedding/icon_ring.png',
    'default_avatar' => 'storage/avatar/user_default.png',
    'days' => 30,
    'paginate' => 21,
    'done' => 1,
    'to_do' => 0,
    'image_card' => 'image-background',
    'logo' => 'storage/wedding/logo.png',
    'logo_fb' => 'storage/logo/fb.png',
    'logo_youtube' => 'storage/logo/youtube.png',
    'default' => 'default',
    'post' => [
        'default_image' => 'default.jpeg',
        'path' => 'storage/news/',
        'status' => [
            'draft' => 'draft',
            'public' => 'public',
        ],
        'topic' => [
            'path' => 'storage/news/topics/',
            'default_image' => 'default.svg',
        ],
        'paginate' => 10,
        'recommend' => 1,
        'newest' => 4,
        'most_popular' => 5,
        'no_paginate' => 0,
        'no_skip' => 0,
        'take_three_post' => 3,
        'take_five_post' => 5,
    ],
    'vn' => 'vn',
    'vi' => 'vi',
    'en' => 'en',
    'card' => [
        'template' => 'template',
        'custom' => 'custom',
        'name' => 'Card of ',
        'icon_load_more' => 'storage/wedding/icon_more.png',
    ],
    'schedule_name' => 'Schedule Wedding of ',
    'priority' => [
        'low' => 'low',
        'high' => 'high',
    ],
    'orderByDateFlow' => 'flow',
    'orderByDateUnflow' => 'unflow',
    'price_filter' => [
        'option_1' => [
            'min' => 0,
            'max' => 50000000,
        ],
        'option_2' => [
            'min' => 50000000,
            'max' => 100000000,
        ],
        'option_3' => [
            'min' => 100000000,
            'max' => 150000000,
        ],
        'option_4' => [
            'min' => 150000000,
        ],
    ],
    'real_wedding_paginate' => 6,
    'package_service_paginate' => 4,
    'zero' => 0,
];
