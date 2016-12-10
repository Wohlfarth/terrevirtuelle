<?
$template = "terrevirtuelle";
$category = "actualite";
$filename = "index.php";
$charset ="iso-8859-1";
$lang = "fr";
$title ="L'actualit&eacute; RSS : www.terrevirtuelle.com";
$description = "L'actualit&eacute; en continu gr&acirc;ce au flux RSS !";
$keywords = "Actualit&eacute;, RSS, news";
$author = "Henri Wohlfarth";
require ($_SERVER[DOCUMENT_ROOT].'/templates/'.$template.'/header.php');
?>
<style type="text/css">
.itemtitle { padding: 2px; border-bottom: 1px solid #ccc; margin-bottom: 4px; font-weight: bold;}
.itemdescription { padding-top: 5px; text-align: justify }
.itemtitle:hover { background-color: #f4f7f7}
.whitecontent {  background-color: #fff; padding: 4px; height: 100%; overflow: auto; border: 1px solid #425500; }
.m-on, .m-off {
	background-color : #fff; color: #B20071; 
	border: 1px dotted #425500;
	border-bottom: none;
	padding: 2px; padding-left: 10px; 
	width: 150px;
	display: block
	 }
.m-on { background-color : #B20071; color: #fff }
.m-off:hover, .m-on:hover, .sm:hover { 
	background-color : #B20071; color: #fff }

</style>
<div class="content">
<? 
$channel=$_GET['channel'];
if ($channel=="") { 
	$channel="100";
} 
?>
<div style="float: right; margin-left: 10px; border-bottom: 1px dotted #425500">
<A href="?channel=4" class="<? if ($channel=="4") { ?>m-on<? } else { ?>m-off<? } ?>">BBC technology</A>
<A href="?channel=7" class="<? if ($channel=="7") { ?>m-on<? } else { ?>m-off<? } ?>">Apple news</A>
<A href="?channel=8" class="<? if ($channel=="8") { ?>m-on<? } else { ?>m-off<? } ?>">Netactuel</A>
<A href="?channel=5" class="<? if ($channel=="5") { ?>m-on<? } else { ?>m-off<? } ?>">Google news frontpage</A>
<A href="?channel=3" class="<? if ($channel=="3") { ?>m-on<? } else { ?>m-off<? } ?>">BBC world</A>
<A href="?channel=9" class="<? if ($channel=="9") { ?>m-on<? } else { ?>m-off<? } ?>">Le monde</A>
<A href="?channel=1" class="<? if ($channel=="1") { ?>m-on<? } else { ?>m-off<? } ?>">Le temps</A>
<A href="?channel=10" class="<? if ($channel=="10") { ?>m-on<? } else { ?>m-off<? } ?>">Presseportal</A>
<A href="?channel=6" class="<? if ($channel=="6") { ?>m-on<? } else { ?>m-off<? } ?>">Google Sci/Tech</A>
<A href="?channel=12" class="<? if ($channel=="12") { ?>m-on<? } else { ?>m-off<? } ?>">TSR 19:30</A>
</div>
<? include("../../rss/news.php"); ?>
</div>
<? require ($_SERVER[DOCUMENT_ROOT].'/templates/'.$template.'/footer.php'); ?>
