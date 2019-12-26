<?php

return [
    'dashboard' => [
        'name' => 'Dashboard',
        'icon' => 'home',
        'url' => '/dashboard'
    ],
    'Members' => [
        'name' => 'Members',
        'icon' => 'users',
        'url' => '/students'
    ],
    'payment' => [
        'name' => 'Payments',
        'icon' => 'credit-card',
        'url' => '/payments'
    ],
    'plan' => [
        'name' => 'Plans',
        'icon' => 'award',
        'url' => '/plans',
     ],
     'notify' => [
         'name' => 'Notify',
         'icon' => 'award',
         'url' => '/notify'
     ],
     'account' => [
        'name' => 'Account',
        'icon' => 'award',
        'url' => '/account',
        'items' => [
            'profile' => [
                'name' => 'Profile',
                'icon' => '',
                'url' => '/profile'
            ],
            'billing' => [
                'name' => 'Billing',
                'icon' => '',
                'url' => '/billing'
            ],
            'merchantservice' => [
                'name' => 'Merchant Service',
                'icon' => '',
                'url' => '/merchantservice'
            ]
        ]
    ],
    /* 'branch' => [
        'name' => 'Branches',
        'icon' => 'git-branch',
        'url' => '/branches'
    ],
    'class' => [
        'name' => 'Classes',
        'icon' => 'pen-tool',
        'url' => '/classes'
    ],
    'studio' => [
        'name' => 'Studio Settings',
        'icon' => 'settings',
        'url' => '/studio'
    ], */
    'setting' => [
        'name' => 'Settings',
        'icon' => 'settings',
        'url' => '/settings',
        'items' => [
            'waivers' => [
                'name' => 'Waivers',
                'icon' => '',
                'url' => '/waivers'
            ],
            'payments' => [
                'name' => 'Payments',
                'icon' => '',
                'url' => '/payments'
            ]
        ]
    ],
   
];
