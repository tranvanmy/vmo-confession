$(document).ready(function(){
    $('.btn-comment').click(function(e){
        e.preventDefault();
        console.log('ok')
        $('.comments').removeAttr('style');
    })
});