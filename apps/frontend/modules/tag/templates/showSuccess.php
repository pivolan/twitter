<?php /** @var $tag Tag */?>
<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $tag->getId() ?></td>
    </tr>
    <tr>
      <th>Name:</th>
      <td><?php echo $tag->getName() ?></td>
    </tr>
  </tbody>
</table>

<hr />

&nbsp;
<a href="<?php echo url_for('tag/index') ?>">List</a>

<hr />
<h1>Tweets List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Text</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($tag->Tweets as $tweet): ?>
    <tr>
      <td><a href="<?php echo url_for('tweet/show?id='.$tweet->getId()) ?>"><?php echo $tweet->getId() ?></a></td>
      <td><?php echo $tweet->getFormattedText() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>