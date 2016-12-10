<? 
// $host = "194.143.132.16"; old host at prosygma
$host = "localhost";
// $user = "henri"; old user at prosygma
$user = "terrevirtuelle";
// $pass = "terre492466"; old pass at prosygma
$pass = "diana69";

$bdd = "tv";
$login = "henriforever";
@mysql_connect ($host ,$user ,$pass ); 
@mysql_select_db ($bdd ) or die( "Impossible de se connecter" );


$action = $_GET[action];
$id = $_GET[id];


$rs1 ="SELECT * FROM content where id=46";
$content =mysql_query ($rs1 );
	while( $item =mysql_fetch_array ($content )){	
		$text= $item [content ];
	}


include("fckeditor.php");


$template = "terrevirtuelle";
$category = "webdesign";
$filename = "edit.php";
$charset ="iso-8859-1";
$lang = "fr";
$title ="FCK Editor";
$description = "Concepteur en communication Web bas&eacute; &agrave; Gen&egrave;ve, je suis &agrave;  votre service pour la r&agrave; alisation de votre projet de site Internet.";
$keywords = "Internet, web, communication, concepteur, virtuel, projets, r&eacute;f&eacute;rencement, formation internet, iTunes, iPhoto";
$author = "Henri Wohlfarth";
require ($_SERVER[DOCUMENT_ROOT].'/templates/'.$template.'/header.php');
?>
<style type="text/css">
.navbutton-on { background-color: #fff; color: #666; border: 1px solid #226365; padding: 2px; padding-left: 10px; padding-right: 10px }
.navbutton-off { background-color: #CADFE0; color: #666; border: 1px solid #226365; padding: 2px; padding-left: 10px; padding-right: 10px }
.navbutton:hover { background-color: #fff; color: #000 }
th { background-color: #fff }
table { height: 30px }
</style>
<div class="content">
<form name="admin" method="post" action="<?=$PHP_SELF; ?>?id=<? echo $id; ?>&amp;action=update">

<a href="<?=$PHP_SELF;?>?id=<?=$id; ?>&amp;action=browse" class="<? if ( $action=="browse") { ?>navbutton-on<? } else { ?>navbutton-off<? } ?>">Liste des contenus</a><? 
if ( $action=="detail") {
	if ( $action=="detail") { $style = "navbutton-on"; } else { $style = "navbutton-off"; }
	if ( $action=="edit") { $style1 = "navbutton-on"; } else { $style1 = "navbutton-off"; }
	echo '<a href="'.$PHP_SELF.'?id='.$id.'&amp;action=edit"  style="border-left: none" class="'.$style.'">Vue d&eacute;taill&eacute;e</a>';
	echo '<a href="'.$PHP_SELF.'?id='.$id.'&amp;action=edit"  class="'.$style1.'" style="border-left: none">Modifier</a>';
} 
?>
<span style="color: orange; padding: 2px; font-weight: bold"><? if ( $action=="update") { ?>The page has been updated</span><? } ?>

<? if ( $action=="edit") { ?><input type="submit" value="Submit"><? } ?> <br>
<?php
if ( isset( $_POST ) )
   $postArray = &$_POST ;			// 4.1.0 or later, use $_POST
else
   $postArray = &$HTTP_POST_VARS ;	// prior to 4.1.0, use HTTP_POST_VARS

foreach ( $postArray as $sForm => $value ) {
	$postedValue = htmlspecialchars( stripslashes( $value ) ) ;
}

if ( $action=="edit") {
	$rs1 ="SELECT * FROM content where id='$id'";
	$content =mysql_query ($rs1 );
	while( $item =mysql_fetch_array ($content )){	
		$text=$item [content ];
	}

	$oFCKeditor = new FCKeditor('content') ;
	$oFCKeditor->BasePath = '/FCKeditor/';
	$oFCKeditor->Value = $text;
	$oFCKeditor->Create() ;
} 


if ( $action=="update") {
	$rs1 = "UPDATE content SET content='$value' where id='$id'";
	mysql_query($rs1);
}

if ( $oFCKeditor=="" And $action=="detail") {
	$rs1 ="SELECT * FROM content where id='$id'";
	$content =mysql_query ($rs1 );
	while( $item =mysql_fetch_array ($content )){	
		echo $item [content ];
	}
}

if ( $action=="browse") {
?>
<table style="margin-top: 15px">
<tr><th>Menu</th><th>Title</th>
</tr>
<?
$rs1 ="SELECT * FROM content  WHERE menu='Archives'";
$content =mysql_query ($rs1 );
	while( $item =mysql_fetch_array ($content )){
	?>
	<tr>
	<td style="padding: 2px; border: 1px solid #fff"><?=$item [name]; ?></td>
	<td style="padding: 2px; border: 1px solid #fff"><a href="<?=$PHP_SELF; ?>?id=<?=$item [id]; ?>&amp;action=detail" style="padding: 2px; display:block"><?=$item [title]; ?></a></td>
	</tr>
	<? } ?>
</table>
<? } ?>

</form>
</div>
<? require ($_SERVER[DOCUMENT_ROOT].'/templates/'.$template.'/footer.php'); ?>