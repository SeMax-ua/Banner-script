<?
include_once 'db.conf.php';
echo '<center><h1>Баннеры</h1>';
$content ='';
if($result = $db -> query("SELECT * FROM `banners` WHERE 1")){
	
	while($row = $result -> fetch_assoc()) {
			$codedb = htmlspecialchars_decode($row['code']);
			$content .= $codedb.'<br>';
	}
}
	echo $content;
?>