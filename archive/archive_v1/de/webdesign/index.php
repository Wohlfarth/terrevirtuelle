<?
$template = "terrevirtuelle";
$category = "webdesign";
$filename = "index.php";
$charset ="iso-8859-1";
$lang = "de";
$title ="Webdesign in Genf : Internet in Genf : Ihr Internet Auftritt";
$description = "Als diplomierter Webdesigner von der h&ouml;heren Informatik Fachschule in Genf stelle ich meine Dienste f&uuml;r Ihr Internet Projekt zur Verf&uuml;gung.";
$keywords = "Webdesign, Genf, Webseiten, Internet, Apple Support, Graphik, Benutzerfreundlichkeit, Hosting, Datenbanken, Multimedia";
$author = "Henri Wohlfarth";
require ($_SERVER[DOCUMENT_ROOT].'/templates/'.$template.'/header.php');
?>
<div class="content">
	   
      Als diplomierter Webdesigner von der h&ouml;heren Informatik Fachschule in Genf 
      stelle ich meine Dienste f&uuml;r Ihr Internet Projekt zur Verf&uuml;gung. 
     Je nach W&uuml;nschen &uuml;bernehme ich die verschiedenen Aspekte Ihres Projektes :
      
	    <ul>
	    <li>
	    <a href="javascript:flip('projet')" title="Ansicht erweitern"><b class="list">1</b>Projekt Management</a>
		   <div ID='projet' style="display:none;">
		  Zuerst geht es ums festlegen Ihres Projektes : Zielpublikum, Marktvergleich, ausarbeiten der Ziele und des Pflichtenheftes, 
		   Bestandesaufnahme existierender Elemente, Struktur der Seiten, Redaktion der Texte sowie Zeitfristen einzuhalten.
		   Anschliessend kommt die graphische und ergonomische Ausarbeitung eines Modelles.
		   Danach, die Programmierung und Eingliederung der textlichen Inhalte.
		   Zu verschiedenen Zeitpunkten werden Sie Ihr Einverst&auml;ndnis oder &Auml;nderungsw&uuml;nsche geben.
		   Je nach Projekt kann es sein, dass gewisse Sachen an andere Spezialisten vergeben werden.
		   
		   </div>
		</li>
	    <li>
	    <a href="javascript:flip('conception')" title="Ansicht erweitern"><b class="list">1</b>Graphische Gestaltung</a>
		   <div ID='conception' style="display:none;">
		   Sie wollen sicherlich eine visuelle Identit&auml;t mit Bezug auf Ihre Aktivit&auml;ten und Ihre Werte.
		   Eine Internet Seite besteht aus verschiedenen graphischen Elementen : Das Logo, Ikone, graphische und photographische Dekorationen,
		   Ben&uuml;tzerfreundlichkeit, Farbauswahl, Seitenaufbau sowie die typographische Hierarchie.
		   </div>
		</li>
	    
        
          <li><a href="javascript:flip('realisation')" title="Ansicht erweitern"><b class="list">1</b>Technische Realisierung</a>
		  <div ID='realisation' style="display:none;">
		  Je nach Pflichtenheft versteht man darunter folgende Angelegenheiten :
		  Formattierung in HTML/CSS, Programmierung interaktiver Elemente in ASP/PHP/Javascript, erstellen einer Datenbank,
		  Bilderbearbeitung, Herstellung von Flash, Quicktime oder anderen  Multimedia Elementen.
		</div>
		  </li>
          <li><a href="javascript:flip('maintenance')" title="Ansicht erweitern"><b class="list">1</b>Unterhalt und Optimisierung von bestehenden Webseiten</a>
          <div ID='maintenance' style="display:none;">
          M&ouml;chten Sie Ihre Webseite einfach verbessern oder ein neues Modul eingliedern ?
          Brauchen Sie jemanden der regelm&auml;ssig Ihre Infos auf den neusten Stand bringt ?
          Haben Sie technische Probleme ? Wollen Sie Ihre Webseite f&uuml;r Blinde Personnen zug&auml;nglichmachen ?
          Haben Sie Brochuren oder Formulaire einzugliedern ?
          </div>
          </li>
          <li><a href="javascript:flip('domaine')" title="Ansicht erweitern"><b class="list">1</b>Domain Name, Hosting, Positionnierung</a>
          <div ID='domaine' style="display:none;">
          Welcher Name scheint geeignet f&uuml;r Ihre Webseite und welches Hosting sollte man w&auml;hlen ?
          Wie kann man in den Suchmaschinen ganz oben erscheinen ?
		 </div>
          
          </li>
          <li><a href="javascript:flip('opensource')" title="Ansicht erweitern"><b class="list">1</b>Einrichten von Content Management Systemen</a>
		  <div ID='opensource' style="display:none;">
		  Sie haben keine technische Kenntnisse, wollen aber Ihre textlichen Inhalte selbst verwalten.
		  Die L&ouml;sung ist vielleicht ein sogenanntes content management system (CMS). Es gibt viele geeignete "opensource" Software, zum Beispiel 
		  <a href="http://www.mamboserver.com/index.php?option=com_content&amp;task=view&amp;id=35&amp;Itemid=116" target="_blank">Mambo</a> oder 
		  <a href="http://www.postnuke.com/modules.php?op=modload&amp;name=Navigation&amp;file=index" target="_blank">Postnuke</a>. 
		  Vielleicht w&auml;re das <a href="../../fckeditor/edit.php?action=browse">Trio "php/MySQL/FCKeditor"</a> am besten f&uuml;r Sie geeignet ?</div>
		</li>
        </ul>
        <a href="../contact" class="link" title="Nachricht senden">Kontaktieren</a> Sie mich f&uuml;r weitere Fragen<a href="contact"></a>. Ich freue mich auf Ihre Bekanntschaft.
        </div>
<? require ($_SERVER[DOCUMENT_ROOT].'/templates/'.$template.'/footer.php'); ?>
