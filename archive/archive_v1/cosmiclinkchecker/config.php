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
<?
#display options
$Show_Checked_Links = 0;
$Show_Checked_Pages = 1;

# Starting URL
$start_url = array($url);

# Servers to index from
$allow_url = array($url);

# File extensions not to index
$file_ext = "cgi asp pdf doc zip";


# Directories not to index
#$no_index_dir = "inc.php img image temp tmp cgi-bin";
$no_index_dir = "includes headlines";

# Files not to index
$no_get_words = 'robots.txt';

# Known HTTP Codes
$error['N/A'] = "Unknown HTTP";
$error[OK]    = "Valid hostname";
$error[FEJL]  = "Invalid hostname";
$error[Død]   = "No response";
$error[100]   = "Continue";
$error[101]   = "Switching Protocols";
$error[200]   = "OK";
$error[201]   = "Created";
$error[202]   = "Accepted";
$error[203]   = "Non-Authoritative Information";
$error[204]   = "No Content";
$error[205]   = "Reset Content";
$error[206]   = "Partial Content";
$error[300]   = "Multiple Choices";
$error[301]   = "Moved Permanently";
$error[302]   = "Redirect";
$error[303]   = "See Other";
$error[304]   = "Not Modified";
$error[305]   = "Use Proxy";
$error[307]   = "Temporary Redirect";
$error[400]   = "Bad Request";
$error[401]   = "Unauthorized";
$error[402]   = "Payment Required";
$error[403]   = "Forbidden";
$error[404]   = "Not Found";
$error[405]   = "Method Not Allowed";
$error[406]   = "Not Acceptable";
$error[407]   = "Proxy Authentication Required";
$error[408]   = "Request Timeout";
$error[409]   = "Conflict";
$error[410]   = "Gone";
$error[411]   = "Length Required";
$error[412]   = "Precondition Failed";
$error[413]   = "Request Entity Too Large";
$error[414]   = "Request-URI Too Long";
$error[415]   = "Unsupported Media Type";
$error[416]   = "Requested Range Not Satisfiable";
$error[417]   = "Expectation Failed";
$error[500]   = "Internal Server Error";
$error[501]   = "Not Implemented";
$error[502]   = "Bad Gateway";
$error[503]   = "Service Unavailable";
$error[504]   = "Gateway Timeout";
$error[505]   = "HTTP Version Not Supported";

$visited = array();

?>
<?

class cLink {
	
	var $mUrl;
	var $mParentUrl;
	var $mHttpCode;
	var $mBroken;
	
	function SetParentUrl($cVal) {
		$this->mParentUrl = $cVal;
	}
	function SetUrl($cVal) {
		global $Show_Checked_Links, $visited, $aUrls, $Show_Http_Ok, $Show_Checked_Pages, $error, $TotalLinks, $BrokenLinks, $WarningLinks;
		
		$visited[] = $cVal;
		$this->mUrl = $cVal;
		if ( preg_match("'^http://'",$cVal)) { 
			
			//display no errors and use @file to open link
			$aContent= @file($cVal); 
			if($aContent) {$sContent = implode("\n", $aContent);}
			
			//get header code
			$header= join("\n", $http_response_header); 
			list(,$http_code,) = split (" ", $header, 3);
			$this->mHttpCode = $http_code;
			
			if($http_code!=200){
				$this->mBroken=true;
			} else {
				$this->mBroken=false;				
			}

			$base = $cVal;
			if (preg_match_all("/<base\\s+href=([\"']?)([^\\s\"'>]+)\\1/is", $sContent, $matches,PREG_SET_ORDER)) {
				$base = $matches[0][2];
			}
			if ( check_url($cVal)) {
				$links = get_links($sContent);
				if($Show_Checked_Pages) {
					print_page($cVal, count($links));
				}
				$TotalLinks = $TotalLinks + count($links);
				foreach ($links as $k => $v) {
					$new_link = get_abs_url($base,$k);
					$new_link = preg_replace("/#.*/","",$new_link);
					$new_link_stripped = preg_replace("/\?.*/","",$new_link);

					if ( ! in_array($new_link,$visited)) {
						$oUrl = new cLink;
						$oUrl->SetParentUrl($cVal);
						$oUrl->SetUrl($new_link);
						$aUrls[$new_link] = $oUrl;
					}

				}	
			}
		} else {
			$this->mHttpCode =  "non http";
		}
		if($Show_Checked_Links) {
			print_link($this->mUrl, $this->mHttpCode);
		} elseif ($this->mBroken) {
			if($this->mHttpCode == 400) {
				print_error($this);
				$BrokenLinks++;
			} else {
				print_warning($this);
				$WarningLinks++;
			}
		}
	}
}


function check_url($url) {
	//validate given url
	global $file_ext, $no_get_words, $no_index_dir, $allow_url;

/*
	if ( ! preg_match("'^http://'",$url)) { return FALSE; }
	if ( preg_match ("'$file_ext'i", $url)) { return FALSE; }
	if ( preg_match ("'$no_get_words'i", $url)) { return FALSE; }
*/
	if($no_index_dir) {
		if ( preg_match ("'$no_index_dir'i", $url)) { return FALSE; }
	}

	$allow = 0;
	foreach ($allow_url as $v) {
			if ( preg_match("'$v'i", $url)) {
					$allow = 1;
					break;
			}
	}
	if ($allow == 0) { return FALSE; }

	return TRUE;
}
function get_links($sContent) {
	//filter text for links in <a href> <frame src> and <area href> and return in array
	$links = array();
	$count = preg_match_all("/<a[^>]+href=([\"']?)([^\\s\"'>]+)\\1/is", $sContent, $matches, PREG_SET_ORDER);
	for($i=0; $i < count($matches); $i++) {
			$links[$matches[$i][2]] = 1;
	}

	$count = preg_match_all("/<frame[^>]+src=([\"']?)([^\\s\"'>]+)\\1/is", $sContent, $matches, PREG_SET_ORDER);
	for($i=0; $i < count($matches); $i++) {
			$links[$matches[$i][2]] = 1;
	}

	$count = preg_match_all("/<area[^>]+href=([\"']?)([^\\s\"'>]+)\\1/is", $sContent, $matches, PREG_SET_ORDER);
	for($i=0; $i < count($matches); $i++) {
			$links[$matches[$i][2]] = 1;
	}
	return $links;
}
function get_abs_url($base,$url) {
		//return absoulte url given base url and url itself
    $url_arr = parse_url($url);
    if (isset($url_arr["scheme"])) {
        return($url);
    }
    
    $base_arr = parse_url($base);
    $base_base = strtolower($base_arr["scheme"])."://";
    if (isset($base_arr["user"])) {
        $base_base .= $base_arr["user"].":".$base_arr["pass"]."@";
    }
    $base_base .= strtolower($base_arr["host"]);
    if (isset($base_arr["port"])) {
        $base_base .= ":".$base_arr["port"];
    }
    $base_path = @$base_arr["path"];
    if ($base_path == "") { $base_path = "/"; }
    $base_path = preg_replace("/(.*\/).*/","\\1",$base_path);
    
    if (@$url_arr["path"][0] == "/") {
        return $base_base.$url;
    }
    
    if (preg_match("'^\./'",$url)) {
        $url = preg_replace("'^\./'","",$url);
        return $base_base.$base_path.$url;
    }
    
    while (preg_match("'^\.\./'",$url)) {
        $url = preg_replace("'^\.\./'","",$url);
        $base_path = preg_replace("/(.*\/).*\//","\\1",$base_path);
    }
    return $base_base.$base_path.$url;    
}
function print_link($url, $http){
	global $error;
	print"	
	<table align=center><tr>
		<td class=h width=600>Link: $url :~: $http :~: $error[$http]</td></tr>
	</tr></table>\n";
	flush();
}
function print_page($url, $links){
	print"	
	<table align=center><tr>
		<td class=h width=600>Checking page $url. $links links found.</td></tr>
	</tr></table>\n";
	flush();
}
function print_error($oError){
	
	global $error;
	$parent = $oError->mParentUrl;
	$url = $oError->mUrl;
	$err = $oError->mHttpCode;
	
	print"	
	<table align=center cellpadding=4><tr>
		<td class=error width=600>Error! On page <a href='$parent'>$parent</a></td></tr>
	<tr>
		<td class=error width=600>Link: <a href='$url'>$url</a> HTTP$err $error[$err]</td></tr>
	</tr></table>\n";
	flush();
}
function print_warning($oError){
	
	global $error;
	$parent = $oError->mParentUrl;
	$url = $oError->mUrl;
	$err = $oError->mHttpCode;
	
	print"	
	<table align=center cellpadding=4><tr>
		<td class=error width=600>Warning! On page <a href='$parent'>$parent</a></td></tr>
	<tr>
		<td class=error width=600>Link: <a href='$url'>$url</a> HTTP$err $error[$err]</td></tr>
	</tr></table>\n";
	flush();
}

?>
