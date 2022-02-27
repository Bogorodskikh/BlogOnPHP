<?php

return[
    '~^articles/(\d+)$~' => [\MyProject\Controllers\ArticlesController::class, 'view'],
    '~^hello/(.*)$~' => [\MyProject\Controllers\MainController::class, 'sayHello'],
    '~^articles/(\d+)/edit$~' => [\MyProject\Controllers\ArticlesController::class, 'edit'],
    '~^comments/(\d+)/edit$~' => [\MyProject\Controllers\ArticlesController::class, 'commentsEdit'],
    '~^comments/(\d+)/delete$~' => [\MyProject\Controllers\ArticlesController::class, 'commentsDelete'],
    '~^articles/(\d+)/comments$~' => [\MyProject\Controllers\ArticlesController::class, 'comments'],
    '~^articles/add$~' => [\MyProject\Controllers\ArticlesController::class, 'add'],
    '~^articles/delete/(\d+)$~' => [\MyProject\Controllers\ArticlesController::class, 'delete'],
    '~^users/register$~' => [\MyProject\Controllers\UsersController::class, 'signUp'],
    '~^users/(\d+)/activate/(.+)$~' => [\MyProject\Controllers\UsersController::class, 'activate'],
    '~^users/login$~' => [\MyProject\Controllers\UsersController::class, 'login'],
    '~^users/unlog$~' => [\MyProject\Controllers\UsersController::class, 'unlog'],
    '~^$~' => [\MyProject\Controllers\MainController::class, 'main'],
    '~^(\d+)$~' => [\MyProject\Controllers\MainController::class, 'page'],
    '~^before/(\d+)$~' => [\MyProject\Controllers\MainController::class, 'before'],
    '~^after/(\d+)$~' => [\MyProject\Controllers\MainController::class, 'after'],
    
    
];