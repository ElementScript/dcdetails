<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../dist/main.bundle.css">

        <style>

            #svg3705 path {
                stroke-dasharray: 775; /* cria um traço do tamanho do path inteiro */
                stroke-dashoffset: 775; /* empurrar o traço para fora da visão */
                animation: draw 5s linear forwards;
            }
            
            @keyframes draw {
                to {
                    stroke-dashoffset: 0;
                }
            }

        </style>

    </head>
    <body>

        <div class="container-fluid"> <!-- INICIO DO CONTAINER PRINCIPAL -->

<?php

session_start();

const ACCESS_DENIED = 3330;
const EXPIRY = 604800;

$GLOBALS['config'] = [
    'mysql' => [
        'host' => '127.0.0.1',
        'username' => 'root',
        'password' => 'guitar',
        'db' => 'lr'
    ],

    'remember' => [
        'cookie_name' => 'hash',
        'cookie_expiry' => 'token'
    ],

    'session' => [
        'session_name' => 'user',
        'token_name' => 'token'
    ]
];
