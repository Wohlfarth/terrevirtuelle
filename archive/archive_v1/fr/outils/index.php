<?
$template = "terrevirtuelle";
$category = "outils";
$filename = "index.php";
$charset ="iso-8859-1";
$lang = "fr";
$title ="Exp&eacute;riments Web";
$description = "Cette rubrique purement exp&eacute;rimentale pr&eacute;sente quelques sujets pour les adeptes des aspects techniques.";
$keywords = "Exp&eacute;riments Web, HTML, PHP, CSS";
$author = "Henri Wohlfarth";
require ($_SERVER[DOCUMENT_ROOT].'/templates/'.$template.'/header.php');
?>
<div class="content">

<div style="float: right; margin-left: 10px; height: 100%; border-left: 1px dotted#fff">
<? echo contentmenu1($i); ?>
</div>

<?
$id=$_GET['id'];
if ($id<6 And $id!=0) {	
	echo "<div class='whitecontent'>";
}
switch ($id) {
case 0:
echo "
  Cette rubrique purement exp&eacute;rimentale pr&eacute;sente quelques sujets pour les adeptes des aspects techniques.
  Vous y trouverez du codage php, html, css, xml, xsl, rss et d'autres trucs indigeste pour les non-initi&eacute;s.
  C'est aussi en quelque sorte ma salle d'exposition virtuelle. Attention, comme dans tout bon atelier, il regne litt&eacute;ralement le d&eacute;sordre...
  Bonne consultation, le webmaster.
  ";
  break;
case 1:
  highlight_file('index.php');
  break;
case 2:
  highlight_file($_SERVER[DOCUMENT_ROOT].'/templates/'.$template.'/header.php');
  break;
case 3:
  highlight_file($_SERVER[DOCUMENT_ROOT].'/templates/'.$template.'/styles.css');
  break;
case 4:
?>
<iframe src ="../../xml/library.xml" width="540" height="100%" frameborder="0"></iframe>
<?
  break;
case 5:
?>
<iframe src ="caracteres.php" width="540" height="100%" frameborder="0"></iframe>
<?
  break;
}
if ($id!=0) {	
	echo "</div>";
}
?>
</div>
<? require ($_SERVER[DOCUMENT_ROOT].'/templates/'.$template.'/footer.php'); ?>
