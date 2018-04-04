<!DOCTYPE html>
<html lang="en">
<head>
  <title>task4</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
​
<div class="container">
  
  <form action="task4.php" method="POST" onsubmit="return check()">
    <div class="input-group">
      <span class="input-group-addon">+91</span>
      <input id="info" maxlength="10" type="text" value="<?php if($_POST['info'] != NULL || $_POST['info'] != "") echo $_POST['info'];?>" class="form-control" name="info" placeholder="Enter mobile number" required>
      <input id="mob" type="hidden" class="form-control" name="mob">
    </div>
    <br>
    <button type="submit" name="submit" class="btn btn-default">Submit</button>
  </form>
</div>
​<script>
    var code = "+91:";
    var number = "";
    var mobile_c = false;
    function check(){
        if(!mobile_c){
            alert("mobile number should be 10 digit long");
            return false;
        }
        return true;
    }
    $(function(){
        $('#info').on('keypress',function(e){
            if(e.which < 48 || e.which > 57) return false;
        });

        $('#info').on('keyup',function(e){
            
            number=$(this).val().trim(); 
            //$('#name').val(fname+" "+lname);
            if(number.length === 10 ){
                flag=0;
                $(this).css({"border":"1px solid green"});
                $('#mob').val(code+number);
                mobile_c=true;
            }else{
                flag=1;
                $(this).css({"border":"1px solid red"});
                //$('#mob').val('');
                number='';
                
                mobile_c=false;
            }
        });
    });
</script>
</body>
</html>

<?php
    if(isset($_POST['submit'])){
        $mob=explode(":",$_POST['mob']);
        $len = strlen($mob[1]);
        if($len === 10 )
            echo "Mobile number is ok";
        else    
            echo "mobile number should be 10 digit long";
    }
?>
​
​

