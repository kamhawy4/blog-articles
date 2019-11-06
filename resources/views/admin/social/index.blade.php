@extends('admin.layout')
@section("title")
Social
@endsection
@section("content")


<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Edit</h4>
      </div>
      <div class="modal-body">
        {{ Form::open() }}
          <div class="form-group">
              <label for="message-text" class="control-label" >name</label>
              <input type="text" class="form-control" name="name"  id="name-social">
              <label for="message-text" class="control-label" >Url</label>
              <input type="text" class="form-control" name="url"  id="url-social">
          </div>
            <input type="hidden"  name="idedit"  class="form-control"  id="id-id">
        {{ Form::close() }}
      </div>
      <div class="modal-footer">
        <button id="save-edit" type="button" data-dismiss="modal" class="btn btn-primary" >Edit</button>
      </div>
    </div>
  </div>
</div>


<p id="msg" style="padding: 20px;display: none;" class="bg-success">   Has been Successfully Added </p>

<p id="failed" style="padding: 20px;display: none;" class="bg-danger"> The Field Can Not be Empty</p>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
       <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Add </h4>
      </div>
      <div class="modal-body">
        {{ Form::open() }} 
          <div class="form-group">
            <label for="message-text" class="control-label" >name</label>
            <input class="form-control" name="nameAdd"  id="message-text" type="text" >
            <label for="message-text" class="control-label" >Url</label>
            <input class="form-control" name="urlAdd"  id="message-text" type="text" >
          </div>
        {{ Form::close() }}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary"    id="send" data-dismiss="modal">Add</button>
      </div>
    </div>
  </div>
</div>


<div class="row">
   <div class="col-md-12">
    <!-- BEGIN EXAMPLE TABLE PORTLET-->
      <div class="portlet light bordered">
         <div class="portlet-title">
             <div class="caption font-dark">
                 <i class="fa fa-tags  font-dark"></i>
                 <span class="caption-subject bold ">Social table</span>
              </div>
        </div>  
        {!! Form::open(['method' =>'POST','action' => 'Admin\Social\SocialController@deleteSocial']) !!}
        <div class="portlet-body">
            <div class="table-toolbar">
                <div class="row">
                    <div class="col-md-6">
                      @can('social-delete')
                        <button id="delete-delete" class="btn btn-danger">Delete selected</button>
                      @endcan
                      @can('social-create')
                       <button data-toggle="modal" data-target="#exampleModal"  class="btn btn-primary"  type="button">Add a new Social</button>
                      @endcan
                    </div>
                </div>
            </div>
            <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                <thead>
                    <tr>
                        <th>
                            <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                <input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" />
                                <span></span>
                            </label>
                        </th>
                        <th> Name </th>
                        <th> url </th>
                        <th> Options </th>
                    </tr>
                </thead>
                <tbody  class="alldata">
                 @if(!$social->isEmpty())
                   @foreach($social as $socialData) 
                        <tr  id="tr-type{{$socialData->id}}" class="odd gradeX">
                            <td>
                                <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                    <input  type="checkbox"  name='check[]'  class="checkboxes" value="{{$socialData->id}}" />
                                    <span></span>
                                </label>
                            </td>
                            <td> 
                                {{$socialData->name}}
                            </td>
                            <td> 
                                {{$socialData->url}}
                            </td>
                            <td>
                              <div class="actions">
                                      <div class="btn-group">
                                          <a class="btn btn-sm green dropdown-toggle" href="javascript:;" data-toggle="dropdown"> Options
                                              <i class="fa fa-angle-down"></i>
                                          </a>
                                          <ul   class="dropdown-menu pull-right">
                                              <li>
                                                @can('social-edit')
                                                  <a  data-id="{{$socialData->id}}" data-name="{{$socialData->name}}" data-url="{{$socialData->url}}" class="edit-items"  data-toggle="modal" data-target="#exampleModal2">
                                                      <i class="fa fa-pencil"></i> Edit </a>
                                                @endcan
                                              </li>
                                          </ul>
                                      </div>
                                  </div>
                              
                            </td>
                        </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    {!! Form::close() !!}
    </div>
    <!-- END EXAMPLE TABLE PORTLET-->
</div>
</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>


<script type="text/javascript">
     $(document).ready(function(){
          $('#save-edit').click(function(e){ e.preventDefault();
            var name  =  $('#name-social').val();
            var url   =  $('#url-social').val();
             if(name == '' || url == '')
             {
               alert('You can not add empty values');
               return false;
             }

             var social_id = $('input[name="idedit"]').val();

            $.ajax({
              url:'{{url('/')}}/dashboard/social/'+social_id,
              type:'post',
              datatype:'json',
              data:{name,url,social_id,"_token":"{{csrf_token()}}"},
              success:function(data){

                 if(data.status == true){
                    $('#tr-type'+social_id).replaceWith(data.result);
                    $('input[name="name"]').val(' ');
                    $('input[name="url"]').val(' ');
                    $("#msg").fadeIn().delay(3000).fadeOut(); 
                  }

                  if(data.code == 404) {
                  $('input[name="name"]').val(' ');
                  $('input[name="url"]').val(' ');
                  $("#failed").fadeIn().delay(3000).fadeOut();
                  }       
              }
            });
          });
          });
</script>



<script type="text/javascript">
  $(document).ready(function(){
        $('body').on('click','.edit-items',function(){
        $('#name-social').val($(this).data('name'));
        $('#url-social').val($(this).data('url'));
        $('#id-id').val($(this).data('id'));
        });
    });
</script>




<script type="text/javascript">

  $(document).ready(function() {

        $('#send').click(function(e){e.preventDefault();

                $('.dataTables_empty').remove();
                
                var name   =  $('input[name="nameAdd"]').val();
                var url    =  $('input[name="urlAdd"]').val();

                if(name == '')
                {
                  alert('You can not add empty values');
                  return false;
                }

                $.ajax({

                  url:'{{url('/')}}/dashboard/social',
                  type:'post',
                  dataType:'json',
                  data:{name,url,"_token": "{{ csrf_token() }}"},

                  success:function(data)
                  {
                    if(data.status == true)
                    {
                      $('.table').prepend(data.result);
                      $('input[name="name"]').val(' ');
                      $('input[name="url"]').val(' ');
                      $("#msg").fadeIn().delay(3000).fadeOut();
                    }

                    if(data.code == 404) 
                    {
                     $('input[name="name"]').val(' ');
                     $('input[name="url"]').val(' ');
                     $("#failed").fadeIn().delay(3000).fadeOut();
                    }
                  }
             });
        });
  });  
</script>


@endsection
