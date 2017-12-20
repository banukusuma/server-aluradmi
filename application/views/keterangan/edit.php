          <div class="page-title">
              <div class="title_left">
                <h3>Edit Keterangan</h3>
              </div>
                  <div class="row">
                    <div class="col-lg-12">
                      <ol class="breadcrumb">
                      <li><i class="fa fa-home"></i><a href="<?php echo site_url('dashboard')?>"> Home</a></li>
                      <li><i class="fa fa-comment"></i> Keterangan</li>
                    </ol>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Form Edit</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <div id="id-messages"></div>
                            <?php echo form_open('keterangan/update', 'class="form-horizontal" method="post" id="form-tambah"'); ?>
                            <input type="hidden" id="id" name="id"/>
                            <input type="hidden" id="jurusan" name="jurusan"/>
                               <div class="form-group">
                                      <label class="col-sm-2 control-label">Kategori</label>
                                      <div class="col-sm-10">
                                          <select class="form-control m-bot15" name="kategori" id="kategori">
                                              <option value="">-- pilih Kategori--</option>
                                              <?php foreach ($kategori as $kat) { ?>
                                                <option value="<?php echo $kat->id_kategori;?>"><?php echo $kat->nama;?></option>
                                           <?php } ?>
                                          </select>      
                                      </div>
                                    </div>
                               
                               <div class="form-group">
                                      <label class="col-sm-2 control-label">Alur</label>
                                      <div class="col-sm-10">
                                        <select class="form-control m-bot15" name="alur" id="alur">
                                          <option value="" class="nol_alur">Pilih Alur</option>
                                          </select>        
                                      </div>
                                    </div>      
                                    <div class="form-group">
                                      <label class="col-sm-2 control-label">Nama Keterangan</label>
                                      <div class="col-sm-10">
                                          <input id="nama" name="nama" type="text" class="form-control">     
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label class="col-sm-2 control-label">Keterangan</label>
                                      <div class="col-sm-10">
                                          <textarea id="keterangan" name="keterangan" type="text" class="form-control"><?php echo $kategori_data->keterangan ;?></textarea>     
                                      </div>
                                    </div>
                                      <div class="form-group">
                                        <label class="col-sm-2 control-label label_gedung">Gedung</label>
                                        <div class="col-sm-10">
                                            <select class="form-control m-bot15 gedung" name="gedung" id="gedung">
                                            <option value="">-- Pilih Gedung --</option>
                                              <?php foreach ($gedung as $ged) { ?>
                                                <option value="<?php echo $ged->id_gedung;?>"><?php echo $ged->nama;?></option>
                                           <?php } ?>
                                          </select>    
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <label class="col-sm-2 control-label label_lantai">Lantai</label>
                                        <div class="col-sm-10">
                                            <select class="form-control m-bot15 lantai" name="lantai" id="lantai">
                                            <option value="" id="zero_lantai">-- Pilih Lantai --</option>
                                          </select>    
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <label class="col-sm-2 control-label label_ruang">Ruang</label>
                                        <div class="col-sm-10">
                                            <select class="form-control m-bot15 ruang" name="ruang" id="ruang">
                                            <option value="" id="zero_ruang">-- Pilih Ruang --</option>
                                          </select>    
                                        </div>
                                      </div>
                                   
                                    <div class="form-group">
                                      <div class="col-sm-offset-2 col-sm-8">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                        <a class="btn btn-danger cancel" href="<?php echo site_url('keterangan'); ?>">Cancel</a>
                                        </div>
                                      </div>
                                    
                                  
                            <?php echo form_close();?>

                  </div>
                </div>
              </div>   
              </div>

    <script type="text/javascript">
    var ket = $('#alur');
    var gedung = $('#gedung');
    var lantai = $('#lantai');
    var ruang = $('#ruang');
    function isi_alur(id, id2 = null){
      if (id != '') {
      return $.ajax({
      type: 'post',
      dataType: 'json',
      data: {kategori: id },
      url: "<?php echo site_url('keterangan/ajax_alur');?>",
      success: function(data){ 
          $.each(data.alur, function(key, value){
            ket.append('<option value="'+value['id_alur']+'">'+value['nama']+'</option>');
          });
          if (id2 != null) {
            ket.val(id2);
          }
          
          }
      });
      }
    }
    function isi_lantai(id, id2 = null){
      if (id != '') {
      $.ajax({
          type: 'post',
          dataType: 'json',
          data: {gedung: id },
          url: "<?php echo site_url('ruang/ajax_lantai');?>",
          success: function(data){
            lantai.find('option').not('#zero_lantai').remove();
              $.each(data.lantai, function(key, value){
                    lantai.append('<option value="'+value['id_lantai']+'">'+value['nama']+'</option>');
                
              });
              if (id2 != null) {
                lantai.val(id2);
                }
              }
      });
      }else{
        lantai.find('option').not('#zero_lantai').remove();
      }
    }
    function isi_ruang(id, id2 = null){
      if (id != '') {
      $.ajax({
          type: 'post',
          dataType: 'json',
          data: {lantai: id },
          url: "<?php echo site_url('keterangan/ajax_ruang');?>",
          success: function(data){
            ruang.find('option').not('#zero_ruang').remove();
              $.each(data.ruang, function(key, value){
                ruang.append('<option value="'+value['id_ruang']+'">'+value['nama']+'</option>');
              });
              if (id2 != null) {
                ruang.val(id2);
                }
              }
        });
      }else{
        ruang.find('option').not('#zero_ruang').remove();
      }
    }
    
    $(function(){
      isi_alur(<?php echo $kategori_data->id_kategori;?>,'<?php echo $kategori_data->id_alur;?>');
      isi_lantai(<?php echo $lokasi->id_gedung;?>, '<?php echo $lokasi->id_lantai;?>');
      isi_ruang(<?php echo $lokasi->id_lantai;?>, '<?php echo $lokasi->id_ruang;?>');
      $('#nama').val('<?php echo $kategori_data->nama;?>');
      $('#id').val('<?php echo $kategori_data->id_keterangan;?>');
      $('#gedung').val('<?php echo $lokasi->id_gedung;?>');
      $('#kategori').val('<?php echo $kategori_data->id_kategori;?>');
      $('#jurusan').val('<?php echo $kategori_data->id_jurusan;?>');
    $(document).on("change", '#kategori', function(e){
      $('#alur').find('option').not('.nol_alur').remove();
      isi_alur($(this).val());
    }); 
    $(document).on("change", '#gedung', function(e){
      isi_lantai($(this).val());
      ruang.find('option').not('#zero_ruang').remove();
    });
    $(document).on("change", '#lantai', function(e){
      isi_ruang($(this).val());
    }); 
});
    $('#form-tambah').submit(function(e){
      e.preventDefault();

      var me = $(this);

      $.ajax({
        url: me.attr('action'),
        type: 'post',
        data: me.serialize(),
        dataType: 'json',
        success: function(response){
            if (response.success == true) {
              //if success show message
              //remove the error class
              $('#id-messages').append('<div class="alert alert-success"><center>' +
                '<span class="glyphicon glyphicon-ok"> </span>' +
                'Data sudah disimpan' +
                '</center></div>');
              $('.form-group').removeClass('has-error')
                              .removeClass('has-success');
              $('.text-danger').remove();

              //reset form
            
              $('.alert-success').delay(100).show(10, function(){
                $(this).delay(3000).hide(10, function(){
                  $(this).remove();
                });
              });
            }
            else{
              $.each(response.messages, function(key, value){
                  var element = $('#' + key);
                  element.closest('div.form-group')
                  .removeClass('has-error')
                  .addClass(value.length > 0 ? 'has-error' : 'has-success')
                  .find('.text-danger')
                  .remove();
                  element.after(value);
              });
            }
        }

      });
  });
  
    </script>  

