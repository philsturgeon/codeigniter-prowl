<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Prowl_test extends Controller
{
 	function index()
 	{
		// Required.
		$config['apikey'] = 'yourgeneratedapikey';
		
		// Optional. Defaults to CI Prowl.
		$config['application'] = "Kanye's Calender";
		
		$this->load->library('prowl', $config);
		
		$result = $this->prowl->send('Reminder', 'Be an idiot in public.');
		
		print_r($result);
 	}
}

?>