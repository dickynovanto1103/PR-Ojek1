<form method="POST">

<?php foreach ($data->current_user->visible_driver_transactions as $transaction) { ?>
<div class="history">
  <img src="<?= $data->doc_root ?>/api/avatar.php?id=<?= $transaction->user->id ?>">
  <div>
    <input type="submit" name="hide" value="Hide" formaction="?id=<?= $data->current_user->id ?>&transaction_id=<?= $transaction->id ?>">
    <p class="date"><?= $transaction->order_date ?></p>
    <p class="title"><?= $transaction->user->full_name ?></p>
    <p>
      <span><?= $transaction->picking_point ?></span>
      <span><?= $transaction->destination ?></span>
    </p>
    <p>Gave <span class="star"><?= $transaction->rating ?></span> for this order</p>
    <p>And left comment:</p>
    <div class="comment"><?= $transaction->comment ?></div>
  </div>
</div>
<?php } ?>

</form>
