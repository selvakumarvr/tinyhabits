	
	
	<?php
	
	if(sizeof($current_habits) >=1) {
	
		?>
	
	<div class="row">
	
	
	<h3>Your this week habits..</h3>
	<div class="span8 offset2 trackhabits">
	<table class="table table-striped">
	
		<thead>
			<tr>
				<th>name</th>
				<th></th>
				<th>Day 1</th>
				<th>Day 2</th>
				<th>Day 3</th>
				<th>Day 4</th>
				<th>Day 5</th>
	
	
			</tr>
		</thead>
		<tbody>
		<?php
		foreach ($current_habits as $key => $list){
	
	
			echo "<tr>";
			echo "<td>".$list['name']."</td>";
	
	
	
			if($list['start_date'] != null){
				$content="Do it Later";
				$habitbtnName="doitlater";
				$habitid = $list['tinyhabitid'];
	
			}else {
				$content ="Start Habit";
				$habitbtnName="starthabit";
				$habitid = $list['tinyhabitid'];
			}
				
			$data = array(
	    'name' => $habitbtnName,
		'class' => 'btn btn-primary currentabits',
	    'id' => 'button'+$habitid,
	    'value' => $habitid,
	    'type' => 'button',
	    'content' => $content );
	
	
	
			echo '<td>';
			echo form_button($data);
			echo '</td>';
	
	
	
			if($list['start_date'] != null){
	
	
				$startdate = strtotime(date('Y-m-d',  strtotime($list['start_date'])));
				$currentdate = strtotime(date('Y-m-d'));
				$dateDiff    = $currentdate- $startdate;
				$fullDays    = floor($dateDiff/(60*60*24));
	
	
	
				$chkDate1class="";
				$chkDate2class="";
				$chkDate3class="";
				$chkDate4class="";
				$chkDate5class="";
	
	
	
				if( $fullDays == 0){
						
	
					$chkDate1class='data-original-title="Tiny Habits- First Day" data-content="It is your first day, it will date 3 min finish it your goal.." rel="popover"';
				}else if( $fullDays ==1){
					$chkDate2class='data-original-title="Tiny Habits- Second Day" data-content="It is your second day.. keep i tup" rel="popover"';
	
				}else if( $fullDays == 2){
					$chkDate3class='data-original-title="Tiny Habits- third Day" data-content="It is your third day.. keep i tup" rel="popover"';
	
				}else if( $fullDays == 3){
					$chkDate4class='data-original-title="Tiny Habits- Fourth Day" data-content="It is your fourth day.. keep i tup" rel="popover"';
	
				}else if( $fullDays == 4){
					$chkDate5class='data-original-title="Tiny Habits- Fifth Day" data-content="It is your fifth day.. keep i tup" rel="popover"';
	
				}
	
	
	
	
	
	
				echo "<td>";
	
				echo  form_checkbox('day1', $list['trackhabitid']."|"."day1",      ($list['day1']==1 ? TRUE : FALSE),$chkDate1class);
				echo '</td>';
	
	
	
				echo "<td>";
	
				echo  form_checkbox('day2', $list['trackhabitid']."|"."day2",      ($list['day2']==1 ? TRUE : FALSE),$chkDate2class);
				echo '</td>';
	
				echo "<td>";
	
				echo  form_checkbox('day3', $list['trackhabitid']."|"."day3",      ($list['day3']==1 ? TRUE : FALSE),$chkDate3class);
				echo '</td>';
				echo "</div>";
	
	
				echo "<td>";
	
				echo  form_checkbox('day4', $list['trackhabitid']."|"."day4",      ($list['day4']==1 ? TRUE : FALSE),$chkDate4class);
				echo '</td>';
	
	
				echo "<td>";
	
				echo  form_checkbox('day5', $list['trackhabitid']."|"."day5",      ($list['day5']==1 ? TRUE : FALSE),$chkDate5class);
				echo '</td>';
	
	
			}
	
		}
		echo "</tbody>";
	
		echo "</table>";
	
		echo "</div>";
		echo "</div>";
	}
	
	?>
	
	
			<div class="row">
	
			<div class="span 5"><?php
			echo anchor('habit/index/listhabits', 'List all Habits', array('title' => 'List all habits', 'class' => 'btn btn-primary btn-large'));
			?></div>
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
	alert(habitid);
	
	
	
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
	
	</script>