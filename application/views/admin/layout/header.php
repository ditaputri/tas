<!-- header.php -->
<nav class="navbar navbar-default" role="navigation">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="<?php echo base_url() ?>">
      Online Shop Export Bag
    </a>
  </div>

  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav">
      <li <?php if($this->uri->segment(1) == 'tas') echo ' class="active"'; ?>><a href="<?php echo site_url('tas/') ?>">Tas</a>
    </ul>
    <ul class="nav navbar-nav">
      <li <?php if($this->uri->segment(1) == 'user') echo ' class="active"'; ?>><a href="<?php echo site_url('user/') ?>">User</a>
    </ul>
    <ul class="nav navbar-nav">
      <li <?php if($this->uri->segment(1) == 'kategori') echo ' class="active"'; ?>><a href="<?php echo site_url('kategori/') ?>">Kategori</a>
    </ul>
    <ul class="nav navbar-nav">
      <li <?php if($this->uri->segment(1) == 'transaksi') echo ' class="active"'; ?>><a href="<?php echo site_url('transaksi/') ?>">Transaksi</a>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li class=""><a href="<?php echo site_url('Login/logout') ?>">Logout</a>
    </ul>
  </div><!-- /.navbar-collapse -->
</nav>