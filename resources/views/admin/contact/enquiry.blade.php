 
@extends('admin.layout.base')
@push('links')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endpush
@section('body')

<section class="content">
   <h4>Contact Page Enquiry list</h4>
     
    <div class="box">
      <table class="table table-hover p-table table-responsive">
            <thead>
                <tr>
                    <th width="150px">Date</th>                    
                     
                    <th width="150px">Name</th>                    
                    <th width="150px">Father Name</th>                    
                    <th width="150px">Email</th>                   
                    <th width="100px">Mobile</th>
                    <th width="100px">message</th>
                    <th width="100px">Action</th>

                </tr>
            </thead>
            <tbody>
            @foreach($enquirys as $enquiry)
                <tr>
                    <td>{{ $enquiry->created_at }}</td>                  

                    <td>{{ $enquiry->name }}</td>
                    <td>{{ $enquiry->father_name }}</td>
                    <td>{{ $enquiry->email }}</td>
                    <td >{{ $enquiry->mobile }}</td>
                    <td >{{ $enquiry->message }}</td>
                    <td> <a class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to delete this data ?')" href="{{ route('admin.enquiry.delete',$enquiry->id) }}"><i class="fa fa-trash"></i></a></td>
                </tr>
            @endforeach
            </tbody>
        </table> 

        <div class="row">
            <div class="col-md-12">
                {{ $enquirys->links() }}
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
@if(Session::has('message'))
<script type="text/javascript">
    Command: toastr["{{ Session::get('class') }}"]("{{ Session::get('message') }}");
</script>
@endif
@endpush
 
