          <div class="page-title">
              <div class="title_left">
                <h3>Tambah Keterangan</h3>
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
                    <h2>Form Tambah</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
              <div id="id-messages"></div>
                            <?php echo form_open('keterangan/ajax_tambah', 'class="form-horizontal" method="post" id="form-tambah"'); ?>
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
                                          <option value="" id="nol_alur">-- pilih Alur--</option>
                                          </select>      
                                      </div>
                                    </div>
                                  
                                
                                  <div class="data current">
                                  <fieldset>
                                      <legend>Data 1</legend>
                                      <div class="form-group">
                                      <label class="col-sm-2 control-label">Nama Keterangan</label>
                                      <div class="col-sm-10">
                                          <input type="text" id="nama1" name="data[0][nama]" class="form-control required">    
                                      </div>
                                    </div>
                                     <div class="form-group">
                                      <label class="col-sm-2 control-label">Keterangan</label>
                                      <div class="col-sm-10">
                                          <textarea class="form-control" id="keterangan1" name="data[0][keterangan]"></textarea>    
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label class="col-sm-2 control-label">Lokasi Pengurusan Dokumen</label>
                                      <div class="col-sm-10">
                                          <div id="radio-lokasi" class="btn-group" data-toggle="buttons">
                                            <label class="btn btn-primary">
                                              <input type="radio" name="status" value="yes">
                                              Ada
                                            </label>
                                            <label class="btn btn-default">
                                              <input type="radio" name="status" value="no" >
                                              Tidak ada
                                            </label>
                                          </div>  
                                      </div>
                                    </div>
                                       <div class="form-group">
                                        <label class="col-sm-2 control-label label_gedung" style="display: none">Gedung</label>
                                        <div class="col-sm-10">
                                            <select class="form-control m-bot15 gedung" name="data[0][gedung]" id="gedung1" style="display: none">
                                              <option value="99">-- pilih gedung --</option>
                                              <?php foreach ($gedung as $ged) { ?>
                                                <option value="<?php echo $ged->id_gedung;?>"><?php echo $ged->nama;?></option>
                                           <?php } ?>
                                          </select>    
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <label class="col-sm-2 control-label label_lantai" style="display: none">Lantai</label>
                                        <div class="col-sm-10">
                                            <select class="form-control m-bot15 lantai" name="data[0][lantai]" id="lantai1" style="display: none">
                                              <option value="99" class="zero">-- pilih lantai --</option>
                                          </select>    
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <label class="col-sm-2 control-label label_ruang" style="display: none">Ruang</label>
                                        <div class="col-sm-10">
                                            <select class="form-control m-bot15 ruang" name="data[0][ruang]" id="ruang1" style="display: none">
                                              <option value="99" class="nol">-- pilih ruang --</option>
                                          </select>    
                                        </div>
                                      </div>

                                      </fieldset> 
                                  </div>
                                   

                                      <div class="actionBar">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                        <a class="btn btn-danger cancel" href="<?php echo site_url('keterangan'); ?>">Cancel</a>
                                        <a class="btn btn-default next">Add Field</a>
                                        <a class="btn btn-default prev" style="display:none" >Remove Field</a>
                                      </div>
                            <?php echo form_close();?>

                  </div>
                </div>
              </div>   
              </div>
    <script src="<?php echo base_url('js/jquery.validate.js');?>" type="text/javascript"></script>
    <script type="text/javascript">
    var next = 1;
    function isi_alur(id_kategori){
      if (id_kategori != '') {
        return  $.ajax({
      type: 'post',
      dataType: 'json',
      data: {kategori: id_kategori },
      url: "<?php echo site_url('keterangan/ajax_alur');?>",
      success: function(data){
          $.each(data.alur, function(key, value){
            var ket = $('#alur');
            ket.append('<option value="'+value['id_alur']+'">'+value['nama']+'</option>');
          });
   
          }
      });
      }
    }

    $(function(){
      $(document).on("change", '[name="status"]' , function(e){
      if ($(this).val() == "yes") {
        $(this).parents('fieldset')
        .find('.gedung')
        .show();
        $(this).parents('fieldset')
        .find('.label_gedung')
        .show();
        $(this).parents('fieldset')
        .find('.lantai')
        .show();
        $(this).parents('fieldset')
        .find('.label_lantai')
        .show();
        $(this).parents('fieldset')
        .find('.ruang')
        .show();
        $(this).parents('fieldset')
        .find('.label_ruang')
        .show();
      }
      else{
        $(this).parents('fieldset')
        .find('.gedung')
        .val('99')
        .hide();
        $(this).parents('fieldset')
        .find('.label_gedung')
        .hide();
         $(this).parents('fieldset')
        .find('.lantai')
        .val('99')
        .hide();
        $(this).parents('fieldset')
        .find('.label_lantai')
        .hide();
         $(this).parents('fieldset')
        .find('.ruang')
        .val('99')
        .hide();
        $(this).parents('fieldset')
        .find('.label_ruang')
        .hide();
      }
    });
    $(document).on("change", '#kategori', function(e){
      $('#alur').find('option').not('#nol_alur').remove();
      isi_alur($(this).val());
    });
    $(document).on("change", '.gedung', function(e){
      var lantai = $(this).parents('fieldset')
                    .find('.lantai');
      var ruang = $(this).parents('fieldset')
                    .find('.ruang');
       ruang.find('option').not('.nol').remove();
      if ($(this).val() != 99) {
          $.ajax({
          type: 'post',
          dataType: 'json',
          data: {gedung: $(this).val() },
          url: "<?php echo site_url('ruang/ajax_lantai');?>",
          success: function(data){
            lantai.find('option').not('.zero').remove();
              $.each(data.lantai, function(key, value){
                lantai.append('<option value="'+value['id_lantai']+'">'+value['nama']+'</option>');
              });
              }
      });
      }else{
        lantai.find('option').not('.zero').remove();
      }
    });
    $(document).on("change", '.lantai', function(e){
      var ruang = $(this).parents('fieldset')
                    .find('.ruang');
      if ($(this).val() != 99) {
          $.ajax({
          type: 'post',
          dataType: 'json',
          data: {lantai: $(this).val() },
          url: "<?php echo site_url('keterangan/ajax_ruang');?>",
          success: function(data){
            ruang.find('option').not('.nol').remove();
              $.each(data.ruang, function(key, value){
                ruang.append('<option value="'+value['id_ruang']+'">'+value['nama']+'</option>');
              });
              }
      });
      }else{
        ruang.find('option').not('.nol').remove();
      }
    });    
  });

$("#form-tambah").validate({
   ignore: [],
      
  rules: {
    kategori: {
      required: true
    },
    alur: {
      required: true
    }
  },
  messages: {
    kategori: {
      required: "pilih salah satu kategori"
    },
    alur: {
      required: "pilih salah satu alur",
    }
  },
    submitHandler: function(form){
    $.ajax({
      type: 'post',
      data: $(form).serialize(),
      dataType: 'json',
      url: $(form).attr('action'),
      success: function(data){
          var berhasil = '';
          var gagal = '';
            $.each(data.messages, function(key, value){
            var angka = key + 1; 
            var element = $('.data').eq(key);
            if (value == true) {
                element.find('.alert-success').remove();
                element.find('.alert-danger').remove();
                element.find('fieldset').prepend('<div class="alert alert-success">Data Berhasil Dimasukkan</div>');
                $('.alert-success').delay(100).show(10, function(){
                        $(this).delay(2000).hide(10, function(){
                          $(this).parents('fieldset').parents('.data').remove();
                                  var jml_data = $('.data').length;
                                  if(jml_data == 0){
                                  $('<div class="data current">'+
                                      '<fieldset>'+
                                      '<legend>Data 1</legend>'+
                                      '<div class="form-group">'+
                                      '<label class="col-sm-2 control-label">Nama Keterangan</label>'+
                                      '<div class="col-sm-10">'+
                                          '<input type="text" name="data[0][nama]" class="form-control required" id="nama1">'+    
                                      '</div>'+
                                    '</div>'+
                                     '<div class="form-group">'+
                                      '<label class="col-sm-2 control-label">Keterangan</label>'+
                                      '<div class="col-sm-10">'+
                                          '<textarea class="form-control" id="keterangan1" name="data[0][keterangan]"></textarea>'+    
                                      '</div>'+
                                    '</div>'+
                                    '<div class="form-group">'+
                                      '<label class="col-sm-2 control-label">Lokasi Pengurusan Dokumen</label>'+
                                      '<div class="col-sm-10">'+
                                          '<div id="radio-lokasi" class="btn-group" data-toggle="buttons">'+
                                            '<label class="btn btn-primary">'+
                                              '<input type="radio" name="status" value="yes">'+
                                              'Ada'+
                                            '</label>'+
                                            '<label class="btn btn-default">'+
                                              '<input type="radio" name="status" value="no">'+
                                              'Tidak ada'+
                                            '</label>'+
                                          '</div>'+  
                                      '</div>'+
                                    '</div>'+
                                       '<div class="form-group">'+
                                        '<label class="col-sm-2 control-label label_gedung" style="display: none">Gedung</label>'+
                                        '<div class="col-sm-10">'+
                                            '<select class="form-control m-bot15 gedung" name="data[0][gedung]" id="gedung1" style="display: none">'+
                                              '<option value="99">-- pilih gedung --</option>'+
                                              <?php foreach ($gedung as $ged) { ?>
                                          '<option value="<?php echo $ged->id_gedung;?>"><?php echo $ged->nama;?></option>'+
                                            <?php } ?>  
                                             
                                          '</select>'+   
                                        '</div>'+
                                      '</div>'+
                                      '<div class="form-group">'+
                                        '<label class="col-sm-2 control-label label_lantai" style="display: none">Lantai</label>'+
                                        '<div class="col-sm-10">'+
                                            '<select class="form-control m-bot15 lantai" name="data[0][lantai]" id="lantai1" style="display: none">'+
                                              '<option value="99" class="zero">-- pilih lantai --</option>'+
                                          '</select>' +
                                        '</div>'+
                                      '</div>'+
                                      '<div class="form-group">'+
                                        '<label class="col-sm-2 control-label label_ruang" style="display: none">Ruang</label>'+
                                        '<div class="col-sm-10">'+
                                            '<select class="form-control m-bot15 ruang" name="data[0][ruang]" id="ruang1" style="display: none">'+
                                              '<option value="99" class="nol">-- pilih ruang --</option>'+
                                          '</select>'+  
                                        '</div>'+
                                      '</div>'+
                                      '</fieldset>'+
                                      '</div>').insertAfter($('.form-group').first().next());
                                        next = 1;
                                      }
                                      $('.prev').hide();
                                      $('.data').last().addClass('current');
                                      next = $('.data').length; 
                              });
                    });
           
                
            }
            else{
              element.find('.alert-success').remove();
                element.find('.alert-danger').remove();
              element.find('fieldset').prepend('<div class="alert alert-danger">Data Sudah Ada</div>');
            }
             
            });    
        }
    });
  }
}).settings.ignore = [];

  $('.next').on("click", function(){
    var tanda = next;
    next = next + 1;
     var isi = '<div class="data">'+
                                      '<fieldset>'+
                                      '<legend>Data '+next +'</legend>'+
                                      '<div class="form-group">'+
                                      '<label class="col-sm-2 control-label">Nama Keterangan</label>'+
                                      '<div class="col-sm-10">'+
                                          '<input type="text" name="data['+tanda+'][nama]" class="form-control required" id="nama'+next +'">'+    
                                      '</div>'+
                                    '</div>'+
                                     '<div class="form-group">'+
                                      '<label class="col-sm-2 control-label">Keterangan</label>'+
                                      '<div class="col-sm-10">'+
                                          '<textarea class="form-control" id="keterangan'+next +'" name="data['+tanda+'][keterangan]"></textarea>'+    
                                      '</div>'+
                                    '</div>'+
                                    '<div class="form-group">'+
                                      '<label class="col-sm-2 control-label">Lokasi Pengurusan Dokumen</label>'+
                                      '<div class="col-sm-10">'+
                                          '<div id="radio-lokasi" class="btn-group" data-toggle="buttons">'+
                                            '<label class="btn btn-primary">'+
                                              '<input type="radio" name="status" value="yes">'+
                                              'Ada'+
                                            '</label>'+
                                            '<label class="btn btn-default">'+
                                              '<input type="radio" name="status" value="no">'+
                                              'Tidak ada'+
                                            '</label>'+
                                          '</div>'+  
                                      '</div>'+
                                    '</div>'+
                                       '<div class="form-group">'+
                                        '<label class="col-sm-2 control-label label_gedung" style="display: none">Gedung</label>'+
                                        '<div class="col-sm-10">'+
                                            '<select class="form-control m-bot15 gedung" name="data['+tanda+'][gedung]" id="gedung'+ next + '" style="display: none">'+
                                              '<option value="99">-- pilih gedung --</option>'+
                                              <?php foreach ($gedung as $ged) { ?>
                                          '<option value="<?php echo $ged->id_gedung;?>"><?php echo $ged->nama;?></option>'+
                                            <?php } ?>  
                                             
                                          '</select>'+   
                                        '</div>'+
                                      '</div>'+
                                      '<div class="form-group">'+
                                        '<label class="col-sm-2 control-label label_lantai" style="display: none">Lantai</label>'+
                                        '<div class="col-sm-10">'+
                                            '<select class="form-control m-bot15 lantai" name="data['+tanda+'][lantai]" id="lantai'+ next + '" style="display: none">'+
                                              '<option value="99" class="zero">-- pilih lantai --</option>'+
                                          '</select>' +
                                        '</div>'+
                                      '</div>'+
                                      '<div class="form-group">'+
                                        '<label class="col-sm-2 control-label label_ruang" style="display: none">Ruang</label>'+
                                        '<div class="col-sm-10">'+
                                            '<select class="form-control m-bot15 ruang" name="data['+tanda+'][ruang]" id="ruang'+ next + '" style="display: none">'+
                                              '<option value="99" class="nol">-- pilih ruang --</option>'+
                                          '</select>'+  
                                        '</div>'+
                                      '</div>'+
                                      '</fieldset>'+
                                      '</div>';
          $(isi).insertAfter('.current');
          $('.current').removeClass('current').next().addClass('current');
            $('.prev').show();      
  });
  $('.prev').on("click", function(){
      $('.current').removeClass('current').remove()
      $('.data:last').addClass('current');
      if ($('.current').prev('.data').length == 0) {
            $('.prev').hide();
         }
       next = next - 1;   
  });
    </script>  

