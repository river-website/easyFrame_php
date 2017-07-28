<?php

class ezBase
{
	protected $conf = null;
	protected $confNode = null;
	public function __construct()
	{
		$this->conf		= $GLOBALS['ezData']['conf']->getNode($this->confNode);
	}
	public function confValid(){
		if(is_array($this->conf))
			return true;
		return false;
	}
}