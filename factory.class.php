<?php
/***
	Simple-factory factory.
***/
class Factory
{
	public function GiveArticle($iIndex = 0)
	{  
		switch($iIndex)
		{
			case 6: 
				require_once("articles/route.class.php");
				$Article = new RouteArticle ();
				
				return $Article;
			break;
			case 4: 
				require_once("articles/contact.class.php");
				$Article = new ContactArticle ();
				
				return $Article;
			break;
			case 3: 
				require_once("articles/historie.class.php");
				$Article = new HistorieArticle ();
				
				return $Article;
			break;
			case 2: 
				require_once("articles/team.class.php");
				$Article = new TeamArticle ();
				
				return $Article;
			break;
			case 1: 
				require_once("articles/doel.class.php");
				$Article = new DoelArticle ();
				
				return $Article;
			break;
			
	
			case 0:
			default:
				require_once("articles/default.class.php");
				$Article = new DefaultArticle ();
				
				return $Article;
			break;
		} 
	}
} 
?>