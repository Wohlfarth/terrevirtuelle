<!--
##-----------------------------------------------------------------##
##                                                                 ##
##                                                                 ##
## © Copyright Stephen Heylings 2003. All rights reserved. No part ##
## of this or any of the attached documents shall be               ##
## reproduced/stored in any way whatsoever without written         ##
## permission from the Copyright holder.                           ##
##   The Copyright holder holds no responsibility for errors or    ##
## omissions. No liability is assumed in any way for damages       ##
## resulting from the use of this document/program.                ##
##                                                                 ##
## Have a nice day.                                                ##
##                                                                 ##
##                                                                 ##
##-----------------------------------------------------------------##
-->
<html>
<head>
<link rel='stylesheet' type='text/css' href="main.css">
<title></title>
</head>
<p align=center><img src=logo.gif /></p>
<br><br>
<? $url = $_POST['url']; ?>
<form action="index.php" method="POST">
<center>
<input type="text" name="url" value="<? echo $url; ?>">
<input type="submit" name="submit">
</center>
</form>
<?
echo $url;
if ($url!="") { // if url is submitted then


	global $BrokenLinks, $TotalLinks, $WarningLinks;
	include "config.php";
	
	$aUrls = array();
	
	foreach ($start_url as $sUrl) {
		$oUrl = new cLink;
		$oUrl->SetParentUrl("Given by user");
		$oUrl->SetUrl($sUrl);
		
		$aUrls[$sUrl] = $oUrl;
	}
	
} // end if url is submitted




if(!$BrokenLinks){$BrokenLinks="0";}
if(!$WarningLinks){$WarningLinks="0";}

echo"<p>Complete: $TotalLinks links were checked. $WarningLinks warnings and $BrokenLinks errors were found.</p>
</body>
</html>
";
?>