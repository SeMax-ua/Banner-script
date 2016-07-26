<?
	include_once 'db.conf.php';
	echo '<h1>Добавить баннер</h1>';
	
	if(isset($_POST['send_btn']))
	{
		if(empty($_POST['code']) or empty($_POST['nick'])){
			exit('<div>Вы не заполнили все поля. Вы будете автоматически переброшены обратно через <span id="timer"></span> сек.</div>
				<br>Если этого не произошло, кликните <a href="add.php">сюда</a>.
					<script type="text/javascript"><!--
					var t=6;
					function refr_time()
					{
					  if (t>0)
					  {
						t--;
						document.getElementById("timer").innerHTML=t;
					  } else
					  {
						clearInterval(tm);
						location.href="add.php";
					  }
					}
					var tm=setInterval("refr_time();",1000);
					--></script>');
		}else{
			$stmt = $db ->prepare("INSERT INTO `banners` (`code`, `name`) VALUES(?, ?)");
			$stmt -> bind_param('ss', $code, $nick);
			
			$codedb = htmlspecialchars($_POST['code']);
			$code = $db -> real_escape_string($codedb);
			$nick = $db -> real_escape_string($_POST['nick']);
			
			$stmt -> execute();
			$stmt -> close();
		}
	}
	
	$content = '<form action="add.php" method="post">
	<b>Код:</b><textarea rows="10" cols="100" name="code"></textarea>
	<p><b>Ник:</b><input type="text" name="nick" style="width: 720px;"/></p>
	<p><input type="submit" name="send_btn"/></p>
	</form>';

	$banner = '<hr><h2>Ваш баннер: </h2><br>'.$_POST['code'].'<br><h3>Спасибо '.$_POST['nick'].'!<h3>';
	echo $content;
	
	if(isset($_POST['send_btn']))
		echo $banner;
?>