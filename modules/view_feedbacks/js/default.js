function showFeedbackForm(){
	alertModal("Feedback",$('#feedbackFormDiv').html());
}
function addFeedback(f){
	$('#addFeedbackButton').button('loading');
	$.post( $(f).attr('action'), $(f).serialize(),
		function(data, textStatus, jqXHR) {
			$('#addFeedbackButton').button('default');
			if(jqXHR.status==200){
				if(data=="0"){
					alert("Please login first. :)");
				}else{
					alert("Feedback is now waiting for approval..");
				}
			}
			else
				alert("Something went wrong :(");
		}
	);
	return false;
}
function toggleFeedback(id){
	$.post('ajax/?toggle_feedback', {'id' : id},
		function(data, textStatus, jqXHR) {
			$('#addFeedbackButton').button('default');
			if(jqXHR.status==200){
				console.log(data);
				$('#ftb'+id+' i').toggleClass('icon-eye-close');
				$('#ftb'+id+' i').toggleClass('icon-eye-open');
			}
			else
				alert("Something went wrong :(");
		}
	);
	return false;
}