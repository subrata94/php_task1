$(function(){
    $('#fname').on('keydown',function(e){
        console.log(String.fromCharCode(e.which));
    });
});