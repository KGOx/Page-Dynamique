<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    if (isset($_POST['email']))
    {
    echo $_POST['email'];
    };
};