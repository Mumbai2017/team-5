var idNumber = 1;

// $("#commentButton").on("click", function(){

// 	var element = '<textarea cols="50" id="'+commentsArea+'" rows="3"></textarea><br>'; 
// 	$("#area").append(element);
// });


$("#postButton").on("click", function(){
	var start = "Comment "+idNumber+"  : ";
	var userComm = $("#commentsArea").val();
	var element = '<div class="row" id="'+idNumber+'">'+start+'<br>'+userComm+'<br>'+'</div><br>'; 
	idNumber++;
	$("#comments").append(element);
	$("#commentsArea").val("");


		// jQuery.ajax({
	 //    type: "POST",
	 //    url: 'display.php',
	 //    async = false;
	    // data: {functionname: 'add', arguments: [1, 2]},

   
});


// $("#viewButton").on("click", function(){
// 	 var url = "display.php";

//     // get the URL
//     http = new XMLHttpRequest(); 
//     http.open("GET", url, true);
//     http.send(null);

//     // prevent form from submitting
//     return false;
// });
