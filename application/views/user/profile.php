<div class="page-title">
              <div class="title_left">
                <h3>Change Password</h3>
              </div>
                  <div class="row">
                    <div class="col-lg-12">
                      <ol class="breadcrumb">
                      <li><i class="fa fa-home"></i><a href="<?php echo site_url('dashboard')?>"> Home</a></li>
                      <li><i class="fa fa-users"></i> Profile</li>
                    </ol>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
           
             <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Form Ganti Password <?php echo $this->session->userdata('username'); ?></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
             		 <div id="id-messages"></div>
                      <?php echo form_open($action, 'id="form" class="form-horizontal"');?>             
                        <input type="hidden" value="<?php echo $this->session->userdata('id_user'); ?>" name="id">      
                              <div class="form-group">
                               <label class="col-sm-2 control-label">Password Lama</label>
                                  <div class="col-sm-10">
                                    <input id="old_password" name="old_password" type="password" class="form-control">    
                                   </div>
                               </div>
                               <div class="form-group">
                               <label class="col-sm-2 control-label">Password Baru</label>
                                  <div class="col-sm-10">
                                    <input id="new_password" name="new_password" type="password" class="form-control">    
                                   </div>
                               </div>
                               <div class="form-group">
                               <label class="col-sm-2 control-label">Konfirmasi Password Baru</label>
                                  <div class="col-sm-10">
                                    <input id="new_password_confirm" name="new_password_confirm" type="password" class="form-control">    
                                   </div>
                               </div>
                                <div class="form-group">
                                      <div class="col-sm-offset-2 col-sm-9">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                        <a class="btn btn-danger" href="<?php echo $alamat; ?>">Cancel</a>
                                        </div>
                                 </div>
                          <?php echo form_close();?>

                  </div>
                </div>
              </div>   
              </div>
<script type="text/javascript">
	$('#form').submit(function(e){
		e.preventDefault();
		var me = $(this);

		//perform ajax
		$.ajax({
			url: me.attr('action'),
			type: 'post',
			data: me.serialize(),
			dataType: 'json',
			success: function(data){
				if (data.success == true) {
                            $('#id-messages').append('<div class="alert alert-success"><center>' +
                            '<span class="glyphicon glyphicon-ok"> </span>' +
                            ' Data sudah disimpan' +
                            '</center></div>');
                             $('#form')[0].reset(); // reset form on modals
                              $('.form-group').removeClass('has-error')
                              .find('.text-danger')
                              .remove(); // clear error class
                              $('.form-group').removeClass('has-success');
                             
                               $('.alert-success').delay(300).show(10, function(){
                            $(this).delay(2000).hide(10, function(){
                              $(this).remove();
                            });
                            });   
                                }
                            
                              else{
                                $.each(data.messages, function(key, value){
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

