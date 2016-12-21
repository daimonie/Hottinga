<?php
/***
	Simple-factory product. 
***/
interface Article
{
	public function Stylesheet();
	public function Javascript();
	public function Parse($Tabs = 0);
	public function isFrontend();
} 
?>