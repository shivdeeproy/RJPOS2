<table style="width:100%">

	<thead>
		<tr><td>

		@if(empty($receipt_details->letter_head))
		<!-- Logo -->
		@if(!empty($receipt_details->logo))
			<img style="width: 80%;" src="{{$receipt_details->logo}}" class="img img-responsive center-block">
		@endif

		@else
		<div class="col-xs-12 text-center">
			<img style="width: 100%;margin-bottom: 10px;" src="{{$receipt_details->letter_head}}">
		</div>
	@endif

	</td><td><img class="center-block mt-5" style="height:180px;width:300px;" src="{{asset('img/social_qrcode.jpeg')}}"></td>

</tr>

<tr><td colspan="3">

		<!-- Header text -->
		@if(!empty($receipt_details->header_text))
			<div class="col-xs-12 text-center">
				{!! $receipt_details->header_text !!}
			</div>
		@endif

	</td>
</tr>

		<!-- business information here -->
		
	
		
	</thead>

	<tbody>
		

	</tbody>

</table>