function delete_img(id){
	$.ajax({
		"url":"delete_image.php",
		"type":"POST",
		"data":{
			"photo_id":id,
		
		},
		"success":function(data){
			alert("delete image success");
			window.location.href="xc.php";
		}
	});
}

function save_post_comments(postid,page){
	var comments = $("#comments").val();
	
	if(comments.length == 0){
		alert("comments is null");
		return false;
	
	}
	if(comments.length > 400){
		alert("comments length up to 400, please reinput");
		return false;
	}
	
	$.ajax({
		"url":"save_post_comments.php",
		"type":"post",
		"data":{
			"comments":comments,
			"postid":postid,
		},
		"success":function(data){
			alert("comments success");
			window.location.href="post_view.php?post_id="+postid+"&p="+page;
		}
	});
}

function reply_comments(username){
	$("#comments").val("@"+username+": ");
	$("#comments").focus();
	scrollTo(0, 1000);
}

function checkform(){
	var post_Realname= $("#post_Realname").val();
	var post_Nationality = $("#post_Nationality").val();
	var post_Occupation= $("#post_Occupation").val();
	var post_Born = $("#post_Born").val();
	var post_breif= $("#post_breif").val();
	var post_detail = $("#post_detail").val();		
	if(post_Realname.length == 0 || post_Nationality.length == 0 || post_Occupation.length == 0 
		|| post_Born.lenght == 0 || post_breif.length == 0 || post_detail.length == 0){
		alert("input is null");
		return false;
	}
	return true;
}

function save_post_comments(postid,page){
	var comments = $("#comments").val();
	
	if(comments.length == 0){
		alert("comments is null");
		return false;
	
	}
	if(comments.length > 400){
		alert("comments length up to 400, please reinput");
		return false;
	}
	
	$.ajax({
		"url":"save_post_comments.php",
		"type":"post",
		"data":{
			"comments":comments,
			"postid":postid,
		},
		"success":function(data){
			alert("comments success");
			window.location.href="post_view.php?post_id="+postid+"&p="+page;
		}
	});
}


function checkform_post(){
	var title= $("#post_title").val();
	var content = $("#post_content").val();
	if(title.length == 0 || content.length == 0){
		alert("input is null");
		return false;
	}
	return true;

}


function save_comments(){
	var comments = $("#comments").val();
	
	if(comments.length == 0){
		alert("comments is null");
		return false;
	
	}
	if(comments.length > 400){
		alert("comments length up to 400, please reinput");
		return false;
	}
	
	$.ajax({
		"url":"save_comments.php",
		"type":"post",
		"data":{
			"comments":comments,
		},
		"success":function(data){
			alert("comments success");
			window.location.href="guestbook.php";
		}
	});
}


function reply_comments(username){
	$("#comments").val("@"+username+": ");
	$("#comments").focus();
	scrollTo(0, 0);
	




}
 
