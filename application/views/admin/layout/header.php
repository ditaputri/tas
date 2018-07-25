<!-- 
<nav class="navbar navbar-default" role="navigation">
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
    <ul class="nav navbar-nav navbar-right">
      <li class=""><a href="<?php echo site_url('Login/logout') ?>">Logout</a>
    </ul>
  </div>
</nav> -->
<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="Home">YStrike Shop</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li class=""><a href="<?php echo site_url('Login/logout') ?>">Logout</a>
          </ul>
          
        </div>
      </div>
    </nav>
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li <?php if($this->uri->segment(1) == 'tas') echo ' class="active"'; ?>><a href="<?php echo site_url('tas/') ?>">Tas</a>
            <li <?php if($this->uri->segment(1) == 'user') echo ' class="active"'; ?>><a href="<?php echo site_url('user/') ?>">User</a>
            <li <?php if($this->uri->segment(1) == 'kategori') echo ' class="active"'; ?>><a href="<?php echo site_url('kategori/') ?>">Kategori</a>
            <li <?php if($this->uri->segment(1) == 'transaksi') echo ' class="active"'; ?>><a href="<?php echo site_url('transaksi/') ?>">Transaksi</a>
          </ul>
         
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" style="float:right;">
        
