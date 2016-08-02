<?php
return [
    'likeAndFollow' => [
        'type' => 2,
    ],
    'activated' => [
        'type' => 2,
        'description' => 'Пользователь активирован',
        'ruleName' => 'activated',
    ],
    'user' => [
        'type' => 1,
        'description' => 'Пользователь',
        'children' => [
            'activated',
            'likeAndFollow',
        ],
    ],
    'editOwnInformation' => [
        'type' => 2,
        'description' => 'Редактировать свою информацию',
        'ruleName' => 'editOwnInformation',
    ],
    'professional' => [
        'type' => 1,
        'description' => 'Профессионал',
        'children' => [
            'user',
            'editOwnInformation',
        ],
    ],
    'addPosts' => [
        'type' => 2,
        'description' => 'Добавлять статьи',
    ],
    'author' => [
        'type' => 1,
        'description' => 'Автор',
        'children' => [
            'professional',
            'addPosts',
        ],
    ],
    'editUsersInformation' => [
        'type' => 2,
        'description' => 'Возможность редактировать информацию о пользователях',
    ],
    'admin' => [
        'type' => 1,
        'description' => 'Админ',
        'children' => [
            'author',
        ],
    ],
];
