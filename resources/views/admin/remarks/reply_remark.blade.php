  @extends('admin.layout.base')
@push('links')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endpush
@section('body')

    <section class="content">
     <div class="box">       
        <div class="box-header">
        {{-- <ol class="breadcrumb text-left">         
          <li><h4>Remarks </h4></li>
        </ol> --}}
        <form class="form-horizontal" action="{{ route('admin.replyRemark.post',$remark->id) }}" method="post"  >
        {{ csrf_field() }}
          <fieldset>
            <!-- Name input-->
             
            <!-- Message body -->
            <div class="form-group">
              <label class="col-md-2 control-label" for="message"> Reply Message</label>
              <div class="col-md-10">
                <textarea class="form-control" name="message" placeholder="Please enter your message here..." rows="3" required></textarea>
                <p class="bg-danger">{{ $errors->first('message') }}</p>
              </div>
            </div>
    
            <!-- Form actions -->
            <div class="form-group">
              <div class="col-md-12 text-right">
                <button type="submit" class="btn btn-primary btn-md">Submit</button>
              </div>
            </div>
          </fieldset>
         </form>

      </div>
       
         

    </section>
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

 