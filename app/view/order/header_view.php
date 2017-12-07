<!-- TODO: Taro navigasi yg ada 1, 2, 3, disini (Dicky) -->

<h1>MAKE AN ORDER</h1>
<nav class="navtab_order">
	
  <a class="<?= $data->current_order_tab == 'destination' ? 'selected_order' : '' ?>"><div class="number">1</div><div class="text">Select Destination</div></a>
  <a class="<?= $data->current_order_tab == 'driver' ? 'selected_order' : '' ?>" ><div class="number">2</div><div class="text">Select a Driver</div></a>
  <a class="<?= $data->current_order_tab == 'complete' ? 'selected_order' : '' ?>"><div class="number">3</div><div class="text">Complete your order</div></a>
	
</nav>