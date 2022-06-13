<div class="input-group w-100 clearfix city_txt d-none" id="city">
  <label>City</label>
  <input type="text" name="city_txt" placeholder="City" class="form-control float-right">
</div>
<div class="input-group city_drp">
  @php($dis = '')
	
  <select name="city" id="city" class="form-control">
    <option value="">Select City</option>
      @if($cities)
        @foreach($cities as $city)
        <?php 
        $slc = null;
        if((isset($_GET['city']) and $_GET['city']==$city->id) || isset($slc_city) and $city->id==$slc_city)
        {
          $slc = 'selected';
        }
        ?>
          <option {{ $slc }} value="{{ $city->id }}">{{ $city->name }}</option>
        @endforeach
      @endif
  </select>
</div>