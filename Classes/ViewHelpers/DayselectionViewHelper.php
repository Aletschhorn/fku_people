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
use FKU\FkuPeople\Domain\Model\Notification;

class DayselectionViewHelper extends AbstractViewHelper {
	
	use CompileWithRenderStatic;
	protected $escapeOutput = false;
	
    public function initializeArguments() {
        $this->registerArgument('notification', '\FKU\FkuPeople\Domain\Model\Notification', 'Notification element', true);
        $this->registerArgument('options', 'array', 'Array of options in select dropdown with $key => $title', true);
        $this->registerArgument('ajaxCssClass', 'string', 'Class name of select tag used for AJAX', false, '');
    }

    /**
     * Returns a selection form field with options
     *
     * @param array $arguments
     * @param \Closure $renderChildrenClosure
     * @param RenderingContextInterface $renderingContext
     * @return string
     */
	public static function renderStatic(array $arguments, \Closure $renderChildrenClosure, RenderingContextInterface $renderingContext) {		
		$notification = $arguments['notification'];
		$text = $notification->getRule()->getTitle();
		$id = $notification->getUid();
		$days = $notification->getDays();

		$selection = '<select class="form-control '.$arguments['ajaxCssClass'].'" name="'.$id.'">';

		foreach ($arguments['options'] as $key => $value) {
			$selection .= '<option value="'.$key.'"';
			if ($key == $days) {
				$selection .= ' selected="selected"';
			}
			$selection .= '>'.$value.'</option>';
		}
		$selection .= '</select>';
		
		$line = sprintf ($text, $selection);
		return $line;

    }
}
?>