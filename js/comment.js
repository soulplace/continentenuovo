$(function() {

	$(".submit").click(function() {

		var name = $("#name").val();
		var email = $("#email").val();
		var comment = $("#comment").val();
		var dataString = 'name='+ name + '&email=' + email + '&comment=' + comment;

		if(name=='' || email=='' || comment=='')
		{
			alert('Please Give Valide Details');
		}
		else
		{
			$("#flash").show();
			$("#flash").fadeIn(400).html('<img src="/img/ajax-loader.gif" align="absmiddle">&nbsp;<span class="loading">Loading Comment...</span>');
			$.ajax({
				type: "POST",
				url: "commentajax.php",
				data: dataString,
				cache: false,
				success: function(html){

					$("ol#update").append(html);
					$("ol#update li:last").fadeIn("slow");
					document.getElementById('email').value='';
					document.getElementById('name').value='';
					document.getElementById('comment').value='';
					$("#name").focus();

					$("#flash").hide();

				}
			});
		}
		return false;
	});



});

