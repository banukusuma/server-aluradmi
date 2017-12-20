          <div class="page-title">
              <div class="title_left">
                <h3>Lokasi</h3>
              </div>
                  <div class="row">
                    <div class="col-lg-12">
                      <ol class="breadcrumb">
                          <li><i class="fa fa-home"></i><a href="<?php echo site_url('dashboard')?>"> Home</a></li>
                         <li><i class="fa fa-map-marker"></i> Lokasi</li>
                    </ol>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
  

           <div class="row">
             <div class="col-md-12"><div id="map-canvas" style="width: 1075px;
        height: 300px;"></div></div>   
           </div>
           <br>
           <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Edit Data Lokasi</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <div id="id-messages"></div>
                            <?php echo form_open('lokasi/update', 'class="form-horizontal" method="post" id="form-tambah"'); ?>
                              <input type="hidden" id="id" name="id" >
                            <div class="form-group">
                                      <label class="col-sm-3 control-label">Nama Lokasi</label>
                                      <div class="col-sm-9">
                                          <input id="nama" name="nama" type="text" class="form-control" autofocus >
                                          
                                   </div>
                             </div>
                              <div class="form-group">
                                      <label class="col-sm-3 control-label">Lattitude</label>
                                      <div class="col-sm-9">
                                          <input id="ltt" name="ltt" type="text" class="form-control" >
                                          
                                   </div>
                             </div>
                              <div class="form-group">
                                      <label class="col-sm-3 control-label">longitude</label>
                                      <div class="col-sm-9">
                                          <input id="lot" name="lot" type="text" class="form-control" >
                                         
                                   </div>
                             </div>
                              <div class="form-group">
                                   <div class="col-lg-offset-3 col-sm-9">
                                          <button type="submit" class="btn btn-primary">Submit</button>
                                          <a  class="btn btn-danger" href="<?php echo site_url('lokasi'); ?>">Cancel</a>
                                  </div>
                             </div>
                            <?php echo form_close();?>

                  </div>
                </div>
              </div>
              
              </div>
<script type="text/javascript">
$(function() {
    $('#id').val('<?php echo $lokasi->id_lokasi;?>');
    $('#nama').val('<?php echo $lokasi->nama;?>');
    $('#ltt').val('<?php echo $lokasi->lattitude;?>');
    $('#lot').val('<?php echo $lokasi->longtitude;?>');
});
        function initMap() {
        var marker;
        var marker2;
        var map = new google.maps.Map(document.getElementById('map-canvas'), {
          center: {lat: -7.7695309, lng: 110.3875018},
          zoom: 19
        });
         var infowindow = new google.maps.InfoWindow();
         marker2 = new google.maps.Marker({
          position: {lat: <?php echo $lokasi->lattitude;?>, lng: <?php echo $lokasi->longtitude;?>},
          map: map
         });
        google.maps.event.addListener(map, "click", function (e) {
          placeMarker(e.latLng);
        });

      function placeMarker(location) {
        if (marker) {
          marker.setPosition(location);
        } else {
          marker = new google.maps.Marker({
            position: location,
            map: map
          });
        }
        var result = "Latitude : "+location.lat()+"<br>Longitude : "+location.lng();
        $('#ltt').val(location.lat());
        $('#lot').val(location.lng());
        infowindow.setContent(result);
        infowindow.open(map, marker);   
        }
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
 <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAQbVbsL1ZR8NDwfuD4xAkVPO7Mr_YyunM&callback=initMap">
    </script>

    