<?php
namespace FKU\FkuPeople\ViewHelpers;
/***************************************************************
*  Copyright notice
*
*  (c) 2014 Daniel Widmer <daniel.widmer@fku.ch>
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
*  (at your option) any later version.
*
*  The GNU General Public License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/

/**
* Returns ...
*
* @package fku_people
*/

use TYPO3Fluid\Fluid\Core\Rendering\RenderingContextInterface;
use TYPO3Fluid\Fluid\Core\ViewHelper\Traits\CompileWithRenderStatic;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

class AgeViewHelper extends AbstractViewHelper {

	use CompileWithRenderStatic;

    public function initializeArguments() {
        $this->registerArgument('birthdate', 'string|dattime', 'Date of birth', true);
        $this->registerArgument('date', 'null|string|datetime', 'Given date', false, NULL);
    }

    /**
     * Calculates the age at a given date
     *
     * @param array $arguments
     * @param \Closure $renderChildrenClosure
     * @param RenderingContextInterface $renderingContext
     * @return string
     */
	public static function renderStatic(array $arguments, \Closure $renderChildrenClosure, RenderingContextInterface $renderingContext) {		
		$birthdate = $arguments['birthdate'];
		$date = $arguments['date'];

		if ($date === NULL) {
			$now = date_create('today');
		} elseif (is_string($date)) {
			$now = date_create($date);
		} else {
			$now = date_create(date('Y-m-d',$date));
		}
		
		if (is_string($birthdate)) {
			$birthday = date_create($birthdate);
		} else {
			$birthday = date_create(date('Y-m-d',$birthdate));
		}
		
		$age = intval(date_diff($birthday,$now)->y);
		if ($age == 1) {
			return '1 Jahr';
		} else {
			return $age.' Jahre';
		}
	}
	
}
?>