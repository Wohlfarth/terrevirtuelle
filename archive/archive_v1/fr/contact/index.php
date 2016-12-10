<?
$template = "terrevirtuelle";
$category = "contact";
$filename = "index.php";
$charset ="iso-8859-1";
$lang = "fr";
$title ="Formulaire de contact";
$description = "Utilisez ce formulaire pour me contacter, &agrave; bient&ocirc;t.";
$keywords = "Contact, formulaire";
$author = "Henri Wohlfarth";
require ($_SERVER[DOCUMENT_ROOT].'/templates/'.$template.'/header.php');
?>
<div class="content">

<form action="?status=sent" method="POST" onSubmit="return testform(this.email, this.message)">

<?
$status = $_GET['status'];
if ($status!="sent") { ?>
<table style="margin-top: 20px; height: 200px">
<tr>
<td>
<input name="email" type="text" value="Votre e-mail"/>
</td>
<td>
<textarea name="message" rows="10" cols="80">Votre message</textarea><br />
<input type="submit" name="submit" value="Envoyer" class="bouton" style="font-weight: bold">
</td>
</tr>
</table>


<?php
}
$email = 'info@terrevirtuelle.com';
$subject = 'A propos www.terrevirtuelle.com';
$sender = $_POST['email'];
$headers = "From: $sender";
$message = $_POST['message'];


if ($status=="sent") {
mail($email,$subject,$message,$headers);
?>
Vous avez envoy&eacute; le message suivant :
<div style="background-color: #f1f4f4; border: 1px solid #37666E; width: 390px; height: 190px; padding: 4px; margin-top: 16px; margin-bottom: 10px; ">
<? echo $_POST['message'];
?>
</div>
Je vous r&eacute;pondrai dans les meilleurs d&eacute;lais. Merci et &agrave; bient&ocirc;t.
<? } ?>
</form>
           
</div>
<? require ($_SERVER[DOCUMENT_ROOT].'/templates/'.$template.'/footer.php'); ?>