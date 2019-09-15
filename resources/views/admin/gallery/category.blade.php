@extends('admin.layout.base')
@section('body')
    <section class="content">


     {{-- {{  Form::open(['route'=>['admin.gallery.post'], 'files'=>true, 'enctype'=>'multipart/form-data', 'class'=>'dropzone', 'id'=>'myImageDropzone'])  }}   

     <p>{{ $errors->first('file') }} </p> 
   
    {!! Form::close() !!} --}}
    <form action="{{ route('admin.gallery-category.post') }}"  method="post">
    	{{ csrf_field() }}
      <div>
        <label>Category Name</label>
        <input name="name" class="form-control" type="text"  />
        <label>Description</label>
        <input name="description" class="form-control" type="text"  />
        <input type="submit" class="btn btn-success" name="submit" value="Create">
      </div>
       
    </form>
</section>
<section class="box">
	  <div class="container">
	   	<table class="table">
	   		<tr>
	   			<th>id</th>
	   			<th>Name</th>
	   			<th>Action</th> 
	   		</tr>
	   		@foreach ($categories as $category)
	   		<tr>   		
	   			 <th>{{$category->id}}</th>
	   			<th>{{$category->name}}</th>
	   			<th><a class="btn btn-success btn-xs"  href="{{ route('admin.gallery-category.edit',$category->id) }}">edit</a>
            <a class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to delete this data ?')" href="{{ route('admin.gallery-category.delete',$category->id) }}">Delete</a></th> 
	   		</tr>
	   		@endforeach   
	   	</table>
	   	 <div class="row">
            <div class="com-md-12">
            {{ $categories->links() }}
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
     
    resizeWidth:1000,
    resizeHeight:600,
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