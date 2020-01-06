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
                        {{ Form::open(['route'=>'admin.student.post','files'=>true ,'id'=>'promote-form'])  }}
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
                                             <div class="col-lg-4">                         
                                                <div class="form-group">
                                                    {{ Form::label('session','Session',['class'=>' control-label']) }}                         
                                                    {!! Form::select('session',$sessions, null, ['class'=>'form-control','placeholder'=>'choose Session','required']) !!}
                                                    <p class="text-danger">{{ $errors->first('session') }}</p>
                                                </div>
                                            </div>
                                             <div class="col-lg-4">                         
                                                <div class="form-group">
                                                    {{ Form::label('class','Class',['class'=>' control-label']) }}
                                                    {!! Form::select('class',[], null, ['class'=>'form-control','placeholder'=>'Select Class','required']) !!}
                                                    <p class="text-danger">{{ $errors->first('session') }}</p>
                                                </div>
                                            </div>
                                                <div class="col-lg-4">                         
                                                <div class="form-group">
                                                    {{ Form::label('section','Section',['class'=>' control-label']) }}
                                                    {!! Form::select('section',[]
                                                    , null, ['class'=>'form-control','placeholder'=>'Select Section','required']) !!}
                                                    <p class="text-danger">{{ $errors->first('session') }}</p>
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
                    <div class="col-md-12">
                           <form id="savePromote" action="javascript:;">
                           {{ csrf_field() }}
                             <table class="table table-bordered">
                                <thead>                                
                                <tr>
                                    <th style="width: 10px"><input  class="checked_all" type="checkbox"> All</th>
                                    <th>Student Name</th> 
                                    <th>Father Name</th> 
                                </tr>
                                </thead>
                                <tbody id="searchResult">                                  
                                </tbody>
                                   <tfoot>
                                     <tr>
                                        <td colspan="3">                                        
                                         <div class="row">
                                             <div class="col-lg-3">                         
                                                <div class="form-group">
                                                    {{ Form::label('session_id','Session',['class'=>' control-label']) }}                         
                                                    {!! Form::select('session_id',$sessions, null, ['class'=>'form-control','placeholder'=>'choose Session','required']) !!}
                                                    <p class="text-danger">{{ $errors->first('session_id') }}</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">                         
                                                <div class="form-group">
                                                    {{ Form::label('class_id','Class',['class'=>' control-label']) }}
                                                    {!! Form::select('class_id',[], null, ['class'=>'form-control','placeholder'=>'Select Class','required']) !!}
                                                    <p class="text-danger">{{ $errors->first('class_id') }}</p>
                                                </div>
                                            </div>
                                                <div class="col-lg-3">                         
                                                <div class="form-group">
                                                    {{ Form::label('section_id','Section',['class'=>' control-label']) }}
                                                    {!! Form::select('section_id',[]
                                                    , null, ['class'=>'form-control','placeholder'=>'Select Section','required']) !!}
                                                    <p class="text-danger">{{ $errors->first('session_id') }}</p>
                                                </div>
                                            </div>                              
                                          <div class="col-lg-3 text-center">
                                           <button class="btn btn-success " id="studentPromoteBtn">Student Promote</button>
                                          </div>
                                         </div>  
                                        </td>
                                    </tr>
                                   </tfoot>  
                              </tbody>
                          </table>
                        {{ Form::close() }}

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
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> 
 <script src="{{ asset('admin_asset/plugins/input-mask/jquery.inputmask.js')}}"></script>
<script src="{{ asset('admin_asset/plugins/input-mask/jquery.inputmask.date.extensions.js')}}"></script>
 <script type="text/javascript">
    $('[data-mask]').inputmask();
    $("#session").change(function(){
        $('#class').html('<option value="">Searching ...</option>');
        $.ajax({
          method: "get",
          url: "{{ route('admin.class.search') }}",
          data: { id: $(this).val() }
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
          data: { id: $(this).val(), session: $('#session').val() }
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
          url: "{{ route('admin.class.search') }}",
          data: { id: $(this).val() }
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
          data: { id: $(this).val(), session: $('#session_id').val() }
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
    $('#section').change(function(e) {
        e.preventDefault();
        $('#searchResult').html('Searching ...');
       $.ajax({
         url: '{{ route('admin.promote.student') }}',
         type: 'POST',
         dataType: 'json',
         data: $('#promote-form').serialize(),
       })
       .done(function(response) {
         if(response.length>0){
             $('#searchResult').html('');
             for (var i = 0; i < response.length; i++) {
               $('#searchResult').append(response[i]);
               
             } 
         }
         else{
             $('#searchResult').html('<tr><td colspan="2"><h4 class="text-danger text-center">Record not found</h4></td></tr>');
         }
       })
       .fail(function() {
             $('#searchResult').html('<tr><td colspan="2"><h4 class="text-danger text-center">Record not found</h4></td></tr>');
         
       })
       .always(function() {
         console.log("complete");
       });       
    });
        $("#savePromote").submit(function(e){
        e.preventDefault();
        $('#studentPromoteBtn').html('<i class="fa fa-refresh fa-spin"></i> Mark Promote');
        $.ajax({
          method: "post",
          url: "{{ route('admin.promote.store') }}",
          data: $(this).serialize(),
        })
        .done(function(response) {            
            if(response.length >0){
                $('#studentPromoteBtn').html('Promote');
                 toastr.success('success')
                $("#searchResult").load(location.href + ' #searchResult'); 

            }
            else{
                $('#studentPromoteBtn').html('Promote');
                 toastr.success('success')
                 $("#searchResult").load(location.href + ' #searchResult'); 
            }
           

            
        })
        
       
    });
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