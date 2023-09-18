<style type="text/css">
	
	@media print {
 .table-invoice-detail
 {
 	width: 100%;
		
}

   .table-invoice-detail > tbody > tr > td 
   {
   	padding:10px;
   }

    .table-invoice-detail > tbody > tr > td > span
   {
   	display: inline-block;
   	width:60%;
   	text-align: left;
   }

   .table-invoice-detail > tbody > tr > td > b
   {
   	display: inline-block;
   	width:40%;
   	text-align: left;
   }

   .table-rows >thead >tr >td
   {
   	border: 1px solid;
   	text-align: center;
   }

    .table-rows >tbody >tr >td
   {
   	border: 1px solid;
   	text-align: center;
   }

   .table-rows > thead > tr
   {
   	 font-weight: bold;
   }


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
    			<td style=""><b>Invoice:</b><span>{{$receipt_details->invoice_no}}</span></td>
    			<td class="" style="text-align:right;"><b>Date:</b><span>{{$receipt_details->invoice_date}}</span></td>
    		</tr>
    		<tr>
    			<td><b>Name:</b><span>{{$receipt_details->customer_name}}</span></td>
    			<td></td>
    		</tr>
    		<tr>
    			<td><b>Mob No..<b><span>{{$receipt_details->customer_mobile}}</span></td>
    			<td style="text-align:right"><b>GSTIN:</b><span>{{$receipt_details->tax_info1}}</span></td>

    	</tbody>
    </table>
	</td>
</tr>


<tr>
	<td colspan="3">
		<table class="table-rows" style="width:100%">

			<thead>
				<tr>

					<td>#</td>
					<td>SKU</td>
					<td>Description</td>
					<td>HSN</td>
					<td>Qty</td>
					<td>MRP</td>
					<td>Disc</td>
					<td>Rate</td>
					<td>GST</td>
					<td>Amount</td>

				</tr>
			</thead>

			<tbody>

				@php

				$totalAmount=0;

				$totalAmountMRP=0;

				@endphp
				@foreach($receipt_details->lines as $lindex => $line)
				@php 

				$totalAmount=$totalAmount+($line['unit_price_inc_tax_uf']*$line['quantity']);

				$totalAmountMRP=$totalAmountMRP+($line['mrp_inc_tax']*$line['quantity']);

				@endphp
				<tr>
					<td>{{$lindex+1}}</td>
					<td>{{$line['sub_sku']??''}}</td>
					<td>{{$line['name']??''}}</td>
					<td>{{($line['hsn'])?$line['hsn']:'NA'}}</td>
					<td>{{$line['quantity']}}</td>
					<td>{{$line['mrp_inc_tax']??''}}</td>
					<td>{{$line['mrp_inc_tax']-$line['unit_price_inc_tax_uf']}}</td>
					<td>{{$line['unit_price_inc_tax_uf']??''}}</td>
					<td>{{$line['tax_percent']??''}}%</td>
					<td>{{$line['unit_price_inc_tax_uf']*$line['quantity']}}</td>

				</tr>
				@endforeach

				<tr>
					<td colspan="7" style="text-align:right;">Discount %: <span>{{round(($totalAmountMRP-$totalAmount)/$totalAmountMRP*100,2)}}</span></td>
					<td colspan="2">Amount</td>
					<td>₹{{$totalAmount}}</td>

				</tr>
			</tbody>

		</table>
	</td>
	</tr>

		<!-- business information here -->
		
	
		
	</thead>

	<tbody>
		

	</tbody>

</table>