  @extends('student.layout.base')
@push('links')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endpush
@section('body')

     
    <!-- /.content -->
    <section class="content">
    <div class="box">
     @foreach($replyRemarks as $replyRemark)
      <div class="row" style="padding: 4px; border: solid 1px #eee;">
        <div class="col-xs-3">{{ $replyRemark->created_at->format('d-m-Y') }}</div>
        <div class="col-xs-7">{{ $replyRemark->message }}</div>
        {{-- <div class="col-xs-2"><a href="{{ route('student.replyRemarks.delete',$replyRemark->id) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash" aria-hidden="true"></i></a></div> --}}

      </div>
      @endforeach
    </div>
      
    </section>
   
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

 