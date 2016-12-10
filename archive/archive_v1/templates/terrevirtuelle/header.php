<?
// submenu experiments
function contentmenu1 ($i){
$items = array(
	'Introduction',
	'Code HTML de cette page', 
	'Ent&ecirc;te PHP de ce site', 
	'Styles CSS',
	'Librairie iTunes avec XSL',
	'HTML caract&egrave;res sp&eacute;ciaux',
	);
	
	foreach($items as $cle=>$valeur) {
		$menu= $_GET[id];
		if ($menu==$cle) { $class="on"; } else { $class="off"; }
    		echo '<a href=?id='.$cle.' class="'.$class.'">'.$valeur.'</a>';
	}
}

// Define folder "templates" if site is on localhost

$path = 'http://'.$_SERVER[SERVER_NAME].'/'.'/templates/'.$template.'/';

if ($_SERVER[SERVER_NAME] == "localhost") { 
	$link = 'http://'.$_SERVER[SERVER_NAME].'/'.$template.'/';
} else {
	$link = 'http://'.$_SERVER[SERVER_NAME].'/';
 } 
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html lang="<?=$lang?>">
<head>
<? if ($title !="") {?><title><?=$title?>"</title><?}?> 
<? if ($author !="") {?><META NAME="author" CONTENT="<?=$author?>"><?}?> 
<meta name="robots" CONTENT="all, index, follow">
<meta name="Revisit-After" content="1 days">
<META NAME="Identifier-URL" CONTENT="http://www.terrevirtuelle.com">
<? if ($description !="") {?><META NAME="description" CONTENT="<?=$description?>"><?}?> 
<? if ($keywords !="") {?><META NAME="keywords" CONTENT="<?=$keywords?>"><?}?> 
<meta http-equiv="Content-Type" content="text/html; charset="<?=$charset?>">
<meta name="verify-v1" content="WwVPB2MgOsddJvl+ra7NusQ2hsyu+IL5mFDZtg5IvTA=" />
<script language="JavaScript" src="<?=$path?>scripts.js" type="text/JavaScript"></script>
<? if ($cat!="") { ?>
<link href="rss.php?id=<? echo $id ?>&amp;cat=<? echo $cat ?>" rel="alternate" type="application/rss+xml" title="Offres d'emploi sur Internet en format RSS">
<? } ?>
<link rel="stylesheet" href="<?=$path?>styles.css">

</HEAD>
<BODY>
<table class="t_size">
<tr>
<td class="alignment">
<div class="main">
<object class="flash" title="Webdesign &agrave; Gen&egrave;ve">
	<param name="movie" value="flash/head.swf">
    <param name="quality" value="high">
    <embed src="<?=$path?>head.swf" quality="high" bgcolor="#a2a451" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" class="flash"></embed>
</object>
       
<DIV class="contentside">

<h1>
<?
if ($category !="") { ?>
	<a href="<?=$link.$lang?>"><img src="<?=$path?>img/home.gif" class="home" alt="Vers l'accueil"></a>
<? } else { ?>
	<span href="" style="padding-right: 50px">&nbsp;</span>
<? } ?>
<?php
if ($lang=="en") { 
	$items = array( 
	'webdesign'=>'Webdesign', 
	'assistance'=>'Apple support', 
	'formation'=>'Internet training',
	);
} else if ($lang=="de") {
	$items = array( 
	'webdesign'=>'Webdesign', 
	'assistance'=>'Apple Support', 
	'formation'=>'Internet Ausbildung',
);
} else {
	$items = array( 
	'webdesign'=>'Webdesign', 
	'assistance'=>'Assistance Apple', 
	'formation'=>'Formation Internet',
);
}
foreach($items as $cle=>$valeur) {
	if ($cle==$category) { $class="menu-on"; } else { $class="menu-off"; }
    echo '<a href='.$link.$lang.'/'.$cle.' class='.$class.'>'.$valeur.'</a>'; 
} 
?></h1>