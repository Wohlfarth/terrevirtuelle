<?
$template = "terrevirtuelle";
$filename = "index.php";
$charset ="iso-8859-1";
$lang = "fr";
$title ="Webdesign &agrave; Gen&egrave;ve : Internet &agrave; Gen&egrave;ve : Cr&eacute;ation de sites Internet - Webdesign";
$description = "Webdesigner bas&eacute; &agrave; Gen&egrave;ve, je suis &agrave; votre service pour la r&eacute;alisation de votre projet de site Internet.";
$keywords = "Webdesign, Gen&egrave;ve, Internet, web, design, conception, formation internet";
$author = "Henri Wohlfarth";
require ($_SERVER[DOCUMENT_ROOT].'/templates/'.$template.'/header.php');
// Attention: this require works only on normal apache server, not on windows server...
// Windows include only with precise path in each page possible: require ('templates/'.$template.'/header.php');
// Attention: document_root server variable is not supported by windows php server...
// On normal Apache, the header should be included as this:
// require ($_SERVER[DOCUMENT_ROOT].'/templates/'.$template.'/header.php');
// No solution, to include via $_SERVER[http_host] is not possible >> http includes are not supported neither...
?>
<table width="100%" class="content">
<tr>
<td class="leftColContent">
<h4>Bienvenue sur www.terrevirtuelle.com, mon atelier virtuel d&eacute;di&eacute; aux technologies Web.</h4>

Webdesigner bas&eacute; &agrave; Gen&egrave;ve, je suis &agrave; votre service pour la 
<a href="fr/webdesign">r&eacute;alisation de 
votre projet de site Internet</a>. Selon vos besoins, je vous propose de prendre en charge les 
diff&eacute;rents aspects li&eacute;s &agrave; votre projet que ce soit en fran&ccedil;ais, 
<a href="en" class="link">anglais</a> ou en <a href="de" class="link">allemand</a>.
<br><br>
Fort de mes connaissances du Web, je vous propose &eacute;galement des 
<a href="fr/formation">formations</a> sur mesure 
en vue de mieux exploiter le potentiel d'internet.
<br>
<br>
Pour les adeptes du monde Macintosh, je propose une 
<a href="fr/assistance">assistance</a>&nbsp;: configuration 
du syst&egrave;me et installation des applications, 
conseils pour la gestion de la musique et des photos num&eacute;riques.<br>
<br>
N'h&eacute;sitez pas &agrave; me <a href="fr/contact">contacter</a> &agrave; Gen&egrave;ve. Je me r&eacute;jouis de faire votre connaissance 
pour discuter de vos besoins.

</td>
<td class="rightColContent">


<h3 style="color: #000">D&eacute;finition du webdesign</h3>
Le webdesign, en fran&ccedil;ais la conception web, d&eacute;signe la cr&eacute;ation du 
support visuel &agrave; destination d&rsquo;un 
site Web. Le webdesign demande de nombreuses comp&eacute;tences en graphisme, programmation, bases de donn&eacute;es ou encore en multim&eacute;dia.
<br /><br />
Un site Internet doit avant tout r&eacute;pondre aux attentes et aux besoins des informations recherch&eacute;es par les internautes. 
Un autre objet du webdesign est de valoriser l&rsquo;image du propri&eacute;taire du site Internet.
<br /><br />

Actuellement, il ne suffit pas de r&eacute;aliser un site Internet qui soit simplement bon du point du vue visuel ou technique.
Encore faudra-t-il le trouver dans le labyrinthe virtuel. Un bon positionnement dans les moteurs de recherche est donc indispensable. 
Quels sont les mots de recherche utilis&eacute;s par les internautes? Si on connais la r&eacute;ponse, 
on peut optimiser le site selon la terminologie ad&eacute;quate. 

<br /><br />
Dans cette perspective, un projet Web ne s'arr&ecirc;te pas au webdesign. <a href="fr/webdesign/">Lire plus...</a>

</td>
</tr>
</table>
<? require ($_SERVER[DOCUMENT_ROOT].'/templates/'.$template.'/footer.php'); ?>