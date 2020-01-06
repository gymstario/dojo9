<?php

return [
    'dashboard' => [
        'name' => 'Dashboard',
        'icon' => 'home',
        'url' => '/dashboard',
    ],
    'Members' => [
        'name' => 'Members',
        'icon' => 'users',
        'url' => '/members',
    ],
    'payment' => [
        'name' => 'Payments',
        'icon' => 'credit-card',
        'url' => '/payments',
    ],
    'plan' => [
        'name' => 'Plans',
        'icon' => 'award',
        'url' => '/plans',
    ],
    'notify' => [
        'name' => 'Notify',
        'icon' => 'award',
        'url' => '/notify',
    ],
    'account' => [
        'name' => 'Account',
        'icon' => 'award',
        'url' => '/account',
        'items' => [
            'locations' => [
                'name' => 'Locations',
                'icon' => '',
                'url' => '/account/locations',
            ],
            'profile' => [
                'name' => 'Profile',
                'icon' => '',
                'url' => '/account/profile',
            ],
            'billing' => [
                'name' => 'Billing',
                'icon' => '',
                'url' => '/account/billing',
            ],
            'merchantservice' => [
                'name' => 'Merchant Service',
                'icon' => '',
                'url' => '/account/merchant',
            ],
        ],
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
                'url' => '/waivers',
            ],
            'payments' => [
                'name' => 'Payments',
                'icon' => '',
                'url' => '/payments',
            ],
        ],
    ],

];
