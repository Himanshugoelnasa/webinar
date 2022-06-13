<div class="admin-pagination">	
	<div class="box-footer">
		<div class="row">
			<div class="col-sm-7 text-left"> {{ isset($data)?$data->links('vendor.pagination.bootstrap-4'):null }} </div>
			<div class="com-sm-2">
				@if(isset($export))
					<form action="{{ $export }}">
						<input type="hidden" name="export_data" value="1">
						@if(isset($international_orders))
						<input type="hidden" name="international_orders" value="{{ $international_orders }}">
						@endif
						@if(isset($OrderStatuses))
						@foreach($OrderStatuses as $OrderStatus)
						<input type="hidden" name="all[]" value="{{ $OrderStatus->id }}">
						@endforeach
						@endif
						{{-- export sheet --}}
						<?php 
				           	$fullUrl=Request::fullUrl();
				           	$getEXtUrl=Request::url();
				            $get_string= str_replace($getEXtUrl,"",$fullUrl);
				            $get_string=str_replace("?","",$get_string);
				            parse_str($get_string, $get_array);

				        ?>
				        <?php  
				        
				           foreach($get_array as $keyVal=>$arrVal){
				          ?>
				          <input type="hidden" name="{{ $keyVal }}" value="{{ $arrVal}}">
				          <?php  } ?>
						<button type="submit" class="btn btn-primary">
							<i class="fa fa-download"></i> Export to Excel
						</button>
					</form>
				@endif
			</div>
			
			@if(isset($data))
			<div class="col-sm-3 text-right"> <small>Showing {{ $data->firstItem() }} to {{ $data->lastItem() }} of {{ $data->total() }}
				@if($data->lastPage()>1)
			({{ $data->lastPage() }} Pages)
		</small>
			</div>
			@endif
			@endif
		</div>
	</div>
	<!-- /.box-footer-->
</div>