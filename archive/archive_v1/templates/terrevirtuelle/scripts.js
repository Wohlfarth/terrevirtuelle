function isEmailAddr(email)
{
  var result = false
  var theStr = new String(email)
  var index = theStr.indexOf("@");
  if (index > 0)
  {
    var pindex = theStr.indexOf(".",index);
    if ((pindex > index+1) && (theStr.length > pindex+1))
	result = true;
  }
  return result;
}


function testform(email, message) {
	if(email.value=="") {
	   		alert("Veuillez indiquer votre adresse e-mail !")
	        email.focus(); return false
	}

	

	if(message.value=="") {
	   		alert("Ecrivez votre message !")
	        message.focus(); return false
	}
	
	
	if (!isEmailAddr(email.value))
	  {
	    alert("Veuillez utiliser un format correct pour l'adresse e-mail, exemple : votrenom@votredomaine.ch");
	    email.focus();
	    return (false);
  	}
    return true
}






function testformDeutsch(email, message) {
	if(email.value=="") {
	   		alert("Bitte erfassen Sie Ihre e-mail Adresse !")
	        email.focus(); return false
	}

	

	if(message.value=="") {
	   		alert("Bitte schreiben Sie Ihre Nachricht !")
	        message.focus(); return false
	}
	
	
	if (!isEmailAddr(email.value))
	  {
	    alert("Benutzen Sie bitte ein korrektes e-mail Formatt, zum Beispiel : ihrname@ihrdomain.ch");
	    email.focus();
	    return (false);
  	}
    return true
}

function testformEnglish(email, message) {
	if(email.value=="") {
	   		alert("Please enter your e-mail address !")
	        email.focus(); return false
	}

	

	if(message.value=="") {
	   		alert("Please write a message !")
	        message.focus(); return false
	}
	
	
	if (!isEmailAddr(email.value))
	  {
	    alert("Please use a correct mail formatt, for example : yourname@yourdomain.ch");
	    email.focus();
	    return (false);
  	}
    return true
}






function flip(target) {
  if (document.getElementById(target).style.display=='')
    {
      document.getElementById(target).style.display='none';
    }
  else
    {
      document.getElementById(target).style.display='';
    }
}







var MM_contentVersion = 6;
var plugin = (navigator.mimeTypes && navigator.mimeTypes["application/x-shockwave-flash"]) ? navigator.mimeTypes["application/x-shockwave-flash"].enabledPlugin : 0;
if ( plugin ) {
		var words = navigator.plugins["Shockwave Flash"].description.split(" ");
	    for (var i = 0; i < words.length; ++i)
	    {
		if (isNaN(parseInt(words[i])))
		continue;
		var MM_PluginVersion = words[i];
	    }
	var MM_FlashCanPlay = MM_PluginVersion >= MM_contentVersion;
}
else if (navigator.userAgent && navigator.userAgent.indexOf("MSIE")>=0
   && (navigator.appVersion.indexOf("Win") != -1)) {
	document.write('<SCR' + 'IPT LANGUAGE=VBScript\> \n'); //FS hide this from IE4.5 Mac by splitting the tag
	document.write('on error resume next \n');
	document.write('MM_FlashCanPlay = ( IsObject(CreateObject("ShockwaveFlash.ShockwaveFlash." & MM_contentVersion)))\n');
	document.write('</SCR' + 'IPT\> \n');
}
if ( MM_FlashCanPlay ) {
	//window.location.replace("default.htm");
} else{
	window.location.replace("noflash.htm");
}
