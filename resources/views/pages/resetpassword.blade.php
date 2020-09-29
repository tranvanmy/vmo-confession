
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
				    	<form action="nguoidung" method="post">
				    		<input type="hidden" name="_token" value="{{csrf_token()}}" />
				    
							<div>
				    			<label>Email</label>
							  	<input type="email" class="form-control" placeholder="Email" name="email" aria-describedby="basic-addon1"
							  	>
							</div>
							<br>	
							<div>
								<input type="checkbox" class="" name="checkpassword">
				    			<label>Nhập mật khẩu</label>
							  	<input type="password" class="form-control" name="password" aria-describedby="basic-addon1">
							</div>
							<br>
							<div>
				    			<label>Nhập lại mật khẩu</label>
							  	<input type="password" class="form-control" name="passwordAgain" aria-describedby="basic-addon1">
							</div>
							<br>
							<button type="submit" class="btn btn-default">Reset
							</button>

				    	</form>
				  	</div>
				</div>
            </div>
            <div class="col-md-2">
            </div>
        </div>
        <!-- end slide -->
    </div>
    <!-- end Page Content -->






@endsection