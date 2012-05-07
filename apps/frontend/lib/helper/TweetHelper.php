<?php
/**
 * Created by JetBrains PhpStorm.
 * User: PiVo
 * Date: 07.05.12
 * Time: 23:14
 * To change this template use File | Settings | File Templates.
 */

/**
 * Возвращает отфильтрованное сообщение.
 * @return string
 */
function format_tweet($text)
{
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