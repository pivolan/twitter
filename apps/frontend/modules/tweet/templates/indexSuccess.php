<?php /** @var $tweet Tweet */ ?>
<?php use_helper('Tweet') ?>

<h1>Tweets List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Text</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($tweets as $tweet): ?>
    <tr>
      <td><a href="<?php echo url_for('tweet/show?id='.$tweet->getId()) ?>"><?php echo $tweet->getId() ?></a></td>
      <td><?php echo format_tweet($tweet->getText()) ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('tweet/new') ?>">New</a>
