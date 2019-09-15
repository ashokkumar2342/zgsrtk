@extends('front.layout.main')
@push('links')
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"> 
@endpush
@section('body')

    <!-- Page Header Start here -->
    <section class="page-header" style="background-image: url('{{ asset('images/background/contact.jpg') }}');">
      <div class="overlay">
        <div class="container">
          <h3>&nbsp;</h3>          
        </div><!-- container -->
      </div><!-- overlay -->
    </section><!-- page header -->
    <!-- Page Header End here -->
     <!-- Page Header Start here -->
    <!-- Contact Start here -->
    <section class="contact contact-page">
      <div class="contact-details" style="padding:40px;">
        <div class="container">
        <h4>Career</h4>
          <div class="row">
            <div class="col-md-4 col-sm-6 col-xs-12">
              <ul>
                <li class="contact-item">
                  <span class="icon flaticon-signs"></span>
                  <div class="content">
                    <h5 style="color:#ffc000; ">School Campus: Play Wing</h5>
                    <p>Zad Eduplex, HUDA Complex, Rohtak-124001(Hr.) <br> Mob: +91-8397068001</p>
                  </div>
                </li>
                <li class="contact-item">
                  <span class="icon flaticon-signs"></span>
                  <div class="content">
                    <h5 style="color:#e84b3a; ">School Campus: Senior Wing</h5>
                    <p>Zad Global School, 8th Mile Stone, Rohtak-Jind Road, N.H. 71, Rohtak-124001(Hr.) <br> Mob: +91-8570006662</p>
                  </div>
                </li>
               
                <li class="contact-item">
                  <span class="icon flaticon-message"></span>
                  <div class="content">
                    <h5 style="color: #fc7f0c;">Email Address</h5>
                    <p>zgsrtk1@gmail.com</p>
                  </div>
                </li>
              </ul>
            </div>
            <div class="col-md-8 col-sm-6 col-xs-12">
        <div class="well well-sm">
         <form class="form-horizontal" action="{{ route('front.career.post') }}" role="form" enctype="multipart/form-data" method="post"> 
            {{ csrf_field() }}               
              <div class="form-group">
                <label for="firstName" class="col-sm-3 control-label">Post Applied</label>
                  <div class="col-sm-9" >
                    <select name="applied">  

                    <option   hidden="">----Select----</option>       
                      <option value="Bad-Minton Coach">Bad-Minton Coach</option>
                      <option value="Music Teacher">Music Teacher</option>
                      <option value="Dance Teacher">Dance Teacher</option> 
                      <option value="Primary Teacher-English">Primary Teacher-English</option>
                      <option value="Primary Teacher-Hindi">Primary Teacher-Hindi</option>
                      <option value="Primary Teacher-Math">Primary Teacher-Math</option>
                      <option value="Primary Teacher-Science">Primary Teacher-Science</option>
                      <option value="Primary Teacher-SST">Primary Teacher-SST</option>
                      <option value="Career Advisor">Career Advisor</option>
                      <option value="PRO">PRO</option> 
                      <option value="Pre-Nur Teacher">Pre-Nur Teacher</option>
                      <option value="LKG Teacher">LKG Teacher       </option>
                      <option value="UKG Teacher">UKG Teacher       </option>
                      <option value="TGT English">TGT English       </option>
                      <option value="TGT Hindi  ">TGT Hindi       </option> 
                      <option value="TGT Math   ">TGT Math       </option>
                      <option value="TGT Science">TGT Science       </option>
                      <option value="TGT SST    ">TGT SST       </option>
                      <option value="PGT English">PGT English       </option>
                      <option value="PGT Hindi  ">PGT Hindi       </option>
                      <option value="PGT Math   ">PGT Math       </option>
                      <option value="PGT Science">PGT Science       </option>
                      <option value="PGT SST    ">PGT SST       </option>
                      <option value="Seating Coa">Seating Coach       </option>
                      <option value="Table Tenni">Table Tennis       </option>
                      <option value="Basket Ball">Basket Ball       </option>
                      <option value="Aerobics   ">Aerobics       </option>
                    </select>
                  </div>
              </div>
              <div class="form-group">
                <label for="other" class="col-sm-3 control-label">Other</label>
                  <div class="col-sm-9">
                    <input type="text" name="other" placeholder="Other" class="form-control">
                    <p class="text-danger">{{ $errors->first('other') }}</p>
                  </div>
              </div>
              <div class="form-group">
                <label for="name" class="col-sm-3 control-label">Applicant Name</label>
                  <div class="col-sm-9">
                    <input type="text" name="name" placeholder="Name" class="form-control">
                    <p class="text-danger">{{ $errors->first('name') }}</p>
                  </div>
              </div>                             
              <div class="form-group">
                  <label for="birthDate" class="col-sm-3 control-label">Date of Birth</label>
                    <div class="col-sm-9">
                      <input type="date" name="dob" class="form-control">
                      <p class="text-danger">{{ $errors->first('dob') }}</p>
                  </div>
              </div>               
                   
              <div class="form-group">
                <label for="Contact Details" class="col-sm-3 control-label">Mobile</label>
                  <div class="col-sm-9">
                    <input type="number" name="mobile" placeholder="number" class="form-control">
                      <p class="text-danger">{{ $errors->first('mobile') }}</p>

                  </div>
              </div>
              <div class="form-group">
                <label for="email" class="col-sm-3 control-label">Email</label>
                  <div class="col-sm-9">
                    <input type="email" name="email" placeholder="Email" class="form-control">
                      <p class="text-danger">{{ $errors->first('email') }}</p>

                  </div>
              </div>
              <div class="form-group">
                <label for="Address" class="col-sm-3 control-label">Address</label>
                  <div class="col-sm-9">
                    <input type="text" name="address" placeholder="Address" class="form-control">
                      <p class="text-danger">{{ $errors->first('address') }}</p>

                  </div>
              </div>
              <div class="form-group">
                <label for="city" class="col-sm-3 control-label">City</label>
                  <div class="col-sm-9">
                    <input type="text" name="city" placeholder="City" class="form-control">
                      <p class="text-danger">{{ $errors->first('city') }}</p>

                  </div>
              </div>
              <div class="form-group">
                <label for="workexperience" class="col-sm-3 control-label">Work Experience</label>
                  <div class="col-sm-9">
                    <input type="text" name="workexperience" placeholder="enter work xxperience" class="form-control">
                      <p class="text-danger">{{ $errors->first('workexperience') }}</p>

                  </div>
              </div>
              <div class="form-group">
                <label for="email" class="col-sm-3 control-label">Attach your resume</label>
                  <div class="col-sm-9">
                      <input type="file" name="resume"  />
                      <p class="text-danger">{{ $errors->first('resume') }}</p>

                  </div>
              </div>
              <div class="form-group">
                <div class="col-sm-9 col-sm-offset-3">
                  <button type="submit" class="btn btn-primary btn-block">Submit</button>
                </div>
              </div>

            </form>
        </div>
   
            </div>
          </div><!-- row -->
        </div><!-- container -->
      </div><!-- contact-details -->
    <div >
      <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d27938.59951896779!2d76.55505969521485!3d28.918401856902495!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390d85f1f06ad45d%3A0xe14585a3932b4933!2sZad+Global+School!5e0!3m2!1sen!2s!4v1498899650578" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>
    </section>
    <!-- Contact End here -->


  

    <!-- About Start here -->
    <section class="about">
      <div class="overlay padding-2">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <div class="about-image">
                
              </div>
            </div>
            <div class="col-md-6">
              
            </div>
          </div><!-- row -->
        </div><!-- container -->
      </div><!-- overlay -->
    </section><!-- about -->
    <!-- About End here -->
@endsection
  @push('scripts') 
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
@if(Session::has('message'))
<script type="text/javascript">

    Command: toastr["{{ Session::get('class') }}"]("{{ Session::get('message') }}");
</script>

@endif

@endpush
 
