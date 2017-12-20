          <div class="page-title">
              <div class="title_left">
                <h3>Edit Kategori</h3>
              </div>
                  <div class="row">
                    <div class="col-lg-12">
                      <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="<?php echo site_url('admin/dashboard')?>"> Home</a></li>
                        <li><i class="fa fa-tasks"></i> Kategori</li>
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
                            <?php echo form_open('admin/kategori/update', 'class="form-horizontal" method="post" id="form-tambah"'); ?>
                                  <input type="hidden" name="id" id="id">
                                  <div class="form-group">
                                      <label class="col-sm-2 control-label">Nama Kategori</label>
                                      <div class="col-sm-10">
                                          <input id="nama" name="nama" type="text" class="form-control">
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <div class="col-sm-offset-2 col-sm-9">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                        <a class="btn btn-danger" href="<?php echo site_url('admin/kategori'); ?>">Cancel</a>
                                        </div>
                                      </div>
                            <?php echo form_close();?>
                  </div>
                </div>
              </div>   
              </div>

 <script type="text/javascript">
 $(function() {
    $('#id').val('<?php echo $kategori->id_kategori;?>');
    $('#nama').val('<?php echo $kategori->nama;?>');
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
