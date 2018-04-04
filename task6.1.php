<!DOCTYPE html>
<html lang="en">
<head>
  <title>Task6</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
      #blah{
         border: 3px solid lightgrey;
         border-radius: 10px;
         display: none;
         padding: 3px;
     }
  </style>
</head>
<body>

<div class="container well" style="margin-top:2em;margin-bottom:2em;">
<h2 class="text-center">Form 2</h2>
  <form method="POST" id="details" action="view/show.php" enctype="multipart/form-data">
    <div class="form-group">
      <label for="fname">First name:</label>
      <input class="form-control" id="fname" placeholder="Enter First name" name="fname" autocomplete="off" required>
    </div>
    <div class="form-group">
      <label for="lname">Last Name:</label>
      <input class="form-control" id="lname" placeholder="Enter last name" name="lname" autocomplete="off" required>
    </div>
    <div class="form-group">
      <label for="name">Full name:</label>
      <input class="form-control" id="name" name="name" readonly="readonly" required>
    </div>

    <label for="input-group">Upload Image:</label>
    <div class="input-group">
        <label class="input-group-btn">
            <span class="btn btn-primary">
                Browse&hellip; <input id='single_file' type="file" style="display: none;" name="uploadedfile">
            </span>
        </label>
        <input id="file_name" type="text" name="namebox" class="form-control" readonly="readonly">
    </div>
    <br>
    <img id="blah" src="#" alt="your image" width="300" class="img-responsive">
    <br>
    <div class="form-group">
      <label for="Marks">Marks:</label>
      <textarea class="form-control" rows="10" id="marks" name="marks" required></textarea>
    </div>
    <label for="input-group">Mobile no:</label>
    <div class="input-group">
      <span class="input-group-addon">+91</span>
      <input id="info" maxlength="10" class="form-control" name="info" placeholder="Enter mobile number" required>
      <input id="mob" type="hidden" class="form-control" name="mob">
    </div>
    <br>
    <div class="form-group">
      <label for="fname">Email:</label>
      <input class="form-control" id="email" placeholder="Enter Email" name="email" autocomplete="off" required>
    </div>
    <br>
    <button type="submit" id="submit" name="submit" class="btn btn-default">Submit</button>  
  </form>
  
</div>

</body>

<script src="resource/js/common.js"></script>
<script>
    

    // function myFunction() {
        
    //     if(flag === 0 && file_name !== '' && mobile_c && email_c && lname_c && fname_c && marks_c){
    //         return true;
    //     }
    //     alert("Please check the fields");
    //     return false;
    // }
    
    $(function(){
        
        /*$('#details').on('submit',function(e){
            //$('#details').submit();
            if(!lots_of_stuff_already_done){
                e.preventDefault();
            if(flag === 0 && file_name !== '' && mobile_c && email_c && lname_c && fname_c && marks_c){
            
                var access_key = '5c5d3534b5d2262ddda2c3c965ba4ff5';
                var email_address = $('#email').val();
                
                // verify email address via AJAX call
                $.ajax({
                    url: 'http://apilayer.net/api/check?access_key=' + access_key + '&email=' + email_address + '&smtp=1&format=1',   
                    dataType: 'jsonp',
                    success: function(json) {
                        if(json.smtp_check){
                            alert("Email is valid");
                            flag=0;
                            $("#details").trigger('submit');
                            //window.location.assign("https://www.facebook.com");
                        }
                        else{
                            flag=1;
                            $('#email').css({"border":"1px solid red"});
                            alert("Email is invalid");
                            return false;
                        }
                        //alert(JSON.stringify(json));
                        // Access and use your preferred validation result objects
                        console.log(json.format_valid);
                        console.log(json.smtp_check);
                        console.log(json.score);

                    },
                    error: function(data){
                        alert(JSON.stringify(json));
                        return false;
                    },
                    async: false
                });
                
            }
            else{
                flag=1;
                alert("Please check the fields");
                return false;
            }
            }
        });*/

        //on form sumbit check if email exist or not then submit the form  
        $('#details').on('submit',function(e){
            
            if(!lots_of_stuff_already_done){
                
                e.preventDefault();
              
                var formData = new FormData(this);
                if(flag === 0 && file_name !== '' && mobile_c && email_c && lname_c && fname_c && marks_c){
        
                    var access_key = '5c5d3534b5d2262ddda2c3c965ba4ff5';
                    var email_address = $('#email').val();
                    // verify email address via AJAX call then trigger the submit form
                    $.ajax({
                        url: 'http://apilayer.net/api/check?access_key=' + access_key + '&email=' + email_address + '&smtp=1&format=1',   
                        dataType: 'jsonp',
                        success: function(json) {
                            if(json.smtp_check){
                                alert("Email is valid");
                                flag=0;
                                lots_of_stuff_already_done = true; // set flag
                                $("#submit").trigger('click');
                            }
                            else{
                                flag=1;
                                $('#email').css({"border":"1px solid red"});
                                alert("Email is invalid");
                                return false;
                            }
                            // Access and use your preferred validation result objects
                            console.log(json.format_valid);
                            console.log(json.smtp_check);
                            console.log(json.score);

                        },
                        error: function(data){
                            alert(JSON.stringify(json));
                            return false;
                        },
                        async: false
                    });
                    
                }
                else{
                    flag=1;
                    alert("Please check the fields");
                    return false;
                }
            }

            return true;
        
        });//end of form submit

    });
</script>
</html>
