@extends('admin.layout')
@section("title")
Tags
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
              <input type="text" class="form-control" name="catdit"  id="message-text2">
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
      <div class="modal-body">
        {{ Form::open() }} 
          <div class="form-group">
            <label for="message-text" class="control-label"> Add a new tag:</label>
            <input class="form-control" name="tag"  id="message-text" type="text" >
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
                 <span class="caption-subject bold ">Tags table</span>
              </div>
        </div>  
        {!! Form::open(['method' =>'POST','action' => 'Admin\Tags\TagsController@deleteTgas']) !!}
        <div class="portlet-body">
            <div class="table-toolbar">
                <div class="row">
                    <div class="col-md-6">
                      <button id="delete-delete" class="btn btn-danger">Delete selected</button>
                       <button data-toggle="modal" data-target="#exampleModal"  class="btn btn-primary"  type="button">Add a new Tags</button>
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
                        <th> Tags </th>
                        <th> Options </th>
                    </tr>
                </thead>
                <tbody  class="alldata">
                 @if(!$tags->isEmpty())
                   @foreach($tags as $tag) 
                        <tr  id="tr-type{{$tag->id}}" class="odd gradeX">
                            <td>
                                <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                    <input  type="checkbox"  name='check[]'  class="checkboxes" value="{{$tag->id}}" />
                                    <span></span>
                                </label>
                            </td>
                            <td> 
                                {{$tag->name}}
                            </td>
                            <td>
                              <div class="actions">
                                      <div class="btn-group">
                                          <a class="btn btn-sm green dropdown-toggle" href="javascript:;" data-toggle="dropdown"> Options
                                              <i class="fa fa-angle-down"></i>
                                          </a>
                                          <ul   class="dropdown-menu pull-right">
                                              <li>
                                                  <a  data-id="{{$tag->id}}" data-ty="{{$tag->name}}" class="edit-items"  data-toggle="modal" data-target="#exampleModal2">
                                                      <i class="fa fa-pencil"></i> Edit </a>
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
            var name  =  $('#message-text2').val();
             if(name == '')
             {
               alert('You can not add empty values');
               return false;
             }
            var tag_id = $('input[name="idedit"]').val();

            $.ajax({
              url:'{{url('/')}}/dashboard/tags/'+tag_id,
              type:'post',
              datatype:'json',
              data:{name,tag_id,"_token":"{{csrf_token()}}"},
              success:function(data){

                 if(data.status == true){
                    $('#tr-type'+tag_id).replaceWith(data.result);
                    $('input[name="tag"]').val(' ');
                    $("#msg").fadeIn().delay(3000).fadeOut(); 
                  }

                  if(data.code == 404) {
                  $('input[name="tag"]').val(' ');
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
        $('#message-text2').val($(this).data('ty'));
        $('#id-id').val($(this).data('id'));
        });
    });
</script>




<script type="text/javascript">

  $(document).ready(function() {

        $('#send').click(function(e){e.preventDefault();

                $('.dataTables_empty').remove();
                
                var name   =  $('input[name="tag"]').val();

                if(name == '')
                {
                  alert('You can not add empty values');
                  return false;
                }

                $.ajax({

                  url:'{{url('/')}}/dashboard/tags',
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
                      $('input[name="tag"]').val(' ');
                      $("#msg").fadeIn().delay(3000).fadeOut();
                    }

                    if(data.code == 404) 
                    {
                     $('input[name="tag"]').val(' ');
                     $("#failed").fadeIn().delay(3000).fadeOut();
                    }
                  }
             });
        });
  });  
</script>


@endsection
