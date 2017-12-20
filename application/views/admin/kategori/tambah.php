          <div class="page-title">
              <div class="title_left">
                <h3>Tambah Kategori</h3>
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
                    <h2>Form Tambah</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div id="id-messages"></div>
                            <?php echo form_open('admin/kategori/ajax_tambah', 'class="form-horizontal" method="post" id="form-tambah"'); ?>
                                  <div class="form-group">
                                      <label class="col-sm-2 control-label">Nama Kategori 1</label>
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
                                        <a class="btn btn-danger" href="<?php echo site_url('admin/kategori');?>">Cancel</a>
                                        </div>
                                      </div>
                            <?php echo form_close();?>
                  </div>
                </div>
              </div>   
              </div>
<script src="<?php echo base_url('js/jquery.validate.js');?>" type="text/javascript"></script>
 <script type="text/javascript">
 $("#form-tambah").validate({
  rules: {
    "nama[]": {
      required: true
    }
  },
  messages: {
    "nama[]": "This field is required"
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
                                if(jml_data == 1){
                                        $('#form-tambah').prepend('<div class="form-group">'+
                                                   '<label class="col-sm-2 control-label">Nama Kategori 1</label>'+
                                                    '<div class="col-sm-9">'+
                                                         '<input id="nama1" name="nama[]" type="text" class="form-control">'+     
                                                     '</div>'+
                                                         '<div class="col-sm-1">'+
                                                          '<a href="javascript:void(0)" class="btn btn-success btn-add"><i class="glyphicon glyphicon-plus"></i></a>'+
                                                                    '</div>'+
                                                          '</div>');
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
    $(document).on('click', '.btn-add', function(e)
    {
        e.preventDefault();
        next = next +1;
        var isi = '<div class="form-group">'+
                       '<label class="col-sm-2 control-label">Nama Kategori '+next+'</label>'+
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
});
  
 </script>
