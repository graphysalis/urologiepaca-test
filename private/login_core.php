<?php
function checkLogin($user, $pass)
{
 $validUser = 'admin';
 $validPass = '1234';
 return $user === $validUser && $pass === $validPass;
}
