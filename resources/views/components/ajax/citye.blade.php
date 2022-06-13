<div class="input-group w-100 clearfix citye_txt d-none" id="city">
  <label>City</label>
  <input type="text" name="city_txt" class="form-control float-right">
</div>
<div class="input-group citye_drp">
	<?php 
	  $dis = "";
	  if(isset($front) && $front==true){
		$dis = 'disabled="{{ $dis }}"';
	  }
	  ?>
  <select {{ $dis }}  name="city" id="citye" class="form-control">
    <option value="">Select City</option>
      @if($cities)
        @foreach($cities as $city)
          @if($city->id==$slc_city)
               <option value="{{$city->id}}" selected="selected">{{$city->name}}</option>
          @else
               <option value="{{$city->id}}">{{$city->name}}</option>
          @endif
        @endforeach
      @endif
  </select>
</div>