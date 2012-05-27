<div class="row">

    <div class="span5 offset1">
		
      
<?php
   
 	
   $addhabit_attributes = array('class' => 'well form-horizontal well', 'id' => 'addHabit');
	
echo form_open('habit/create_habit',$addhabit_attributes);
?>
 <fieldset>
<legend>Create an Account!</legend>


<div class="control-group">
<?php
echo form_input('name', set_value('name', ' Name'),'class="input-xlarge"');
?>
</div>
<div class="control-group">
<?php 

echo form_input('desc', set_value('desc', ' Desc'),'class="input-xlarge"');
?>
</div>
</fieldset>

<fieldset>

<?php


echo form_submit('submit', 'Create Habit','class="btn btn-primary"');
?>


<?php echo validation_errors('<p class="alert alert-error">'); ?>


</fieldset>

</div>
</div>
