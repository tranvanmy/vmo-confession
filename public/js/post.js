// $(document).ready(function(){
//     $("#button").click(function(){
//       $("#like").toggleClass("main");
//       var idPost = $(idPost).val();
//       $.get('like/'+idPost,function(data){
//         $("#like").html(data);
//       });
//     });
//   });

// $(document).ready(function(){
//   jQuery("#button").click(function(){
//       var idPost = $(idPost).val();
//       $.ajax({
//           url:'like/'+idPost,
//           type: 'GET',
//           // data: 'idPost=' + idPost,
//           success: function(data){
//             $("#like").html(data);
//           },
//           error: function(e){
//             console.log(e.message)
//           }
//       });
//   });
// });

$(document).ready(function(){
    //like
    $(document).on('click', '.btn-like', function(){
      var idPost = $('.btn-like').val();
      //console.log(idPost)
        $.get('like/'+idPost,function(data){
          $("#like").html(data);
        });
        $.get('dadislike/'+idPost,function(data){
          $("#dislike").html(data);
      });
    })
  
    $(document).on('click', '.btn-dalike', function(){
      var idPost = $('.btn-dalike').val();
      //console.log(idPost)
      $.get('dalike/'+idPost,function(data){
        //alert(data);
        $("#like").html(data);
      });
    })
    
    //dislike
    $(document).on('click','.btn-dislike', function(){
      //alert("12345")
        var idPost = $('.btn-dislike').val();
        $.get('dislike/'+idPost,function(data){
            $("#dislike").html(data);
        });
        $.get('dalike/'+idPost,function(data){
            $("#like").html(data);
        });
    });

    $(document).on('click','.btn-dadislike', function(){
      var idPost = $('.btn-dadislike').val();
      $.get('dadislike/'+idPost,function(data){
          $("#dislike").html(data);
      });
    });

  });
  
  // $(document).ready(function(){
  //     $("#btnLike").click(function(){
  //       var idPost = $(this).val();
  //       $.get('like/'+idPost,function(data){
  //         //alert(data);
  //         $("#like").html(data);
  //       });
  //     });
  // //});
  
  // //$(document).ready(function(){
  //   $("#btnDaLike").click(function(){
  //     var idPost = $(this).val();
  //     $.get('dalike/'+idPost,function(data){
  //       //alert(data);
  //       $("#like").html(data);
  //     });
  //   });
  // });
  
  
