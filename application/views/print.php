<h2><?= $modul . " - " . $date; ?></h2>
<table style="border:1px solid;" width="100%">
  <tr>
    <?php foreach ($header as $value) : ?>
      <th style="border:1px solid;padding:10px"><?php echo $value ?></th>
    <?php endforeach ?>
  </tr>
  <?php $i = 1; ?>
  <?php foreach ($report as $value) : ?>
    <tr>
      <td style="border:1px solid;padding:10px"><?= $i++; ?></td>
      <?php foreach ($body as $bodyx) : ?>
        <td style="border:1px solid;padding:10px"><?= $value->$bodyx; ?></td>
      <?php endforeach; ?>
    </tr>
  <?php endforeach; ?>
</table>
<script>
  window.print();
</script>