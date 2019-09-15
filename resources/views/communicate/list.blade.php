  @extends('student.layout.base')
@push('links')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endpush
@section('body')

    <section class="content">
     <div class="box">       
        <div class="box-header">
        <ol class="breadcrumb text-left">         
          <li><h4>Communicate </h4></li>
        </ol>
        <form class="form-horizontal" action="#"  >
          <fieldset>
            <!-- Name input-->
            <div class="form-group">
              <label class="col-md-2 control-label" for="name">Subject</label>
              <div class="col-md-10">
                <input id="mobile" name="name" type="text" placeholder="Suject" class="form-control" required>
              </div>
            </div>
            <!-- Message body -->
            <div class="form-group">
              <label class="col-md-2 control-label" for="message">Your message</label>
              <div class="col-md-10">
                <textarea class="form-control" id="message" name="message" placeholder="Please enter your message here..." rows="5" required></textarea>
              </div>
            </div>
    
            <!-- Form actions -->
            <div class="form-group">
              <div class="col-md-12 text-right">
                <button type="submit" class="btn btn-primary btn-md">Submit</button>
              </div>
            </div>
          </fieldset>
          </form>

      </div>
       
          <!-- Trigger the modal with a button -->
         <div class="box">
            <table class="table table-striped box">
              <tr>
              <th>Id </th><th>Date </th><th>Subject</th><th>Message</th><th>Custom</th>
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

 