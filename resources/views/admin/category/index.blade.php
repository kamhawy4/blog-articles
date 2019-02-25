@extends('admin.layout')
@section("title")
Categories
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
                                          <input type="hidden"  name="idedit"    class="form-control"     id="id-id">
                                      {{ Form::close() }}
                                    </div>
                                    <div class="modal-footer">
                                      <button id="save-edit" type="button" data-dismiss="modal" class="btn btn-primary" >Edit</button>
                                    </div>
                                  </div>
                                </div>
                              </div>


                        <p id="msg" style="padding: 20px;display: none;" class="bg-success" >Has been successfully added
                        </p>


                         <p id="failed" style="padding: 20px;display: none;" class="bg-danger" > The field can not be empty</p>



                          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-body">
                                  {{ Form::open() }} 
                                    <div class="form-group">
                                      <label for="message-text" class="control-label"> Add a new section:</label>
                                      <input class="form-control" name="categray"  id="message-text" type="text" >
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
                                             <span class="caption-subject bold   ">Categories table</span>
                                     </div>
                                         </div>  
                            {!! Form::open(['method' =>'POST','action' => 'Admin\CategoriesController@deleteCategorys']) !!}
                                    <div class="portlet-body">
                                        <div class="table-toolbar">
                                            <div class="row">
                                                <div class="col-md-6">
                                                  <button id="delete-delete" class="btn btn-danger">Delete selected</button>
                                                   <button data-toggle="modal" data-target="#exampleModal"  class="btn btn-primary"  type="button">Add a new Categories</button>
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
                                                    <th> Category </th>
                                                    <th> Options </th>
                                                </tr>
                                            </thead>
                                            <tbody  class="alldata">
                                           @foreach($categorys as $category) 
                                                <tr  id="tr-type{{$category->id}}" class="odd gradeX">
                                                    <td>
                                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                            <input  type="checkbox"  name='check[]'  class="checkboxes" value="{{$category->id}}" />
                                                            <span></span>
                                                        </label>
                                                    </td>
                                                    <td> 
                                                        {{$category->name}}
                                                    </td>
                                                    <td>
                                                      <div class="actions">
                                                              <div class="btn-group">
                                                                  <a class="btn btn-sm green dropdown-toggle" href="javascript:;" data-toggle="dropdown"> Options
                                                                      <i class="fa fa-angle-down"></i>
                                                                  </a>
                                                                  <ul   class="dropdown-menu pull-right">
                                                                      <li>
                                                                          <a  data-id="{{$category->id}}" data-ty="{{$category->name}}" class="edit-items"  data-toggle="modal" data-target="#exampleModal2">
                                                                              <i class="fa fa-pencil"></i> Edit </a>
                                                                      </li>
                                                                  </ul>
                                                              </div>
                                                          </div>
                                                      
                                                    </td>
                                                </tr>
                                                @endforeach
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

          $('#save-edit').click(function(e){
            e.preventDefault();
            var name  =  $('#message-text2').val();

             if(name == '')
             {
               alert('You can not add empty values');
               return false;
             }

            var category_id =  $('input[name="idedit"]').val();
            $.ajax({
              url:'{{url('/')}}/dashboard/categorys/'+category_id,
              type:'PUT',
              datatype:'json',
              data:{name,category_id,"_token":"{{csrf_token()}}"},
              success:function(data){
                if(data.code == 200) {
                  $('#tr-type'+category_id).replaceWith('<tr id="tr-type'+category_id+'" class="odd gradeX"><td><label class="mt-checkbox mt-checkbox-single mt-checkbox-outline"><input  type="checkbox"  name="check[]" class="checkboxes" value="'+category_id+'" /><span></span></label></td><td>'+name+'</td><td><div class="actions"><div class="btn-group"><a class="btn btn-sm green dropdown-toggle" href="javascript:;" data-toggle="dropdown"> Options <i class="fa fa-angle-down"></i></a><ul   class="dropdown-menu pull-right"><li><a data-id="'+category_id+'" data-ty='+name+'class="edit-items"  data-toggle="modal" data-target="#exampleModal2"><i class="fa fa-pencil"></i> Edit </a></li></ul></div></div></td></tr>');
                     $('input[name="type"]').val('');
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

$(document).ready(function(){
             $('#send').click(function(e){
              e.preventDefault();
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

                  if(data.code == 200) { 
                  $("#msg").fadeIn().delay(3000).fadeOut();
                  $(".alldata").append('<tr id="tr-type'+data.id_category+'"  class="odd gradeX"><td><label class="mt-checkbox mt-checkbox-single mt-checkbox-outline"><input  type="checkbox"  name="check[]" class="checkboxes" value="'+data.id_category+'" /><span></span></label></td><td>'+data.category+'</td><td><div class="actions"><div class="btn-group"><a class="btn btn-sm green dropdown-toggle" href="javascript:;" data-toggle="dropdown"> Options<i class="fa fa-angle-down"></i></a><ul   class="dropdown-menu pull-right"><li><a data-id="'+data.id_category+'" data-ty="'+data.category+'" class="edit-items"  data-toggle="modal" data-target="#exampleModal2"><i class="fa fa-pencil"></i> Edit </a></li></ul></div></div></td></tr>');
                   $('input[name="categray"]').val(' ');
                  }
                  if(data.code == 404) {
                   $('input[name="categray"]').val(' ');
                   $("#failed").fadeIn().delay(3000).fadeOut();
                  }

                }
               });
               });
              });  
</script>


@endsection
