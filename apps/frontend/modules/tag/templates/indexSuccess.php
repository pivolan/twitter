<h1>Tags List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Name</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($tags as $tag): ?>
    <tr>
      <td><a href="<?php echo url_for('tag/show?id='.$tag->getId()) ?>"><?php echo $tag->getId() ?></a></td>
      <td><?php echo $tag->getName() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('tag/new') ?>">New</a>
