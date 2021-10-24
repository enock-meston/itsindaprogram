<?php
defined('DB_HOSTNAME') ? null : define('DB_HOSTNAME', 'localhost');
defined('DB_USERNAME') ? null : define('DB_USERNAME', 'root');
defined('DB_PASSWORD') ? null : define('DB_PASSWORD', '');
defined('DB_DATABAS') ? null : define('DB_DATABASE', 'itsinda');

$con = mysqli_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_DATABASE) or die("Error occured while connecting to the database. Please try again later!");

defined('NOTIFY_MAIL') ? null : define('NOTIFY_MAIL','ask@nigoote.com');
defined('NOTIFY_KEY') ? null : define('NOTIFY_KEY','Enock@132'); // password here