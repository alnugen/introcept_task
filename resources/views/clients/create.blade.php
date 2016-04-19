@extends('master')
@section('title', 'Add Client')
@section('content')
<!-- Text input-->
<form class="well form-horizontal" action="{{ route('clients.store') }}" method="post"  id="client_form">
	<fieldset>

		<div class="form-group">
			<label class="col-md-4 control-label">Full Name</label>
			<div class="col-md-4 ">
				<div class="input-group">
					<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
					<input  name="fullname" id="fullname" placeholder="Full Name" class="form-control"  type="text" value="{{old('fullname')}}">
				</div>
			</div>
		</div>
		<!-- radio checks -->
		<div class="form-group">
			<label class="col-md-4 control-label">Gender</label>
			<div class="col-md-4">
				<div class="input-group">
					<div class="radio">
						<label>
							<input type="radio" name="gender" id="gender" value="Male" /> Male
						</label>
						<label>
							<input type="radio" name="gender" id="gender" value="Female" /> Female
						</label>
					</div>
				</div>
			</div>
		</div>
		<!-- Text input-->
		<div class="form-group">
			<label class="col-md-4 control-label">Phone #</label>
			<div class="col-md-4 inputGroupContainer">
				<div class="input-group">
					<span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
					<input name="phone" id="phone" placeholder="(977)444-1212" class="form-control" type="text" value="{{old('phone')}}">
				</div>
			</div>
		</div>
		<!-- Text input-->
		<div class="form-group">
			<label class="col-md-4 control-label">E-Mail</label>
			<div class="col-md-4 inputGroupContainer">
				<div class="input-group">
					<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
					<input name="email" id="email" placeholder="E-Mail Address" class="form-control"  type="text" value="{{old('email')}}">
				</div>
			</div>
		</div>
		<!-- Text input-->
		<div class="form-group">
			<label class="col-md-4 control-label">Address</label>
			<div class="col-md-4 inputGroupContainer">
				<div class="input-group">
					<span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
					<input name="address" id="address" placeholder="Address" class="form-control" type="text" value="{{old('address')}}">
				</div>
			</div>
		</div>
		<!-- Text input-->
		<div class="form-group">
			<label class="col-md-4 control-label">Nationality</label>
			<div class="col-md-4 inputGroupContainer">
				<div class="input-group">
					<span class="input-group-addon"><i class="glyphicon glyphicon-globe"></i></span>
					<input name="nationality" id="nationality" placeholder="Nepalese" class="form-control"  type="text" value="{{old('nationality')}}">
				</div>
			</div>
		</div>
		<!-- Date input-->
		<div class="form-group">
			<label class="col-md-4 control-label">Date of Birth</label>
			<div class="col-md-4 inputGroupContainer">
				<div class='input-group date'>
                    <div class="input-group-addon" >
                        <span class="glyphicon glyphicon-calendar"></span>
                    </div>
                    <input type='text' class="form-control" name='dob' id="datepicker"/>
                </div>

			</div>
		</div>
		<!-- Select Basic -->
		<div class="form-group">
			<label class="col-md-4 control-label">Education</label>
			<div class="col-md-4 selectContainer">
				<div class="input-group">
					<span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
					<select name="education" id="education" class="form-control selectpicker" >
						<option value="" >Please select your education level</option>
						<option>S.L.C.</option>
						<option>+2</option>
						<option>Bachelor's</option>
						<option>Masters</option>
						<option>P.H.D.</option>
					</select>
				</div>
			</div>
		</div>
		<!-- radio checks -->
		<div class="form-group">
			<label class="col-md-4 control-label">Prefered Mode of Contact</label>
			<div class="col-md-4">
				<div class="radio">
					<label>
						<input type="radio" name="mode_of_contact" value="email" checked="checked" /> E-mail
					</label>
				</div>
				<div class="radio">
					<label>
						<input type="radio" name="mode_of_contact" value="phone" /> Phone
					</label>
				</div>
				<div class="radio">
					<label>
						<input type="radio" name="mode_of_contact" value="none" /> None
					</label>
				</div>
			</div>
		</div>

		<!-- Button -->
		<div class="form-group">
			<label class="col-md-4 control-label"></label>
			<div class="col-md-4">
				<input type="submit" value="Add Client" class="btn btn-primary">
				<a href="{{ route('clients.index') }}" class="btn btn-danger">Cancel</a>
			</div>
		</div>

		<!-- Token -->
		<input type="hidden" name="_token" value="{{ csrf_token() }}">

	</fieldset>
</form>
</div>
</div><!-- /.container -->
</form>
@stop
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
@section('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>


<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.min.js"></script>
<script type="text/javascript">
	$(function () {
		$('#datepicker').datepicker();
	});
</script>
<script>
	
	$().ready(function() {
		
		$("#client_form").validate({
			rules: {
				fullname: "required", 
				gender: "required", 
				phone: "required",
				email:{
					required: true,
					email: true,
				},
				address: "required",
				nationality: "required",
				education: "required",
				dob: "required",
			},
			messages: {
				fullname: "Please enter your fullname",
				gender: "Please select your gender",
				phone: "Please enter your phone",
				email: "Please enter your email",
				address: "Please enter your address",
				nationality: "Please enter your nationality",
				education: "Please select your education",
				dob: "Please enter your date of birth",

			},
			highlight: function(element) {
        		$(element).closest('.form-group').addClass('has-error');
    		},
    		unhighlight: function(element) {
        		$(element).closest('.form-group').removeClass('has-error');
    		},
		    errorElement: 'span',
		    errorClass: 'help-block',
		    errorPlacement: function(error, element) {
		        if(element.parent('.input-group').length) {
		            error.insertAfter(element.parent());
		        } else {
		            error.insertAfter(element.parent().parent());
		        }
    		}
		});
	});
</script>


@stop