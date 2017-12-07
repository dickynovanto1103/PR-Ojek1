<h1>Transaction History</h1>
<nav class="navtab history-navtab">
  <a class="<?= $data->current_history_tab == 'user' ? 'selected' : '' ?>" href="<?= $data->doc_root ?>/history/user.php?id=<?php echo $data->current_user->id ?>">My Previous Orders</a>
  <a class="<?= $data->current_history_tab == 'driver' ? 'selected' : '' ?>" href="<?= $data->doc_root ?>/history/driver.php?id=<?php echo $data->current_user->id ?>">Driver History</a>
</nav>
