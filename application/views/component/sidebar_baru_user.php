 <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="<?php echo site_url('dashboard')?>" class="site_title"><i class="fa fa-send-o"></i> <span>Aluradmi</span></a>
            </div>

            <div class="clearfix"></div>

          

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">
                  <li><a href="<?php echo site_url('dashboard');?>"><i class="fa fa-home"></i> Dashboard </a>
                  </li>
                 <li><a><i class="fa fa-tasks"></i> Kategori <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo site_url('kategori');?>">Lihat Data</a></li>
                      <li><a href="<?php echo site_url('kategori/tambah');?>">Tambah Data</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-map-marker"></i> Lokasi <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo site_url('gedung');?>">Lihat Data Gedung</a></li>
                      <li><a href="<?php echo site_url('gedung/tambah');?>">Tambah Data Gedung</a></li>
                      <li><a href="<?php echo site_url('ruang');?>">Lihat Data Ruang</a></li>
                      <li><a href="<?php echo site_url('ruang/tambah');?>">Tambah Data Ruang</a></li>
                    </ul>
                  </li>
                   <li><a><i class="fa fa-sitemap"></i> Alur <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo site_url('alur');?>">Lihat Data</a></li>
                      <li><a href="<?php echo site_url('alur/tambah');?>">Tambah Data</a></li>
                      <li><a href="<?php echo site_url('alur/urut');?>">Mengubah Urutan Data</a></li>
                    </ul>
                  </li>
                   <li><a><i class="fa fa-comment"></i> Keterangan <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo site_url('keterangan');?>">Lihat Data</a></li>
                      <li><a href="<?php echo site_url('keterangan/tambah');?>">Tambah Data</a></li>
                      <li><a href="<?php echo site_url('keterangan/urut');?>">Mengubah Urutan Data</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-file"></i> Berkas <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo site_url('berkas');?>">Lihat Data</a></li>
                      <li><a href="<?php echo site_url('berkas/tambah');?>">Tambah Data</a></li>
                    </ul>
                  </li>
                  
                </ul>
              </div>
    

            </div>
            <!-- /sidebar menu -->

   
          </div>
        </div>