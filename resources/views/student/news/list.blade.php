 
@extends('student.layout.base')
@push('links')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endpush
@section('body')

<section class="content">
     
    <div class="box">
      <table class="table table-hover p-table table-responsive">
            <thead>
                <tr>
                    <th width="50px">Id</th>
                    <th width="150px">Date</th>                    
                    <th width="150px">News &amp; Events</th>                   
                  
                </tr>
            </thead>
            <tbody>
            @foreach($news as $new)
                <tr>
                    <td>{{ $loop->index + 1}}</td>
                    <td>{{ $new->created_at->format('d-m-y') }}</td>
                    <td >{{ $new->news }}</td>
                  
                 
                </tr>
            @endforeach
            </tbody>
        </table> 

        <div class="row">
            <div class="col-md-12">
                {{ $news->links() }}
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
