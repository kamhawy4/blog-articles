
$(document).ready(function(){
  $('#save-edit').click(function(e){ e.preventDefault();
    var name  =  $('#message-text2').val();
     if(name == '')
     {
       alert('You can not add empty values');
       return false;
     }
    var category_id = $('input[name="idedit"]').val();

    $.ajax({
      url:'{{url('/')}}/dashboard/categorys/'+category_id,
      type:'PUT',
      datatype:'json',
      data:{name,category_id,"_token":"{{csrf_token()}}"},

      success:function(data){

         if(data.status == true){
            $('#tr-type'+category_id).replaceWith(data.result);
            $('input[name="categray"]').val(' ');
            $("#msg").fadeIn().delay(3000).fadeOut(); 
          }

          if(data.code == 404) {
          $('input[name="categray"]').val(' ');
          $("#failed").fadeIn().delay(3000).fadeOut();
          }       
      }
    });
  });
});





$(document).ready(function(){
    $('body').on('click','.edit-items',function(){
    $('#message-text2').val($(this).data('ty'));
    $('#id-id').val($(this).data('id'));
    });
});






$(document).ready(function() {

      $('#send').click(function(e){e.preventDefault();

              $('.dataTables_empty').remove();
              
              var name   =  $('input[name="categray"]').val();

              if(name == '')
              {
                alert('You can not add empty values');
                return false;
              }

              $.ajax({

                url:'{{url('/')}}/dashboard/categorys',
                type:'post',
                dataType:'json',
                data:{name,"_token": "{{ csrf_token() }}"},

                success:function(data)
                {
                  if(data.code == 300)
                  { 
                    alert('This value already exists');
                    return false;
                  }

                  if(data.status == true)
                  {
                    $('.table').prepend(data.result);
                    $('input[name="categray"]').val(' ');
                    $("#msg").fadeIn().delay(3000).fadeOut();
                  }

                  if(data.code == 404) 
                  {
                   $('input[name="categray"]').val(' ');
                   $("#failed").fadeIn().delay(3000).fadeOut();
                  }
                }
           });
      });
});  
