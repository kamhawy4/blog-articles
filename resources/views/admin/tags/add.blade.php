<tr id="tr-type{{$allTags->id}}"  class="odd gradeX">
<td>
	<label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
		<input  type="checkbox"  name="check[]" class="checkboxes" value="{{$allTags->id}}" /><span></span>
	</label>
<td>{{$allTags->translation('en')->first()->name}}</td>
<td>
	<div class="actions">
		<div class="btn-group">
			<a class="btn btn-sm green dropdown-toggle" href="javascript:;" data-toggle="dropdown"> Options<i class="fa fa-angle-down">
				
			</i>
		</a>
		<ul class="dropdown-menu pull-right">
			<li>				
				<a data-id="{{$allTags->id}}" data-ty="{{$allTags->translation('en')->first()->name}}" class="edit-items"  data-toggle="modal" data-target="#exampleModal2"><i class="fa fa-pencil"></i> Edit 
				</a>
			</li>
		</ul>
		</div>
	   </div>
</td>
</tr>