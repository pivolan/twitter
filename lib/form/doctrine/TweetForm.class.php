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
    // Изменяем поле ввода на TextArea
    $this->widgetSchema['text'] = new sfWidgetFormTextarea();
    $this->validatorSchema['text'] = new sfValidatorString(array('max_length' => 140));
    // Удаление поля tags list
    unset($this['tags_list']);
  }

  /**
   * Метод парсинга Тэгов и привязки их к сообщению
   * @param null $con
   * @throws
   */
  public function saveTagsList($con = null)
  {
    if (!$this->isValid()) {
      throw $this->getErrorSchema();
    }
    // Уберем все привязки к тегам.
    $existing = $this->object->Tags->getPrimaryKeys();
    $this->object->unlink('Tags', $existing);

    // Получим список тегов
    $tagsName = ParseTextService::getTagsFromText($this->getValue('text'));
    if (is_array($tagsName) && count($tagsName)) {
      // Узнеам какие уже есть в базе.
      $query = Doctrine_Query::create()
        ->from('Tag t')
        ->whereIn('t.' . Tag::NAME_FIELD, array_keys($tagsName));

      $tags = $query->execute();
      // Общий массив Id тегов для привязки к сообщению
      $tagsToTweet = array();

      /** @var $tag Tag */
      foreach ($tags as $tag)
      {
        $name = $tag->getName();
        if (isset($tagsName[$name])) {
          unset($tagsName[$name]);
        }
        $tagsToTweet[] = $tag->getId();
      }
      // Создадим недостающие Теги
      foreach ($tagsName as $tagName)
      {
        //todo заменить на multiInsert
        $tag = new Tag();
        $tag->setName($tagName);
        $tag->save();
        $tagsToTweet[] = $tag->getId();
      }
      // Привяжем все теги
      $this->object->link('Tags', $tagsToTweet);
    }
  }
}
