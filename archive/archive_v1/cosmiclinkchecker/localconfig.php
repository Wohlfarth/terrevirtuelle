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
# Starting URL
$start_url = array(
"http://steve/cosmicphp/index.php",
);

# Servers to index from
$allow_url = array(
"http://steve",
);

# File extensions not to index
$file_ext = "php cgi asp";


# Directories not to index
#$no_index_dir = "inc.php img image temp tmp cgi-bin";
$no_index_dir = "";

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
$error[302]   = "Found";
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
?>