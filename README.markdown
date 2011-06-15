CodeIgniter-Prowl
=================

Send iPhone notifications from your CodeIgniter application with the Prowl library.
Based on the PHP Prowl from Leon Bayliss and cleaned up.

Updated Phil's library to work with the current version of Prowl's API.


Requirements
------------

1. An iPhone
2. The Prowl app from the App Store installed on your iPhone
3. A [Prowl account](http://www.prowlapp.com/)


Usage
-----

1. Update the settings in the config file (config/prowl.php)
2. Do something like this:

	$this->load->library('prowl');

	$result = $this->prowl->send('Reminder', 'Be an idiot in public.');

	print_r($result);

3. There is no #3! Simple as that!

Credits
-------

Based on **Leon Bayliss** PHP Prowl
Original CodeIgniter class by **Phil Sturgeon**
Updated to latest API version by **Erik Brännström**