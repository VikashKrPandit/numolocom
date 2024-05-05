setInterval(function(){
	declareWinners();
},2000);


 function declareWinners(){
    $.ajax({
        url:"testResult.php",
        success:function(res){
        }

    });
   
}