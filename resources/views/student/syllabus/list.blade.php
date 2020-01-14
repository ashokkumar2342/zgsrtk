@extends('student.layout.base')
@section('body')
    <section class="content">
        <div class="box">
            <div class="box-header">
              <h3 class="box-title">Syllabus</h3>
               
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table   class="table table-bordered table-striped table-hover">
                <thead>
                <tr>           
                  {{-- <th>Id</th> --}}
                  <th>Date</th>               
                  <th>Class</th>
                  {{-- <th>Section</th> --}}
                  <th>Title</th>
                  <th width="80px">Action</th> 
                  @php $id=1;
                  @endphp                 
                </tr>
                </thead>
                <tbody>
                @foreach($syllabuses as $syllabus)
                <tr>
                  
                  <td>{{ $syllabus->created_at->format('d-m-Y') }}</td>                  
                  <td>{{ $syllabus->classes->name or '' }}</td>
                  {{-- <td>{{ $syllabus->sections->name or '' }}</td> --}}
                  <td>{{ $syllabus->title }}</td>
                  <td align="center">
                    
                    {{-- <a class="btn btn-info btn-xs" href="{{ route('student.syllabus.show',$syllabus->id) }}"><i class="fa fa-eye"></i></a> --}}
                    {{-- <a class="btn-success btn-xs"  href="{{ route('student.syllabus.download',$syllabus->id) }}"  ><i class="fa fa-download"></i></a> --}}
                    {{-- <a class="btn btn-success btn-xs" href="/uploads/syllabus/{{$syllabus->holiday_homework }}"><i class="fa fa-download"></i></a> --}}
                     <a class="btn-success btn-xs"  href="{{ asset('uploads/holidayhomework/'.$syllabus->syllabus) }}"   target="blank"><i class="fa fa-download"></i></a>

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

 <script type="text/javascript">
 $(document).ready(function(){
        $('#dataTable').DataTable();
    });
    
</script>

 @if(Session::has('message'))
<script type="text/javascript">
    Command: toastr["{{ Session::get('class') }}"]("{{ Session::get('message') }}");
</script>
@endif

@endpush

