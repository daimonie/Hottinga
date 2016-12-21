<?php
/***
	Default Article. 
***/
class RouteArticle implements Article
{
	public function isFrontend()
	{
		return true;
	}
	public function Stylesheet()
	{
		return '
<link rel="stylesheet" type="text/css" media="all" href="articles/route_article.css" />  
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
	Route
</h1>
<p class=\"header_paragraph\">
	Hottinga Administraties en Belastingen in Emmeloord is bereikbaar van maandag tot en met vrijdag.
	De locatie in Amersfoort is op afspraak te bezoeken. U bent van harte welkom voor een persoonlijk oriënterend gesprek.
	Onze prijsopgaven zijn altijd vrijblijvend.
</p>
<br /><br />";  

		$Output .= "
<div class=\"left\"> 
	<h2>
		Vestiging Emmeloord
	</h2>
	<p>
		Werktuigenweg 13, 8304 AZ Emmeloord.   
	</p>
	<br />
	<h3> Openbaar Vervoer </h3>
	<p>
		U kunt ons met het openbaar vervoer bereiken door Bus 146 te nemen, 
		en uit te stappen bij de halte Produktieweg. Dit is de dichtsbijzijnde halte. 
		U loopt vervolgens de kleine weg achter de halte op (Traktieweg) en loopt richting de Werktuigenweg, 
		die dwars op deze weg staat. Het gebouw op deze hoek is het pand waarin (ook) wij gevestigd zijn.
	</p>
	<br />
	<h3>
		Auto / Fiets
	</h3>
	<p>
		Vanaf het centrum Emmeloord volgt u de Nagelerweg. Bij de dwarsstraat Werktuigenweg, slaat u rechtsaf.
		Het gebouw op deze hoek is het pand waarin (ook) wij gevestigd zijn.
	</p>
	<br />
	<h2> Vestiging Amersfoort</h2>
	<p>
		<em>Vorwerk &amp; CO</em>, van Boetzelaerlaan 36, 
		3828 NS Amersfoort,
		bezoek op afspraak via 0527-611261
	</p>
	<br /> 

</div>
<div class=\"right\"> 
		"; 
		$Output .= '<iframe width="400" height="300" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q=place_id:ChIJbe9oIaSHyEcRAKUyXzWI0L8&key=AIzaSyBRVOAmUaxxQkgFBbZSoMrhil1MvXvPyh0" allowfullscreen></iframe>'; 
		
		$Output .= "  
</div> 
		"; 
		$Output = preg_replace( "/\n/", "\n".str_repeat("\t", $Tabs), $Output); 
		$Output .= "\n"; 
		return $Output;
	}
} 
?>