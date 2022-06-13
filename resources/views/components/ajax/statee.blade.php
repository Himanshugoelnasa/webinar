<div class="input-group w-100 clearfix statee_txt d-none" id="state">
  <label>State</label>
  <input type="text" name="state_txt" placeholder="State" class="form-control float-right">
</div>

<div class="input-group statee_drp">
	<?php 
	  $dis = "";
	  if(isset($front) && $front==true){
		$dis = 'disabled="{{ $dis }}"';
	  }
	  ?>
  <select {{ $dis }} name="state" id="get_city_by_statee" data-getcity="{{ route('admin.pincode.ajax.get_city_by_statee') }}" class="form-control" >
    <option value="">Select State</option>
      @if($states)
        @foreach($states as $state)
          @if(isset($slc_state) && $state->id==$slc_state)
               <option value="{{$state->id}}" selected="selected">{{$state->name}}</option>
            @else
               <option value="{{$state->id}}">{{$state->name}}</option>
          @endif
    @endforeach

      @endif
  </select>
</div>