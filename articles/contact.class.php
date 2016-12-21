<?php
/***
	Default Article. 
***/
class ContactArticle implements Article
{
	public function isFrontend()
	{
		if(@isset($_REQUEST['backend']))
		{
			return false;
		} 
		return true;
	}
	public function Stylesheet()
	{
		return '
<link rel="stylesheet" type="text/css" media="all" href="articles/contact_article.css" />  
';
	}
	public function Javascript()
	{
		return "
<script src=\"articles/contact_article.js\"></script>";
	}
	public function Parse($Tabs = 0)
	{ 
		if(!$this->isFrontend ())
		{
			$aOutput = array (); 
		 
			$name 			= htmlspecialchars($_POST['name']); 
			$mail 			= htmlspecialchars($_POST['mail']); 
			$mail2 			= htmlspecialchars($_POST['mail2']); 
			$phone 			= htmlspecialchars($_POST['phone']); 
			$subject 		= htmlspecialchars($_POST['subject']); 
			$recipient 		= htmlspecialchars($_POST['recipient']) . "@hottinga.nl"; 
			$content 		= htmlspecialchars($_POST['content']); 
	 
			$aOutput["code"] = 0;
			if(filter_var($recipient,FILTER_VALIDATE_EMAIL) !== false
				&& filter_var($mail,FILTER_VALIDATE_EMAIL) !== false
				&& $mail == $mail2)
			{  
				$message = "E-mail via het contact formulier van [$name], tel. [$phone], e-mail [$mail]: \n $content";
				if(mail($recipient, $subject, $message) === true)
				{
					$logstring = "[".date("d-m-y H:i:s")."]: $recipient, $subject: \n $message ";
					file_put_contents("Email.log.txt", $logstring, FILE_APPEND);
					$aOutput["code"] = 1;
				}
				else
				{
					$aOutput["error"] = "Er is iets fout gegaan.";
				}
			}
			else
			{
				$aOutput["error"] = "Geen geldig e-mail adres opgegeven of e-mail adres was niet gelijk aan de opgegeven controle e-mail.";
			}
	
			return json_encode($aOutput, JSON_FORCE_OBJECT);
		}
		$sEmail	= @htmlspecialchars($_REQUEST['email']); 
		
		if(!in_array($sEmail, array("roy", "elske", "joop", "karin", "info")))
		{
			$sEmail = "info";
		}
		
		$Output = "\n"; 
		$Output .= "
<input type=\"hidden\" name=\"email_selected\" id=\"email_selected\" value=\"". $sEmail ."\" />
<h1>
	Contact
</h1>
<ul id=\"upper_info\">
	<li class=\"phone\">
		&nbsp;
	</li>
	<li>
		0527-611261
	</li>
	<li class=\"mail\">
		&nbsp;
	</li>
	<li>
		<a href=\"./index.php?page=contact&email=info\">info@hottinga.nl </a>
	</li>
	<li class=\"fax\">
		&nbsp;
	</li>
	<li>
		0527-611266
	</li>
</ul>
<br />
<p class=\"header_paragraph\">
	Hottinga Administraties en Belastingen in Emmeloord is bereikbaar van maandag tot en met vrijdag. De locatie in Amersfoort
	is op afspraak te bezoeken. U bent van harte welkom voor een persoonlijk oriënterend gesprek. Onze prijsopgaven zijn altijd vrijblijvend.
</p>
<br><hr>
<p>
	In het onderstaande formulier wordt u gevraagd alle velden in te vullen. 
</p>
";   
		$Output .= "
<div class=\"col_left_container\">

	<div class=\"col left\"> 
		<label for=\"name\" id=\"label_for_name\">
			Naam:
		</label>
		<input name=\"name\" id=\"name\" />
		<div class=\"clearfix\">&nbsp;</div>
		<label for=\"mail\" id=\"label_for_mail\">
			E-mail
		</label>
		<input name=\"mail\" id=\"mail\" />
		<div class=\"clearfix\">&nbsp;</div>
		<label for=\"mail2\" id=\"label_for_mail2\">
			Controle E-mail:
		</label>
		<input name=\"mail2\" id=\"mail2\" />
		<div class=\"clearfix\">&nbsp;</div>
		<label for=\"phone\" id=\"label_for_phone\">
			Telefoon:
		</label>
		<input name=\"phone\" id=\"phone\" />
		<div class=\"clearfix\">&nbsp;</div>
		<label for=\"subject\" id=\"label_for_subject\">
			Onderwerp:
		</label>
		<input name=\"subject\" id=\"subject\" />
		<div class=\"clearfix\">&nbsp;</div>
		<label for=\"recipient\" id=\"label_for_recipient\">
			Aan:
		</label>
		<select name=\"recipient\" id=\"recipient\">
			<option value=\"elske\">elske@hottinga.nl</option>
			<option value=\"joop\">joop@hottinga.nl</option>
			<option value=\"roy\">roy@hottinga.nl</option>
			<option value=\"karin\">karin@hottinga.nl</option>
			<option value=\"info\"  selected>info@hottinga.nl</option>
		</select>
		<div class=\"clearfix\">&nbsp;</div>
			
		<div class=\"head elske\">  
				<div class=\"bust elske\">
					&nbsp;
				</div>
				<h3>
					Elske Hottinga
				</h3>
				<p>
					<div class=\"icon_email\">&nbsp;</div> elske@hottinga.nl
				</p>
		</div>
			<div class=\"clearfix\">&nbsp;</div>
		<div class=\"head roy\">  
				<div class=\"bust roy\">
					&nbsp;
				</div> 
				<h3>
					Roy de Boer
				</h3>
				<p>
					<div class=\"icon_email\">&nbsp;</div> roy@hottinga.nl
				</p>
		</div>	
		</div>	
		<div class=\"col centre\">
			<label for=\"content\" id=\"label_for_content\">
				Uw bericht:
			</label>
			<textarea name=\"content\" id=\"content\"></textarea>
			<div class=\"clearfix\">&nbsp;</div>
		<div class=\"head joop\">  
				<div class=\"bust joop\">
					&nbsp;
				</div>
				<h3>
					Joop Hottinga
				</h3>
				<p>
					<div class=\"icon_email\">&nbsp;</div> joop@hottinga.nl
				</p>
		</div>
			<div class=\"clearfix\">&nbsp;</div>
		<div class=\"head karin\">  
				<div class=\"bust karin\">
					&nbsp;
				</div>
				<h3>
					Karin Stam
				</h3>
				<p>
					<div class=\"icon_email\">&nbsp;</div> karin@hottinga.nl
				</p>
		</div>
	</div>	
	<div class=\"clearfix\">&nbsp;</div>
	<div class=\"col bottom info  highlighted\"> 
		<div class=\"logo\">
			&nbsp;
		</div>
		<h3>
			Info
		</h3>
		<p>
			Wanneer u niet een specifiek persoon moet hebben, kunt u het info-adres gebruiken.   
		</p>
	</div>		
	<div class=\"col bottom second\" id=\"submit_mail\">
		<div class=\"mail second\">
			&nbsp;
		</div>
		<h3  class=\"second\">
			Uw bericht is verzonden.
		</h3>
		
		<div class=\"mail first\">
			&nbsp;
		</div>
		<h3 class=\"first\">
			Bericht Verzenden
		</h3>
	</div>		
</div>	
<div class=\"col right\">
	".'<div class="fb-page" data-href="https://www.facebook.com/HottingaAdministratiesEnBelastingen" data-tabs="timeline" data-width="500" data-height="500" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"></div>'."
</div>		
		";   
		
		
		
		//https://developers.facebook.com/docs/plugins/page-plugin 
		
		//Facebook!
		//$Output .= '<div class="facebook_fix">&nbsp;'; 
		//$Output .= '';
		//$Output .= '</div>';
		//end fb
		$Output = preg_replace( "/\n/", "\n".str_repeat("\t", $Tabs), $Output); 
		$Output .= "\n"; 
		return $Output;
	}
} 
?>