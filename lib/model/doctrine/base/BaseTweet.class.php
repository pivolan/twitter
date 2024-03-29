<?php

/**
 * BaseTweet
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $text
 * @property Doctrine_Collection $Tags
 * @property Doctrine_Collection $TweetTagAssoc
 * 
 * @method string              getText()          Returns the current record's "text" value
 * @method Doctrine_Collection getTags()          Returns the current record's "Tags" collection
 * @method Doctrine_Collection getTweetTagAssoc() Returns the current record's "TweetTagAssoc" collection
 * @method Tweet               setText()          Sets the current record's "text" value
 * @method Tweet               setTags()          Sets the current record's "Tags" collection
 * @method Tweet               setTweetTagAssoc() Sets the current record's "TweetTagAssoc" collection
 * 
 * @package    twitter
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseTweet extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('tweet');
        $this->hasColumn('text', 'string', 140, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 140,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('Tag as Tags', array(
             'refClass' => 'TweetTagAssoc',
             'local' => 'tweet_id',
             'foreign' => 'tag_id'));

        $this->hasMany('TweetTagAssoc', array(
             'local' => 'id',
             'foreign' => 'tweet_id'));
    }
}