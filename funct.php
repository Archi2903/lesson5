<?php

// return array all users and password hash
function getUsersList()
{
    $arr =
        [
            'Arthur' => '123456',
            'Unknown' => '0000',
            '1'=>'1',
            'Guest'=>'Guest'
        ];
    $userList = [];

    foreach ($arr as $login => $pass) {
        $userList[$login] = password_hash($pass, PASSWORD_DEFAULT);
    }
    return $userList;
}

//$userList = getUsersList();
//print_r(getUsersList()[]);
//print_r(getUsersList()[$login]);
//print_r(getUsersList());
// Checked user
function existsUser($login): bool
{
    $userList = getUsersList();
    return isset($userList[$login]);
}

//assert(existsUser('Arthur') === true);
//assert(existsUser('Olya') === true);
//assert(existsUser('Olya') === false);

// Checked  password
function сheckPass($login, $password)
{
    return existsUser($login) && password_verify($password, getUsersList()[$login]);

    }


//assert(сheckPass('Arthur','123456') === true);
//assert(сheckPass('Evil','123456') === true);

//Cookies
function login($login)
{
    setcookie('user', $login, time() + 3600);
}

//return name User or null
function getCurrentUser()
{
    if (isset($_COOKIE['user'])) {
        return $_COOKIE['user'];
    } else {
        return null;
    }
}

//login('Arthur');
//print_r(getCurrentUser());
function logout() //выход с сайта
{
    unset($_COOKIE['user']);
    setcookie('user', '', time()-3600);
}