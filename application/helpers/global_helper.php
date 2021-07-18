<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function isAdmin() {
    $role = $_SESSION['role'];
    return ($role == 'admin') ? true : false;
}

function isMitra() {
    $role = $_SESSION['role'];
    return ($role == 'mitra') ? true : false;
}

function isUser() {
    $role = $_SESSION['role'];
    return ($role == 'user') ? true : false;
}