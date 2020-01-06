@extends('admin.layout.base')
@section('body')
@push('links') 
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <style type="text/css">
      .radio label {
    padding-right: 20px;
}
  </style>
  <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css">
@endpush

<section class="content-header">
    <h1> Student  <small>Details</small> </h1>
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
                        {{ Form::open(['route'=>'admin.student.show.search','files'=>true ,'id'=>'promote-form', 'class'=>'add_form', 'success-content-id'=>'searchResult', 'data-table-without-pagination'=>'dataTable','no-reset'=>'true'])  }}
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
                                             <div class="col-lg-3">                         
                                                <div class="form-group">
                                                    {{ Form::label('session','Session',['class'=>' control-label']) }}                         
                                                    {!! Form::select('session',$sessions, null, ['class'=>'form-control','placeholder'=>'choose Session','required']) !!}
                                                    <p class="text-danger">{{ $errors->first('session') }}</p>
                                                </div>
                                            </div>
                                             <div class="col-lg-3">                         
                                                <div class="form-group">
                                                    {{ Form::label('class','Class',['class'=>' control-label']) }}
                                                    {!! Form::select('class',[], null, ['class'=>'form-control','placeholder'=>'Select Class','required']) !!}
                                                    <p class="text-danger">{{ $errors->first('session') }}</p>
                                                </div>
                                            </div>
                                                <div class="col-lg-3">                         
                                                <div class="form-group">
                                                    {{ Form::label('section','Section',['class'=>' control-label']) }}
                                                    {!! Form::select('section',[]
                                                    , null, ['class'=>'form-control','placeholder'=>'Select Section','required']) !!}
                                                    
                                                </div>
                                            </div>
                                                <div class="col-lg-3">                         
                                                <div class="form-group">
                                                  <br>
                                                     <input type="submit" value="Show" class="btn btn-success">
                                                    
                                                </div>
                                            </div>
                                               
                                        </div>
                                    </div>
                                </div>
                             </div> {{--row end --}}                     
                            
                        {{ Form::close() }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12" id="searchResult">
                        
                            
              

                    </div>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
@endsection

 @push('scripts')
 <script type="text/javascript" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
   <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
   
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script> 
 <script src="{{ asset('admin_asset/plugins/input-mask/jquery.inputmask.js')}}"></script>
<script src="{{ asset('admin_asset/plugins/input-mask/jquery.inputmask.date.extensions.js')}}"></script>
 <script type="text/javascript">
    $('[data-mask]').inputmask();
    $("#session").change(function(){
        $('#class').html('<option value="">Searching ...</option>');
        $.ajax({
          method: "get",
          url: "{{ route('admin.class.search2') }}",
          data: { id: $(this).val(),center_id: $('input[name="center"]:checked').val() }
        })
        .done(function( response ) {            
            if(response.length>0){
                $('#class').html('<option value="">Select Class</option>');
                for (var i = 0; i < response.length; i++) {
                    $('#class').append('<option value="'+response[i].id+'">'+response[i].alias+'</option>');
                } 
            }
            else{
                $('#class').html('<option value="">Not found</option>');
            }
            
        });
    });
    $("#class").change(function(){
        $('#section').html('<option value="">Searching ...</option>');                
        $.ajax({
          method: "get",
          url: "{{ route('admin.section.search') }}",
          data: { id: $(this).val(), session: $('#session').val(),center_id: $('input[name="center"]:checked').val() }
        })
        .done(function( response ) {
             
            if(response.section.length>0){
               $('#section').html('<option value="">Select Section</option>');
                for (var i = 0; i < response.section.length; i++) {
                    $('#section').append('<option value="'+response.section[i].id+'">'+response.section[i].name+'</option>');
                } 
            }
            else{
                $('#section').html('<option value="">Not found</option>');
            }
            
        });
    });
       $("#session_id").change(function(){
        $('#class_id').html('<option value="">Searching ...</option>');
        $.ajax({
          method: "get",
          url: "{{ route('admin.class.search2') }}",
          data: { id: $(this).val(),center_id: $('input[name="center"]:checked').val() }
        })
        .done(function( response ) {            
            if(response.length>0){
                $('#class_id').html('<option value="">Select Class</option>');
                for (var i = 0; i < response.length; i++) {
                    $('#class_id').append('<option value="'+response[i].id+'">'+response[i].alias+'</option>');
                } 
            }
            else{
                $('#class').html('<option value="">Not found</option>');
            }
            
        });
    });
    $("#class_id").change(function(){
        
   $('#section_id').html('<option value="">Searching ...</option>');                
        $.ajax({
          method: "get",
          url: "{{ route('admin.section.search') }}",
          data: { id: $(this).val(), session: $('#session_id').val(),center_id: $('input[name="center"]:checked').val() }
        })
        .done(function( response ) {
             
            if(response.section.length>0){
               $('#section_id').html('<option value="">Select Section</option>');
                for (var i = 0; i < response.section.length; i++) {
                    $('#section_id').append('<option value="'+response.section[i].id+'">'+response.section[i].name+'</option>');
                } 
            }
            else{
                $('#section_id').html('<option value="">Not found</option>');
            }
            
        });
    });
</script>
<script>
  $( function() {
    $( "#datepicker" ).datepicker({dateFormat:'dd-mm-yy'});
    $( "#datepicker2" ).datepicker({dateFormat:'dd-mm-yy'});
    $('button').click(function(){
      $('#searchResult input:radio:checked').filter(':checked').click(function () {
        $(this).prop('checked', false);
      });
      $('.'+$(this).attr('data-click')).prop('checked', true);
    });
  });
  </script>
  <script type="text/javascript">
     
         
 
 
  </script>
  <script type="text/javascript">
        $('.checked_all').on('change', function() {     
                $('.checkbox').prop('checked', $(this).prop("checked"));              
        });
        //deselect "checked all", if one of the listed checkbox product is unchecked amd select "checked all" if all of the listed checkbox product is checked
        $('.checkbox').change(function(){ //".checkbox" change 
            if($('.checkbox:checked').length == $('.checkbox').length){
                   $('.checked_all').prop('checked',true);
            }else{
                   $('.checked_all').prop('checked',false);
            }
        });       
</script>

@endpush