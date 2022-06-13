<div class="input-group w-100 clearfix state_txt d-none" id="state">
                  <label>State</label>
                  <input type="text" name="state_txt" placeholder="State" class="form-control float-right">
                </div>
<div class="input-group state_drp">
	@php($dis = '')
	
  <select {{ $dis }} name="state" id="get_city_by_state" data-getcity="{{ route('admin.pincode.ajax.get_city_by_state') }}" class="form-control">
    <option value="">Select State</option>
      @if($states)
        @foreach($states as $state)
          <?php 
          //$scl = null;
          //if((isset($_GET['state']) and $_GET['state']==$state->id) || (isset($slc_state) and $state->id==$slc_state))
            //$scl = 'selected';
          ?>
          <option value="{{ $state->id }}">{{ $state->name }}</option>
        @endforeach
      @endif
  </select>
</div>