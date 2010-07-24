<?php defined('BASEPATH') or exit('shove off');

class Prowl
{
	var $username = '';
	var $password = '';
	var $application = 'CI Prowl';

	/**
	 * Constructor - Sets Preferences
	 *
	 * The constructor can be passed an array of config values
	 */
	function Prowl($config = array())
	{
		if (count($config) > 0)
		{
			$this->initialize($config);
		}
    }

	// --------------------------------------------------------------------

	/**
	 * Initialize preferences
	 *
	 * @access	public
	 * @param	array
	 * @return	void
	 */
	function initialize($config = array())
	{
		foreach ($config as $key => $val)
		{
			if (isset($this->$key))
			{
				$this->$key = $val;
			}
		}
	}
   

	function send($event, $description)
	{
		$url = "https://prowl.weks.net/api/add_notification.php?application=". urlencode($this->application)  ."&event=". urlencode($event) ."&description=". urlencode($description);
	
		$ch = curl_init($url);
				
		curl_setopt($ch, CURLOPT_USERPWD, $this->username .":". $this->password);
		curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_TIMEOUT, 30);
	
		$return = curl_exec($ch);
		
		$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		
		curl_close($ch);
		
		// Invalid username/password
		if($httpcode == 401)
		{
			return array(
				"success" => FALSE,
				"error" => "Invalid username/password",
				"error_code" => 401
			);
		}
		
		// No application/event defined
		elseif($httpcode == 400)
		{
			return array(
				"success" => FALSE,
				"error" => "No application/event defined",
				"error_code" => 400
			);
		}
		
		// All ok!
		return array(
			"success" => TRUE,
			"error" => "",
			"error_code" => ""
		);
	}

};
	
// EOF: application/libraries/Prowl.php
