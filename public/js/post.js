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
      var idPost = $(this).val();
      //console.log(idPost)
        $.get('like/'+idPost,function(data){
          $("#like"+idPost).html(data);
        });
        $.get('dadislike/'+idPost,function(data){
          $("#dislike"+idPost).html(data);
      });
    });
  
    $(document).on('click', '.btn-dalike', function(){
      var idPost = $(this).val();
      //console.log(idPost)
      $.get('dalike/'+idPost,function(data){
        //alert(data);
        $("#like"+idPost).html(data);
      });
    });
    
    //dislike
    $(document).on('click','.btn-dislike', function(){
      //alert("12345")
        var idPost = $(this).val();
        $.get('dislike/'+idPost,function(data){
            $("#dislike"+idPost).html(data);
        });
        $.get('dalike/'+idPost,function(data){
            $("#like"+idPost).html(data);
        });
    });

    $(document).on('click','.btn-dadislike', function(){
      var idPost = $(this).val();
      $.get('dadislike/'+idPost,function(data){
          $("#dislike"+idPost).html(data);
      });
    });

    //like comment
    $(document).on('click', '.btn-likecm', function(){
      var idComment = $(this).val();
      //alert(idComment);
        $.get('likecomment/'+idComment,function(data){
          $("#like"+idComment).html(data);
        });
        $.get('dadislikecomment/'+idComment,function(data){
          $("#dislike"+idComment).html(data);
        });
    });
  
    $(document).on('click', '.btn-dalikecm', function(){
      var idComment = $(this).val();
      //alert(idComment);
      $.get('dalikecomment/'+idComment,function(data){
        $("#like"+idComment).html(data);
      });
    });

     //dislike comment
    $(document).on('click', '.btn-dislikecm', function(){
      var idComment = $(this).val();
        $.get('dislikecomment/'+idComment,function(data){
          $("#dislike"+idComment).html(data);
        });
        $.get('dalikecomment/'+idComment,function(data){
          $("#like"+idComment).html(data);
        });
    });
  
    $(document).on('click', '.btn-dadislikecm', function(){
      var idComment = $(this).val();
      $.get('dadislikecomment/'+idComment,function(data){
        $("#dislike"+idComment).html(data);
      });
     });

      //like rep comment
    $(document).on('click', '.btn-likecm-rep', function(){
      var idComment = $(this).val();
      //alert(idComment);
        $.get('likecommentrep/'+idComment,function(data){
          $("#like"+idComment).html(data);
        });
        $.get('dadislikecomment/'+idComment,function(data){
          $("#dislike"+idComment).html(data);
        });
    });

    $(document).on('click', '.btn-dalikecm-rep', function(){
      var idComment = $(this).val();
      //alert(idComment);
      $.get('dalikecommentrep/'+idComment,function(data){
        $("#like"+idComment).html(data);
      });
    });

    //dislike rep comment
    $(document).on('click', '.btn-dislikecm-rep', function(){
      var idComment = $(this).val();
        $.get('dislikecommentrep/'+idComment,function(data){
          $("#dislike"+idComment).html(data);
        });
        $.get('dalikecomment/'+idComment,function(data){
          $("#like"+idComment).html(data);
        });
    });
  
    $(document).on('click', '.btn-dadislikecm-rep', function(){
      var idComment = $(this).val();
      $.get('dadislikecommentrep/'+idComment,function(data){
        $("#dislike"+idComment).html(data);
      });
     });

  $(document).on('click', '.btn-dadislike', function () {
    var idPost = $(this).val();
    $.get('dadislike/' + idPost, function (data) {
      $("#dislike" + idPost).html(data);
    });
  });


  //like comment
  
  //vote

  $('.btn-vote').click(function (e) {
    //console.log("toanto");
    e.preventDefault();
    var idpos = $(this).val()
    var pointVote = $('#point'+ idpos).val()
    //console.log(idpos)
    $.ajax({
      type: 'POST',
      url: 'vote/'+idpos,
      data:
      // {
      //     _token:"{{ csrf_token() }}",
      //     point:pointVote,
      //     idpost:idpos
      // },
      $('#myForm'+idpos).serialize(),
      success: function (data) {
        $('#vt'+idpos).html(data),
        $('#exampleModal'+idpos).modal('hide');
        $('#btn-'+idpos).removeAttr('style');
          console.log('Submission was successful.')
      },
      error: function (data) {
        console.log('An error occurred.');

      },
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


