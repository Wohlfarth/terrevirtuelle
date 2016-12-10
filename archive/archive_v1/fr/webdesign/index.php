<?
$template = "terrevirtuelle";
$category = "webdesign";
$filename = "index.php";
$charset ="iso-8859-1";
$lang = "fr";
$title ="Webdesign &agrave; Gen&egrave;ve : Internet &agrave; Gen&egrave;ve : Cr&eacute;ation de sites Internet - Webdesign";
$description = "Concepteur en communication Web bas&eacute; &agrave; Gen&egrave;ve, je suis &agrave;  votre service pour la r&eacute;alisation de votre projet de site Internet.";
$keywords = "Webdesign, Web, Internet, communication, concepteur, conception, graphique, projets, h&eacute;bergement, gestion de contenus, r&eacute;f&eacute;rencement";
$author = "Henri Wohlfarth";
require ($_SERVER[DOCUMENT_ROOT].'/templates/'.$template.'/header.php');
?>


<div class="content">
	   
      Concepteur en communication Web dipl&ocirc;m&eacute; &agrave la HEG de Gen&egrave;ve, je suis &agrave; votre service pour la r&eacute;alisation de 
		votre projet de site Internet.
      Selon vos besoins, je vous propose de prendre en charge les 
diff&eacute;rents aspects li&eacute;s &agrave; votre projet : 
      
	    <ul>
	    <li>
	    <a href="javascript:flip('projet')" title="Voir d&eacute;tails"><b class="list">1</b>La gestion de votre projet</a>
		   <div ID='projet' style="display:none;">
		   Pour commencer, il s'agit de d&eacute;finir votre projet : d&eacute;terminer les objectifs,
		   &eacute;tat des lieux de l'existant, public cible, analyse concurrentielle, structure du site, 
		   modules particuliers, acteurs impliqu&eacute;s, d&eacute;lais, etc. Vient ensuite la conception graphique et ergonomique avec l'&eacute;laboration 
		   d'une maquette. Apr&egrave;s votre validation de cette derni&egrave;re, la mise en production et l'int&eacute;gration des contenus. A diff&eacute;rents stades
		   de la r&eacute;alisation technique, vous aurez des &eacute;l&eacute;ments &agrave; valider. Selon la complexit&eacute; du projet, il est 
		   possible que certains aspects soient sous-trait&eacute;s &agrave; des sp&eacute;cialistes.
		   
		   </div>
		</li>
	    <li>
	    <a href="javascript:flip('conception')" title="Voir d&eacute;tails"><b class="list">1</b>Conception graphique et ergonomique</a>
		   <div ID='conception' style="display:none;">
		   Vous voulez certainement une identit&eacute; visuelle en rapport avec votre activit&eacute; et vos valeurs. 
		   Les &eacute;l&eacute;ments graphiques d'un site Internet sont multiples :  
		   le logo, les d&eacute;corations graphiques ou photographiques, les ic&ocirc;nes, l'ergonomie d'utilisation (navigation), le choix des couleurs, la mise en page ou encore la typographie.
		   </div>
		</li>
	    
        
          <li><a href="javascript:flip('realisation')" title="Voir d&eacute;tails"><b class="list">1</b>R&eacute;alisation technique</a>
		  <div ID='realisation' style="display:none;">
		  Selon les objectifs convenus, la r&eacute;alisation peut comprendre plusieurs aspects : formatage en HTML/CSS; 
		  programmation des &eacute;l&eacute;ments interactifs en ASP/PHP et Javascript; 
		  cr&eacute;ation d'une base de donn&eacute;es; traitement des images; 
		  cr&eacute;ation des &eacute;l&eacute;ments multim&eacute;dias.</div>
		  </li>
          <li><a href="javascript:flip('maintenance')" title="Voir d&eacute;tails"><b class="list">1</b>Maintenance et optimisation de sites internet existants</a>
          <div ID='maintenance' style="display:none;">
          Vous souhaitez ajouter un nouveau module ou une nouvelle fonctionnalit&eacute; &agrave; votre site ? 
          Ou  pr&eacute;sente-t-il des dysfonctionnements ? Voulez-vous le rendre plus accessible aux personnes non-voyantes ?
          Avez-vous des publications ou formulaires que vous souhaitez ajouter en format pdf sur votre site ?
          </div>
          </li>
          <li><a href="javascript:flip('domaine')" title="Voir d&eacute;tails"><b class="list">1</b>Nom de domaine, h&eacute;bergement, r&eacute;f&eacute;rencement</a>
          <div ID='domaine' style="display:none;">
          	Quel nom de site faut-il choisir ? O&ugrave; est-ce qu'il faut l'h&eacute;berger ? Comment faire pour le positionner en haut dans les moteurs de recherche ?
		 </div>
          
          </li>
          <li><a href="javascript:flip('opensource')" title="Voir d&eacute;tails"><b class="list">1</b>Mise en place d'outils de gestion de contenu</a>
		  <div ID='opensource' style="display:none;">
		  Vous n'avez pas les connaissances techniques de la publication Web, mais vous souhaitez vous-m&ecirc;me g&eacute;rer vos contenus.
		  La solution est peut-&ecirc;tre la mise en place d'un portail "opensource" tels que 
		  <a href="http://www.mamboserver.com/index.php?option=com_content&amp;task=view&amp;id=35&amp;Itemid=116" target="_blank">Mambo</a> ou 
		  <a href="http://www.postnuke.com/modules.php?op=modload&amp;name=Navigation&amp;file=index" target="_blank">Postnuke</a>. Peut-&ecirc;tre vous faudra-t-il
		  un outil sur mesure avec le <a href="../../fckeditor/edit.php?action=browse">trio "php/MySQL/FCKeditor</a>" ?
		  </div>
		</li>
        </ul>
        N'h&eacute;sitez pas &agrave; me contacter par <a href="../contact">mail</a>.
Je me r&eacute;jouis de faire votre connaissance pour discuter de votre projet.
        </div>
<? require ($_SERVER[DOCUMENT_ROOT].'/templates/'.$template.'/footer.php'); ?>