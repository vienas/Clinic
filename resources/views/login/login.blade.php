@extends('layouts.app')

@section('content')

<?php
require_once('\login\db.php');

session_start();

if (!empty($_POST['login']) && !empty($_POST['password'])) {
    
    if ($_POST['login'] == USERNAME) {

        if ($_POST['password'] == PASSWORD) {
        
            echo "Logged in successfully";
        
            }
        
        }

    }


?>
@endsection