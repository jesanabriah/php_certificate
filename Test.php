<?php

require_once('getName.php');
require_once('getCertificate.php');

//The test user id on database
$id = '1';

//Get name of user from database by id
$name = getName($id);

//Generate certificate for $name
getCertificate($name);
