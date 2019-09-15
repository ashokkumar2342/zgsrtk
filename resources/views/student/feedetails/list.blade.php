 @extends('student.layout.base')
@push('links')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endpush
@section('body')
@php
  $studentFees =App\StudentFee::where('student_id',$student->id)->where('session_id',$student->session_id)->get();
@endphp
    <section class="content">
     <div class="box">       
        <div class="box-header">
        <ol class="breadcrumb text-left">         
          <li><h4>Fee Details</h4></li>
        </ol>
      </div>
      <!-- /.box-header -->
          <div class="box-body"> 
              <div class="col-md-9">
              <div class="row">
                <div class="col-md-6">
               {{--  @php
                  $totalDepFee = 0;
                 foreach ($studentFees as $studentFe):
                   $totalDepFee += $studentFe->discount+$studentFe->received_fee;
                 endforeach
                 @endphp
                 <h4> Balance : <b>{{$student->classFee->total_fee-$totalDepFee }}</b></h4>  --}}  
                  @php
                  $totalDepFee = 0;
                 foreach ($studentFees as $studentFe):
                   $totalDepFee += $studentFe->discount+$studentFe->received_fee;
                 endforeach
                 @endphp
                      <h4> Balance : <b>{{$student->totalFee-$totalDepFee }}</b></h4>                    
                </div>
              </div>             
            </div>       
          </div>
            <!-- /.box-body -->
        </div>
          <!-- /.box -->
          <!-- Trigger the modal with a button -->
         <div class="box">
            <table class="table table-striped box">
              <tr><th>Installment Fees </th><th>Discount</th><th>Receipt No</th><th>Receipt Date</th><th>Paid Fees</th>{{-- <th>Custom</th> --}}</tr>
              @php
                $totalFee=0;
              @endphp
              @foreach($studentFees as $studentFee)
              @php
                $totalFee+=$studentFee->received_fee+$studentFee->discount;
              @endphp
              <tr><td>{{ $studentFee->installment_fees }}</td><td>{{ $studentFee->discount }}</td><td>{{ $studentFee->receipt_no }}</td><td>{{ $studentFee->receipt_date }}</td><td>{{ $studentFee->received_fee }}</td>{{-- <td><a class="btn btn-warning btn-xs" href="{{ route('admin.student.fee.edit',$studentFee->id) }}"><i class="fa fa-eye"></i></a></td> --}}</tr>
              @endforeach
            </table>
         </div>

    </section>
    <!-- /.content -->
    <!-- Trigger the modal with a button -->
 
  
 
 
@endsection
@push('links')
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
@endpush
 @push('scripts')

 <script type="text/javascript" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 <script type="text/javascript">
     $(document).ready(function(){
      $( ".datepicker" ).datepicker({dateFormat:'dd-mm-yy'});
        $('#dataTable').DataTable();
    });
     var errors = '{{ $errors->first() }}';
     if (errors) {
      $("#addfee").modal('show');
     }
 </script>
 <script type="text/javascript">
  $(document).ready(function(){
    $('#showImg').on('click','a',function(){
      $('#showImg').hide();
      $('#changeImg').removeClass('hidden');
    });
    
    $('#changeImg').on('click','a',function(){
      $('#changeImg').addClass('hidden');
      $('#showImg').show();
    });
  });
</script>
@endpush