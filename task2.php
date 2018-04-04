<html>
<head>
<title>task2</title>
</head>
<body>
 
<form action="task2.php" enctype="multipart/form-data" method="post" onsubmit="return checkFile()">
Select image :
<input type="file" name="uploadedfile" onchange="return checkFile()" id="fileupload"><br/>
<input type="submit" value="Upload" name="submit"> <br/>
 
 
</form>

<script>
    function checkFile(){
        var fileinp = document.getElementById("fileupload");
        var size= fileinp.files[0].size;
        var name= fileinp.files[0].name;
        var sp = name.split('.');
        var ext = sp[sp.length-1];
        if(size > 300000){
            alert("file should be less than 100KB");
            return false;
        }
        //Suppose there are 10 types of file types to be checked. Optimize way of checking. 
        if(ext != 'png' && ext != 'gif' && ext != 'jpg'){
            alert("Please upload an Image");
            return false;
        }
    }
    

</script>
<?php
    if(isset($_POST['submit'])){ 

        //adding the timestamp 'time()' to avoid image name redandency
        $filepath = "images/". time() . $_FILES["uploadedfile"]["name"] ;
        
        if(move_uploaded_file($_FILES["uploadedfile"]["tmp_name"], $filepath)) {
            echo "<img src=\"".$filepath."\" height=200 width=300 /><br>{$_FILES["uploadedfile"]["name"]}";
        } 
        else {
            echo "Error in file uploading !!";
        }
    } 
?>
 
</body>
</html>