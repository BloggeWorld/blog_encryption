<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Blog Encryption</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body id="page-top">
 
 <h1>Encryption</h1>
 
 <form>
     <label>Password</label>
     <input id="password" type="password">
     <button type="button" id="submit">Submit</button>
 </form>
 
  <script>
      $(document).ready(function() {
          $("#submit").click(function() {
              var password = $("#password").val();
              alert(password);
              if(password == ""){
                  alert("Please enter a password");
              }
              else{
           $.ajax({
                url:"encryption.php",
                type: "POST",
                data:{
                    "password": password
                     },
                success:function(data)
                {
                  var dataReturned = $.parseJSON(data);
                  var flag = dataReturned.flag;
                  var password = dataReturned.encryptedPassword;
                 alert(password);
                    if(flag){
                        alert("Password encrypted");
                    }
                    else{
                        alert("An error occured");
                    }
                }
            });
              }
          })
      });
</script>
</body>
</html>
