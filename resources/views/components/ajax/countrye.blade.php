<div class="input-group">
	<?php
	$dis = "";
	if(isset($front) && $front==true){
		$countries = \App\Country::join('international_courier_rates','countries.id','international_courier_rates.country_id')
      ->orderBy('countries.name')
                  ->get();
		$dis = 'disabled="{{ $dis }}"';

	}
		$abc = isset($slc_country)?$slc_country:null;
		if(CustomCartHelper::isSameDayDelivery()==true)
      {
        $countries = \App\Country::join('international_courier_rates','countries.id','international_courier_rates.country_id')
      ->where('countries.id',1011)->orderBy('countries.name')
                  ->get();
      }
	?>
	<select {{ $dis }} name="country" id="get_state_by_countrye" data-getstate="{{ route('ajax.get_state_by_countrye') }}" class="form-control" >
		<option value="">Select Country </option>
		<option {{ $abc==101?'selected':null }} value="101" >India</option>
		@foreach($countries as $country)
		<option {{ $abc==$country->country_id?'selected':null }} value="{{$country->country_id}}">{{$country->name}}</option>
		@endforeach
	</select>
</div>