<div class="form-group clearfix editadd-pincodeFielded" id="get_address_by_pincodee">
	<?php 
	  $dis = "";
	  if(isset($front) && $front==true){		
		echo '<label>Pin/ Zip Code</label>';
	  }
	  ?>
	<input type="text" class="form-control" name="pincode" id="pincodee" value="<?php if(isset($_GET['pincode'])) {echo $_GET['pincode'];} else { echo $pincode; } ?>" data-getaddress="{{ route('admin.pincode.ajax.get_address_by_pincodee') }}">
</div>