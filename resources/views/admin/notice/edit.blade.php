 
@extends('admin.layout.base')
@push('links')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endpush
@section('body')

<section class="content">
    <div class="box">
      <div class="box-body">
      {{ Form::open(['route'=>['admin.notice.update',$notice->id],'method'=>'put']) }}
                <div class="form-group clearfix">
                
                       {{ Form::label('news','News',['class'=>'col-lg-2 control-label']) }}
                    <div class="col-lg-10">
                        {{ Form::text('news',$notice->news,['class'=>'form-control required']) }}
                        <p class="text-danger">{{ $errors->first('news') }}</p>
                    </div>
                </div>
               
                <div class="form-group clearfix">
                    <button class="btn btn-primary pull-right" type="submit">Update</button>
                </div>
            {{ Form::close() }}
    </div>
    </div>
    
    </div>
</section>  

     
     
@endsection
@push('links')
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
@endpush
 @push('scripts')

 <script type="text/javascript" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 
</script>
@endpush
