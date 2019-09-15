@extends('admin.layout.base')
@section('body')

    <section class="content">
        <div class="box">
            <div class="box-header">
                
              <h3 class="box-title">Student List</h3>
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
                  <th>Class</th>
                  <th>Section</th>
                  <th>Name</th>
                  <th>Father Name</th>    
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
                  <td>{{ $student->classes->alias or '' }}</td>
                  <td>{{ $student->sections->name or '' }}</td>
                  <td>{{ $student->name }}</td>
                  <td>{{ $student->father_name }}</td>
                  <td>{{ $student->totalFee }}</td>
                  <td>{{ $student->totalFee - (App\StudentFee::where('student_id',$student->id)->sum('discount') + App\StudentFee::where('student_id',$student->id)->sum('received_fee'))}}</td>
                  <td align="center">
                   <a class="btn btn-primary btn-xs" title="View Student" href="{{ route('admin.student.view',$student->id) }}"><i class="fa fa-eye"></i></a>
                    <a class="btn btn-warning btn-xs" title="Edit Student" href="{{ route('admin.student.edit',$student->id) }}"><i class="fa fa-pencil"></i></a>
                    {{-- <a onclick="return confirm('Are you sure to reset this student password.')" class="btn btn-danger btn-xs" title="Password Reset" href="{{ route('admin.student.passwordreset',$student->id) }}"><i class="fa fa-key"></i></a> --}}                    
                    @if (Auth::guard('admin')->user()->id == 1)
                    <a onclick="return confirm('Are you sure to delete Student.')" class="btn btn-danger btn-xs" title="delete student" href="{{ route('admin.student.delete',$student->id) }}"><i class="fa fa-times"></i></a> 
                    @endif
                    
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
@endpush
 @push('scripts')
 <script type="text/javascript" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
 <script type="text/javascript">
     $(document).ready(function(){
        $('#dataTable').DataTable();
    });
     
 </script>
@endpush