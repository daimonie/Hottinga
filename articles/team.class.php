<?php
/***
	Default Article. 
***/
class TeamArticle implements Article
{
	public function isFrontend()
	{
		return true;
	}
	public function Stylesheet()
	{
		return '
<link rel="stylesheet" type="text/css" media="all" href="articles/team_article.css" />  
';
	}
	public function Javascript()
	{
		return "";
	}
	public function Parse($Tabs = 0)
	{
		$Output = "\n"; 
		$Output .= "
<h1>
	Team
</h1>
<p class=\"header_paragraph\">
	Het Team van Hottinga Administraties en Belastingen bestaat uit de eigenaren Elske en Joop Hottinga, zus en broer,
	en een tweetal part-time medewerkers, Karin Stam en Roy de Boer.
</p>";
		$Output .="<br><hr>\n"; 
		$Output .= "
<div class=\"head elske\">  
		<div class=\"bust elske\">
			&nbsp;
		</div>
		<p> <a href=\"./index.php?page=contact&email=elske\"><div class=\"icon_email\">&nbsp;</div> elske@hottinga.nl </a> </p>
		<div class=\"deco\">&nbsp;</div>
		<h2 class=\"text_left\"> Elske Hottinga (1958); mede eigenaar </h2>
		<p>
			In 1997 ben ik gestart in Emmeloord met het administratiekantoor. Hiervoor ben ik werkzaam geweest in het bedrijfsleven,
			eerst als boekhoudkundig medewerker en later als Hoofd Administratie en Automatisering. Nu ben ik hoofdzakelijk bezig met
			het monitoren van de werkzaamheden, de salarisadministratie, het begeleiden van de medewerkers en het afwikkelen van
			jaarrekeningen en de diverse (belasting)aangiftes.
		</p> 
</div> 
		"; 
		
		$Output .= "
<div class=\"head joop\">  
		<div class=\"bust joop\">
			&nbsp;
		</div>
		<p> <a href=\"./index.php?page=contact&email=joop\"><div class=\"icon_email\">&nbsp;</div> joop@hottinga.nl </a> </p>
		<div class=\"deco\">&nbsp;</div>
		<h2 class=\"text_left\"> Joop Hottinga (1954); mede eigenaar </h2>
		<p>
			In 2001 ben ik vennoot geworden na jaren in de financiële administratie binnen het onderwijs werkzaam te zijn geweest.
			Ik hou mij hoofdzakelijk bezig met het monitoren van de werkzaamheden, het begeleiden van de medewerkers en het
			afwikkelen van jaarrekeningen en de diverse (belasting)aangiftes.
		</p> 
</div> 
<div style=\"clear: both;\">&nbsp;</div>
		"; 
		
		$Output .= "
<div class=\"head roy\">  
		<div class=\"bust roy\">
			&nbsp;
		</div>
		<p> <a href=\"./index.php?page=contact&email=roy\"><div class=\"icon_email\">&nbsp;</div> roy@hottinga.nl </a> </p>
		<div class=\"deco\">&nbsp;</div>
		<h2 class=\"text_left\"> Roy de Boer(1986); administratief medewerker</h2>
		<p>
			In 2012 heb ik mijn diploma Financieel administratief medewerker met uitstroomrichting assistent accountant behaald.
			Hiervoor heb ik stage gelopen bij een groot accountantskantoor te Lelystad. Hierna heb ik verschillende HBO management
			modules gevolgd aan de Hanze Hogeschool en bij het NCOI. Ik heb eerst bij een handelsonderneming gewerkt als
			bedrijfsboekhouder en ben in 2013 begonnen als assistent bij Hottinga Administraties en Belastingen. Ik houd me
			bezig met het verzorgen van administraties, crediteurenbetalingen,  periodeaangiften omzetbelasting, voorbereiding
			van jaarrekeningen en aangiftes inkomstenbelasting.
		</p> 
</div> 
		"; 
		
		$Output .= "
<div class=\"head karin\">  
		<div class=\"bust karin\">
			&nbsp;
		</div>
		<p> <a href=\"./index.php?page=contact&email=karin\"><div class=\"icon_email\">&nbsp;</div> karin@hottinga.nl </a> </p>
		<div class=\"deco\">&nbsp;</div>
		<h2 class=\"text_left\"> Karin Stam (1966); administratief medewerker.</h2>
		<p>
			Sinds september 2006 ben ik werkzaam bij Hottinga Administraties en Belastingen.
			Daarvoor ben ik 10 jaar werkzaam geweest bij een bank als cliëntadviesmedewerkster en
			8 jaar bij een hypotheekverstrekker als ondersteunend medewerkster. Bij Hottinga Administraties
			en Belastingen houd ik mij vooral bezig met het inboeken en controleren van de administraties van
			onze cliënten. Ook bereid ik de jaarrekeningen voor. 

		</p> 
</div> 
		"; 
		$Output = preg_replace( "/\n/", "\n".str_repeat("\t", $Tabs), $Output); 
		$Output .= "\n"; 
		return $Output;
	}
} 
?>