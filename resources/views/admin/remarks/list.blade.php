@extends('admin.layout.base')
@push('links')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endpush
@section('body')

    <section class="content">
     <div class="box">
       <table class="table">
       <tr>
         <th>Date</th>
         <th>Name</th>
         <th>Center</th>
         <th>Class</th>
         <th>Section</th>
         <th>Remarks</th>
         <th>action</th>
       </tr>
     @foreach($remarks as $remark)

       <tr>
         <td>{{ $remark->created_at->format('d-m-Y') }}</td>
         <td>{{$remark->students->name or '' }}</td>
         <td>{{ $remark->centers->name or ''}}</td>
         <td>{{ $remark->classes->name  or ''}}</td>
         <td>{{ $remark->sections->name or '' }}</td>
         <td>{{ $remark->remarks }}</td>
         <td>
            <a href="{{ route('admin.replyRemark.show',$remark->id) }}" class="btn btn-success btn-xs" >Reply</a>
            {{-- <a href="{{ route('admin.replyRemark.view',$remark->id) }}" class="btn btn-warning btn-xs" >Reply View</a> --}}
         </td>
       </tr>
      @endforeach
      <tr>
      
        <td>{{ $remarks->links() }}</td>
      </tr>
     </table> 

     </div>
       
         

    </section>
    <!-- /.content -->
     
   
@endsection
@push('links')
   <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

@endpush
 @push('scripts')

      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

 
   @if(Session::has('message'))
  <script type="text/javascript">
    Command: toastr["{{ Session::get('class') }}"]("{{ Session::get('message') }}");
  </script>
@endif
@endpush

 