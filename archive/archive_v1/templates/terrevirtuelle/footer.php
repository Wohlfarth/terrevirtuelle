<h2>
<?
if ($lang=="en") {
	$items = array(
	'actualite'=>'News',
	'outils'=>'Experiments',
	'realisations'=>'Achievements', 
	'contact'=>'Contact', 
	);
} else if ($lang=="de") {
	$items = array(
	'actualite'=>'News',
	'outils'=>'Experimente',
	'realisations'=>'Projekte', 
	'contact'=>'Kontakt',
);
} else {
$items = array( 
	'actualite'=>'Actualit&eacute;', 
	'outils'=>'Exp&eacute;riments', 
	'realisations'=>'R&eacute;alisations',
	'contact'=>'Contact',
);
}

foreach($items as $cle=>$valeur) {
	if ($cle==$category) { $class="menu-on"; } else { $class="menu-off"; }
    echo '<a href='.$link.$lang.'/'.$cle.' class='.$class.'>'.$valeur.'</a>'; 
} 


$items = array( 
	'fr'=>'F', 
	'de'=>'D', 
	'en'=>'E',
	);
foreach($items as $cle=>$valeur) {
	if ($cle==$lang) { $class="langue-on"; } else { $class="langue-off"; }
    echo '<a href='.$link.$cle.'/'.$category.' class='.$class.'>'.$valeur.'</a>'; 
} 
?>
</H2> 
</div> 
</div>
</td>
</tr>
</table>
</body>
</html>