@component('mail::message')
# Zad Global School Website Career 

  

 <div class="container">
 <div class="row">
	 <div class="col-md-6">
 	post :
 		{{ $career->applied }}
 			 
 	</div>
 	<div class="col-md-6">
 	Other:
 		{{ $career->other }}
 			 
 	</div>
 	<div class="col-md-6">
 	Name:
 		{{ $career->name }}
 			 
 	</div>
 	<div class="col-md-6">
 	Email:
 		{{ $career->email }}
 	</div>
 	<div class="col-md-6">
 	Date of Birth:
 		{{ $career->dob }}
 	</div>
 	<div class="col-md-6">
 	Mob:
 		{{ $career->mobile }}
 	</div>
 	<div class="col-md-4">
 	Address:
 		{{ $career->address }}
 	</div>
{{--  	<div class="col-md-4">
 	Resume:
 		
 		<a href="storage/file/{{ $career->resume }}">Resume Download</a>
 	</div> --}}
 	 
 	 

 </div>
 	
 </div>

Thanks,<br>
 ZAD Global School
@endcomponent
