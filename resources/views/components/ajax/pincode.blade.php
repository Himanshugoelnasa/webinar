<div class="form-group clearfix" id="get_address_by_pincode">
	<input type="text" class="form-control" name="pincode" value="<?php if(isset($_GET['pincode'])) echo $_GET['pincode']; ?>" data-getaddress="{{ route('admin.pincode.ajax.get_address_by_pincode') }}">
</div>