<form method="POST">

<?php foreach ($data->current_user->visible_user_transactions as $transaction) { ?>
<div class="history">
  <img src="<?= $data->doc_root ?>/api/avatar.php?id=<?= $transaction->driver->id ?>">
  <div>
    <input type="submit" name="hide" value="Hide" formaction="?id=<?= $data->current_user->id ?>&transaction_id=<?= $transaction->id ?>">
    <p class="date"><?= $transaction->order_date ?></p>
    <p class="title"><?= $transaction->driver->full_name ?></p>
    <p>
      <span><?= $transaction->picking_point ?></span>
      <span><?= $transaction->destination ?></span>
    </p>
    <p>You rated: <span class="star"><?= str_repeat ('&#9733;', $transaction->rating) ?></span></p>
    <p>You commented:</p>
    <div class="comment"><?= $transaction->comment ?></div>
  </div>
</div>
<?php } ?>

</form>
