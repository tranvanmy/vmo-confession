$(document).ready(function(){
    $('#published').change(function(){
        var published = $(this).val();
        if(published == 1){
            $('#published_at').removeAttr('disabled');
        }else{
            $('#published_at').attr('disabled','');
        }
    });
});