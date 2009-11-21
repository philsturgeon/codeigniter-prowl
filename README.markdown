CodeIgniter-Prowl
=================

Send iPhone notifications from your CodeIgniter application with the Prowl library.
Based on the PHP Prowl from Leon Bayliss and cleaned up.


Requirements
------------

1. an iPhone
2. the Prowl app from the App Store installed on your iPhone
3. a [Prowl account](https://prowl.weks.net/register.php)


Usage
-----

	$config['username'] = 'KanyeWest';
	$config['password'] ='douch3b4g1977';
	$config['application'] => 'Kayne\'s Calender'; // optional. Defaults to CI Prowl
	
	echo $this->load->library('prowl', $config);
	
	echo $this->prowl->send('Reminder', 'Be an idiot in public.');

Simple as that! 


To-do
-----

I'll add a config file for it at some point.


Extra
-----

If you'd like to request changes, report bug fixes, or contact
the developer of this library, email <email@philsturgeon.co.uk>