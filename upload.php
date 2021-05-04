<?php

/* Checked upload file on type, we are can upload only img*/
function checkTypeFile($type)
{
    $alltypes =
        [
            'image/gif',
            'image/png',
            'image/jpeg',
            'image/jpg'

        ];
    return in_array($type, $alltypes);
}

//assert(checkTypeFile('image/jpg') == true);

/* check upload file on (empty,error,type)*/
function checkFile($file)
{
    if (empty($_FILES[$file])) {
        return false;
    }
    if ($_FILES[$file]['error'] != 0) {
        return false;
    }
    if (!checkTypeFile($_FILES[$file]['type'])) {
        return false;
    }
    if (is_uploaded_file($_FILES[$file]['tmp_name'])) {
        $res = move_uploaded_file($_FILES[$file]['tmp_name'], __DIR__ . '/imgs/' . $_FILES['file']['name']);
        if ($res) {
            return '/imgs/' . $_FILES[$file]['name'];
        } else {
            return false;
        }
    }
    return false;
}

/* delete point in array imgs */
function deletePoint()
{
    $points =
        [
            '.',
            '..'
        ];
    $imgs = scandir(__DIR__ . '/imgs/');
    return array_diff($imgs, $points);
}

function readDB()
{
    return file(__DIR__ . '/database.txt', FILE_IGNORE_NEW_LINES);
}

function newRecord()
{
    $data = [];
    $rec = readDB();
    foreach ($rec as $value) {
        $data[] = explode('|', $value);
    }
    return $data;
}