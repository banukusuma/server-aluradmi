          <div class="page-title">
              <div class="title_left">
                <h3>Tambah Berkas</h3>
              </div>
                  <div class="row">
                    <div class="col-lg-12">
                      <ol class="breadcrumb">
                      <li><i class="fa fa-home"></i><a href="<?php echo site_url('admin/dashboard')?>"> Home</a></li>
                      <li><i class="fa fa-file"></i> Berkas</li>
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
                            <?php echo form_open('admin/berkas/ajax_tambah', 'class="form-horizontal" method="post" id="form-tambah"'); ?>
                              <div class="form-group">
                                      <label class="col-sm-2 control-label">Jurusan</label>
                                      <div class="col-sm-10">
                                          <select class="form-control m-bot15" name="jurusan" id="jurusan">
                                              <?php foreach ($jurusan as $jur) { ?>
                                                <option value="<?php echo $jur->id_jurusan;?>"><?php echo $jur->nama;?></option>
                                           <?php } ?>
                                          </select>
                                          <?php echo form_error('keterangan'); ?>        
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label class="col-sm-2 control-label">Kategori</label>
                                      <div class="col-sm-10">
                                          <select class="form-control m-bot15" name="kategori" id="kategori">
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
                                          </select>
                                                  
                                      </div>
                                    </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 control-label">Keterangan</label>
                                      <div class="col-sm-10">
                                          <select class="form-control m-bot15" name="keterangan" id="keterangan">
                                          
                                          </select>
                                          <?php echo form_error('keterangan'); ?>        
                                      </div>
                                    </div>
                                  <div class="form-group first">
                                      <label class="col-sm-2 control-label">Nama Berkas 1</label>
                                      <div class="col-sm-9">
                                          <input id="nama1" name="nama[]" type="text" class="form-control">
                                          <?php echo form_error('nama[]'); ?>    
                                      </div>
                                      <div class="col-sm-1">
                                          <a href="javascript:void(0)" class="btn btn-success btn-add"><i class="glyphicon glyphicon-plus"></i></a>
                                        </div>
                                    </div>
                               
                                    <div class="form-group">
                                      <div class="col-sm-offset-2 col-sm-9">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                        <a class="btn btn-danger" href="<?php echo site_url('admin/berkas'); ?>">Cancel</a>
                                        </div>
                                      </div>
                                    
                                  
                            <?php echo form_close();?>

                  </div>
                </div>
              </div>   
              </div>
<script src="<?php echo base_url('js/jquery.validate.js');?>" type="text/javascript"></script>              
<script type="text/javascript">
  function isi_keterangan(id_alur){
    if (id_alur !='') {
      return  $.ajax({
      type: 'post',
      dataType: 'json',
      data: {alur: id_alur},
      url: "<?php echo site_url('admin/berkas/ajax_keterangan');?>",
      success: function(data){
        var ket = $('#keterangan');
            ket.prepend('<option value="">-- Pilih Keterangan --</option>');
          $.each(data.keterangan, function(key, value){
            
            ket.append('<option value="'+value['id_keterangan']+'">'+value['nama']+'</option>');
          });
          }
      });
    }
      
    }
function isi_alur(id_kategori, id_jurusan){
      return  $.ajax({
      type: 'post',
      dataType: 'json',
      data: {kategori: id_kategori, jurusan: id_jurusan },
      url: "<?php echo site_url('admin/keterangan/ajax_alur');?>",
      success: function(data){
        var alur = $('#alur');
            alur.prepend('<option value="">-- Pilih Alur --</option>');
          $.each(data.alur, function(key, value){
            
            alur.append('<option value="'+value['id_alur']+'">'+value['nama']+'</option>');
          });
          isi_keterangan($('#alur').val());
          }
      });
    }

 $("#form-tambah").validate({
  rules: {
    "nama[]": {
      required: true
    },
    keterangan: {
      required: true
    }
  },
  messages: {
    "nama[]": "This field is required",
    keterangan: {
      required: "pilih salah satu keterangan",
    }
  },

  submitHandler: function(form){
    $.ajax({
      type: 'post',
      data: $(form).serialize(),
      dataType: 'json',
      url: $(form).attr('action'),
      success: function(data){
          $.each(data.messages, function(key, value){
            var element = $('input').eq(key);
            if (value == true) {
              element.closest('div.form-group')
                .removeClass('has-error')
                          .find('.text-danger').remove();
              element.closest('div.form-group')
                         .addClass('has-success')
                          .find('.text-success')
                          .remove();
                          element.after('<p class="text-success"> Data Berhasil Dimasukkan </p>');
                          $('.text-success').delay(100).show(10, function(){
                              $(this).delay(2000).hide(10, function(){
                              $(this).parents('.form-group').remove();
                              var jml_data = $('.form-group').length;
                              if(jml_data == 5){
                              $('<div class="form-group">'+
                                                   '<label class="col-sm-2 control-label">Nama Berkas 1</label>'+
                                                    '<div class="col-sm-9">'+
                                                         '<input id="nama1" name="nama[]" type="text" class="form-control">'+     
                                                     '</div>'+
                                                         '<div class="col-sm-1">'+
                                                          '<a href="javascript:void(0)" class="btn btn-success btn-add"><i class="glyphicon glyphicon-plus"></i></a>'+
                                                                    '</div>'+
                                                          '</div>').insertAfter($('.form-group').first().next().next().next());
                                        next = 1;
                                      }
                                
                              });
                          });
            }
            else{
              element.closest('div.form-group')
              .removeClass('has-success')
                          .find('.text-success').remove();
                         element.closest('div.form-group')
                         .addClass('has-error')
                          .find('.text-danger')
                          .remove();
                          
                          element.after('<p class="text-danger"> Data Sudah ada </p>');
                          $('.text-danger').delay(300).show(10); 
                        }
            });
                    
        }
    });
  }
});

 var next = 1;
$(function()
{
   isi_alur($('#kategori').val(), $('#jurusan').val());
    $(document).on('click', '.btn-add', function(e)
    {
        e.preventDefault();
        next = next +1;
        var isi = '<div class="form-group">'+
                       '<label class="col-sm-2 control-label">Nama Berkas ' +next+ '</label>'+
                        '<div class="col-sm-9">'+
                             '<input id="nama' +next+ '" name="nama[]" type="text" class="form-control">'+     
                         '</div>'+
                             '<div class="col-sm-1">'+
                              '<a href="javascript:void(0)" class="btn btn-success btn-add"><i class="glyphicon glyphicon-plus"></i></a>'+
                                        '</div>'+
                              '</div>';
          $(this).parents('.form-group').find('.btn-add')
          .removeClass('btn-add').addClass('btn-remove')
            .removeClass('btn-success').addClass('btn-danger')
            .html('<span class="glyphicon glyphicon-minus"></span>');
          $(this).parents('.form-group').after(isi);
          $('input:last').focus();
    }).on('click', '.btn-remove', function(e)
    {
    $(this).parents('.form-group').remove();

    e.preventDefault();
    return false;
  });
    $(document).on("change", '#jurusan' , function(e){
      $('#alur').find('option').remove();
      isi_alur($('#kategori').val(), $(this).val());
      $('#keterangan').find('option').remove();
    });
     $(document).on("change", '#kategori', function(e){
      $('#alur').find('option').remove();
        isi_alur($(this).val(), $('#jurusan').val());
        $('#keterangan').find('option').remove();
    });  
     $(document).on("change", '#alur', function(e){
      $('#keterangan').find('option').remove();
        isi_keterangan($(this).val());
    });
});
  
 </script>
