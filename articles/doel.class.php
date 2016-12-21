<?php
/***
	Default Article. 
***/
class DoelArticle implements Article
{
	public function isFrontend()
	{
		return true;
	}
	public function Stylesheet()
	{
		return '
<link rel="stylesheet" type="text/css" media="all" href="articles/doel_article.css" />  
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
	Doel
</h1>
<p class=\"header_paragraph\">
	Bij Hottinga Administraties en Belastingen werken we met een voorspelbare, kleinschalige, drempelloze en klantvriendelijke aanpak. 
	Op deze pagina laten wij zien wat wij precies kunnen doen en hoe wij te werk gaan.
</p>";
		$Output .="<br><hr>\n";
		
		$Output .= "
		<h2>Ons aanbod</h2>
<div class=\"float_patch\">
	<h3>
		Salarisadministratie
	</h3>
	<p> 
		Het verzorgen van salaris berekeningen, aangiftes loonheffingen, pensioenaangiftes en bijbehorend jaarwerk.
	</p> 
</div>
<div class=\"float_patch\">
	<h3>
		Bedrijfsadministratie
	</h3>
	<p> 
		Het verzamelen, verwerken, rubriceren en samenvatten van financi&euml;le gegevens.
	</p> 
</div>
<div class=\"float_patch\">
	<h3>
		Jaarstukken
	</h3>
	<p> 
		Het aan de hand van de verwerkte administratie opstellen van jaarstukken en eventuele tussentijdse rapportages.
	</p> 
</div>
<div class=\"float_patch\">
	<h3>
		Belastingen
	</h3>
	<p> 
		Het opstellen van de BTW-,  Inkomsten- en Vennootschaps belastingaangiften.
	</p> 
</div> 
	";
		$Output .="<hr class=\"breaker\">\n";
		$Output .= "
		<h2>Onze aanpak</h2>
<div class=\"float_patch\">
	<div class=\"icon hands\">
		&nbsp;
	</div>
	<h3>
		Kennismaking
	</h3>
	<p> 
		In het kennismakings gesprek bespreken we uw doelstellingen binnen het bedrijf, wat u van ons verwacht en wat wij daarin kunnen betekenen.
	</p> 
</div>
<div class=\"float_patch\">
	<div class=\"icon calc\">
		&nbsp;
	</div>
	<h3>
		Aanbod
	</h3>
	<p> 
		Binnen 5 werkdagen ontvangt u van ons een prijsopgave met daarin beschreven welke diensten wij u kunnen bieden voor het vermelde tarief.
	</p> 
</div>
<div class=\"float_patch\">
	<div class=\"icon glass\">
		&nbsp;
	</div>
	<h3>
		Monitoring
	</h3>
	<p> 
		Tijdens de verwerking van uw administratie denken wij mee in het bedrijfsproces en signaleren en overleggen waar dat naar ons idee nodig is.
	</p> 
</div> 
<div class=\"float_patch\">
	<div class=\"icon chat\">
		&nbsp;
	</div>
	<h3>
		Anders
	</h3>
	<p> 
		Uiteraard staan wij klaar u in voorkomende gevallen ter zijde te staan.
	</p> 
</div> 
	";
		//https://developers.facebook.com/docs/plugins/page-plugin 
		
		//$Output .="<br><hr>\n";
		//Facebook!
		//$Output .= '<div class="facebook_fix">&nbsp;'; 
		//$Output .= '<div class="fb-page" data-href="https://www.facebook.com/HottingaAdministratiesEnBelastingen" data-tabs="timeline" data-width="500" data-height="500" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"></div>';
		//$Output .= '</div>';
		//end fb
		$Output = preg_replace( "/\n/", "\n".str_repeat("\t", $Tabs), $Output); 
		$Output .= "\n"; 
		return $Output;
	}
} 
?>