<?php

return [
    /**
     * Control if the seeder should create a user per role while seeding the data.
     */
    'create_users' => false,

    /**
     * Control if all the laratrust tables should be truncated before running the seeder.
     */
    'truncate_tables' => true,

    'roles_structure' => [
        'SuperAdmin' => [
            'users' => 'c,r,u,d',
            'profile' => 'r,u',
            'roles' => 'c,r,u,d',
            'permissions' => 'r,d',
            'units' => 'c,r,u,d',
            'items' => 'c,r,u,d',
            'branches' => 'c,r,u,d',
            'clients' => 'c,r,u,d',
            'inventory' => 'c,r,u,d'
        ],
        'Admin' => [
            'users' => 'c,r,u,d',
            'profile' => 'r,u',
            'roles' => 'c,r,u,d',
            'permissions' => 'r,d',
            'units' => 'c,r,u,d',
            'items' => 'c,r,u,d',
            'branches' => 'c,r,u,d',
            'clients' => 'c,r,u,d',
            'inventory' => 'c,r,u,d'
        ],
        'Employee' => [
            'users' => 'c,r,u,d',
            'profile' => 'r,u',
            'roles' => 'c,r,u,d',
            'permissions' => 'r,d',
            'units' => 'c,r,u,d',
            'items' => 'c,r,u,d',
            'branches' => 'c,r,u,d',
            'clients' => 'c,r,u,d',
            'inventory' => 'c,r,u,d'
        ]
    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
