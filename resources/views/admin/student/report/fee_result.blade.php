<div class="text-right" style="padding-right: 20px">
	<h4>Total  : <b> {{ $StudentFees->sum('received_fee') }}</b></h4>
</div>
<table id="fee_result_table" class="table table-bordered table-striped table-hover">
  <thead>
  <tr>               
    
    <th>Receipt No</th>
    <th>Receipt Date</th>
    <th>Name</th>
    <th>Father's Name</th>
    <th>Mother's Name</th>
    <th>Mobile No.</th>
    <th>Received Amount</th>
    <th>Action</th>
                 
  </tr>
  </thead>
  <tbody>
  @foreach($StudentFees as $StudentFee)
  <tr>
    <td>{{ $StudentFee->id }}</td>
    <td>{{ date('d-m-Y',strtotime($StudentFee->receipt_date))  }}</td>
    <td>{{ $StudentFee->student->name  or '' }}</td>
    <td>{{ $StudentFee->student->father_name  or '' }}</td>
    <td>{{ $StudentFee->student->mother_name  or '' }}</td>
    <td>{{ $StudentFee->student->mobile_one  or '' }}</td>
    <td>{{ $StudentFee->received_fee  or '' }}</td>
    <td>
    	<a class="btn btn-primary btn-xs" target="blank" title="View Student" href="{{ route('admin.student.view',$StudentFee->student_id) }}"><i class="fa fa-eye"></i></a>
    	
    	<a class="btn btn-info btn-xs" target="blank" title="View Receipt" href="{{ route('admin.student.receipt.fee',$StudentFee->id) }}"><i class="fa fa-file-o"></i></a>
    	
    </td>
    
   
  </tr>
  @endforeach
  </tbody>
   
</table>
