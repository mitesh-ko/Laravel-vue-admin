<?php
return [
    'debug_ip' => env('DEBUG_IP', ''),

    'permissions' => [

        'Role Management' => [
            'List'   => [
                'displayName' => 'List',
                'name'        => 'roleList',
                'guard_name'  => 'web',
                'desc'        => '',
                'marginLeft'  => 0
            ],
            'Create' => [
                'displayName' => 'Create',
                'name'        => 'roleCreate',
                'guard_name'  => 'web',
                'desc'        => '',
                'marginLeft'  => 0
            ],
            'Update' => [
                'displayName' => 'Update',
                'name'        => 'roleUpdate',
                'guard_name'  => 'web',
                'desc'        => '',
                'marginLeft'  => 0
            ],
            'Delete' => [
                'displayName' => 'Delete',
                'name'        => 'roleDelete',
                'guard_name'  => 'web',
                'desc'        => '',
                'marginLeft'  => 0
            ]
        ],

        'Dashboard' => [
            'First Dashboard' => [
                'displayName' => 'First Dashboard',
                'name'        => 'firstDashboard',
                'guard_name'  => 'web',
                'desc'        => '',
                'marginLeft'  => 0
            ],
        ],

        'Permission Management' => [
            'List' => [
                'displayName' => 'List',
                'name'        => 'permissionList',
                'guard_name'  => 'web',
                'desc'        => '',
                'marginLeft'  => 0
            ],
        ],

        'User management' => [
            'List'    => [
                'displayName' => 'List',
                'name'        => 'userList',
                'guard_name'  => 'web',
                'desc'        => 'Access to see users list.',
                'marginLeft'  => 0
            ],
            'Create'  => [
                'displayName' => 'Create',
                'name'        => 'userCreate',
                'guard_name'  => 'web',
                'desc'        => 'Create a new user.',
                'marginLeft'  => 0
            ],
            'Update'  => [
                'displayName' => 'Update',
                'name'        => 'userUpdate',
                'guard_name'  => 'web',
                'desc'        => 'Update a existing user.',
                'marginLeft'  => 0
            ],
            'Delete'  => [
                'displayName' => 'Delete',
                'name'        => 'userDelete',
                'guard_name'  => 'web',
                'desc'        => 'Delete a existing user.',
                'marginLeft'  => 0
            ],
            'Login' => [
                'displayName' => 'Login As',
                'name'        => 'loginAs',
                'guard_name'  => 'web',
                'desc'        => 'Login to a user account.',
                'marginLeft'  => 0
            ]
        ],

        'Setting' => [
            'Site Config'           => [
                'displayName' => 'Site Config',
                'name'        => 'siteConfigUpdate',
                'guard_name'  => 'web',
                'desc'        => 'User can update site configuration.',
                'marginLeft'  => 0
            ],
            'Mail Settings'         => [
                'displayName' => 'Mail settings',
                'name'        => 'mailConfigUpdate',
                'guard_name'  => 'web',
                'desc'        => 'User can update mail configuration.',
                'marginLeft'  => 29
            ],
            'Email template list'   => [
                'displayName' => 'Email template list',
                'name'        => 'emailTemplateList',
                'guard_name'  => 'web',
                'desc'        => '',
                'marginLeft'  => 0
            ],
            'Email template update' => [
                'displayName' => 'Email template update',
                'name'        => 'emailTemplateUpdate',
                'guard_name'  => 'web',
                'desc'        => '',
                'marginLeft'  => 0
            ],
        ],
    ],
];
