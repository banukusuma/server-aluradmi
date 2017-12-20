  <div class="page-title">
              <div class="title_left">
                <h3>Tambah Gedung</h3>
              </div>
                  <div class="row">
                    <div class="col-lg-12">
                      <ol class="breadcrumb">
                      <li><i class="fa fa-home"></i><a href="<?php echo site_url('admin/dashboard')?>"> Home</a></li>
                      <li><i class="fa fa-file"></i> Gedung</li>
                    </ol>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>

      <div class="row">
        <div class="col-md-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Form Tambah Gedung</h2>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
               <div id="id-messages"></div>
               <br>
              <?php echo form_open('admin/gedung/ajax_tambah', 'class="form-horizontal" 
              method="post" id="form-tambah"'); ?>
                <div class="form-group">
                <label class="col-sm-3 control-label">Nama Gedung</label>
                <div class="col-sm-9">
                  <input type="text" name="nama" id="nama" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label">Jumlah Lantai</label>
                <div class="col-sm-2">
                  <select class="form-control m-bot15" name="jumlah" id="jumlah">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                    <option>6</option>
                    <option>7</option>
                    <option>8</option>
                    <option>9</option>
                    <option>10</option>
                  </select>
                </div>
              </div>
                 <div class="form-group">
                      <label class="col-sm-3 control-label">Latitude</label>
                      <div class="col-sm-9">
                      <input type="text" class="form-control" name="lat" id="lat">
                      </div>
                      
                    </div>
                     <div class="form-group">
                      <label class="col-sm-3 control-label">Longitude</label>
                      <div class="col-sm-9">
                      <input type="text" class="form-control" name="lng" id="lng">
                      </div>
                      
                    </div>
                    <div class="form-group">
                      <p class="col-sm-9 col-sm-offset-3"><span class="label label-primary"> Maps</span>Click pada peta untuk mendapatkan latitude dan longitude </p>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control label">Maps</label>
                      <div class="col-sm-9">
                        <div id="map-canvas" style="height: 400px; width: 700px;"></div>
                      </div>
                    </div>
                    
                    <div class="actionBar">
                        <button type="submit" class="btn btn-primary" name="submit">Save</button>
                        <a class="btn btn-danger">Cancel</a>
                    </div>
                    
              <?php echo form_close(); ?>
           
              
                   
          </div>
            </div>
           
        </div>
      </div>
      </div>

      
  
      <script type="text/javascript">    
        $(function() {
          $(document).on("change", '#jumlah', function(e){
            $('#step-3').empty();
            var lantai = $("#jumlah option:selected").text();
              insertInputDenah(lantai);
          });
          $(document).on("change", '[name = "denah[]"]', function(e){
            var ext = $(this).val().split('.').pop().toLowerCase();
            if($.inArray(ext, ['png','jpg','jpeg']) == -1) {
              $(this).val("");
              alert("format file yang anda masukkan salah");
          }
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

              //reset form
                me[0].reset();
              $('.alert-success').delay(100).show(10, function(){
                $(this).delay(3000).hide(10, function(){
                  $(this).remove();
                });
              });
              }
              else if(response.messages.ada == true){
                $('#id-messages').append('<div class="alert alert-danger"><center>' +
                '<span class="glyphicon glyphicon-remove"> </span>' +
                ' Data sudah ada' +
                '</center></div>');
                $('.alert-danger').delay(100).show(10, function(){
                $(this).delay(3000).hide(10, function(){
                  $(this).remove();
                });
              });
              }
              else{
                $.each(response.messages.validation, function(key, value){
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
      function insertInputDenah(jml_lantai){
        for(var i = 0; i < jml_lantai; i ++){
              var posisi = i + 1;
              $('#step-3').append('<div class="form-group">'+
                      '<label class="col-sm-3 control-label">Denah Lantai '+ posisi +'</label>'+
                      '<div class="col-sm-9">'+
                      '<input type="file" accept="image/png, image/jpeg, image/jpg" class="form-control" multiple="multiple" name="denah[]" id="denah'+posisi+'">'+
                      '</div>'+
                      '</div>');
            }
      }
      function initMap() {
        var marker;
        var marker2;
        var map = new google.maps.Map(document.getElementById('map-canvas'), {
          center: {lat: -7.7695309, lng: 110.3875018},
          zoom: 19
        });
         var infowindow = new google.maps.InfoWindow();
         var shapes = [];
      /*
      var path = [
      new google.maps.LatLng(-7.769162309590607, 110.3874023258686),
      new google.maps.LatLng(-7.768683943419574, 110.38753107190132),
      new google.maps.LatLng(-7.768715834514595, 110.38766786456108),
      new google.maps.LatLng(-7.768551063830916, 110.38772150874138),
      new google.maps.LatLng(-7.768513857538557, 110.38760617375374),
      new google.maps.LatLng(-7.7683411139951435, 110.38765713572502),
      new google.maps.LatLng(-7.768481966428205, 110.38807556033134),
      new google.maps.LatLng(-7.768644079547384, 110.3880326449871),
      new google.maps.LatLng(-7.768559036607423, 110.38775369524956),
      new google.maps.LatLng(-7.768726464879059, 110.38770005106926),
      new google.maps.LatLng(-7.769212803765761, 110.38755789399147)];
      var polyline = new google.maps.Polygon({path:path, strokeColor: "#FF0000", strokeOpacity: 1.0, strokeWeight: 2});
      polyline.setMap(map);
      map.setCenter(new google.maps.LatLng(-7.769644238173463, 110.38834418827014), 19);
      shapes.push(polyline);
      var path = [
      new google.maps.LatLng(-7.769829363730522, 110.38761958479881),
      new google.maps.LatLng(-7.769855939570723, 110.3877241909504),
      new google.maps.LatLng(-7.7695662628218045, 110.38780465722084),
      new google.maps.LatLng(-7.769444013858633, 110.3873647749424),
      new google.maps.LatLng(-7.769552974892753, 110.38734063506126),
      new google.maps.LatLng(-7.769651305557816, 110.38766250014305)];
      var polyline = new google.maps.Polygon({path:path, strokeColor: "#FF0000", strokeOpacity: 1.0, strokeWeight: 2});
      polyline.setMap(map);
      map.setCenter(new google.maps.LatLng(-7.769644238173463, 110.38834418827014), 19);
      shapes.push(polyline);
      var path = [
      new google.maps.LatLng(-7.769422753165748, 110.38734868168831),
      new google.maps.LatLng(-7.769380231776768, 110.38720652461052),
      new google.maps.LatLng(-7.769725717937684, 110.38711801171303),
      new google.maps.LatLng(-7.7697602665381345, 110.38727089762688)];
      var polyline = new google.maps.Polygon({path:path, strokeColor: "#FF0000", strokeOpacity: 1.0, strokeWeight: 2});
      polyline.setMap(map);
      map.setCenter(new google.maps.LatLng(-7.769644238173463, 110.38834418827014), 19);
      shapes.push(polyline);
      var path = [
      new google.maps.LatLng(-7.769821390978137, 110.38711532950401),
      new google.maps.LatLng(-7.769996791495698, 110.3876705467701),
      new google.maps.LatLng(-7.7698718850740445, 110.38771077990532),
      new google.maps.LatLng(-7.7697097724288176, 110.38715556263924)];
      var polyline = new google.maps.Polygon({path:path, strokeColor: "#FF0000", strokeOpacity: 1.0, strokeWeight: 2});
      polyline.setMap(map);
      map.setCenter(new google.maps.LatLng(-7.769644238173463, 110.38834418827014), 19);
      shapes.push(polyline);
      var path = [
      new google.maps.LatLng(-7.770243946646091, 110.38698926568031),
      new google.maps.LatLng(-7.7699516125815205, 110.38706973195076),
      new google.maps.LatLng(-7.770108409968734, 110.38764640688896),
      new google.maps.LatLng(-7.770228001156906, 110.38762226700783),
      new google.maps.LatLng(-7.7700951220568335, 110.38714751601219),
      new google.maps.LatLng(-7.770265207297389, 110.38709655404091)];
      var polyline = new google.maps.Polygon({path:path, strokeColor: "#FF0000", strokeOpacity: 1.0, strokeWeight: 2});
      polyline.setMap(map);
      map.setCenter(new google.maps.LatLng(-7.769644238173463, 110.38834418827014), 19);
      shapes.push(polyline);
      var path = [
      new google.maps.LatLng(-7.770544253245943, 110.38706436753273),
      new google.maps.LatLng(-7.770445922789994, 110.38709923624992),
      new google.maps.LatLng(-7.77052299260878, 110.38740769028664),
      new google.maps.LatLng(-7.770228001156906, 110.38750693202019),
      new google.maps.LatLng(-7.770251919390449, 110.38762494921684),
      new google.maps.LatLng(-7.770666501888794, 110.38750693202019)];
      var polyline = new google.maps.Polygon({path:path, strokeColor: "#FF0000", strokeOpacity: 1.0, strokeWeight: 2});
      polyline.setMap(map);
      map.setCenter(new google.maps.LatLng(-7.769644238173463, 110.38834418827014), 19);
      shapes.push(polyline);
      var path = [
      new google.maps.LatLng(-7.770921629376624, 110.3874908387661),
      new google.maps.LatLng(-7.770820641431227, 110.38752034306526),
      new google.maps.LatLng(-7.770637268520924, 110.3868980705738),
      new google.maps.LatLng(-7.770756859558464, 110.38686320185661)];
      var polyline = new google.maps.Polygon({path:path, strokeColor: "#FF0000", strokeOpacity: 1.0, strokeWeight: 2});
      polyline.setMap(map);
      map.setCenter(new google.maps.LatLng(-7.769644238173463, 110.38834418827014), 19);
      shapes.push(polyline);
      var path = [
      new google.maps.LatLng(-7.770910999067717, 110.38738891482353),
      new google.maps.LatLng(-7.770937574839461, 110.38749888539314),
      new google.maps.LatLng(-7.771237880943197, 110.38741037249565),
      new google.maps.LatLng(-7.7710757688253835, 110.38683637976646),
      new google.maps.LatLng(-7.770972123340208, 110.38687124848366),
      new google.maps.LatLng(-7.771099687010632, 110.38733258843422)];
      var polyline = new google.maps.Polygon({path:path, strokeColor: "#FF0000", strokeOpacity: 1.0, strokeWeight: 2});
      polyline.setMap(map);
      map.setCenter(new google.maps.LatLng(-7.769644238173463, 110.38834418827014), 19);
      shapes.push(polyline);
      var path = [
      new google.maps.LatLng(-7.771275086994192, 110.3870777785778),
      new google.maps.LatLng(-7.771386705127405, 110.38704827427864),
      new google.maps.LatLng(-7.771285717293875, 110.38672104477882),
      new google.maps.LatLng(-7.771179414284988, 110.38674786686897)];
      var polyline = new google.maps.Polygon({path:path, strokeColor: "#FF0000", strokeOpacity: 1.0, strokeWeight: 2});
      polyline.setMap(map);
      map.setCenter(new google.maps.LatLng(-7.769644238173463, 110.38834418827014), 19);
      shapes.push(polyline);
      var path = [
      new google.maps.LatLng(-7.77137607483028, 110.38668617606163),
      new google.maps.LatLng(-7.771546159551934, 110.38662984967232),
      new google.maps.LatLng(-7.771673723047951, 110.3870402276516),
      new google.maps.LatLng(-7.771498323230925, 110.38709118962288)];
      var polyline = new google.maps.Polygon({path:path, strokeColor: "#FF0000", strokeOpacity: 1.0, strokeWeight: 2});
      polyline.setMap(map);
      map.setCenter(new google.maps.LatLng(-7.769644238173463, 110.38834418827014), 19);
      shapes.push(polyline);
      var path = [
      new google.maps.LatLng(-7.771665750330577, 110.3870053589344),
      new google.maps.LatLng(-7.771830519792031, 110.38695707917213),
      new google.maps.LatLng(-7.7719660559134525, 110.38741573691368),
      new google.maps.LatLng(-7.771787998646887, 110.38746669888496)];
      var polyline = new google.maps.Polygon({path:path, strokeColor: "#FF0000", strokeOpacity: 1.0, strokeWeight: 2});
      polyline.setMap(map);
      map.setCenter(new google.maps.LatLng(-7.769644238173463, 110.38834418827014), 19);
      shapes.push(polyline);
      var path = [
      new google.maps.LatLng(-7.77137607483028, 110.38741573691368),
      new google.maps.LatLng(-7.77143188388716, 110.3875820338726),
      new google.maps.LatLng(-7.771787998646887, 110.38748547434807),
      new google.maps.LatLng(-7.7717428199254375, 110.38731649518013)];
      var polyline = new google.maps.Polygon({path:path, strokeColor: "#FF0000", strokeOpacity: 1.0, strokeWeight: 2});
      polyline.setMap(map);
      map.setCenter(new google.maps.LatLng(-7.769644238173463, 110.38834418827014), 19);
      shapes.push(polyline);
      var path = [
      new google.maps.LatLng(-7.7716285443142, 110.38765177130699),
      new google.maps.LatLng(-7.771655120040525, 110.38774028420448),
      new google.maps.LatLng(-7.771341526362777, 110.38783684372902),
      new google.maps.LatLng(-7.771301662742896, 110.38773491978645)];
      var polyline = new google.maps.Polygon({path:path, strokeColor: "#FF0000", strokeOpacity: 1.0, strokeWeight: 2});
      polyline.setMap(map);
      map.setCenter(new google.maps.LatLng(-7.769644238173463, 110.38834418827014), 19);
      shapes.push(polyline);
      var path = [
      new google.maps.LatLng(-7.771280402144078, 110.38764372467995),
      new google.maps.LatLng(-7.771392020275866, 110.38761422038078),
      new google.maps.LatLng(-7.771352156660768, 110.38750424981117),
      new google.maps.LatLng(-7.771243196093553, 110.38753375411034)];
      var polyline = new google.maps.Polygon({path:path, strokeColor: "#FF0000", strokeOpacity: 1.0, strokeWeight: 2});
      polyline.setMap(map);
      map.setCenter(new google.maps.LatLng(-7.769644238173463, 110.38834418827014), 19);
      shapes.push(polyline);
      var path = [
      new google.maps.LatLng(-7.771166126406978, 110.38764640688896),
      new google.maps.LatLng(-7.771261799119223, 110.38761958479881),
      new google.maps.LatLng(-7.771229908217566, 110.38752302527428),
      new google.maps.LatLng(-7.771131577922186, 110.38754716515541)];
      var polyline = new google.maps.Polygon({path:path, strokeColor: "#FF0000", strokeOpacity: 1.0, strokeWeight: 2});
      polyline.setMap(map);
      map.setCenter(new google.maps.LatLng(-7.769644238173463, 110.38834418827014), 19);
      shapes.push(polyline);
      var path = [
      new google.maps.LatLng(-7.769579550750436, 110.38795486092567),
      new google.maps.LatLng(-7.769707114843938, 110.38791730999947),
      new google.maps.LatLng(-7.769757608953586, 110.3881211578846),
      new google.maps.LatLng(-7.769640675216749, 110.38816407322884)];
      var polyline = new google.maps.Polygon({path:path, strokeColor: "#FF0000", strokeOpacity: 1.0, strokeWeight: 2});
      polyline.setMap(map);
      map.setCenter(new google.maps.LatLng(-7.769644238173463, 110.38834418827014), 19);
      shapes.push(polyline);
      var path = [
      new google.maps.LatLng(-7.769741663445941, 110.38793072104454),
      new google.maps.LatLng(-7.770015394576608, 110.3878502547741),
      new google.maps.LatLng(-7.770076518979462, 110.38803800940514),
      new google.maps.LatLng(-7.769792157551427, 110.38811042904854)];
      var polyline = new google.maps.Polygon({path:path, strokeColor: "#FF0000", strokeOpacity: 1.0, strokeWeight: 2});
      polyline.setMap(map);
      map.setCenter(new google.maps.LatLng(-7.769644238173463, 110.38834418827014), 19);
      shapes.push(polyline);
      var path = [
      new google.maps.LatLng(-7.770105752386387, 110.38775637745857),
      new google.maps.LatLng(-7.770129670626889, 110.3878502547741),
      new google.maps.LatLng(-7.770119040297946, 110.38790121674538),
      new google.maps.LatLng(-7.7701828222675875, 110.38811311125755),
      new google.maps.LatLng(-7.770246604227561, 110.3880675137043),
      new google.maps.LatLng(-7.770251919390449, 110.38805142045021),
      new google.maps.LatLng(-7.771182071860528, 110.38779124617577),
      new google.maps.LatLng(-7.771131577922186, 110.3876169025898),
      new google.maps.LatLng(-7.7702067405037125, 110.38788244128227),
      new google.maps.LatLng(-7.77018813743129, 110.38784757256508),
      new google.maps.LatLng(-7.7702173708304425, 110.38782343268394),
      new google.maps.LatLng(-7.770196110176715, 110.38773223757744)];
      var polyline = new google.maps.Polygon({path:path, strokeColor: "#FF0000", strokeOpacity: 1.0, strokeWeight: 2});
      polyline.setMap(map);
      map.setCenter(new google.maps.LatLng(-7.769644238173463, 110.38834418827014), 19);
      shapes.push(polyline);
      var path = [
      new google.maps.LatLng(-7.769226091705588, 110.38789585232735),
      new google.maps.LatLng(-7.769263297934846, 110.38801118731499),
      new google.maps.LatLng(-7.769292531398373, 110.38800582289696),
      new google.maps.LatLng(-7.769369601428844, 110.38824185729027),
      new google.maps.LatLng(-7.769345018748243, 110.38824554532766),
      new google.maps.LatLng(-7.769369601428844, 110.38837596774101),
      new google.maps.LatLng(-7.769207488589718, 110.38842961192131),
      new google.maps.LatLng(-7.769164967178921, 110.3883008658886),
      new google.maps.LatLng(-7.769138391294994, 110.38830790668726),
      new google.maps.LatLng(-7.7690666363999945, 110.38808897137642),
      new google.maps.LatLng(-7.769095869877211, 110.38807556033134),
      new google.maps.LatLng(-7.769058663633119, 110.38794413208961)];
      var polyline = new google.maps.Polygon({path:path, strokeColor: "#FF0000", strokeOpacity: 1.0, strokeWeight: 2});
      polyline.setMap(map);
      map.setCenter(new google.maps.LatLng(-7.769644238173463, 110.38834418827014), 19);
      shapes.push(polyline);
      */
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
        $('#lat').val(location.lat());
        $('#lng').val(location.lng());
        infowindow.setContent(result);
        infowindow.open(map, marker);   
        }
      }
      </script>
  <script type="text/javascript" src="<?php echo base_url('js/jquery.smartWizard.js');?>">
    </script>
     <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAQbVbsL1ZR8NDwfuD4xAkVPO7Mr_YyunM&callback=initMap">
    </script> 