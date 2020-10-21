// function validate(){
    //     var title =document.Mypost.title.value;
    //     if(title.length < 3){
    //         document.getElementById("titleloc").innerHTML= 
    //         "<div class="alert alert-danger">Tiêu đề phải nhiều hơn 3 kí tự</div>"
    //     }
    // }
    function test(a,b,c){
        if(a && b && c){
            // console.log('---------')
             $('#btn-save').prop('disabled', false);
        }
        else{
            
            $('#btn-save').prop('disabled', true);
        } 
    }
    $(document).ready(function () {
        // $('#btn-save').prop('disabled', true);
        $('#show-error').css('color', 'red')
        var is_area = false
        var is_title = false
        var is_select = false
        test(is_area, is_title, is_select)
        $('#exampleFormControlTextarea1').on('keyup', function () {
            // console.log($(this).val().length)
                    if($('#exampleFormControlTextarea1').val().length > 5 ) {
                        $('#show-error').html('').css('color', 'red')
                        is_area = true
                        test(is_area, is_title, is_select)
                    }else{
                        // $('#btn-save').prop('disabled', true);
                        $('#show-error').html('Nội dung bài viết phải nhiều hơn 5 kí tự').css('color', 'red')
                        is_area = false
                        test(is_area, is_title, is_select)
                    } 
            
        });
        $('#title').on('keyup', function () {
            // console.log($(this).val().length)
                if($(this).val().length > 3) {
                    $('#titleloc').html('')
                    is_title = true
                    test(is_area, is_title, is_select)
                }else{
                    $('#titleloc').html('Tiêu đề bài viết phải nhiều hơn 3 kí tự').css('color', 'red')
                    is_title = false
                    test(is_area, is_title, is_select)
                } 
        
        });
    
            $('#category').change(function(){
                $("#category option:selected").each(function() {
                    if($(this).val() == 0){
                        is_select = false
                        test(is_area, is_title, is_select)
                    }else {
                        is_select = true
                        test(is_area, is_title, is_select)
                    }
                    // alert($(this).val())
                });
            });
       
        
    // });            
    

})