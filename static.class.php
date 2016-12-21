<?php
/***
	As explained in the master file, this is a data class. 
***/
class Config
{
	public $NavPitch = "Uw adres voor de startende of kleine ondernemer en particulieren";
	//my .htaccess is bad and needs manual edits
	public $Menu = array(
		array("Link" => "doel", 	"Text" => "doel", 		"Code" =>  1),
		array("Link" => "team", 	"Text" => "team", 		"Code" =>  2),
		array("Link" => "historie", "Text" => "historie", 	"Code" =>  3),
		array("Link" => "contact", 	"Text" => "contact", 	"Code" =>  4),
		//array("Link" => "cases", 	"Text" => "cases", 		"Code" =>  5),
		array("Link" => "route", 	"Text" => "route", 		"Code" =>  6)
	);
	public $Pitches = array( 
		array(
			"Header" => "Voor de kleine ondernemer ",
			"Body" => "Financi&euml;le- en salarisadministraties, jaarstukken, belastingaangiften"), 
		array(
			"Header" => "Voorspelbaar geprijsd",
			"Body" => "Vooraf overeengekomen maandelijks termijnbedrag"), 
		array(
			"Header" => "Kleinschalig &amp; drempelloos",
			"Body" => "Kom binnen, ook zonder afspraak welkom")
	);
	public function get( $MenuItem )
	{ 
		foreach($this->Menu as $Article)
		{ 
			if ( $Article["Link"] == $MenuItem)
			{
				return $Article["Code"];
			}
		}
		return 0;
	}
}
?> 