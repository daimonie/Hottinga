<?php
/***
	Default Article. 
***/
class HistorieArticle implements Article
{
	public function isFrontend()
	{
		return true;
	}
	public function Stylesheet()
	{
		return '
<link rel="stylesheet" type="text/css" media="all" href="articles/historie_article.css" />  
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
	Historie
</h1>
<p class=\"header_paragraph\">
	Het Team van Hottinga Administraties en Belastingen bestaat uit de eigenaren Elske en Joop Hottinga, zus en broer,
	en een tweetal part-time medewerkers, Karin Stam en Roy de Boer. Op deze pagina ziet u een kort overzicht van onze geschiedenis.
</p>
<br /><br />";  
		$Output .= "
<div class=\"left\">
	<h3>
		1997
	</h3>
	<p>
		Elske Hottinga gaat van start met haar franchisebedrijf onder de naam Raad-Emmeloord.
	</p>
<br />
	<h3>
		2001
	</h3>
	<p>
		In Amersfoort wordt door Joop Hottinga een 2<sup>e</sup> bedrijfslocatie opgestart. De franchiseorganisatie Raad wordt verlaten en de naam van het bedrijf verandert in Hottinga Administraties en Belastingen.
	</p>
<br />
	<h3>
		2006
	</h3>
	<p>
		In Lemmer wordt een 3<sup>e</sup> locatie geopend; Amersfoort wordt nu alleen op vrijdag door Joop Hottinga bemand.
	</p>
<br />
	<h3>
		2012
	</h3>
	<p>
		Mede om efficiency redenen zijn de locaties Emmeloord en Lemmer onder één dak gebracht; Amersfoort blijft.
	</p>
<br />
	<h3>
		2013
	</h3>
	<p>
		Na de zomervakantie van 2013 is de locatie Werktuigenweg 13 in Emmeloord betrokken.
		Met verschillende ondernemers wordt een bedrijfsverzamelgebouw “bewoond”.
	</p>
</div>
<div class=\"right\">
	&nbsp;
</div> 
		"; 
		$Output = preg_replace( "/\n/", "\n".str_repeat("\t", $Tabs), $Output); 
		$Output .= "\n"; 
		return $Output;
	}
} 
?>