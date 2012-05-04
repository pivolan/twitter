<?php
/**
 * Created by JetBrains PhpStorm.
 * User: PiVo
 * Date: 04.05.12
 * Time: 20:45
 * To change this template use File | Settings | File Templates.
 */
class ParseTextService
{
  /**
   * Возвращает все Теги из сообщения
   * @param $text string
   * @return array = {name=>name}
   */
  static public function getTagsFromText($text)
  {
    $mathes = array();
    $result = array();
    preg_match_all("/#[^#^ ^\n^\r^\t^.^,]+/su", $text, $mathes);
    if (is_array($mathes) && count($mathes) > 0) {
      $mathes = end($mathes);
      if (is_array($mathes)) {
        foreach ($mathes as $tag)
        {
          $name = str_replace('#', '', $tag);
          $result[$name] = $name;
        }
      }
    }
    return $result;
  }
}
