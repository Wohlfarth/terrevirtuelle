<?
$template = "terrevirtuelle";
$category = "contact";
$filename = "index.php";
$charset ="iso-8859-1";
$lang = "en";
$title ="Contact form";
$description = "Please use this form to contact me.";
$keywords = "Contact, form";
$author = "Henri Wohlfarth";
require ($_SERVER[DOCUMENT_ROOT].'/templates/'.$template.'/header.php');
?>
<div class="content">

<form action="?status=sent" method="POST" onSubmit="return testformEnglish(this.email, this.message)">

<?
$status = $_GET['status'];
if ($status!="sent") { ?>
<table style="margin-top: 20px; height: 200px">
<tr>
<td>
<input name="email" type="text" value="Votre e-mail"/>
</td>
<td>
<textarea name="message" rows="10" cols="80">Type your message</textarea><br />
<input type="submit" name="submit" value="Send" class="bouton" style="font-weight: bold">
</td>
</tr>
</table>


<?php
}
$email = 'info@terrevirtuelle.com';
$subject = 'About www.terrevirtuelle.com';
$sender = $_POST['email'];
$headers = "From: $sender";
$message = $_POST['message'];


if ($status=="sent") {
mail($email,$subject,$message,$headers);
?>
You have sent the following message:
<div style="background-color: #f1f4f4; border: 1px solid #37666E; width: 390px; height: 190px; padding: 4px; margin-top: 16px; margin-bottom: 10px; ">
<? echo $_POST['message'];
?>
</div>
You will receive a reply as soon as possible. Thank you.
<? } ?>
</form>
           
</div>
<? require ($_SERVER[DOCUMENT_ROOT].'/templates/'.$template.'/footer.php'); ?>
