<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./node_modules/normalize.css/normalize.css">
    <link rel="stylesheet" href="./App/style/css/main.css">

    <style>

        #logoD{
            position: relative;
            animation: D 20s linear infinite;
        }

        #logoC{
            position: relative;
            animation: C 20s linear infinite;
        }
    
        @keyframes D{
            0%{
                opacity: 1
            }
            
            10%{
                opacity: .75
            }
            
            20%{
                opacity: .5
            }
            
            30%{
                opacity: .25
            }
            
            40%{
                opacity: 0
            }
            
            50%{
                opacity: 0
            }

            60%{
                opacity: .25
            }

            70%{
                opacity: .5
            }

            80%{
                opacity: .75
            }

            90%{
                opacity: 1
            }

            100%{
                opacity: 1
            }
        }

        @keyframes C{
            0%{
                opacity: 0
            }
            
            10%{
                opacity: .25
            }
            
            20%{
                opacity: .5
            }
            
            30%{
                opacity: .75
            }
            
            40%{
                opacity: 1
            }
            
            50%{
                opacity: 1
            }

            60%{
                opacity: .75
            }

            70%{
                opacity: .5
            }

            80%{
                opacity: .25
            }

            90%{
                opacity: 0
            }

            100%{
                opacity: 0
            }
        }
        
    </style>
    
  </head>
  <body>

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
