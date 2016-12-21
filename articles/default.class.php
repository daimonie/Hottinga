<?php
/***
	Default Article. 
***/
class DefaultArticle implements Article
{
	public function isFrontend()
	{
		return true;
	}
	public function Stylesheet()
	{
		return '
<link rel="stylesheet" type="text/css" media="all" href="articles/default_article.css" />  
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
	Welkom bij Hottinga Administraties en Belastingen
</h1>
<p class=\"header_paragraph\">
	Hottinga Administraties en Belastingen is een kantoor dat zich er op heeft toegelegd om de particulier
	en het mkb bij te staan met het verzorgen van administraties &amp; belastingen. Hoe kunnen wij u helpen?
</p>";
		$Output .="<br><hr>\n";
		
		$LeftColumn = "
<div class=\"box left\">
	<h3 class=\"left\">
		Bent u een kleine ondernemer?
	</h3>
	<p>
		Wij kunnen u administratief bijstaan tegen vooraf afgesproken all-in tarieven.
	</p>
</div>
<div class=\"box green\"> 
	<a href=\"./index.php?page=contact&email=info\">
		<div class=\"icon_email\">&nbsp;</div> info @hottinga.nl
	</a>  
</div>
<div class=\"box left\">
	<h3 class=\"left\">
		Wat kunnen wij voor u betekenen?
	</h3>
	<p>
		Neem contact op met ons om te overleggen wat de mogelijkheden zijn.
	</p>
</div>
<div class=\"box green\"> 
				<div class=\"symbol facebook\">&nbsp;</div>
		<p>
			<a href=\"http://facebook.com/HottingaAdministratiesEnBelastingen\" target=\"_blank\">
			Facebook
		</a> 
	</p>
</div> 
<div class=\"box left\">
	<h3 class=\"left\">
		Ook voor particulieren.
	</h3>
	<p>
		Ook particulieren zijn bij ons van harte welkom voor vragen of belastingaangiften.
	</p>
</div>
<div class=\"box left\">
	<h3 class=\"left\">
		Langskomen?
	</h3>
	<p>
		U kunt langskomen op de <a target=\"_blank\" href=\"https://goo.gl/sctNxz\">Werktuigenweg 13 in Emmeloord</a>.
	</p>
</div>   

";
	

 
		$FacebookBox = '<div class="fb-page" data-href="https://www.facebook.com/HottingaAdministratiesEnBelastingen" data-tabs="timeline" data-width="500" data-height="500" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"></div>';

		$RightColumn = $FacebookBox ;
		
		$Output .= "<div class=\"column left\"> $LeftColumn </div> \n";
		$Output .= "<div class=\"column right\"> $RightColumn </div> \n";

	
		
		$Output .= "<div style=\"clear: both;\">&nbsp;</div>
<div class=\"column left\">
<div class=\"person\">
	<div class=\"face elske\">&nbsp;</div>
	<div class=\"inspirational\">
		<p>
			<a href=\"./index.php?page=contact&email=elske\"><div class=\"icon_email\">&nbsp;</div> elske@hottinga.nl </a>
		</p>
		<h3 class=\"right\">
			Elske Hottinga
		</h3>		
		<p>
		</p>
	</div> 
</div>
</div>

<div class=\"column right\">
<div class=\"person\">
	<div class=\"face joop\">&nbsp;</div>
	<div class=\"inspirational\">
		<p>
			<a href=\"./index.php?page=contact&email=joop\"> <div class=\"icon_email\">&nbsp;</div> joop@hottinga.nl </a>
		</p>
		<h3 class=\"right\">
			Joop Hottinga
		</h3>		
		<p>
		</p>
	</div>
</div>
</div>
";

		$Output .="<div style=\"clear: both;\">&nbsp;</div><br \><br \><hr>\n";  
		
		$Output = preg_replace( "/\n/", "\n".str_repeat("\t", $Tabs), $Output); 
		$Output .= "\n"; 
		return $Output;
	}
} 
?>