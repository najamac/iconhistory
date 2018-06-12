<?php
include "dbconnect.inc.php";
session_start();
 
   
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: index.php");
  exit;
  
}

else{
$q=$_POST['question'];
 $a=$_POST['answer'];
// echo $a;
 //echo "<script language=\"javascript\">alert('$q');</script>";

if ($q != ""){
$sql="insert into interviewlog (username, question, answer) values ('".$_SESSION['username']."','".$q."','".$a."')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}
//echo $sql;
}


	


?>
<!DOCTYPE html>
<html>
<head>
	<title>ICon History Interview</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script type="text/javascript" src="//vhss-d.oddcast.com/vhost_embed_functions_v2.php?acc=18193&js=1"></script>
	<script type="text/javascript">
		var accessToken = "4666e9cb84b342a7b13135b60b6128e3";
		var baseUrl = "https://api.api.ai/v1/";
		$(document).ready(function() {
			$("#input").keypress(function(event) {
				if (event.which == 13) {
					event.preventDefault();
					send();
					this.value = '';
				}
			});
			$("#rec").click(function(event) {
				switchRecognition();
			});
		});
		var recognition;
		function startRecognition() {
			recognition = new webkitSpeechRecognition();
			recognition.onstart = function(event) {
				updateRec();
			};
			recognition.onresult = function(event) {
				var text = "";
			    for (var i = event.resultIndex; i < event.results.length; ++i) {
			    	text += event.results[i][0].transcript;
			    }
			    setInput(text);
				stopRecognition();
			};
			recognition.onend = function() {
				stopRecognition();
			};
			recognition.lang = "en-US";
			recognition.start();
		}
	
		function stopRecognition() {
			if (recognition) {
				recognition.stop();
				recognition = null;
			}
			updateRec();
		}
		function switchRecognition() {
			if (recognition) {
				stopRecognition();
			} else {
				startRecognition();
			}
		}
		function setInput(text) {
			$("#input").val(text);
			send();
		}
		function updateRec() {
			$("#rec").text(recognition ? "Stop" : "Speak");
		}
		function send() {
			var text = $("#input").val();
			conversation.push("Me: " + text + '\r\n');
			$.ajax({
				type: "POST",
				url: baseUrl + "query?v=20150910",
				contentType: "application/json; charset=utf-8",
				dataType: "json",
				headers: {
					"Authorization": "Bearer " + accessToken
				},
				data: JSON.stringify({ query: text, lang: "en", sessionId: "112233445566778899" }),
				success: function(data) {
					var respText = data.result.fulfillment.speech;
			
					setResponse(respText);
				$.post("interview.php",
        {
          question: text,
          answer: respText
        },
        function(data,status){
           //alert("Data: " + data + "\nStatus: " + status);
        });
				
				},
				error: function() {
					setResponse("Internal Server Error");
				}
			});
			
			
			//setResponse("Loading...");
		}
		function setResponse(val) {
			conversation.push("AI: " + val + '\r\n');
			sayText(val,7,1,3);
			$("#response").text(conversation.join(""));
			
		}
		
		 var conversation = [];
	</script>
  <style type="text/css">
  	avi.body { width: 500px; margin: 100px auto; margin-top: 20px; }
		bot.body { width: 500px; margin: 100px auto; margin-top: 20px; }
		bot.div {  position: absolute; }
		bot.input { width: 100px;  }
		bot.button { width: 60px; }
		bot.textarea { width: 100%; font-size:200%; }
	
	</style>
</head>
<body>
Hello <?php echo $_SESSION['username'];?>

<center><div class="avi">
 <script type="text/javascript">AC_VHost_Embed(18193,300,573,'',1,1, 2594578, 0,1,0,'5cf33e1e18d8d630853d4b721b1dd120',0);</script>
</div>
<div class="bot">
  <textarea readOnly = true; id="response" cols="50" rows="22" style="font-size: 24px; resize: none;"></textarea>
  <br />
  <input id="input" type="text" size="43" style="font-size: 24px;" placeholder="Type question or response here..." autocomplete="off" /><button id="rec" style="font-size: 24px;">Speak</button>
</div></center>
</body>
<script>'undefined'=== typeof _trfq || (window._trfq = []);'undefined'=== typeof _trfd && (window._trfd=[]),_trfd.push({'tccl.baseHost':'secureserver.net'}),_trfd.push({'ap':'cpsh'},{'server':'p3plcpnl0506'}) // Monitoring performance to make your website faster. If you want to opt-out, please contact web hosting support.</script><script src='https://img1.wsimg.com/tcc/tcc_l.combined.1.0.6.min.js'></script></html>
