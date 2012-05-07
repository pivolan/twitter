<?php
/**
 * Tweet
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 *
 * @method integer              getId()          Returns the current record's "id" value
 * @package    twitter
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Tweet extends BaseTweet
{
  /**
   * Возвращает отфильтрованное сообщение.
   * @return string
   */
  public function getFormattedText()
  {
    $text = $this->getText();
    $tags = ParseTextService::getTagsFromText($text);
    foreach($tags as $tag)
    {
      $text = str_replace('#'.$tag, "<a href='/tag/show/name/$tag'>#$tag</a>", $text);
    }
    $text = FindLinkAway::static_filter($text);
    $text = XssCleanFilter::static_filter($text);
    $text = nl2br($text);
    return $text;
  }
}
