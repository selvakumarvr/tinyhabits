
<div class="row">
 <div class="span8 offset4">
<form class="form-horizontal">
        <fieldset>

	<h1>Contact Us!</h1>
    <?php 
    echo '<div class="control-group">';
	echo form_open('contact/submit'); 
	echo '</div>';
	    echo '<div class="control-group">';
	echo form_input('name', 'Name', 'id="name"');
		echo '</div>';
	    echo '<div class="control-group">';
	echo form_input('email', 'Email', 'id="email"');
		echo '</div>';
	$data = array('name' => 'message', 'cols' => 35, 'rows' => 12);
	    echo '<div class="control-group">';
	echo form_textarea($data, 'Message', 'id="message"');
		echo '</div>';
	    echo '<div class="control-group">';
	echo form_submit('submit', 'Submit', 'id="submit" ');
		echo '</div>';
	
	echo form_close();
	?>
</fieldset>
</div>
</div>
</div>
<script type="text/javascript">
$('#submit').click(function() {

	
	var name = $('#name').val();
	
	if (!name || name == 'Name') {
		alert('Please enter your name');
		return false;
	}
	
	var form_data = {
		name: $('#name').val(),
		email: $('#email').val(),
		message: $('#message').val(),
		ajax: '1'		
	};
	
	$.ajax({
	 
		url: "<?php echo site_url('contact/submit'); ?>",
		type: 'POST',
		data: form_data,
		success: function(msg) {
			$('#main_content').html(msg);
		}
	});
	
	return false;
});
	
	
</script>


<!-- end contact_form-->