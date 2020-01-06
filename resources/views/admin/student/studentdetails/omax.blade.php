@extends('admin.layout.base')
@section('body')

    <section class="content">
        <div class="box">
            <div class="box-header">
              <h3 class="box-title text-left">OMAXE Student List</h3>

                
              <ol class="breadcrumb text-right">

              <li><span ><a href="{{ route('admin.student.form') }}" class="btn btn-info btn-sm" >Add Student</a></span></li>
              
                <li><span ><a href="{{ route('admin.student.excel') }}" class="btn btn-warning btn-sm" >Export</a></span></li>
            
            </div>
             

            <!-- /.box-header -->
            <div class="box-body">
              <table id="dataTable" class="table table-bordered table-striped table-hover">
                <thead>
                <tr>               
                 <th>SID</th>
                  <th>Password</th> 
                  <th>Session</th>

                  <th>Class</th>
                  <th>Section</th>
                  <th>Name</th>

                  <th>Father Name</th>   
                   <th>Mother's Name</th>
                  <th>Mobile SMS</th>
                  <th>Address</th>

                  <th>Total Fees</th>
                  <th>Balance Fees</th>
                  <th width="80px">Action</th>                  
                </tr>
                </thead>
                <tbody>
                @foreach($students as $student)
                 
                
                <tr>
                 <td>{{ $student->username }}</td>
                  <td>{{ $student->tmp_pass }}</td>                   
                  <td>{{ $student->sessions->date or '' }}</td>
                  <td>{{ $student->classes->name or '' }}</td>
                  <td>{{ $student->sections->name or '' }}</td>
                  <td>{{ $student->name }}</td>
                  <td>{{ $student->father_name }}</td>
                  <td>{{ $student->mother_name }}</td>
                  <td>{{ $student->mobile_sms }}</td>
                   <td>{{ $student->address}}</td>

                  <td>{{ $student->totalFee }}</td>
                    <td>{{ $student->totalFee - (App\StudentFee::where('student_id',$student->id)->where('session_id',$student->session_id)->sum('discount') + App\StudentFee::where('student_id',$student->id)->where('session_id',$student->session_id)->sum('received_fee'))}}</td>
                  <td align="center">
             <a class="btn btn-primary btn-xs" title="View Student" href="{{ route('admin.student.view',$student->id) }}"><i class="fa fa-eye"></i></a>
                    <a class="btn btn-warning btn-xs" title="Edit Student" href="{{ route('admin.student.edit',$student->id) }}"><i class="fa fa-pencil"></i></a>
                    <a onclick="return confirm('Are you sure to reset this student password.')" class="btn btn-danger btn-xs" title="Password Reset" href="{{ route('admin.student.passwordreset',$student->id) }}"><i class="fa fa-key"></i></a>
                    
                  </td>
                 
                </tr>                 
                @endforeach
                </tbody>
                 
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- Trigger the modal with a button -->



    </section>
    <!-- /.content -->
@endsection
@push('links')
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css">
@endpush
 @push('scripts')
  
 <script type="text/javascript" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
 <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
  <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
  <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
 
  <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
  <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
 <script type="text/javascript">
      $(document).ready(function() {
          $('#dataTable').DataTable( {
             dom: 'Bfrtip',
             buttons: [
                   'excel',  
             ]
         } );
     } );
     
 </script>
@endpush