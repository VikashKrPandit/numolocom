setInterval(function(){
	check_question_dateTime();
},2000);


 function check_question_dateTime(){
    $.ajax({
        url:"taskSchedule.php",
        success:function(res){
          console.log("tashScheduledLog",res);
          //$('#questionStat').removeClass('activeQuestion')
          //$('#questionStat').addClass('deactivateQuestion')
        }

    });
   
}