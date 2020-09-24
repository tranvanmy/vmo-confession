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
    //alert('hahahh')
    $(document).on('click', '.btn-like', function(){
      var idPost = $('.btn-like').val();
      //console.log(idPost)
        $.get('like/'+idPost,function(data){
          //alert(data);
          $("#like").html(data);
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
  
  
