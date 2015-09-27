<html>
<head>
<meta charset="UTF-8">
<title>Block Facebook Bookmarklet</title>
</head>
<body>
<center>
<h2>Block Facebook Bookmarklet</h2>
<table border="1" cellpadding="5"><tr>
	<td align="center">多次性</td><td align="center">一次性</td>
</tr><tr>
	<td align="center">
	<form action="" method="get">
		於<br>
		<input name="mode" type="hidden" value="after" required>
		<input name="d" type="number" min="0" value="<?php echo @(is_numeric($_GET["d"])?$_GET["d"]:"0"); ?>" required>日<br>
		<input name="hr" type="number" min="0" value="<?php echo @(is_numeric($_GET["hr"])?$_GET["hr"]:"0"); ?>" required>時<br>
		<input name="min" type="number" min="0" value="<?php echo @(is_numeric($_GET["min"])?$_GET["min"]:"5"); ?>" required>分<br>
		後 <input type="submit" value="送出">
	</form>
	</td><td align="center">
	<form action="" method="get">
		於
		<input name="mode" type="hidden" value="time">
		<input name="dt" id="dt" type="datetime-local" value="<?php echo (isset($_GET["dt"])?$_GET["dt"]:date("Y-m-d\TH:i:s",time()+60*5)); ?>" required>
		結束<br><input type="submit" value="送出">
	</form>
	</td>
</tr></table>
<br>
拖曳到書籤列 <a id="url" href="" onclick="alert('拖曳到書籤列');return false;">BlockFB</a><br>
code<br>
<textarea id="urlcode" cols="80" rows="7" disabled></textarea>
<script>
var code1='javascript:if(location.host=="www.facebook.com"){document.cookie="c_user=;domain=.facebook.com";document.cookie="c_user=;expires=';
var code3=';location.reload();}else if(confirm("現在網址為 "+location.host+"\\n你應該要在 www.facebook.com 執行此書籤\\n請問要立即前往嗎?")){location="http://www.facebook.com";};';
<?php
$time=false;
if(@$_GET["mode"]=="after"){
	$time=0;
	$time+=@$_GET["d"];$time*=24;
	$time+=@$_GET["hr"];$time*=60;
	$time+=@$_GET["min"];$time*=60;
	echo 'var code2=\'"+new Date(new Date().getTime()+1000*'.$time.').toGMTString()\';';
}else if(@$_GET["mode"]=="time"){
	echo 'var code2=\'"+(new Date('.(strtotime($_GET["dt"])*1000).').toGMTString())\';';
}else {
	echo 'var code2=\'"+(new Date('.((time()+60*5)*1000).').toGMTString())\';';
}
?>
var code=code1+code2+code3;
url.href=code;
urlcode.value=code;
</script>
<hr>
<?php
include("../function/developer.php");
?>
</center>
</body>
</html>