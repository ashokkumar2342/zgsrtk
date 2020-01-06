@extends('admin.layout.base')
@section('body')
    <section class="content">
        <div class="box">
            <div class="box-header">
              <h3 class="box-title">Homework</h3>
              <div class="panel-group">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4 class="panel-title text-right">
                      <a data-toggle="collapse" href="#homework_form">Add Homework</a>
                    </h4>
                  </div>
                  <div id="homework_form" class="panel-collapse collapse {{ (@$homework || $errors->first())?'in':'' }}">
                    <div class="panel-body ">
                   {{ Form::open(['route'=>(@$homework)?['admin.homework.update',$homework->id]:'admin.homework.post']) }}
                             <div class="row">
                                <div class="col-md-8 col-md-offset-2">
                                    <div class="form-group">
                                        @php
                                            $n = 12/count($centers);
                                        @endphp
                                        @foreach($centers as $center)
                                            <div class="col-lg-{{ $n }}">
                                                <div class="radio-custom radio-danger">
                                                    {!! Form::radio('center', $center->id, @$homework->center_id, ['required','id'=>'center'.$center->id]) !!}
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
                                                    {!! Form::select('session',$sessions, @$homework->session_id, ['class'=>'form-control','placeholder'=>'choose Session','required']) !!}
                                                    <p class="text-danger">{{ $errors->first('session') }}</p>
                                                </div>
                                            </div>
                                             <div class="col-lg-4">                         
                                                <div class="form-group">
                                                    {{ Form::label('class','Class',['class'=>' control-label']) }}
                                                    {!! Form::select('class',[], null, ['class'=>'form-control','required']) !!}
                                                    <p class="text-danger">{{ $errors->first('class') }}</p>
                                                </div>
                                            </div>
                                                <div class="col-lg-4">                         
                                                <div class="form-group">
                                                    {{ Form::label('section','Section',['class'=>' control-label']) }}
                                                    {!! Form::select('section',[]
                                                    , null, ['class'=>'form-control','required']) !!}
                                                    <p class="text-danger">{{ $errors->first('section') }}</p>
                                                </div>
                                            </div>
                                              
                                        </div>
                                    </div>
                                </div>
                             </div>   
                             <div class="row">{{--row start --}}
                                <div class="col-md-12 ">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                             <div class="col-lg-12">                         
                                               <div class="form-group">
                                                    {{ Form::label('homework','Homework',['class'=>'control-label']) }}
                                                     {{ Form::textarea('homework',@$homework->homework, ['class'=>'form-control','rows'=>7  ,'style'=>'resize:none', 'id'=>'textarea']) }}
                                                     <p class="text-danger">{{ $errors->first('homework') }}</p>
                                        <span id="textarea_feedback">160 characters remaining<span> 
                                                      
                                                </div>
                                            </div>
                                              
                                        </div>
                                    </div>
                                </div>
                            </div> 
                              <hr> 
                             <div class="row">
                        <div class="col-md-12 text-center">
                            <button class="btn btn-success">{{ (@$homework)?'Update':'Create' }}</button>
                        </div>
                    </div>                            
                    {{ Form::close() }}
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table   class="table table-bordered table-striped table-hover" id="homeworkTable">
                <thead>
                <tr>           
                  <th>Center</th>
                  {{-- <th>Date</th> --}}
                  {{-- <th>Session</th> --}}
                  <th>Class Name</th>
                  <th>Section Name</th>
                  <th>Homework</th>
                 {{--  <th>Status</th> --}}
                  <th>SMS</th>


                  <th width="80px">Action</th>                  
                </tr>
                </thead>
                <tbody>
                @foreach($homeworks as $homework)
                <tr>
                  <td>{{ $homework->centers->name }}</td>
                  {{-- <td>{{ $homework->created_at->format('d-m-y') }}</td> --}}
                  {{-- <td>{{ $homework->sessions->date }}</td> --}}
                  <td>{{ $homework->classes->alias }}</td>
                  <td>{{ $homework->sections->name }}</td>
                  <td>  {{ $homework->homework  }}                     
                   </td> 
                 
                  {{--  <td>
                     <a data-action="btnStatus" href="{{ route('admin.homework.status',$homework->id) }}"  class="label btn {{ ($homework->status == 1) ?'btn-success':'btn-danger'}}">{{ ($homework->status == 1)? 'Active' : 'Inactive' }}</a>
                     <a class=" {{ ($homework->status == 1) ?'btn-success':'btn-danger'}}" id="send"  href="{{ route('admin.homework.status',$homework->id) }}">{{ ($homework->status == 1)? 'Active' : 'Inactive' }}</a>
                    </td> --}}
                    <td align="center">
                  <button class=" {{ ($homework->status == 1) ?'btn btn-success btn-xs':'btn btn-danger btn-xs disabled'}} btn_send"   onclick="homeworkSend({{ $homework->id }})" >{{ ($homework->status == 1)? 'Send' : 'sent' }}</button> 
                  {{-- <button type="button"></button> --}}
                  </td>  
                  <td align="center">
                                     
                    <a class="btn btn-info btn-xs"  href="{{ route('admin.homework.edit',$homework->id) }}"><i class="fa fa-pencil"></i></a>
                    <a class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to delete this data ?')" href="{{ route('admin.homework.delete',$homework->id) }}"><i class="fa fa-trash"></i></a>
                  </td>                 
                </tr>
                @endforeach
                </tbody>                 
              </table>
              <div class="row">
                <div class="com-md-12">
                  {{ $homeworks->links() }}
                </div>
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

 <script type="text/javascript">
  function homeworkSend(id){
     

     $.ajax({
       url: '{{ route('admin.homework.sms') }}',
       type: 'get',
       
       data: {id: id},
     })
     .done(function(data) {
       toastr[data.class](data.message)
       $("#homeworkTable").load(location.href + ' #homeworkTable'); 
     })
     .fail(function() {
       console.log("error");
     })
     .always(function() {
       console.log("complete");
     });
     
  }

 $(document).ready(function(){
        $('#dataTable').DataTable();
    });
     @if(@$homework || $errors->first())
     if ($("#session").val()>0) {
        $('#class').html('<option value="">Searching ...</option>');
        $.ajax({
          method: "get",
          url: "{{ route('admin.class.search2') }}",
          data: { id:  $("#session").val()}
        })
        .done(function( response ) {            
            if(response.length>0){
                $('#class').html('<option value="">Select Class</option>');
                 var selVal = {{  (@$homework->class_id)?@$homework->class_id: 0  }};
                for (var i = 0; i < response.length; i++) {
                   var selected=(response[i].id==selVal)?"selected":"";
                    $('#class').append('<option value="'+response[i].id+'"'+selected+'>'+response[i].alias+'</option>');
                } 
                if (response.length && $("#class").val()) {
                  $('#section').html('<option value="">Searching ...</option>');        
                  $.ajax({
                    method: "get",
                    url: "{{ route('admin.section.search') }}",
                    data: { id: $('#class').val(), session: $('#session').val() }
                  })
                  .done(function( response ) {
                      $('#totalFee').val(response.fee);
                      if(response.section.length>0){
                         $('#section').html('<option value="">Select Section</option>');
                         var selVal2 = {{  (@$homework->section_id)?@$homework->section_id: 0  }};
                          for (var i = 0; i < response.section.length; i++) {
                            var selected2=(response.section[i].id==selVal2)?"selected":"";
                              $('#section').append('<option value="'+response.section[i].id+'"'+selected+'>'+response.section[i].name+'</option>');
                          } 
                      }
                      else{
                          $('#section').html('<option value="">Not found</option>');
                      }
                      
                  });
                } 
            }
            else{
                $('#class').html('<option value="">Not found</option>');
            }
            
        });
     }
      
    
     @endif
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
</script>
<script>
  $(document).ready(function() {
    var text_max = 0;
    $('#textarea_feedback').html(text_max + ' characters ');

    $('#textarea').keyup(function() {
        var text_length = $('#textarea').val().length;
         

        $('#textarea_feedback').html(text_length + ' characters');
    });
});

    
</script>
 @if(Session::has('message'))
<script type="text/javascript">
    Command: toastr["{{ Session::get('class') }}"]("{{ Session::get('message') }}");
</script>
@endif

@endpush

