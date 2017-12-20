          <div class="page-title">
              <div class="title_left">
                <h3>Tambah User</h3>
              </div>
                  <div class="row">
                    <div class="col-lg-12">
                       <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="<?php echo site_url('admin/dashboard')?>"> Home</a></li>
                        <li><i class="fa fa-users"></i> User</li>
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
                        <?php echo form_open('admin/user/ajax_tambah', 'class="form-horizontal" method="post" id="form-tambah"'); ?>
                              <div class="form-group">
                                      <label class="col-sm-2 control-label">Username</label>
                                      <div class="col-sm-10">
                                          <input id="username" name="username" type="text" class="form-control" >
                                          <label for="username">Username tidak boleh menggunakan spasi</label>   
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label class="col-sm-2 control-label">Password</label>
                                      <div class="col-sm-10">
                                          <input id="password" name="password" type="password" class="form-control">     
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label class="col-sm-2 control-label">Password Confirm</label>
                                      <div class="col-sm-10">
                                          <input id="password_confirm" name="password_confirm" type="password" class="form-control">     
                                      </div>
                                    </div>
                                     <div class="form-group">
                                      <label class="col-sm-2 control-label">Level</label>
                                      <div class="col-sm-10">
                                           <select class="form-control m-bot15" name="level" id="level">
                                              <option value="1">Super Admin</option>
                                              <option value="2">Admin</option>
                                          </select>       
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label class="col-sm-2 control-label">Jurusan</label>
                                      <div class="col-sm-10">
                                        <select class="form-control m-bot15" name="jurusan" id="jurusan">
                                          </select>        
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <div class="col-sm-offset-2 col-sm-9">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                        <a class="btn btn-danger" href="<?php echo site_url('admin/user'); ?>">Cancel</a>
                                        </div>
                                      </div>
                                    
                                  
                            <?php echo form_close();?>

                  </div>
                </div>
              </div>   
              </div>

 <script type="text/javascript">
 function isi_jurusan(id){
    return $.ajax({
      type: 'post',
      dataType: 'json',
      data: {level: id },
      url: "<?php echo site_url('admin/user/ajax_jurusan');?>",
      success: function(data){
          $.each(data.jurusan, function(key, value){
            var ket = $('#jurusan');
            ket.append('<option value="'+value['id_jurusan']+'">'+value['nama']+'</option>');
          });
   
          }
      });
 }
$(function()
{
  isi_jurusan(1);
  $(document).on("change", '#level', function(e){
      $('#jurusan').find('option').remove();
      isi_jurusan($(this).val());
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
          if (response.ada == false) {
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
              me[0].reset();
            
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
          else{
            //remove the error class
              $('#id-messages').append('<div class="alert alert-danger"><center>' +
                '<span class="glyphicon glyphicon-ok"> </span>' +
                'Data sudah ada' +
                '</center></div>');
              $('.form-group').removeClass('has-error')
                              .removeClass('has-success');
              $('.text-danger').remove();

              //reset form
            
              $('.alert-danger').delay(100).show(10, function(){
                $(this).delay(3000).hide(10, function(){
                  $(this).remove();
                });
              });
            }
            
        }

      });
  });
  
 </script>
