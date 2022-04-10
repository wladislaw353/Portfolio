<?php
$status = $_POST['status'];
$token = $_POST['token'];

// Сохраняем изменения брифа в БД
$mysqli = new mysqli('dr319515.mysql.tools', 'dr319515_db', 'WXElr5vk', 'dr319515_db');
$mysqli->set_charset("utf8");
$mysqli->query("UPDATE ww_brif SET status = '$status' WHERE token = '$token'");
$mysqli->close();