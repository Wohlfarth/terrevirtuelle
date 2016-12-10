<? 
//source : http://www.globalsyndication.com/rss-parser
switch ($channel) {
case 1:
  $file = "http://www.letemps.ch/rss.asp";
  break;
case 2:
  $file = "http://www.lecourrier.ch/selection.php";
  break;
case 3:
  	$file = "http://newsrss.bbc.co.uk/rss/newsonline_uk_edition/world/rss.xml";
  break;
case 4:
  	$file = "http://newsrss.bbc.co.uk/rss/newsonline_uk_edition/technology/rss.xml";
  break;
case 5:
  	$file = "http://news.google.com/nwshp?hl=en&tab=wn&q=&output=rss";
  break;
case 6:
  	$file = "http://news.google.com/news?client=safari&rls=en-us&oe=UTF-8&tab=wn&ned=us&topic=t&output=rss";
	break;
case 7:
  	$file = "http://www.apple.com/main/rss/hotnews/hotnews.rss";
  break;
case 8:
  	$file = "http://www.netactuel.com/actualites/news.xml";
  break;
case 9:
  $file = "http://www.lemonde.fr/rss/sequence/0,2-3208,1-0,0.xml";	
  break;
case 10:
  	  $file = "http://www.presseportal.ch/fr/rss/presseportal.rss";
  break;
case 11:
  	$file = "http://www.presseportal.ch/fr/rss/economie.rss";
  break;
case 12:
  	 $file = "http://xml.tsr.ch/xml/index.xml?siteSect=672000&programId=15";
  break;
case 13:
  	$file = "http://www.optioncarriere.ch/cgi-bin/user/rss.cgi?t=&s=web&r=38247&p=aa&c=";
  break;
case 14:
  	$file = "http://localhost/terrevirtuelle/website/rss/myrss.xml";
  break;
case 15:
  	  $file = "http://phobos.apple.com/WebObjects/MZStore.woa/wpa/MRSS/topsongs/limit=10/rss.xml";
case 100:
  	  $file = "../../rss/myrss.xml";

//default:
  //echo "No number between 1 and 16<br>";
}

$rss_channel = array();
$currently_writing = "";
$main = "";
$item_counter = 0;

function startElement($parser, $name, $attrs) {
   	global $rss_channel, $currently_writing, $main;
   	switch($name) {
   		case "RSS":
   		case "RDF:RDF":
   		case "ITEMS":
   			$currently_writing = "";
   			break;
   		case "CHANNEL":
   			$main = "CHANNEL";
   			break;
   		case "IMAGE":
   			$main = "IMAGE";
   			$rss_channel["IMAGE"] = array();
   			break;
   		case "ITEM":
   			$main = "ITEMS";
   			break;
   		default:
   			$currently_writing = $name;
   			break;
   	}
}

function endElement($parser, $name) {
   	global $rss_channel, $currently_writing, $item_counter;
   	$currently_writing = "";
   	if ($name == "ITEM") {
   		$item_counter++;
   	}
}

function characterData($parser, $data) {
	global $rss_channel, $currently_writing, $main, $item_counter;
	if ($currently_writing != "") {
	
		switch($main) {
			case "CHANNEL":
				if (isset($rss_channel[$currently_writing])) {
					$rss_channel[$currently_writing] .= $data;
				} else {
					$rss_channel[$currently_writing] = $data;
				}
				break;
			case "IMAGE":
				if (isset($rss_channel[$main][$currently_writing])) {
					$rss_channel[$main][$currently_writing] .= $data;
				} else {
					$rss_channel[$main][$currently_writing] = $data;
				}
				break;
			case "ITEMS":
				if (isset($rss_channel[$main][$item_counter][$currently_writing])) {
					$rss_channel[$main][$item_counter][$currently_writing] .= $data;
				} else {
					$rss_channel[$main][$item_counter][$currently_writing] = $data;
				}
				break;
		}
	}
}

$xml_parser = xml_parser_create();
xml_set_element_handler($xml_parser, "startElement", "endElement");
xml_set_character_data_handler($xml_parser, "characterData");
if (!($fp = fopen($file, "r"))) {
	die("could not open XML input");
}

while ($data = fread($fp, 4096)) {
	if (!xml_parse($xml_parser, $data, feof($fp))) {
		die(sprintf("XML error: %s at line %d",
					xml_error_string(xml_get_error_code($xml_parser)),
					xml_get_current_line_number($xml_parser)));
	}
}

xml_parser_free($xml_parser);
// output HTML
?>
<div class="whitecontent">
<?
if (isset($rss_channel["ITEMS"])) {
	if (count($rss_channel["ITEMS"]) > 0) {
		for($i = 0;$i < count($rss_channel["ITEMS"]);$i++) {
			if (isset($rss_channel["ITEMS"][$i]["LINK"])) {
			echo $i+1;
				print ("\n<span class=\"itemtitle\"><a href=\"" . $rss_channel["ITEMS"][$i]["LINK"] . "\">" . $rss_channel["ITEMS"][$i]["TITLE"] . "</a></span>");
			} else {
				print ("\n<div class=\"itemtitle\">" . $rss_channel["ITEMS"][$i]["TITLE"] . "</div>");
			}
			 print ("<div class=\"itemdescription\">" . $rss_channel["ITEMS"][$i]["DESCRIPTION"] . "</div><br />"); 
		}
	} else {
		print ("<b>There are no articles in this feed.</b>");
}
?></div>
<? }?>