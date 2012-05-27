



<div class="row ">



<h1>Listing habits</h1>
<div class="span8 offset2 listhabits">


<table class="table table-striped">
<?php

if($this->session->flashdata('empty_current') !=""){
		echo '<div class="alert alert-success">';
		echo $this->session->flashdata('empty_current');
		echo '</div>';
	}
if(sizeof($all_habits) == 0 ) {

	if($this->session->flashdata('signin_success') !=""){
		echo '<div class="alert alert-success">';
		echo $this->session->flashdata('signin_success');
		echo '</div>';
	}
	 else 
	 {

		echo '<div class="alert alert-success">';
		echo "<h6> No Habit created so far.. Please create habit for you..</h6>";
		echo '</div>';
	}


} else {

	?>
	<thead>
		<tr>
			<th>#</th>
			<th>Habit</th>
			<th>current habit?</th>
			<th>Completed Times</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
	</thead>
	<?php
}
?>
	<tbody>
	<?php
	foreach ($all_habits as $key => $list){
		echo "<tr>";
		echo "<td>".$list['id']."</td>";
		echo "<td>".$list['name']."</td>";
			

		if ($list['isCurrent'] ==0)
		$checkbox_value =  FALSE;
		else
		$checkbox_value =TRUE;



		$data = array(
    'name'        => 'Current Habit',
    'id'          => 'iscurrent',
    'value'       => $list['id'],
    'checked'     => $checkbox_value,
    'style'       => 'margin:10px',
		);





		echo "<td>".form_checkbox($data)."</td>";
			
		echo "<td>".$list['completedTimes']. "  </td>";
			
			

		$data = array(
    'name' => 'Edit',
	'class' => 'btn btn-primary',
    'id' => 'edtbutton'+$list['id'],
    'value' => $list['id'],
    'type' => 'button',
    'content' => 'Edit'
    );


     

    echo '<td>';
    echo form_button($data);
    echo '</td>';
     
     
    $data = array(
    'name' => 'Delete',
	'class' => 'btn btn-primary',
    'id' => 'button'+$list['id'],
    'value' => $list['id'],
    'type' => 'button',
    'content' => 'Delete'
    );


     

    echo '<td>';
    echo form_button($data);
    echo '</td>';
     
    echo "</tr>";
	}


	?>

	</tbody>

</table>
</div>



</div>
<div class="row">

<div class="span 5"><a class="btn btn-primary btn-large "
	data-toggle="modal" href="#newTask">Add Habits</a></div>
<div class="span 5"><?php
echo anchor('habit/index/currenthabtis', 'View current Habits', array('title' => 'View current habits', 'class' => 'btn btn-primary btn-large'));
?></div>
<div class="modal hide fade" id="newTask" style="display: none;">
<div class="modal-header">
<button data-dismiss="modal" class="close">X</button>
<h3>New Habit</h3>
</div>
<div class="modal-body"><?php


$addhabit_attributes = array('class' => ' form-horizontal ', 'id' => 'addHabit');

echo form_open('habit/create_habit',$addhabit_attributes);
?>

<div class="control-group"><?php
echo form_input('name', set_value('name', ''),'class="input-xlarge"');
?></div>

</fieldset>

<fieldset><?php echo validation_errors('<p class="alert alert-error">'); ?>

</div>
<div class="modal-footer"><a data-dismiss="modal" class="btn" href="#">Close</a>
<?php


echo form_submit('submit', 'Create Habit','class="btn btn-primary"');
?></div>
</div>



</div>
</div>
<script type="text/javascript" charset="utf-8">
// popover demo


$('.listhabits button').click(function() {

var habitid = $(this).val();



var form_data = {
deleteid: habitid,
ajax: '1'		
};

$.ajax({

url: "<?php echo site_url('habit/delete'); ?>",
type: 'POST',
data: form_data,
success: function(msg) {
	$("#" + habitid).parent().parent().remove(); 
}

});

return false;
});


$('.currentabits').click(function() {

var habitid = $(this).val();
var currenthabitObj =$(this);




if($.trim($(this).attr('name'))=='doitlater'){

var form_data = {
	swapid: habitid,
ajax: '1'		
};

$.ajax({

url: "<?php echo site_url('habit/swapCurrent'); ?>",
type: 'POST',
data: form_data,
success: function(msg) {
	console.log(msg);

    
	
	
	currenthabitObj.parent().parent().remove();
	 
}

});

}else {


}
return false;
});




$('.trackhabits input[type="checkbox"]').bind('click',function() {



var trackid = $(this).val();
var trackObj = $(this);


var form_data = {
	trackid: trackid,
	ajax: '1'		
};

$.ajax({
 
	url: "<?php echo site_url('habit/updateHabitTracking'); ?>",
	type: 'POST',
	data: form_data,
	success: function(msg) {

		
		if( trackObj.attr('checked')) {
			trackObj.attr('checked', false);
	    } else {
	    	trackObj.attr('checked', 'checked');
	    }
				
				
		
	}

});

return false;
});




$('.listhabits input[type="checkbox"]').bind('click',function() {



var habitid = $(this).val();
var habitObj = $(this);
var form_data = {
swapid: habitid,
ajax: '1'		
};

$.ajax({

url: "<?php echo site_url('habit/swapCurrent'); ?>",
type: 'POST',
data: form_data,
success: function(msg) {

	
	if( habitObj.attr('checked')) {
		habitObj.attr('checked', false);
    } else {
    	habitObj.attr('checked', 'checked');
    }
			
			
	
}

});

return false;
});

window.setTimeout(function() {
    $(".alert-success").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 2000);

</script>


