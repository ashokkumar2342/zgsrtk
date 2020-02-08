  
  <!-- Main content -->
   
    <style type="text/css" media="screen">
  .bd{
    border-bottom: #eee solid 1px;;
  }
  
</style>
 
  <div class="modal-dialog" style="width:50%">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" id="btn_close" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Due Fee</h4>
      </div>
      <div class="modal-body">
       <div class="row"> 
        <div class="col-md-12"> 
             <form action="{{ route('admin.student.due.fee.store',$fee->id) }}" redirect-to="{{ route('admin.student.view',$fee->student_id) }}" method="post" class="add_form" button-click="btn_event_type_table_show,btn_close">
                   {{ csrf_field() }}
                   <div class="row">
                    <div class="col-lg-12">
                      <label>Fee Due</label>
                      <input type="hidden" name="student_id" value="{{ $fee->student_id }}" class="form-control" placeholder="" maxlength="100"> 
                      <input type="number" name="due_fee" value="{{ $fee->balance_fee }}" class="form-control" placeholder="" maxlength="100"> 
                    </div> 
                   </div>
                   <div class="row">
                    <div class="col-lg-12 text-center" style="padding-top: 10px">
                      <input type="submit" name="Pay Due Fee" class="btn btn-success">
                    </div>
                     
                   </div>
                 
                
              </form>
                
            </div>   
               
      <!-- /.row -->
          </div>
         
        </div>
      </div>
     
    <!-- /.content -->

 
