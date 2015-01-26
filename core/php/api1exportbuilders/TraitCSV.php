<?php
namespace api1exportbuilders;

use Symfony\Component\HttpFoundation\Response;

/**
 *
 * @package Core
 * @link http://ican.openacalendar.org/ OpenACalendar Open Source Software
 * @license http://ican.openacalendar.org/license.html 3-clause BSD
 * @copyright (c) 2013-2014, JMB Technology Limited, http://jmbtechnology.co.uk/
 * @author James Baster <james@jarofgreen.co.uk>
 */
trait TraitCSV   {

	public function getResponse() {
		global $CONFIG;
		$response = new Response($this->getContents());
		$response->headers->set('Content-Type', 'text/csv');
		$response->headers->set('Content-disposition', 'attachment;filename=events.csv');
		$response->setPublic();
		$response->setMaxAge($CONFIG->cacheFeedsInSeconds);
		return $response;
	}

	protected function getCell($in) {
		return '"'. str_replace(array('"'), array('""'),$in) .'"';
	}

	protected function getCellBoolean($in) {
		return $in ? "true" : "false";
	}

}

