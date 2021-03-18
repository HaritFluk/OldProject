<?php
$host = "localhost";
$uname = "root";
$passwd = "";
$db = "thaiorange";
$condb = mysqli_connect($host,$uname,$passwd,$db);
$condb->set_charset('utf8');
date_default_timezone_set('Asia/bangkok');

define("URL", "http://localhost/ThaiOrange/");
define("CSS", URL."css/");
define("JS", URL."js/");
define("PLUGIN", URL."plugin/");
define("DataTables", URL."DataTables/");

	function DateThai($strDate)
	{
		$strYear = date("Y",strtotime($strDate))+543;
		$strMonth= date("n",strtotime($strDate));
		$strDay= date("j",strtotime($strDate));
		$strHour= date("H",strtotime($strDate));
		$strMinute= date("i",strtotime($strDate));
		$strSeconds= date("s",strtotime($strDate));
		$strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
		$strMonthThai=$strMonthCut[$strMonth];
		return "$strDay $strMonthThai $strYear  $strHour:$strMinute";
	}
?>