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
        '100e82ba-e1c0-4153-8633-e1bd228f7399' => [
            'user' => 'c,r,u,d',
            'category' => 'c,r,u,d',
            'post' => 'c,r,u,d',
            'image' => 'c,r,u,d',
            'video' => 'c,r,u,d',
            'event' => 'c,r,u,d',
            'exhibition' => 'c,r,u,d',
        ],
    ],
    'roles_label' => [
        '100e82ba-e1c0-4153-8633-e1bd228f7399' => [
            'name' => 'admin',
        ],
    ],
    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete',
    ],
];
