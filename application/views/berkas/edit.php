          <div class="page-title">
              <div class="title_left">
                <h3>Edit Berkas</h3>
              </div>
                  <div class="row">
                    <div class="col-lg-12">
                      <ol class="breadcrumb">
                      <li><i class="fa fa-home"></i><a href="<?php echo site_url('dashboard')?>"> Home</a></li>
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
                    <h2>Form Edit</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div id="id-messages"></div>
                            <?php echo form_open('berkas/update', 'class="form-horizontal" method="post" id="form-tambah"'); ?>
                            <div class="form-group">
                              <input type="hidden" name="id" id="id">
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
                                      </div>
                                    </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 control-label">Nama Berkas</label>
                                      <div class="col-sm-10">
                                        <input id="nama" name="nama" type="text" class="form-control">    
                                      </div>
                                    </div>
                               
                                    <div class="form-group">
                                      <div class="col-sm-offset-2 col-sm-9">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                        <a class="btn btn-danger" href="<?php echo site_url('berkas'); ?>">Cancel</a>
                                        </div>
                                      </div>
                                    
                                  
                            <?php echo form_close();?>

                  </div>
                </div>
              </div>   
              </div>
<script type="text/javascript">
   var alur = $('#alur');
    var ket = $('#keterangan');
function isi_alur(id_kategori,  id2 = null){
  if (id != '') {
    return $.ajax({
      type: 'post',
      dataType: 'json',
      data: {kategori: id_kategori },
      url: "<?php echo site_url('keterangan/ajax_alur');?>",
      success: function(data){
        alur.prepend('<option value="">-- Pilih Alur --</option>');
          $.each(data.alur, function(key, value){
            alur.append('<option value="'+value['id_alur']+'">'+value['nama']+'</option>');
          });
          if (id2 != null) {
            alur.val(id2);
          }
          
          }
      });
  } 
}
    function isi_keterangan(id_alur, id2 = null){
    if (id_alur !='') {
      return  $.ajax({
      type: 'post',
      dataType: 'json',
      data: {alur: id_alur},
      url: "<?php echo site_url('berkas/ajax_keterangan');?>",
      success: function(data){
        var ket = $('#keterangan');
            ket.prepend('<option value="">-- Pilih Keterangan --</option>');
          $.each(data.keterangan, function(key, value){
            
            ket.append('<option value="'+value['id_keterangan']+'">'+value['nama']+'</option>');
          });
          if (id2 != null) {
            ket.val(id2);
          }
          }
      });
    }
      
    }

$(function()
{
  $('#kategori').val('<?php echo $berkas->id_kategori; ?>');
 isi_alur(<?php echo $berkas->id_kategori; ?>,'<?php echo $berkas->id_alur; ?>' ).then(isi_keterangan(<?php echo $berkas->id_alur; ?>,'<?php echo $berkas->id_keterangan; ?>'));
  $('#id').val('<?php echo $berkas->id_berkas;?>');
  $('#nama').val('<?php echo $berkas->nama;?>');
  $(document).on('change', '#kategori', function(){
      $('#alur').find('option').remove();
      isi_alur($(this).val());
      ket.children('option').remove();
   });
   $(document).on('change', '#alur', function(){
      $('#keterangan').find('option').remove();
      
      isi_keterangan($(this).val());
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
              })
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
