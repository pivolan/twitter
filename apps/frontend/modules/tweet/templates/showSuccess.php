<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $tweet->getId() ?></td>
    </tr>
    <tr>
      <th>Text:</th>
      <td><?php echo $tweet->getText() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('tweet/edit?id='.$tweet->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('tweet/index') ?>">List</a>
