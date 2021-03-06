<?

$url = $_GET['url'];
$url = rtrim($url, '/');
$url = explode('/', $url);
$domainName = 'http://localhost/bek/';
$cssFilePath = $domainName . 'includes/style.css';
$jqueryFilePath = $domainName . 'includes/jquery-library.min.js';
$jsFunctionsFilePath = $domainName . 'includes/jsFunctions.js';

$homepageGet = 'home';
$setBodyContainerOn = false;
$GetPageVal = $url[0];
$getpage = (isset($GetPageVal) && !empty($GetPageVal) && $GetPageVal !== 'logout' ) ? $url[0] : $homepageGet;
$script_page = return_page_param();


function check_empty_fields($fields_arr) {
	$empty_fields_arr = array();
	foreach ($fields_arr as $k => $v) {
		if ($v == '') {
			$empty_fields_arr[] = $k;
		}
	}
	return $empty_fields_arr;
}

function return_page_param() {
    return 'scripts/' . $GLOBALS['getpage'] . '_page.php';
}

function console($log, $type = 'log') {
	$type = ($type && $type !== 'log') ? $type : 'log';
	print "<script>console.$type($log)</script>";
}

function return_globals() {
	//$arr = new Array();
	foreach ($GLOBALS as $k => $v) {
		if ($k !== 'GLOBALS')
			$arr[$k] = $v;
	}
	return @json_encode($arr);
}


$menuArray = array(
	"home" => "$l_main",
	"video" => "$l_videos",
	"gallery" => "$l_pictures",
	"songs" => "$l_songs",
	"news" => "$l_news",
	"aboutus" => "$l_aboutUs",
	"contactus" => "$l_contactUs"
);

function getMenu() {
	return $GLOBALS['menuArray'];
}
