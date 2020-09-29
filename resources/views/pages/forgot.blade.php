@extends('layout.index')

@section('content')


         <!-- Page Content -->
    <div class="container">

    	<!-- slider -->
    	<div class="row carousel-holder">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">
                <div class="panel panel-default">
				  	<div class="panel-heading">Reset password</div>
				  	<div class="panel-body">


	<form action="{{url('forgot_password') }}" method="post">
	{{csrf_field()}}

	@if(session('error'))
	<div>
	{{ session('error') }}
    </div>
    @endif

    @if(session('success'))
    <<div>
    	{{session('success')}}
    </div>
    @endif
	<input type="hidden" name="_token" value="{{csrf_token()}}" />
				    	
							<div>
				    			<label>Email</label>
							  	<input type="email" class="form-control" placeholder="Email" name="email" aria-describedby="basic-addon1"
							  	>
							</div>
							
							<br>
							<button type="submit" class="btn btn-default">Send password Reset link
							</button>
    </form>
</body>
</html>
