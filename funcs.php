<?php

function clear(){//ф-ия экронирует спец.символы
	global $db;//делаем переменную глобальной,чтоб определялась внутри ф-ии
	foreach ($_POST as $key => $value) {//проходим циклом по ключам и значениям
		$_POST[$key] = mysqli_real_escape_string($db, $value);//значениям применям ф-ию экронирования
	}
}

function generate_a_message() {
	global $db;
	clear();
	extract($_POST);
	$insert = "INSERT INTO `gb` (name,text) VALUES ('$name','$text')";
	$res_insert = mysqli_query($db, $insert);
}

function get_message () {
	global $db;
	//$res = "SELECT * FROM gb ORDER BY id DESC";
	$select = mysqli_query($db, "SELECT * FROM gb ORDER BY id DESC");
	return mysqli_fetch_all($select,MYSQLI_ASSOC);
}

function print_arr ($arr) {
	echo '<pre>' . print_r($arr,true) . '</pre>';
}