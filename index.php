<?php
/***
	Author: J. S. de Boer, B. Sc.
	Language: English (En-GB)
	
	So this is the new code for the Hottinga & Hottinga website.
	As I don't necessarily want to be the web-master for this website until the end of eternity,
	I will take care of commenting it.
	
	Let's first discuss the design philosophy of the website. A common mistake is to go too far
	with pretty code and design principles, and end up with a rather slow, hard to edit design.
	
	On the initial designs by the designer ( B. van der Veen, M.Sc.) I identify a number of static
	and a number of dynamic elements. By static I mean very simple elements that need not be changeable.
	Hence, by dynamic I mean elements that should be easily changed. 
	
	Static elements here are the logo, the sentence on the top, the menu, the sales pitch and the background.
	Dynamic elements are the content of each page; this seems to be quite varied, but simplistic. 
	
	Therefore, I propose the following set-up. This Index.php will be the Master file. There is no good reason
	to go for my common set-up of a master class, so we won't. Instead, the Master will ask a factory for the content
    page, which will then be parsed. Note that I will attempt for very readable output.

	Using HFDP [Head First Design Patterns , http://goo.gl/H2njgI] as a reference for this part. The Design Pattern we use
	is more of a programming idiom, and given a 'Honourable Mention' in HFDP. In the concepts directory you will find a screenshot
	of the class diagram. 

	The Master file will use a simple data object from the content directory to set the necessities. For consistency, this will not
	be an array but a static class. By a static class I mean class that only has member variables.
	
	As for the CSS, I recommend http://alistapart.com/article/css-positioning-101 if you aren't familiar with position relative/absolute.
	
	On a side note, the code style is CamelCaseOne (not camelCaseOne and not CamelCase1 etc.)
***/ 
require_once("static.class.php");
require_once("article.class.php");
require_once("factory.class.php");

$Config = new Config();

$Factory = new Factory(); 
$iArticle = $Config->get( @$_REQUEST["page"] );

$Article = $Factory->GiveArticle($iArticle);
if($Article->isFrontend())
{
?>

<!DOCTYPE html>
<html lang="nl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" media="all" href="design/master.css" />
<?php
echo $Article->Stylesheet();
?>
<link rel="stylesheet" type="text/css" href="design/responsive.css"
  media="screen" />
<title> Hottinga & Hottinga</title>
</head>

<body> 
<div id="container" class="page_<?php echo $iArticle; ?>"  itemscope itemtype ="http://schema.org/LocalBusiness"> 
	<header>
		<div class="logo" id="master_logo" itemprop="logo">&nbsp;</div>
		<nav> 
			<div class="one_liner">
			<?php echo $Config->NavPitch; ?>
			</div>
			<ol>
				
				<li class="mobile">
					<a href="./">
						Home
					</a>
				</li>
		<?php
			foreach( $Config->Menu as $Item )
			{
				echo "
				<li>
					<a href=\"".$Item["Link"]."\">
						".$Item["Text"]."
					</a>
				</li>
				";
			}				
		?>
			</ol>
		</nav>
		<div style="clear:both;"></div>
		<aside>
		
		<?php
			foreach( $Config->Pitches as $Item )
			{
				echo "
			<div class=\"pitch\">
				<h2>
					".$Item["Header"]."
				</h2>
				<p>
					".$Item["Body"]."
				</p>
			</div>  
				";
			}				
		?>
		</aside> 
	</header> 
	<article class="middle"> 
		<?php
			echo $Article->Parse(2);
		?><script src="//platform.linkedin.com/in.js" type="text/javascript"></script>
<script type="IN/CompanyInsider" data-id="13210798"></script>
	</article>
	<article class="footer">
		<footer>
			<div class="footer_block year">
				<p>
					Een betrouwbare partner, al jaren lang.
				</p>
			</div>
			<div class="footer_block door">
				<p>
					Overleg en communicatie. Kom gewoon langs.
				</p>
			</div>
			<div class="footer_block arrows">
				<p>
					Altijd weten waar u aan toe bent.
				</p>
			</div>
			<div class="footer_block maps">
				<p>
					Met elkaar omgaan op gelijkwaardig niveau. 
				</p>
			</div> 
			<div class="footer_line">
				<p>
					<a href=\"./index.php?page=contact&email=info\"><div class="icon_email">&nbsp;</div> <span itemprop="email" >info@hottinga.nl</span> </a> | <span itemprop="telephone">0527611261</span>
				</p>
			</div>
			
			
<span style='display: none' itemprop="name">Hottinga & Hottinga </span>
<span style='display: none' itemprop="address">Werktuigenweg 13, 8304 AZ Emmeloord</span>
			
		</footer>
	</article>
</div>
<div id="fb-root"></div>

<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.5&appId=406728512771366";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-73424934-1', 'auto');
  ga('send', 'pageview');

</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="design/master.js"></script>
<?php
echo $Article->Javascript();
?>
</body> 
</html>
<?php
}
else
{
	echo $Article->Parse(0);
} 
?>