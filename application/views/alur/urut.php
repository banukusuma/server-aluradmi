    <style>
  #sortable { list-style-type: none; }
    #sortable li {margin-top: 1%;
    margin-bottom: 1%;
    margin-right: 1%;
    margin-left: 15%;  padding: 0.2em; padding-left: 1.5em; font-size: 120%; height: 33px; }

  </style>
          <div class="page-title">
              <div class="title_left">
                <h3>Mengurutkan Alur</h3>
              </div>
                  <div class="row">
                    <div class="col-lg-12">
                       <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="<?php echo site_url('dashboard')?>"> Home</a></li>
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
                    <h2>Form Urut</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div id="id-messages"></div>
                        <?php echo form_open('alur/ajax_ubah_urutan', 'class="form-horizontal" method="post" id="form-tambah"'); ?>
                               <div class="form-group">
                                      <label class="col-sm-2 control-label">Kategori</label>
                                      <div class="col-sm-10">
                                          <select class="form-control m-bot15" name="kategori" id="kategori">
                                              <option value="">-- pilih kategori --</option>
                                              <?php foreach ($kategori as $kat) { ?>
                                                <option value="<?php echo $kat->id_kategori;?>"><?php echo $kat->nama;?></option>
                                           <?php } ?>
                                          </select>      
                                      </div>
                                    </div>
                                    <ul id="sortable">
                                    </ul>
                                    <input type="hidden" id="jurusan" name="jurusan" value="<?php echo $this->session->userdata('id_jurusan') ?>">
                                    <div class="form-group">
                                      <div class="col-sm-offset-2 col-sm-9">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                        <a class="btn btn-danger" href="<?php echo site_url('alur'); ?>">Cancel</a>
                                        </div>
                                      </div>
                                    
                                  
                            <?php echo form_close();?>

                  </div>
                </div>
              </div>   
            </div>
  <script type="text/javascript" src="<?php echo base_url('js/jquery-ui.min.js');?>"></script>
  <script src="<?php echo base_url('js/jquery.validate.js');?>" type="text/javascript"></script>         
  <script type="text/javascript">
    $(document).ready(function() {
      $('#kategori').on('change', function(){
        $('#sortable').children('li').remove();
            $.ajax({
              url: "<?php echo site_url('alur/ajax_data_urut')?>",
              type: 'post',
              data: {kategori: $('#kategori').val(), jurusan:$('#jurusan').val()},
              dataType: 'json',
              success: function(data){
                  $.each(data.alur, function(key, value){
                  $('#sortable').prepend('<li class="ui-state-default" id="data_'+value.id_alur+'"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>'+value.nama+'</li>'
                                      );                            
              });     

          }
            });
      });
    });
    $(function() {
        $( "#sortable" ).sortable({
          placeholder: "ui-state-highlight",
          axis: 'y'
        });
        $( "#sortable" ).disableSelection();
  });
    $("#form-tambah").validate({
  rules: {
    kategori: {
      required: true
    }
  },
  messages: {
    kategori: {
      required: "pilih salah satu kategori",
    }
  },

  submitHandler: function(form){
    var data = $('#sortable').sortable('serialize');
    $.ajax({
      type: 'post',
      data: data,
      dataType: 'json',
      url: $(form).attr('action'),
      success: function(data){
          $.each(data.messages, function(key, value){
            $('form li').eq(key-1).prepend('<span class="glyphicon glyphicon-ok"> </span>');
            });
                    
        }
    });
  }
});   
  </script>