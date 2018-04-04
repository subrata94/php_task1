<!DOCTYPE html>
<html lang="en">
<head>
  <title>task3</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    <form action="task3.php" method="POST" onsubmit="return check()"> 
    <div class="form-group">
      <label for="Marks">Marks:</label>
      <textarea class="form-control" rows="10" id="marks" name="marks" required><?php if($_POST['marks'] != NULL || $_POST['marks'] != "") echo $_POST['marks'];?></textarea>
    </div>
    <button type="submit" name="submit" class="btn btn-default">Submit</button>
  </form>
  <?php
    if(isset($_POST['submit'])){
        $data = explode("\n",$_POST['marks']);
        //print_r($data);
        require 'view/table.php';
    }
  ?>
</div>
</body>
<script>
  marks_c=false;
  function check(){
    if(marks_c === false){
      alert("please check the format");
      return false;
    }
    return true;
  }
  $( ()=>{
    function checkMarks(marks) {
            var regex1 = /^([A-Za-z])+\|[1]00$/;
            var regex2 = /^([A-Za-z])+\|[0-9][0-9]$/;
            var regex3 = /^([A-Za-z])+\|[0-9]$/;
            if(regex1.test(marks))
                return true;
            if(regex2.test(marks))
                return true;
            if(regex3.test(marks))
                return true;

            return false;
        }

        $('#marks').on('keyup',function(){
            //alert("hello");
            var mark = $(this).val(); 
            var marks = $(this).val().split("\n"); 
            if(marks !== ''){
                for(var i=0;i<marks.length;i++){
                    if(!checkMarks(marks[i].trim())){
                        $(this).css({"border":"1px solid red"});
                        flag=1;
                        marks_c=false;
                        return false;
                    }
                }
                flag=0;
                marks_c=true;
                $(this).css({"border":"1px solid green"});
                $("#marks").css({"border":"1px solid green"});
            }
            else{
                $(this).css({"border":"1px solid red"});
                flag=1;
                marks_c=false;
            }

        });
  })
</script>
</html>



