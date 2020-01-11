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
    'main/about' => [
        'controller' => 'main',
        'action' => 'about',
    ],
    'news/show' => [
        'controller' => 'news',
        'action' => 'show',
    ]
];