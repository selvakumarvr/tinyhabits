
<div class="row">
<h1>Sign in</h1>
<div class="span7 offset1">

<div id="login_form form-horizontal well">

<fieldset><?php 
$form_attributes = array('class' => 'well form-search', 'id' => 'myform');

echo form_open('login/validate_credentials',$form_attributes);


$usernamedata = array(
              'name'        => 'username',
              'id'          => 'username',
              'value'       => 'Username',

);
echo '<div class="control-group">';
echo form_input($usernamedata);
echo '</div>';
$password_attributes = array(
              'name'        => 'password',
              'id'          => 'password',
		'value'=> 'Password'
           
              
		);
		echo '<div class="control-group">';

		echo form_password($password_attributes);

		echo '</div>';
		$form_submit = array(
              'name'        => 'Login',
			  'type'         => 'submit',
			  'class'  =>'btn btn-primary',
			  'value'  => 'Sign in'
              
			  );

			  echo form_submit($form_submit);


			  //$form_attributes = array('class' => 'well form-search', 'id' => 'myform');
			  echo anchor('login/signup', 'Create Account');

			  echo form_close();
			  ?></fieldset>

</div>
<!-- end login_form--></div>
</div>


