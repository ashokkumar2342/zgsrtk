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
            <button type="hidden" hidden id="btn_show" data-table="dataTable"  onclick="callAjax(this,'{{ route('student.huda.all',3) }}','result_student')">show</button>
            <!-- /.box-header -->
            <div class="box-body" id="result_student">
              
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
<script>
  $('#btn_show').click();
</script>
@endpush