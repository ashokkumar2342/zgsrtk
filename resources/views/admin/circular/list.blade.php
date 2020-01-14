@extends('admin.layout.base')
@section('body')
   
<section class="box">
	  <div class="container">
	   	<table class="table">
	   		<tr>
	   			<th>Date</th>
	   			<th>Title</th>
	   			<th>Circular</th>

	   			<th>Action</th> 
	   		</tr>
	   		
	   		@foreach ($circulars as $circular)
	   		<tr>
	   			<th>{{ $circular->created_at->format('d-m-yy') }}</th>
	   			<th>{{ $circular->title }}</th>
	   			<th>{{ $circular->body }}</th>

	   			<th>
	   				@if ($circular->file!=null)
	   				    <a class="btn-success btn-xs"  href="{{ asset('uploads/'.$circular->file) }}" target="blank"  ><i class="fa fa-download"></i></a>
	   				@else
	   				<button type="button" class="btn-danger btn-xs disabled"  href="#" target="blank" >_</button>
	   				@endif
	   			<a class="btn btn-success btn-xs"  href="{{ route('admin.circular.edit',$circular->id) }}">Edit</a>

	   			<a class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to delete this data ?')" href="{{ route('admin.circular.delete',$circular->id) }}">Delete</a></th> 
	   		</tr>
	   		@endforeach
	   			
	   		 
	   	</table>
	   	 <div class="row">
            <div class="com-md-12">
            {{-- {{ $gallaries->links() }} --}}
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