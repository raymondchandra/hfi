@extends('layouts.default')
@section('content')
	<div class="grid_4 push_4">
		<div class="login_content">
			<div class="table">
				<div class="table_cell">
						
						<div class="login_container">
							<h1 class="logintitle">
								Login
							</h1>
							<div class="form">
								<form>
									<input type="text"  placeholder="Username"/>
									<input type="password" placeholder="Password"/>
									<input type="button" value="Log In" class="login"/>
									<input type="checkbox" name="vehicle" value="true" class="rememberme">
									<span style="line-height: 30px; margin-left: 27px;">Remember Me</span>
									<a href="#" class="lupa_pass">
										Lupa Password?
									</a>
								</form>
							</div>
						</div>
						
						
				</div>
			</div>
		</div>
	</div>
@stop