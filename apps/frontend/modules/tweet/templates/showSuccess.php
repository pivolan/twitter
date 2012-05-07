<?php /** @var $tweet Tweet */?>
<?php use_helper('Tweet') ?>
<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $tweet->getId() ?></td>
    </tr>
    <tr>
      <th>Raw Text:</th>
      <td><?php echo $tweet->getText() ?></td>
    </tr>
    <tr>
      <th>Formatted Text:</th>
      <td><?php echo format_tweet($tweet->getText()) ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('tweet/edit?id='.$tweet->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('tweet/index') ?>">List</a>
