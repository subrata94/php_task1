var lname = '',
    fname = '',
    error = '',
    flag = 0,
    file_name = '',
    mobile_c = false,
    email_c = false,
    lname_c = false,
    fname_c = false,
    marks_c = false,
    code = "+91 ",
    number = "";
    var lots_of_stuff_already_done = false;
    

    $(function(){
        
        // for showing the slected image on screen without uploading it
        function readURL(input) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#blah').attr('src', e.target.result);
                    $('#blah').css({"display":"block"});
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        // checking if the fast_name and last_name containing any other character than english letters
        $('#fname,#lname').on('keypress',function(e){
            //console.log(String.fromCharCode(e.which));
            var c = e.which;
            //console.log(c);
            if(c >= 65 && c <= 90 || c >= 97 && c <= 123)
            return true;
            else
            return false;
        });

        //checking if first name is filled or not?
        $('#fname').on('keyup',function(){
            fname = $(this).val().trim(); 
            //$('#name').val(fname+" "+lname);
            if(fname !== '' && lname !== ''){
                flag = 0;
                fname_c = false;
                $(this).css({"border":"1px solid green"});
                $('#name').val(fname + " " + lname);
            }else{
                flag = 1;
                fname_c = true;
                $(this).css({"border":"1px solid red"});
                $('#name').val('');
            }
        });


        //checking if first name is filled or not
        $('#lname').on('keyup',function(){
            lname = $(this).val().trim(); 
            if(fname !== '' && lname !== ''){
                flag=0;
                lname_c=true;
                $(this).css({"border":"1px solid green"});
                $("#fname").css({"border":"1px solid green"});
                $('#name').val(fname + " " + lname);
            }
            else{
                $(this).css({"border":"1px solid red"});
                flag = 1;
                lname_c = false;
                $('#name').val('');
            }

        });

        
        //checking the marks format using regex
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


        //here spliting the marks 
        $('#marks').on('keyup',function(){
            var mark = $(this).val(); 
            var marks = $(this).val().split("\n"); 
            if(marks !== ''){
                for(var i = 0;i < marks.length; i++){
                    if(!checkMarks(marks[i].trim())){
                        $(this).css({"border":"1px solid red"});
                        flag = 1;
                        marks_c = false;
                        return false;
                    }
                }
                flag = 0;
                marks_c = true;
                $(this).css({"border":"1px solid green"});
                $("#marks").css({"border":"1px solid green"});
            }
            else{
                $(this).css({"border":"1px solid red"});
                flag = 1;
                marks_c = false;
            }

        });


        //checking if the uploaded file is image or not and also checking its size
        $('#single_file').on('change', function() {
			var inps = document.getElementById('single_file'),
				name = inps.files.item(0).name;
				size = inps.files.item(0).size;
                file_name=name;
            var sp = name.split('.');
            var ext = sp[sp.length-1];

            if(size > 400000){
                alert("file should be less than 400KB");
                flag=1;
                $("#file_name").css({"border":"1px solid red"});
                file_name = '';
                return false;
            }
            if(ext != 'png' && ext != 'gif' && ext != 'jpg'){
                alert(`Please upload an Image`);
                flag=1;
                $("#file_name").css({"border":"1px solid red"});
                file_name = '';
                return false;
            }
            readURL(this);
            document.getElementById('file_name').value = name;
            if(name !== null || name !== ""){
                flag=0;
                $("#file_name").css({"border":"1px solid green"});
            }else{
                flag=1;
                $("#file_name").css({"border":"1px solid red"});
            }
        });
        
        $('#info').on('keypress',function(e){
            if(e.which < 48 || e.which > 57) return false;
        });

        $('#info').on('keyup',function(e){
            
            number=$(this).val().trim(); 
            //$('#name').val(fname+" "+lname);
            if(number.length === 10 ){
                flag = 0;
                $(this).css({"border":"1px solid green"});
                $('#mob').val(code+number);
                mobile_c = true;
            }else{
                flag = 1;
                $(this).css({"border":"1px solid red"});
                //$('#mob').val('');
                number = '';
                mobile_c = false;
            }
        });

        // regex format for email validation
        function isEmail(email) {
            //var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            var regex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return regex.test(email);
        }
      
        //email validation 
        $('#email').on('keyup',function(){
            var chk = isEmail( $('#email').val() );
            if(chk){
                var em_ar = ["gmail","yahoo","rediff","hotmail"];
                var em = $('#email').val();
                if(em.includes(em_ar[0] || em_ar[1] || em_ar[2] || em_ar[3])){
                    alert("public emails not allowed");
                    flag = 1;
                    $('#email').css({"border":"1px solid red"});
                    
                    email_c = false;
                    
                    return false;
                }
                // for(var i=0;i<4;i++){
                //     if(em.substr(em_ar[i])){
                //         alert("public emails not allowed");
                //         flag=1;
                //         $('#email').css({"border":"1px solid red"});
                //         email_c=false;
                //         return false;
                //     }
                // }
                email_c = true;
                flag = 0;
                $('#email').css({"border":"1px solid green"});
            }
            else{
                flag = 1;
                email_c = false;
                $('#email').css({"border":"1px solid red"});
                //return false;
            }
        });

    });