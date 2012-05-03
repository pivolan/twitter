<?php

/**
 * Tweet form.
 *
 * @package    twitter
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class TweetForm extends BaseTweetForm
{
	public function configure()
	{
		$this->widgetSchema['text'] = new sfWidgetFormTextarea();
		$this->validatorSchema['text'] = new sfValidatorString(array('max_length' => 140));
	}
}
