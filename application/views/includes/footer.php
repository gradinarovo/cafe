<script type="text/javascript" charset="utf-8">
	$(document).ready(function(){
		$('a.gallery').lightBox({fixedNavigation:true});
		
		$('#content').css('display', 'none');
 
		$('#content').fadeIn(150);
		
		$('#navigation a').click(function(event){
			event.preventDefault();
			linkLocation=this.href;
			$('#content').fadeOut(200, function(){ window.location=linkLocation; })
		});
		
	});
</script>
</div>
			
			<div id="footer">
				Copyright @ Site name, 20XX
			</div>
			
		</div>
	</body>
<html>