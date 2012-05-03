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

<a href="<?php echo url_for('tag/edit?id='.$tag->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('tag/index') ?>">List</a>
