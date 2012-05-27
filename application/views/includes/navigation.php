  <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="<?php echo site_url('/habit/'); ?>">Tiny Habits</a>
          <div class="nav-collapse">
            <ul class="nav">
              <li class="active"><a href="<?php echo site_url('/habit/'); ?>">Home</a></li>
                     <li><a href="<?php echo site_url('contact'); ?>">Contact</a></li>
                     
                     <?php 
                     $is_logged_in = $this->session->userdata('is_logged_in');
		if(!isset($is_logged_in) || $is_logged_in != true)
		{

		  echo '<li><a href="'.site_url('/login/index').'">Log in</a></li>';

		} else {
			  echo '<li><a href="'.site_url('/login/logout').'">Log out</a></li>';
			         
         		}
		?>
                   
            
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>