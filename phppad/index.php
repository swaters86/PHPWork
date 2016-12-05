<!DOCTYPE html> 
<html lang="en">
<head>
<title>PHP Tester</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<style type='text/css'>

	.jumbotron {
		border-bottom: 2px #666 solid;
	}

	iframe {
		border: 0;
		padding: 0;
	}
	#code-box {
		height: 300px;
	}
	#results-box {
		border: 1px #666 
		solid;
		height: 150px;
	}
	.btn-container {
		text-align: right;
	}

</style>

</head>
<body>
<div class="jumbotron">
	<div class="container">
		<div class="row">
		 <div class="col-md-12">
		    <h1>$PHP_Pad</h1>
		    <p> A site for testing php stuff on Steven's local computer. <a id="ask-friend" href="#">Ask a Friend</a> </p>
		 </div> <!-- .col-md-12 --> 
		</div> <!-- .row --> 
	</div> <!-- .container -->
</div> <!-- .jumbotron -->
<div class="container php-pad">
	<div class="row">
		<div class="col-md-12">
			<h2>Enter Code Here</h2>
			<form id="code" action="getCode.php" method="POST">
		    	<div class="form-group">
					<textarea name="code" id="code-box" class="form-control" row="3">
					</textarea> <!-- .textarea -->
				</div>
				<div class="btn-container">
					<input type="submit" value="Submit"/>
				</div>
			</form> <!-- .form -->
		</div> <!-- .col-md-12 -->
	    <div class="col-md-12">
	    	<h2>Results</h2>
			<div id="results-box"></div>
	    </div> <!-- .col-md-12 -->
	</div> <!-- .row -->
</div> <!-- .container -->

<iframe src="http://localhost" width="100%" height="2000px"></iframe>

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<script type="text/javascript">
 $(document).ready(function(){

 	$(".php-pad").toggle();

 	$("#ask-friend").click(function(){
 		$(".php-pad").toggle();
 	});

 	$("#code").submit(function(event){

 		event.preventDefault();

 		var $form = $(this);

 		var codeData = $("#code-box").val();
 		
 		var url = $form.attr("action");

 		var posting = $.post(url, {code: codeData});

 		posting.done(function(){

	 		$.ajax({
     		 method: "GET", 
			 url: "results.php",  
			 success: function(result) {
				 $("#results-box").html(result);
			 }
			});

 		});
		
 	});
 });
</script>

</body>
</html>
