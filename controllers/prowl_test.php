<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Prowl_test extends Controller
{
 	function index()
 	{
		$config['username'] = 'KanyeWest';
		$config['password'] ='douch3b4g1977';
		
		// optional. Defaults to CI Prowl
		$config['application'] = "Kayne's Calender";
		
		$this->load->library('prowl', $config);
		
		$result = $this->prowl->send('Reminder', 'Be an idiot in public.');
		
		print_r($result);
 	}
}

?>