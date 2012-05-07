<?php
// Взят с другово проекта.
/**
 * Created by JetBrains PhpStorm.
 * User: PiVo
 * Date: 16.02.12
 * Time: 3:29
 * To change this template use File | Settings | File Templates.
 */

class FindLinkAway
{
  static function static_filter($message)
  {
    $edit_link = function($matches)
    {
      $domain = $_SERVER['HTTP_HOST'];
      if (isset($matches[7])) {
        $matches[0] = str_replace('\/', '/', $matches[7]);
      }
      elseif (isset($matches[5]))
      {
        $matches[0] = str_replace('\/', '/', $matches[5]);
      }
      elseif (isset($matches[2]))
      {
        $matches[0] = str_replace('\/', '/', $matches[2]);
      }
      else
      {
        return $matches[0];
      }
      $matches[0] = str_replace('\/', '/', $matches[0]);
      $url = parse_url($matches[0]);
      if ($url) {
        $urlString = $url["scheme"] . '://' . $url['host'];
        if (isset($url["path"])) {
          $urlString .= $url["path"];
        }
        if (isset($url["query"])) {
          $urlString .= '?' . $url["query"];
        }
        if (isset($url['fragment'])) {
          $urlString .= '#' . $url['fragment'];
        }

        return '<a target="_blank" href="' . $urlString . '">' . $urlString . '</a>';
      }
    };
    //		$result = preg_replace_callback('/http:(?:\x5C\x2F){2}([\w\-\.]+)((?:\x5C\x2F)([\w\-\.]+))*/',$edit_link,$message);
    //		$result = preg_replace_callback('/http:(?:\x5C\x2F){2}([\w\-\.]+)/',$edit_link,$message);
    //  x5C =  '\', x2F = '/', x28 = '(', x29 = ')', x27 = ', x60 = `, x20 =  ,
    $result = preg_replace_callback(
      '/("(http[s]{0,1}:\/\/([a-zA-Zа-яА-ЯёЁ0-9]+[\w0-9а-яА-ЯёЁ\x5C\x2F\x27\x28\x29\x20\x60\$\-\_\.\+\!\*\,\{\}\|\^\~\[\]\;\?\:\@\&\=\<\>\#\%]+)*)")|(\x27(http[s]{0,1}:\/\/([a-zA-Zа-яА-ЯёЁ0-9]+["\w0-9а-яА-ЯёЁ\x5C\x2F\x28\x29\x60\x20\$\-\_\.\+\!\*\,\{\}\|\^\~\[\]\;\?\:\@\&\=\<\>\#\%]+)*)\x27)|((http[s]{0,1}:\/\/([a-zA-Zа-яА-ЯёЁ0-9]+["\w0-9а-яА-ЯёЁ\x5C\x2F\x27\x28\x29\x60\$\-\_\.\+\!\*\,\{\}\|\^\~\[\]\;\?\:\@\&\=\<\>\#\%]+)*))/u'
      , $edit_link, $message);
    return $result;
  }
}
