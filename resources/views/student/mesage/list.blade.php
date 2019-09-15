@extends('student.layout.base')
@section('body')
    <section class="content">
        <div class="box">
            <div class="box-header">
              <h3 class="box-title">Message</h3>               
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="dataTable" class="table table-bordered table-striped table-hover">
                <thead>
                <tr>           
                  {{-- <th>Id</th> --}}
                  <th>Date</th> 
                  <th>Class</th>                   

                  <th>Message</th>
                  <th width="80px">Action</th>                  
                </tr>
                </thead>
                <tbody>
                   @php
                  // $student = Auth::guard('student')->user();
                  // $class= $student->classes->name;
                  // $sec= $student->sections->name;
                  @endphp

                @foreach($mesages as $mesage)
                <tr>
                 {{-- @if ($homework->classes->name == $class && $homework->sections->name == $sec) --}}
                     

                  <td>{{ $mesage->created_at->format('d-m-Y') }}</td>
                

                  <td>{{$mesage->classes->alias }}</td>
                   

                  <td>{{ str_limit($mesage->mesage,10) }}</td>
               
                  
                  <td align="center">
                     
                    <a class="btn btn-primary btn-xs" href="{{ route('student.sms.show',$mesage->id) }}"><i class="fa fa-eye"></i></a>
                  </td>
                       

                  {{-- @endif --}}

                
                </tr>
                @endforeach
                </tbody>                 
              </table>
              <div class="col-md-12">
                {{ $mesages->links() }}
              </div>
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
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
@endpush
 @push('scripts')
 <script type="text/javascript" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
 
 @endpush

 
