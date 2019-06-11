function getSponsor(sponsor_id){
	if(!sponsor_id){
		return false;
	}
	$.post(BASEPATH+"home/getSponsor", {sponsor_id: sponsor_id}, function(data){
		var res = JSON.parse(data);

		if(res.status){
			$("#sponsor_name").val(res.name);
			$("#parent_id").val(res.parent_id);
		}else{
			$("#sponsor_name").val("");
			$("#parent_id").val("");
		}		
	});
}

function getTeamLevel(parent_id){
	if(!parent_id){
		return false;
	}
	$("#team_level_spinner").css("display", "inline-block");
	$.post(BASEPATH+"member/getTeamLevel", {parent_id: parent_id}, function(data){
		$("#team_level").html(data);	
		$("#team_level_spinner").css("display", "none");	
	});
}

function getMyIncome(){
	var from = $("#datepicker_from").val();
	var to = $("#datepicker_to").val();
	if(!from || !to){
		return false;
	}
	$.post(BASEPATH+"member/get_my_income", {from: from, to: to}, function(data){
		var body = data.split("~");
		$("#income_body").html(body[0]);
		$("#total_income").html(body[1]);
	});
}