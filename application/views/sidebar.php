<div id="sidebar" class="sidebar responsive ace-save-state">
  <script type="text/javascript">
    try{ace.settings.loadState('sidebar')}catch(e){}
  </script>

  <div class="sidebar-shortcuts" id="sidebar-shortcuts">
    <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
      <button class="btn btn-success">
        <i class="ace-icon fa fa-signal"></i>
      </button>

      <button class="btn btn-info">
        <i class="ace-icon fa fa-pencil"></i>
      </button>

      <button class="btn btn-warning">
        <i class="ace-icon fa fa-users"></i>
      </button>

      <button class="btn btn-danger">
        <i class="ace-icon fa fa-cogs"></i>
      </button>
    </div>

    <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
      <span class="btn btn-success"></span>

      <span class="btn btn-info"></span>

      <span class="btn btn-warning"></span>

      <span class="btn btn-danger"></span>
    </div>
  </div><!-- /.sidebar-shortcuts -->

  <ul class="nav nav-list">
    <li class="">
      <a href="<?php echo site_url()?>">
        <i class="menu-icon fa fa-home"></i>
        <span class="menu-text"> Home </span>
      </a>

      <b class="arrow"></b>
    </li>

    <li class="<?php echo sideAktif('User',$menu)?>">
      <a href="#" class="dropdown-toggle">
        <i class="menu-icon fa fa-user"></i>
        <span class="menu-text"> Data User  </span>

        <b class="arrow fa fa-angle-down"></b>
      </a>

      <b class="arrow"></b>

      <ul class="submenu">
        <li class="<?php echo subSideAktif('User',$submenu)?>">
          <a href="<?php echo site_url()?>user">
            <i class="menu-icon fa fa-caret-right"></i>
            Data User
          </a>

          <b class="arrow"></b>
        </li>

      </ul>
    </li>

    <li class="<?php echo sideAktif('Siswa',$menu)?>">
      <a href="#" class="dropdown-toggle">
        <i class="menu-icon fa fa-users"></i>
        <span class="menu-text"> Data Siswa  </span>

        <b class="arrow fa fa-angle-down"></b>
      </a>

      <b class="arrow"></b>

      <ul class="submenu">
        <li class="<?php echo subSideAktif('Siswa',$submenu)?>">
          <a href="<?php echo site_url()?>Siswa">
            <i class="menu-icon fa fa-caret-right"></i>
            Data Siswa
          </a>

          <b class="arrow"></b>
        </li>

      </ul>
    </li>


    <li class="<?php echo sideAktif('Absen',$menu)?>">
      <a href="#" class="dropdown-toggle">
        <i class="menu-icon fa fa-list"></i>
        <span class="menu-text"> Absen  </span>

        <b class="arrow fa fa-angle-down"></b>
      </a>

      <b class="arrow"></b>

      <ul class="submenu">

        <li class="<?php echo subSideAktif('Absen',$submenu)?>">
          <a href="<?php echo site_url('absen?Date='.date('Y-m-d'))?>">
            <i class="menu-icon fa fa-caret-right"></i>
            Absen
          </a>

          <b class="arrow"></b>
        </li>

        <li class="<?php echo subSideAktif('Tag Histori',$submenu)?>">
          <a href="<?php echo site_url('absen/historiTag?Date='.date('Y-m-d'))?>">
            <i class="menu-icon fa fa-caret-right"></i>
            Histori Tag
          </a>

          <b class="arrow"></b>
        </li>

      </ul>
    </li>



  </ul><!-- /.nav-list -->

  <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
    <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
  </div>
</div>
