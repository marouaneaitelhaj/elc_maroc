<?php
class Logout extends controller{
    public function __construct()
    {
        session_start();
        session_unset();
        session_destroy();
        exit(header('location: ./'));
        
    }
}