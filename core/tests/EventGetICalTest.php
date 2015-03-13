<?php

use api1exportbuilders\EventListICalBuilder;
use models\SiteModel;

/**
 *
 * @package Core
 * @link http://ican.openacalendar.org/ OpenACalendar Open Source Software
 * @license http://ican.openacalendar.org/license.html 3-clause BSD
 * @copyright (c) 2013-2015, JMB Technology Limited, http://jmbtechnology.co.uk/
 * @author James Baster <james@jarofgreen.co.uk>
 */
class EventGetICalTest extends \BaseAppTest {
	
	function dataForTestGetIcalLine() {
		return array(
				array('LOCATION','Here','LOCATION:Here'."\r\n"),
				array('123456789','123456789012345678901234567890123456789012345678901234567890',
					'123456789:123456789012345678901234567890123456789012345678901234567890'."\r\n"),
				array('123456789','1234567890123456789012345678901234567890123456789012345678901234',
					'123456789:1234567890123456789012345678901234567890123456789012345678901234'."\r\n"),
				array('123456789','12345678901234567890123456789012345678901234567890123456789012345',
					'123456789:12345678901234567890123456789012345678901234567890123456789012345'."\r\n"),
				array('123456789','123456789012345678901234567890123456789012345678901234567890123456',
					'123456789:12345678901234567890123456789012345678901234567890123456789012345'."\r\n".' 6'."\r\n"),
				array('123456789','1234567890123456789012345678901234567890123456789012345678901234567',
					'123456789:12345678901234567890123456789012345678901234567890123456789012345'."\r\n".' 67'."\r\n"),
				array('123456789','1234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789',
					'123456789:12345678901234567890123456789012345678901234567890123456789012345'."\r\n".' 67890123456789012345678901234567890123456789012345678901234567890123456789'."\r\n".' 012345678901234567890123456789'."\r\n"),
				array('LOCATION',"Here,\nThere;\nEverywhere",
					'LOCATION:Here\\,\\nThere\\;\\nEverywhere'."\r\n"),
				array('LOCATION','26\4 my house',
					'LOCATION:26\\\\4 my house'."\r\n"),
			);
	}
		
	
	/**
     * @dataProvider dataForTestGetIcalLine
     */	
	function testGetIcalLine($key, $value, $out) {
		$site = new SiteModel();
		$ical = new EventListICalBuilder($site,'Europe/London');
		$this->assertEquals($out, $ical->getIcalLine($key, $value));		
	}


	
	

}