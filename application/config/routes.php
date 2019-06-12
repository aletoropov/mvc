<?php

/**
 * Файл роутинга маршрутов.
 *
 * @return array
 */

return [
    '' => [
        'controller' => 'main',
        'action' => 'index',
    ],
    'account/login' => [
        'controller' => 'account',
        'action' => 'login',
    ],
    'news/show' => [
        'controller' => 'news',
        'action' => 'show',
    ]
];