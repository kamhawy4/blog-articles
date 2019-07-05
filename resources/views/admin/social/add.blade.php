<tr id="tr-type{{$allSocial->id}}"  class="odd gradeX">
<td>
	<label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
		<input  type="checkbox"  name="check[]" class="checkboxes" value="{{$allSocial->id}}" /><span></span>
	</label>
</td>
<td>{{$allSocial->name}}</td>
<td>{{$allSocial->url}}</td>
<td>
	<div class="actions">
		<div class="btn-group">
			<a class="btn btn-sm green dropdown-toggle" href="javascript:;" data-toggle="dropdown"> Options<i class="fa fa-angle-down">
				
			</i>
		</a>
		<ul class="dropdown-menu pull-right">
			<li>
				<a data-id="{{$allSocial->id}}" data-name="{{$allSocial->name}}" data-url="{{$allSocial->url}}"  class="edit-items"  data-toggle="modal" data-target="#exampleModal2"><i class="fa fa-pencil"></i> Edit 
				</a>
			</li>
		</ul>
		</div>
	   </div>
</td>
</tr>