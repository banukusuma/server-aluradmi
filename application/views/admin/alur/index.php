<div class="page-title">
              <div class="title_left">
                <h3>Alur</h3>
              </div>
                  <div class="row">
                    <div class="col-lg-12">
                      <ol class="breadcrumb">
                      <li><i class="fa fa-home"></i><a href="<?php echo site_url('admin/dashboard')?>"> Home</a></li>
                      <li><i class="fa fa-sitemap"></i> Alur</li>
                    </ol>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
             

           
            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Tabel Alur</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <table id="table" class="table table-bordered">
                      <thead>
                      <tr>
                           <th>Id</th>
                           <th>Jurusan</th>
                           <th>Kategori</th>
                            <th>Nama</th>
                            <th>Urut</th>
                            <th>Action</th>
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
  $('#modal_form').on('shown.bs.modal', function () {
  var keyCode = e.keyCode || e.which;
  if (keyCode === 13) { 
    e.preventDefault();
    return false;
  }
});
  
  $('#alur_side').addClass('active');
  $(document).ready(function() {
      //set active sidebar

      //datatables
      table = $('#table').DataTable({ 
   
          "processing": true, //Feature control the processing indicator.
          "serverSide": true, //Feature control DataTables' server-side processing mode.
          "order": [], //Initial no order.
   
          // Load data for the table's content from an Ajax source
          "ajax": {
              "url": "<?php echo site_url('admin/alur/list_data')?>",
              "type": "POST"
          },
          "rowsGroup": [1,2],
          //Set column definition initialisation properties.
          "columnDefs": [
          { 
              "targets": [ -1,0 ], //last column
              "orderable": false, //set not orderable
          },
          ],
   
      })
        });


 

  function reload_table()
  {
      table.ajax.reload(null,false); //reload datatable ajax 
  }

  function delete_alur(id){
      if(confirm('Are you sure delete this data?'))
      {
          // ajax delete data to database
          $.ajax({
              url : "<?php echo site_url('admin/alur/delete')?>/"+id,
              type: "POST",
              dataType: "JSON",
              success: function(data)
              {
                  //if success reload ajax table
                  $('#modal_form').modal('hide');
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


    
