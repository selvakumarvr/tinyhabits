<div class="row">

    <div class="span5 offset1">
		
      
<?php
   
 	
   $member_attributes = array('class' => 'well form-horizontal well', 'id' => 'memberform');
	
echo form_open('login/create_member',$member_attributes);
?>
 <fieldset>
<legend>Create an Account!</legend>
<?php

	 echo '<div class="control-group">';
echo form_input('first_name', set_value('first_name', 'First Name'));
echo '</div>';
	 echo '<div class="control-group">';
echo form_input('last_name', set_value('last_name', 'Last Name'));
echo '</div>';
	 echo '<div class="control-group">';
echo form_input('email_address', set_value('email_address', 'Email Address'));
echo '</div>';
?>
</fieldset>

<fieldset>
<legend>Login Info</legend>
<?php
	 echo '<div class="control-group">';
echo form_input('username', set_value('username', 'Username'));
echo '</div>';
	 echo '<div class="control-group">';
echo form_password('password', set_value('password', 'Password'));
echo '</div>';
	 echo '<div class="control-group">';
echo form_password('password2', set_value('password', 'Password'));
echo '</div>';

echo form_submit('submit', 'Create Acccount');
?>


<?php echo validation_errors('<p class="alert alert-error">'); ?>


</fieldset>

</div>
</div>
