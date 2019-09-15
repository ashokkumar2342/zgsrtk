@extends('admin.layout.base')
@section('body')
@push('links') 
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <style type="text/css">
      .radio label {
    padding-right: 20px;
}
  </style>
@endpush
<section class="content-header">
<h1>  Single SMS  </h1>
    <ol class="breadcrumb">
     <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>        
     </ol>
      </section>
          <section class="content">
              <div class="box">    
                <div class="container">
                  <div class="row">
                    <form class="form-group col-md-11 " action="{{ route('admin.sms.post') }}" method="post" id="theform">
                    {{ csrf_field() }}
                      <div class="form-group col-md-12">
                        <label   for="text">Mobile Number</label>
                        <textarea class="form-control" rows="2" name="mobile" id="txtboxToFilter" placeholder="Enter number" required=""></textarea>
                        <p class="text-danger">{{ $errors->first('mobile') }}</p>
                      </div>                         
                      <div class="form-group col-md-12">
                        <label for="comment">Message:</label>
                        <textarea class="form-control" rows="5" name="message" id="textarea" placeholder="Enter message" required=""></textarea>
                        <p class="text-danger">{{ $errors->first('message') }}</p>
                       <span id="textarea_feedback">160 characters remaining<span> 
                      </div>                
                        {{-- <button type="submit" class="btn btn-success" id="btnsubmit">Submit</button> --}}
                        <input type="submit"  value="send" id="btnsubmit">
                      </form>                      
                  </div>
                </div>
              </div>
              <!-- /.box -->
          </section>
    <!-- /.content -->
    
@endsection
 @push('scripts')

 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 
  <script type="text/javascript">
$(function()
{
  $('#theform').submit(function(){
    $("input[type='submit']", this)
      .val("Please Wait...")
      .attr('disabled', 'disabled');
    return true;
  });
});
</script>
 
  
   @if(Session::has('message'))
<script type="text/javascript">
    Command: toastr["{{ Session::get('class') }}"]("{{ Session::get('message') }}");
</script>
@endif
<script type="text/javascript">
    $(document).ready(function() {
    var text_max = 0;
    $('#textarea_feedback').html(text_max + ' characters ');

    $('#textarea').keyup(function() {
        var text_length = $('#textarea').val().length; 

        $('#textarea_feedback').html(text_length + ' characters');
    });
}); 
</script>


@endpush