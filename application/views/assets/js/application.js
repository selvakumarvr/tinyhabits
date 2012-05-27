// popover demo
$(document).ready(function(){

$('.listhabits button').click(function() {

var habitid = $(this).val();
alert(habitid);


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

alert($(this).attr('name'));

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

    alert(currenthabitObj.parent());
	
	
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
});

