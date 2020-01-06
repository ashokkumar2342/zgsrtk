@extends('admin.layout.base')
@section('body')

    <section class="content">
        <div class="box">
            <div class="box-header">
              <h3 class="box-title">Class List</h3>
              <span style="float: right"><a href="{{ route('admin.student.form') }}" class="btn btn-info btn-sm" >Add Student</a></span>


            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="dataTable" class="table table-bordered table-striped table-hover">
                <thead>
                <tr>               
                  <th>SID</th>
                  <th>Class</th>
                  <th>Section</th>
                  <th>Name</th>
                  <th>Father Name</th>    
                  <th>Balance Fees</th>
                  <th width="80px">Action</th>                  
                </tr>
                </thead>
                <tbody>
                @foreach($students as $student)
                <tr>
                  <td>{{ $student->username }}</td>
                  <td>{{ $student->classes->alias }}</td>
                  <td>{{ $student->sections->name }}</td>
                  <td>{{ $student->name }}</td>
                  <td>{{ $student->father_name }}</td>
                  <td>{{ $student->totalFee }}</td>
                  <td align="center">
                    <a class="btn btn-primary btn-xs" href="{{ route('admin.student.view',$student->id) }}"><i class="fa fa-eye"></i></a>
                    <a class="btn btn-warning btn-xs" href="{{ route('admin.student.edit',$student->id) }}"><i class="fa fa-pencil"></i></a>
                    
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