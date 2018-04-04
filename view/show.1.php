<?php
    if(!empty($_FILES['uploadedfile']['name'])){ 
        $filepath = "images/" . $_FILES["uploadedfile"]["name"];
        
        if(!move_uploaded_file($_FILES["uploadedfile"]["tmp_name"], $filepath)) {
            //echo "<img src=\"".$filepath."\" height=200 width=300 /><br>{$_FILES["file"]["name"]}";
            echo "Error !!";
        } 
        else {
            require '../db/Database.php';
            $db = new Database();
            $res = $db->insert("insert into details(name,email,marks,pic,mobile) values('{$_POST['name']}','{$_POST['email']}','{$_POST['marks']}','view/{$filepath}','{$_POST['mob']}')");
            
        }
        // else {
        //     echo "Error !!";
        // }
    } 

?>        
    <div class="pad row" style="border:3px solid #b9b3b3;border-radius: 12px;margin: 3em auto !important;padding: 2.5em 2em;width: 80%;position: relative;">
        <img class="dp img-responsive" width="110" height="130" src="<?php echo "view/".$filepath;?>" style="position: absolute;right: 60px;top: 37px;border: 2px solid #929292;padding: 3px;border-radius: 5px;height: 10em;width: 9em;">
        <div class="row">
            <h2 class="text-center">Details</h2><br>
            <br>
            <div class="col-sm-4">
                <h4>Full Name :</h4>
                
            </div>
            <div class="col-sm-8">
                <h4><?php echo $_POST['name']; ?></h4>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <h4>Marks :</h4>
                <?php
                    $data = explode("\n",$_POST['marks']); 
                    include('table.php');
                    //mailCheck();
                ?>
            </div>
        </div>  

        <div class="row">
            <div class="col-sm-4">
                <h4>Mobile number :</h4>
                <h4>Email id :</h4>
            </div>
            <div class="col-sm-8">
                <h4><?php echo $_POST['mob']; ?></h4>
                <h4><?php echo $_POST['email']; ?></h4>
            </div>
        </div>
    </div>
        


<?php
function mailCheck(){
    $access_key = '5c5d3534b5d2262ddda2c3c965ba4ff5';

    // set email address
    $email_address = 'support@apilayer.com';
    
    // Initialize CURL:
    $ch = curl_init('http://apilayer.net/api/check?access_key='.$access_key.'&email='.$email_address.'&smtp=1&format=1');  
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
    // Store the data:
    $json = curl_exec($ch);
    curl_close($ch);
    
    // Decode JSON response:
    $validationResult = json_decode($json, true);
    
    // Access and use your preferred validation result objects
    // $validationResult['format_valid'];
    // $validationResult['smtp_check'];
    // $validationResult['score'];

    return $validationResult['smtp_check'];
}


