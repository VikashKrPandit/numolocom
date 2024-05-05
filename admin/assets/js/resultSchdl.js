setInterval(function(){
	declare_result_dateTime();
},2000);


 function declare_result_dateTime(){
    $.ajax({
        url:"testResult.php",
        success:function(res){
          console.log('checking',res);
          //$('#questionStat').removeClass('activeQuestion')
          //$('#questionStat').addClass('deactivateQuestion')
        }

    });
   
}