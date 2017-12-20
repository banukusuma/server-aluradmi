<?php $this->load->view('component/page_head'); ?>

  <body class="login">
     <div>
      <div class="login_wrapper">
        
          <section class="login_content">
            <?php echo form_open(NULL, 'class="login-form" method="post"');?>  
              <h1><i class="fa fa-lock"> Login Form</i></h1>
                <?php echo $this->session->flashdata('error');?>
              <div>
                <input name="username" type="text" class="form-control" placeholder="Username" autofocus required />
              </div>
              <div>
                <input type="password" name="password" class="form-control" placeholder="Password" required />
              </div>

              <div>
                <button class="btn btn-default btn-block submit" type="submit">Log in</button>
              </div>

              <div class="clearfix"></div>

              <div class="separator">

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-send-o"></i> Aluradmi!</h1>
                  <p>©2016 All Rights Reserved.</p>
                  <p>Template by <a href="https://colorlib.com">Colorlib</a></p>
                </div>
              </div>
            <?php echo form_close();?>
          </section>
        
      </div>
    </div>
<?php $this->load->view('component/page_tail'); ?>