<div class="input-group">
	  <?php 
		$countries = \App\Models\Country::orderBy('name')->get();
	  	$fetch_state = route('admin.pincode.ajax.get_state_by_country');
	  ?>
	<select name="country" id="get_state_by_country" data-getstate="{{ $fetch_state }}" class="form-control">
		<option value="">Select Country</option>
		<option value="101">India</option>
		  @foreach($countries as $country)
		    <option value="{{ $country->id }}">{{ $country->name }}</option>
		  @endforeach
	</select>
</div>