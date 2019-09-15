@extends('admin.layout.base')
@section('body')
    <section class="content">


     {{-- {{  Form::open(['route'=>['admin.gallery.post'], 'files'=>true, 'enctype'=>'multipart/form-data', 'class'=>'dropzone', 'id'=>'myImageDropzone'])  }}   

     <p>{{ $errors->first('file') }} </p> 
   
    {!! Form::close() !!} --}}
    <form action="{{ route('admin.slider.post') }}" class="dropzone" id="myImageDropzone" enctype="multipart/form-data" files="true">
    	{{ csrf_field() }}
      <div class="fallback">
        <input name="file" type="file" multiple />
      </div>
      
    </form>
</section>
<section class="box">
	  <div class="container">
	   	<table class="table">
	   		<tr>
	   			<th>id</th>
	   			<th>Image</th>
	   			<th>Action</th> 
	   		</tr>
	   		@foreach ($sliders as $slider)
	   		<tr>   		
	   			 <th>{{$slider->id}}</th>
	   			<th> <img src="{!! url('uploads/'.$slider->image) !!}" style="height: 100px; width: 170px;" alt="image" class="img-rounded"></th>
	   			<th><a class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to delete this data ?')" href="{{ route('admin.slider.delete',$slider->id) }}">Delete</th> 
	   		</tr>
	   		@endforeach   
	   	</table>
	   	 <div class="row">
            <div class="com-md-12">
            {{ $sliders->links() }}
            </div>
          </div>
        </div>
   </div>
</section>

@endsection
@push('links')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.2.0/dropzone.css" />
@endpush
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.2.0/dropzone.js"></script>
<script type="text/javascript">
 Dropzone.autoDiscover = false;

$('#myImageDropzone').dropzone({
     
    resizeWidth:1920,
    resizeHeight:800,
    addRemoveLinks: true,

    dictRemoveFile: "Remove image"
});

</script>
 
 @if(Session::has('message'))
<script type="text/javascript">

    Command: toastr["{{ Session::get('class') }}"]("{{ Session::get('message') }}");
</script>
@endif
@endpush