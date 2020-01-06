<div class="text-right" style="padding-right: 20px">
	<h4>Total  : <b> {{ $OnlinePaymentHistorys->sum('amount') }}</b></h4>
</div>
<table id="fee_result_table" class="table table-bordered table-striped table-hover">
  <thead>
  <tr>               
    
    <th>Tracking No</th>
    <th> Date</th>
    <th>Name</th>
    <th>Class</th>
    <th>Section</th>
    <th>Father's Name</th>
    <th>Mother's Name</th>
    <th>Mobile No.</th> 
     
    <th> Amount</th>
    <th>status</th>
                 
  </tr>
  </thead>
  <tbody>
  @foreach($OnlinePaymentHistorys as $OnlinePaymentHistory)
  
    <tr>
      <td>{{ $OnlinePaymentHistory->tracking_id}}</td>
      <td class="text-nowrap">{{ date('d-m-Y',strtotime($OnlinePaymentHistory->trans_date))  }}</td>
      <td>{{ $OnlinePaymentHistory->student->name  or '' }}</td>
      <td>{{ $OnlinePaymentHistory->student->classes->name  or '' }}</td>
      <td>{{ $OnlinePaymentHistory->student->sections->name  or '' }}</td>
      <td>{{ $OnlinePaymentHistory->student->father_name  or '' }}</td>
      <td>{{ $OnlinePaymentHistory->student->mother_name  or '' }}</td>
      <td>{{ $OnlinePaymentHistory->student->mobile_one  or '' }}</td>
     
      <td>{{ $OnlinePaymentHistory->amount   }}</td>
      <td>{{ $OnlinePaymentHistory->order_status   }}</td>
      
    </tr>
 
 
  @endforeach
  </tbody>
   
</table>
