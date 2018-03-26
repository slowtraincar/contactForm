<?php 

$error = ""; $successMessage = "";

if($_POST){
    
    
//Email error    
    if (!$_POST["email"]){
        
        $error .="An email address is required.<br>";
        
    }
    
//Subject error    
    if (!$_POST["subject"]){
        
        $error .="A subject is required.<br>";
        
    }
    
//Message error    
    if (!$_POST["content"]){
        
        $error .="A message is required.<br>";
        
    }
    
//Bad email error    
    if ($_POST["email"] && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) === false) {

        $error .="The email address is invalid.<br>";
    }
    
//Base error form    
    if ($error != ""){
        
        $error = '<div class="alert alert-danger" role="alert"><p>There were error(s) in your from:</p>'.$error.'</div>';
    
    } else {
        
//Send message        
        $emailTo= "me@domain.com";
        
        $subject= $_POST ["subject"];
        
        $content= $_POST ["content"];
        
        $headers= "From: ".$_POST["email"];
        
 //Successfully sent       
        if (mail($emailTo, $subject, $content, $headers)){
            
            $successMessage = '<div class="alert alert-success" role="alert"><p>Your message was sent. We will get back to you ASAP!</p></div>';
        
        } else {
            
 //Error sending           
            $error = '<div class="alert alert-danger" role="alert"><p>Your message could not be sent. Please try again later. <p></div>';
            
        }
    }
    
    
    
}

?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
      
      
    <div class="container">
        
        <br><br>
<!--Title-->        
        <h1>Get in touch!</h1>
        <div id="error"><? echo $error.$successMessage; ?></div>
        <br>
        
        <form method="post">
<!--Email-->            
          <div class="form-group">
            <label for="Email">Email Address</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
          </div>
          
<!--Subject-->            
          <div class="form-group">
            <label for="Subject">Subject</label>
            <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject">
          </div>
            
<!--Message-->            
          <div class="form-group">
            <label for="content">What would you like to ask us?</label>
            <textarea class="form-control" id="content" name="content" rows="3"></textarea>
          </div>
            
<!--submit-->            
          <button type="submit" id="submit" class="btn btn-primary">Submit</button>
        </form>
        
        
    </div>
      
      
      
      
      
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
      
      
      <script type="text/javascript">
      
      $("form").submit(function (e){
          
          var error="";
          
          if ($("#email").val()==""){
              
              error+= "The email field is required.<br>";
          }
          
          if ($("#subject").val()==""){
              
              error+= "The subject field is required.<br>";
          }
          
          if ($("#content").val()==""){
              
              error+= "<p> The content field is required.";
          }
          
          if (error !=""){
          $("#error").html('<div class="alert alert-danger" role="alert"><p>There were error(s) in your from:</p>'+ error + '</div>');
              
                return false;
              
              }else{
                  
                return true;
      });
      
      
      
      
      
      </script>
  </body>
</html
