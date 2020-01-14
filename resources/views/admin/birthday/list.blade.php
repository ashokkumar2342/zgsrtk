@extends('admin.layout.base')
@section('body')
    <section class="content">
        <div class="box">
           
            <!-- /.box-header -->
            <div class="box-body">
            <div class="row">
              <div class="col-md-6">
                <h4>Birthday List</h4>
              </div>
              <div class="col-md-6 text-right">
                
              </div>
            </div>
              <table id="dataTable" class="table table-bordered table-striped table-hover">
                <thead>
                <tr>           
                  <th>Sr.No</th>
                  <th>Student Name</th>
                  <th>Father's Name</th>
                  <th>Mother's Name</th>
                  <th>SMS Number</th>                
                </tr>
                </thead>
                <tbody>
                 <?php $i = 1; ?>
                @foreach($students as $student)
                <tr>
                  <td>{{ $i++ }}</td>                
                  <td>{{ $student->name }}</td>
                  <td>{{ $student->father_name }}</td>
                  <td>{{ $student->mother_name }}</td>
                  <td>{{ $student->mobile_sms }}</td>
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
<style type="text/css">
  .feeTable tbody td{
    padding:10px;
    margin:10px;
  }
</style>
 
 

