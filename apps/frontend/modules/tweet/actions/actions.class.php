<?php
/**
 * tweet actions.
 *
 * @package    twitter
 * @subpackage tweet
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class tweetActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->tweets = Doctrine_Core::getTable('Tweet')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->tweet = Doctrine_Core::getTable('Tweet')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->tweet);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new TweetForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new TweetForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($tweet = Doctrine_Core::getTable('Tweet')->find(array($request->getParameter('id'))), sprintf('Object tweet does not exist (%s).', $request->getParameter('id')));
    $this->form = new TweetForm($tweet);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($tweet = Doctrine_Core::getTable('Tweet')->find(array($request->getParameter('id'))), sprintf('Object tweet does not exist (%s).', $request->getParameter('id')));
    $this->form = new TweetForm($tweet);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $tweet = $form->save();

      $this->redirect('tweet/edit?id='.$tweet->getId());
    }
  }
}
