<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function()
		{
		$("span.on_img").mouseover(function ()
			{
			$(this).addClass("over_img");
			});

		$("span.on_img").mouseout(function ()
			{
			$(this).removeClass("over_img");
			});
		});

//Show The Love
$(function() {
		$(".love").click(function() 
			{
			var id = $(this).attr("id");
			var user = $(this).attr("user");
			var dataString = 'id='+ id + '&user=' + user;
			var parent = $(this);
			$(this).fadeOut(300);
			$.ajax({
					type: "POST",
					url: "up_vote.php",
					data: dataString,
					cache: false,
					success: function(html)
					{
						parent.html(html);
						parent.fadeIn(300);
					} 
				});
			return false;
			});
		});

</script>
