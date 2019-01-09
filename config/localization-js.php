<?php

return [

    /*
     * Set the names of files you want to add to generated javascript.
     * Otherwise all the files will be included.
     *
     * 'messages' => [
     *     'validation',
     *     'forum/thread',
     * ],
     */
    'messages' => [
        'adminMess',
        'auth',
        'messages',
        'pagination',
        'passwords',
        'validation',
    ],

    /*
     * The default path to use for the generated javascript.
     */
    'path' => public_path('messages.js'),
];
