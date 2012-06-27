$(function() {

	$(".submit").click(function() {

		var name = $("#name").val();
		var user_id = $("#user_id").val();
		var comment = $("#comment").val();
		var image = $("#image").val();
		var id_commented = $("#id_commented").val();
		
		
		
		var dataString = 'name='+ name + '&user_id=' + user_id + '&comment=' + comment + '&image=' + image + '&id_commented=' + id_commented;

		if(name=='' || user_id=='' || comment=='')
		{
			alert('Please Give Valide Details');
		}
		else
		{
			$("#flash").show();
			$("#flash").fadeIn(400).html('<img src="/continentenuovo/img/ajax-loader.gif" align="absmiddle">&nbsp;<span class="loading">Loading Comment...</span>');
			$.ajax({
				type: "POST",
				url: "js/commentajax.php",
				data: dataString,
				cache: false,
				success: function(html){

					$("ol#update").append(html);
					$("ol#update li:last").fadeIn("slow");
					//document.getElementById('user_id').value='';
					//document.getElementById('name').value='';
					document.getElementById('comment').value='';
					$("#name").focus();

					$("#flash").hide();

				}
			});
		}
		return false;
	});
});

