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
<h1>  Custumized SMS  </h1>
    <ol class="breadcrumb">
     <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>        
     </ol>
</section>
    <section class="content">
        <div class="box">    
        {{ $errors->first() }}         
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-lg-12 ">
                        {{ Form::open(['route'=>'admin.sms.allsms.post',]) }}                     
                        {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-8 col-md-offset-2">
                                    <div class="form-group">
                                        @php
                                            $n = 12/count($centers);
                                        @endphp
                                        @foreach($centers as $center)
                                            <div class="col-lg-{{ $n }}">
                                                <div class="radio-custom radio-danger">
                                                    {!! Form::radio('center', $center->id, '', ['id'=>'center'.$center->id,'required']) !!}
                                                    {!! Form::label('center'.$center->id, $center->name, ['class'=>'control-label','style'=>'cursor:pointer']) !!}
                                                </div>
                                            </div>
                                        @endforeach
                                        <p class="text-danger">{{ $errors->first('center') }}</p>
                                    </div>
                                </div>
                            </div>                    
                            <hr>
                             <div class="row">{{--row start --}}
                                <div class="col-md-12 ">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                             <div class="col-lg-4 ">                         
                                                <div class="form-group">
                                                    {{ Form::label('session','Session',['class'=>' control-label']) }}                         
                                                    {!! Form::select('session',$sessions, '', ['class'=>'form-control','placeholder'=>'choose Session','required']) !!}
                                                    <p class="text-danger">{{ $errors->first('session') }}</p>
                                                </div>
                                            </div>
                                             <div class="col-lg-4 col-lg-offset-2">                         
                                                <div class="form-group">
                                                    {{ Form::label('All Student','All Student',['class'=>' control-label']) }}
                                                    {!! Form::text('class', '', ['class'=>'form-control','placeholder'=>'All Student', 'readonly']) !!}
                                                    {{-- <p class="text-danger">{{ $errors->first('session') }}</p> --}}
                                                </div>
                                            </div>
                                                                                      
                                        </div>
                                    </div>
                                </div>
                            </div><hr>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">                     
                    <div class="row">{{--row start --}}
                      <div class="col-md-12 ">
                          <div class="form-group">
                              <div class="col-md-12">
                                   <div class="col-lg-12">                         
                                      <div class="form-group">
                                          {{ Form::label('message','Message',['class'=>'control-label']) }}
                                           {{ Form::textarea('message', '',['class'=>'form-control','rows'=>7  ,'style'=>'resize:none','required']) }}
                                           <p class="text-danger">{{ $errors->first('message') }}</p>
                                      </div>
                                  </div>
                                    
                                 </div>
                            </div>
                        </div>
                    </div>                                         
                 <div class="row">                              
                  <div class="col-md-12 text-center">                    
                   <button class="btn btn-success ">Send Message</button>
                  </div>
                 </div> 
                    {{ Form::close() }}

                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
    
@endsection
 @push('scripts')

 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 <script type="text/javascript">
    $("#session").change(function(){
        
         
         
    });
    $("#class").change(function(){
        $('#section').html('<option value="">Searching ...</option>'); 
        $('#totalFee').html('');       
        $.ajax({
          method: "get",
          url: "{{ route('admin.section.search') }}",
          data: { id: $(this).val(), session: $('#session').val(),center_id: $('input[name="center"]:checked').val() }
        })
        .done(function( response ) {
            $('#totalFee').val(response.fee);
            if(response.section.length>0){
               $('#section').html('<option value="">Select Section</option>');
                for (var i = 0; i < response.section.length; i++) {
                    $('#section').append('<option value="'+response.section[i].id+'">'+response.section[i].name+'</option>');               } 
            }
            else{
                $('#section').html('<option value="">Not found</option>');
            }           
        });
    });
    $("#search").submit(function(e){
        e.preventDefault();
        $('#searchResult').html('Searching ...');
        $.ajax({
          method: "post",
          url: "{{ route('admin.sms.student.search') }}",
          data: $(this).serialize(),
        })
        .done(function( response ) {            
            if(response.length>0){
                $('#searchResult').html('');
                for (var i = 0; i < response.length; i++) {
                  $('#searchResult').append(response[i]);
                  
                } 
            }
            else{
                $('#searchResult').html('<tr><td colspan="7"><h4 class="text-danger text-center">Record not found</h4></td></tr>');
            }
            
        }).error(function(){
          $('#searchResult').html('<tr><td colspan="7"><h4 class="text-danger text-center">Record not found</h4></td></tr>');
        });
    });
 
</script>
  
 <script>
  $( function() {
    $( "#datepicker" ).datepicker({dateFormat:'dd-mm-yy'});
    $('button').click(function(){

      $('#searchResult input:radio:checked').filter(':checked').click(function () {
        $(this).prop('checked', false);
      });
      $('.'+$(this).attr('data-click')).prop('checked', true);
    });
  });
  </script>
  
   @if(Session::has('message'))
<script type="text/javascript">
    Command: toastr["{{ Session::get('class') }}"]("{{ Session::get('message') }}");
</script>
@endif

@endpush