<style type="text/css">
	
	@media print {

		


	}
</style>

<table style="width:100%">

	<thead>
		<tr><td>

		@if(empty($receipt_details->letter_head))
		<!-- Logo -->
		@if(!empty($receipt_details->logo))
			<img style="width: 100%;height: 180px" src="{{$receipt_details->logo}}" class="img img-responsive center-block">
		@endif

		@else
		<div class="col-xs-12 text-center">
			<img style="width: 100%;margin-bottom: 10px;" src="{{$receipt_details->letter_head}}">
		</div>
	@endif

	</td><td><img class="center-block mt-5" style="height:180px;width:100%;" src="{{asset('img/social_qrcode.jpeg')}}"></td>

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

<tr style="margin:0 20px;">

	<td colspan="3" style="text-align: center;text-decoration: underline;font-size:large;font-weight: bold;">TAX INVOICE</td>

</tr>

<tr style="border:1px solid;">
	<td colspan="3">
    <table class="table-invoice-detail">
    	<tbody>
    		<tr>
    			<td>Invoice:</td>
    			<td>Date:</td>
    		</tr>
    		<tr>
    			<td>Name:</td>
    			<td></td>
    		</tr>
    		<tr>
    			<td>Mob No..</td>
    			<td>GSTIN:
    	</tbody>
    </table>
	</td>
</tr>

		<!-- business information here -->
		
	
		
	</thead>

	<tbody>
		

	</tbody>

</table>