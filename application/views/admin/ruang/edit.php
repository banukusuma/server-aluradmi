          <div class="page-title">
              <div class="title_left">
                <h3>Edit Ruang</h3>
              </div>
                  <div class="row">
                    <div class="col-lg-12">
                       <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="<?php echo site_url('admin/dashboard')?>"> Home</a></li>
                        <li><i class="fa fa-sitemap"></i> Ruang</li>
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
                        <?php echo form_open('admin/ruang/update', 'class="form-horizontal" method="post" id="form-tambah"'); ?>
                          <input type="hidden" name="id" id="id">
                               <div class="form-group">
                                      <label class="col-sm-2 control-label">Gedung</label>
                                      <div class="col-sm-10">
                                          <select class="form-control m-bot15" name="gedung" id="gedung">
                                              <?php foreach ($gedung as $ged) { ?>
                                                <option value="<?php echo $ged->id_gedung;?>"><?php echo $ged->nama;?></option>
                                           <?php } ?>
                                          </select>      
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label class="col-sm-2 control-label">Lantai</label>
                                      <div class="col-sm-10">
                                          <select class="form-control m-bot15" name="lantai" id="lantai">
                                            <?php foreach ($lantai as $lan) { ?>
                                                <option value="<?php echo $lan->id_lantai;?>"><?php echo $lan->nama;?></option>
                                           <?php } ?>
                                          </select>
                                                  
                                      </div>
                                    </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 control-label">Nama Ruang</label>
                                      <div class="col-sm-10">
                                          <input id="nama" name="nama" type="text" class="form-control">  
                                      </div>
                                   
                                    </div>
                                    <div class="actionbar">
                                      <div class="col-sm-offset-2 col-sm-9">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                        <a class="btn btn-danger" href="<?php echo site_url('ruang'); ?>">Cancel</a>
                                        </div>
                                      </div>
                                    
                                  
                            <?php echo form_close();?>

                  </div>
                </div>
              </div>   
              </div>

 <script type="text/javascript">
$(function()
{
  $('#id').val('<?php echo $ruang->id_ruang; ?>');
  $('#nama').val('<?php echo $ruang->nama; ?>');
  $('#gedung').val('<?php echo $ruang->id_gedung;?>');
  $('#lantai').val('<?php echo $ruang->id_lantai;?>');
  $(document).on("change", "#gedung", function(e){
    $('#lantai').find('option').remove();
    isi_lantai($(this).val());
  }); 
});
function isi_lantai(id_gedung){
  return  $.ajax({
      type: 'post',
      dataType: 'json',
      data: {gedung: id_gedung },
      url: "<?php echo site_url('admin/ruang/ajax_lantai');?>",
      success: function(data){
        var lantai = $('#lantai');
          $.each(data.lantai, function(key, value){
            lantai.append('<option value="'+value['id_lantai']+'">'+value['nama']+'</option>');
          });
          }
      });
    }
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
