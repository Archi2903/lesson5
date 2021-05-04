<?php
require __DIR__ . '/upload.php';
require __DIR__ . '/funct.php';

if (!empty($_FILES['file'])) {
    $data = [];
    $data['date'] = date('d.m.Y H:i:s');
    $data['name'] = getCurrentUser();
    $res = checkFile('file');
    if ($res != false) {
        $data['pathFile'] = (string)$res;
    }
}
//var_dump($data['date']);
//var_dump($data['name']);
//var_dump($data['pathFile']);

$allrec = readDB();
/* Save inform in dataBase*/
if (isset($data['date']) && isset($data['name'])
    && isset($data['pathFile'])) {
    $line = implode('|', $data);
    $allLine[] = (string)$line;
    file_put_contents(__DIR__ . '/database.txt', implode(PHP_EOL, $allLine) . PHP_EOL, FILE_APPEND);
}
header('Location:index5.php');
exit;