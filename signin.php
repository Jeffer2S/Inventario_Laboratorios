<?php
session_start();

require './vendor/autoload.php';

use myPHPnotes\Microsoft\Auth;

$tenant = "organizations";
$client_id = "e48eb9d4-8746-4089-aa89-f00888d0164b";
$client_secret = "p2_8Q~RyC9WE1.gHJAOxtrsYtXGqTyWJij8efbGh";
$callback = "http://localhost/newUser.php";
//$scopes = ['User.Read', 'Files.ReadWrite.All', 'offline_access'];
$scopes = ['User.Read'];

$microsoft = new Auth($tenant, $client_id, $client_secret, $callback, $scopes);
header('location: ' . $microsoft->getAuthUrl());
// https://login.microsoftonline.com/
// a988ccd4-00ed-4bf3-a4d1-b5661f44abdf id iquilino
