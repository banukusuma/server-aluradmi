          <div class="page-title">
              <div class="title_left">
                <h3>Gedung</h3>
              </div>
                  <div class="row">
                    <div class="col-lg-12">
                      <ol class="breadcrumb">
                      <li><i class="fa fa-home"></i><a href="<?php echo site_url('dashboard')?>"> Home</a></li>
                      <li><i class="fa fa-sitemap"></i> gedung</li>
                    </ol>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>

           
            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Tabel Gedung</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <table id="table" class="table table-bordered">
                      <thead>
                          <tr>
                           <th>Id</th>
                          <th>Nama</th>
                              <th>Lantai</th>
                              <th>Denah</th>
                              <th>Detail Gedung</th>
                              <th>Upload Denah</th>
                              <th>Hapus Gedung</th>
                          </tr>
                      </thead>
                      <tbody>
                      </tbody>
                    </table>

                  </div>
                </div>
              </div>   
              </div>
           

         
<script type="text/javascript">
  var table;
  var save_method;
  $(document).ready(function() {
   
      //datatables
      table = $('#table').DataTable({ 
   
          "processing": true, //Feature control the processing indicator.
          "serverSide": true, //Feature control DataTables' server-side processing mode.
          "order": [], //Initial no order.
   
          // Load data for the table's content from an Ajax source
          "ajax": {
              "url": "<?php echo site_url('gedung/list_data')?>",
              "type": "POST"
          },
          "rowsGroup": [ 1, 4 , -1],
          //Set column definition initialisation properties.
          "columnDefs": [
          { 
              "targets": [ -1 ,-2, -3, -4], //last column
              "orderable": false, //set not orderable
              "searchable": false,
          },
          { 
              "targets": [ 0 ], //last column
              "orderable": false, //set not orderable
          }
          ],
      });
        });

  function upload_denah(id){
    $('#form-upload')[0].reset(); // reset form on modals
    $('#id_lantai').val(id);
    $('#modal_form').modal('show'); // show bootstrap modal
  }
  function do_upload(){
    $('#btnUpload').text('uploading...'); //change button text
    $('#btnUpload').attr('disabled',true); //set button disable 

      var form = $('form')[0]; // You need to use standart javascript object here
      var formData = new FormData(form);
          $.ajax({
            url: "<?php echo site_url('gedung/upload')?>",
            type: 'post',
            data: formData,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function(response){
              if (response.messages.success == true) {
              //if success show message
              //remove the error class
              $('#id-messages').append('<div class="alert alert-success"><center>' +
                '<span class="glyphicon glyphicon-ok"> </span>' +
                ' Data sudah disimpan' +
                '</center></div>');
              $('.form-group').removeClass('has-error')
                              .removeClass('has-success');
              $('.text-danger').remove();
              $("p").remove();
              //reset form
                $('#form-upload')[0].reset();

              $('.alert-success').delay(100).show(10, function(){
                $(this).delay(3000).hide(10, function(){
                  $(this).remove();
                  $('#modal_form').modal('hide');
                  reload_table();
                });
              });
              $('#btnUpload').text('Upload'); //change button text
              $('#btnUpload').attr('disabled',false); //set button enable 
              }
              else{
                  var element = $('#denah');
                  element.closest('div.form-group')
                  .removeClass('has-error')
                  .addClass(response.messages.error.length > 0 ? 'has-error' : 'has-success')
                  .find('.text-danger')
                  .remove();
                  $("p").remove();
                  element.after(response.messages.error);
                $('#btnUpload').text('upload'); //change button text
              $('#btnUpload').attr('disabled',false); //set button enable 
              }
              
            }

           });
  }
  $('#form-upload').submit(function(e){
         e.preventDefault();
    
          
      });
  function reload_table()
  {
      table.ajax.reload(null,false); //reload datatable ajax 
  }

  function delete_gedung(id){
      if(confirm('Are you sure delete this data?'))
      {
          // ajax delete data to database
          $.ajax({
              url : "<?php echo site_url('gedung/delete')?>/"+id,
              type: "POST",
              dataType: "JSON",
              success: function(data)
              {
                  reload_table();
              },
              error: function (jqXHR, textStatus, errorThrown)
              {
                  alert('Error deleting data');
              }
          });

      }
  }
</script>
 <script type="text/javascript" src="<?php echo base_url('js/jquery.dataTables.min.js');?>">
    </script> 
     <script type="text/javascript" src="<?php echo base_url('js/dataTables.bootstrap.min.js');?>"></script> 
     <script type="text/javascript" src="<?php echo base_url('js/dataTables.rowsGroup.js');?>">
    </script>

    <!-- Bootstrap modal -->
<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Upload Denah</h3>
            </div>
            <div class="modal-body form">
            <div id="id-messages"></div>
                <?php echo form_open_multipart('upload', 'class="form-horizontal" 
              method="post" id="form-upload"'); ?>
                    <input type="hidden" id="id_lantai" name="id_lantai"/>
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-2">Denah</label>
                            <div class="col-md-10">
                                <input name="denah" id="denah" class="form-control" type="file">
                            </div>
                        </div>
                    </div>
                <?php echo form_close(); ?>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnUpload" onclick="do_upload()" class="btn btn-primary">Upload</button>
                <a type="button" class="btn btn-danger" data-dismiss="modal">Cancel</a>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->
