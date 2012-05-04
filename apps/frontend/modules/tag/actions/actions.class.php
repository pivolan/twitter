<?php

/**
 * tag actions.
 *
 * @package    twitter
 * @subpackage tag
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class tagActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->tags = Doctrine_Core::getTable('Tag')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $id = $request->getParameter('id');
    $name = $request->getParameter('name');
    if ($id) {
      $this->tag = Doctrine_Core::getTable('Tag')->find(array($request->getParameter('id')));
    }
    elseif ($name)
    {
      $this->tag = Doctrine_Core::getTable('Tag')->findOneBy(Tag::NAME_FIELD, $name);
    }
    $this->forward404Unless($this->tag);
  }
}
