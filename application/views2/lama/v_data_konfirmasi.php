<script>
$(document).ready(function(){ 
 $('#user').load('<?=$base_url;?>c_konfirmasi/load_konfirmasi').fadeIn("slow");
 
 var timer = setInterval( updateDiv, 15000);
            var counter = 0;  //only here so we can see that the div is being updated if the same error is thrown
            function updateDiv() {
      
              $('#user').load('<?=$base_url;?>c_konfirmasi/load_konfirmasi').fadeOut().fadeIn("slow");
              counter++;
			//	alert("oke");			
                           
            }   
 
});
</script>
<div id="user"></div>

