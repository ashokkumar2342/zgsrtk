  @extends('student.layout.base')
@push('links')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endpush
@section('body')

    <section class="content">
     <div class="box">       
        <div class="box-header">
        <ol class="breadcrumb text-left">         
          <li><h4>Circular </h4></li>
        </ol>
      </div>
       
          <!-- Trigger the modal with a button -->
         <div class="box">
            <table class="table table-striped box">
              <tr>
              <th>Id </th><th>Date </th><th>Title</th><th>Description</th><th>Custom</th>
              </tr>
               <tr>
                <td>  </td><td> </td><td> </td><td></td><td></td>
              </tr>

            
              
            </table>
         </div>

    </section>
    <!-- /.content -->
   
@endsection
@push('links')
 
@endpush
 @push('scripts')
 
  
@endpush