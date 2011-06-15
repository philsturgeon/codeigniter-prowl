<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Prowl
{
	private $apikey = '';
	private $application = 'CI Prowl';
	
	private $url = 'https://api.prowlapp.com/publicapi/';

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
	 * @param	array
	 * @return	void
	 */
	public function initialize($config = array())
	{
		foreach ($config as $key => $val)
		{
			if (isset($this->$key))
			{
				$this->$key = $val;
			}
		}
	}
   
	/**
	 * Send a push notification. Returns the XML response from the server as a string.
	 *
	 * @param 	$event string
	 * @param 	$description string
     * @param 	$priority integer
	 * @return	string
	 */
	public function send($event, $description, $priority = 0)
	{
		$url = $this->url . 'add';
		$fields = array(
		    'apikey' => $this->apikey,
		    'priority' => $priority,
		    'application' => $this->application,
		    'event' => $event,
		    'description' => $description
		);
	
		$ch = curl_init($url);
		
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($fields));
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	
		$return = curl_exec($ch);
		curl_close($ch);
		
        return $return;
	}

};
	
// EOF: application/libraries/Prowl.php
