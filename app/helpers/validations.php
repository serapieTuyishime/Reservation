<?php 
	function telephone($telephone)
	{
		$regex = '/^(078)[\s-]?[\d]{3}[\s-]?[\d]{4}$/';
          
        return (bool) preg_match($regex, $telephone);
	}
?>