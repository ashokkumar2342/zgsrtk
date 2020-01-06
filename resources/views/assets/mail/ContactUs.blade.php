@component('mail::message')
# Zad Global School Website Contact Us Enquiry

  

 <div class="container">
 <div class="row">
 	<div class="col-md-6">
 	Name:
 		{{ $contact->name }}
 			 
 	</div>
 	<div class="col-md-6">
 	Email:
 		{{ $contact->email }}
 	</div>
 	<div class="col-md-6">
 	Mob:
 		{{ $contact->mobile }}
 	</div>
 	<div class="col-md-4">
 	Message:
 		{{ $contact->message }}
 	</div>
 	 

 </div>
 	
 </div>

Thanks,<br>
 Zad Global School
@endcomponent
