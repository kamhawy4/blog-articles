<tr id="tr-type{{$update->id}}" class="odd gradeX">
<td>
	<label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
		<input  type="checkbox"  name="check[]" class="checkboxes" value="{{$update->id}}" />
		<span></span>
	</label>
</td>
<td>{{$update->translation('en')->first()->name}}</td>
<td>{{$update->translation('ar')->first()->name}}</td>
<td>
   <div class="actions">
	  <div class="btn-group">
		  <a class="btn btn-sm green dropdown-toggle" href="javascript:;" data-toggle="dropdown"> Options 
			<i class="fa fa-angle-down"></i>
		  </a>
		  <ul class="dropdown-menu pull-right">
		  	<li>
			  	<a data-id="{{$update->id}}" data-en='{{$update->translation('en')->first()->name}}' data-ar='{{$update->translation('ar')->first()->name}}' class="edit-items"  data-toggle="modal" data-target="#exampleModal2">
			  		<i class="fa fa-pencil"></i> Edit 
			  	</a>
		  	</li>
		  </ul>
		</div>
	</div>
</td>
</tr>