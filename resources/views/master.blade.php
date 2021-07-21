<!DOCTYPE HTML>
<html lang="en-US">
	@include('layout.header')
	@yield('js')
	@yield('css')
	<body>
		<!-- Page loader -->
	   
		<!-- header section start -->
	@include('layout.navbar')
		<!-- slider section start -->
		@yield('slider')
		<section class="content-stick paddingg">
			<div class="container">
				<div class="row">
				@yield('content')
				@include('layout.sidebar')
				</div>
			</div>
		</section>
		
		@yield('extfooter')

		@include('layout.footer')

		@include('layout.script')

		@yield('jss')
	</body>
</html>