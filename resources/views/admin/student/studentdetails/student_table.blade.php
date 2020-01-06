

    <section class="content">
        <div class="box">
            <div class="box-header">
                
             
             
            
            
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="dataTable" class="table table-bordered table-striped table-hover">
                <thead>
                <tr>               
                  <th>SID</th>
                  <th>Session</th>
                  <th>Password</th>              
                  <th>Class</th>
                  <th>Section</th>
                  <th>Name</th>

                  <th>Father Name</th> 
                  <th>Mobile SMS</th>

                  <th>Total Fees</th>
                  <th>Balance Fees</th>
                  
                  <th width="80px">Action</th>                  
                </tr>
                </thead>
                <tbody>
                @foreach($students as $student)
                <tr>
                  <td>{{ $student->username }}</td>
                  <td>{{ $student->sessions->date}}</td>
                  <td>{{ $student->tmp_pass }}</td>                  
                  <td>{{ $student->classes->name or '' }}</td>
                  <td>{{ $student->sections->name or '' }}</td>
                  <td>{{ $student->name }}</td>
                  <td>{{ $student->father_name }}</td>
                  <td>{{ $student->mobile_sms }}</td>

                  <td>{{ $student->totalFee }}</td>
                  <td>{{ $student->totalFee - (App\StudentFee::where('student_id',$student->id)->where('session_id',$student->session_id)->sum('discount') + App\StudentFee::where('student_id',$student->id)->where('session_id',$student->session_id)->sum('received_fee'))}}</td>
                  <td align="center">
                <a class="btn btn-primary btn-xs" title="View Student" href="{{ route('admin.student.view',$student->id) }}"><i class="fa fa-eye"></i></a>
                    <a class="btn btn-warning btn-xs" title="Edit Student" href="{{ route('admin.student.edit',$student->id) }}"><i class="fa fa-pencil"></i></a>
                    <a onclick="return confirm('Are you sure to reset this student password.')" class="btn btn-danger btn-xs" title="Password Reset" href="{{ route('admin.student.passwordreset',$student->id) }}"><i class="fa fa-key"></i></a>
                    
                  </td>
                 
                </tr>
                
                @endforeach
                </tbody>
                 
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- Trigger the modal with a button -->



    </section>
    <!-- /.content -->

