<header class="status">
<div class="logo">
  <div class="title"><span>PR</span>-<span>OJEK</span></div>
  <div class="sub-title">wushh&hellip; wushh&hellip; ngeeeeeenggg&hellip;</div>
</div>
<div class="login-info">
  <div>Hi, <b><?= $data->current_user->username ?>&nbsp;!</b></div>
  <div><a href="<?= $data->doc_root ?>/index.php">Logout</a></div>
</div>

<nav class="navtab">
  <a id="navtab-order" class="<?= $data->current_tab == 'order' ? 'selected' : '' ?>" href="<?= $data->doc_root ?>/order/index.php?id=<?= $data->current_user->id ?>">Order</a>
  <a id="navtab-history" class="<?= $data->current_tab == 'history' ? 'selected' : '' ?>" href="<?= $data->doc_root ?>/history/index.php?id=<?= $data->current_user->id ?>">History</a>
  <a id="navtab-profile" class="<?= $data->current_tab == 'profile' ? 'selected' : '' ?>" href="<?= $data->doc_root ?>/profile/index.php?id=<?= $data->current_user->id ?>">My Profile</a>
</nav>
</header>
