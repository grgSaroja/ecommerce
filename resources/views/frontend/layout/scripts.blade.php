   {{-- <script src=" https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/11.0.2/bootstrap-slider.min.js"></script> --}}
   {{-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script> --}}

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>

<!--===============================================================================================-->	
	<script src="{{ URL::asset('frontend/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{ URL::asset('frontend/vendor/animsition/js/animsition.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{ URL::asset('frontend/vendor/bootstrap/js/popper.js')}}"></script>
	<script src="{{ URL::asset('frontend/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{ URL::asset('frontend/vendor/select2/select2.min.js')}}"></script>
	<script>
		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
	</script>
<!--===============================================================================================-->
	<script src="{{ URL::asset('frontend/vendor/daterangepicker/moment.min.js')}}"></script>
	<script src="{{ URL::asset('frontend/vendor/daterangepicker/daterangepicker.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{ URL::asset('frontend/vendor/slick/slick.min.js')}}"></script>
	<script src="{{ URL::asset('frontend/js/slick-custom.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{ URL::asset('frontend/vendor/parallax100/parallax100.js')}}"></script>
	<script>
        $('.parallax100').parallax100();
	</script>
<!--===============================================================================================-->
	<script src="{{ URL::asset('frontend/vendor/MagnificPopup/jquery.magnific-popup.min.js')}}"></script>
	<script>
		$('.gallery-lb').each(function() { // the containers for all your galleries
			$(this).magnificPopup({
		        delegate: 'a', // the selector for gallery item
		        type: 'image',
		        gallery: {
		        	enabled:true
		        },
		        mainClass: 'mfp-fade'
		    });
		});
	</script>

<!--===============================================================================================-->
	<script src="{{ URL::asset('frontend/vendor/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
	<script>
		$('.js-pscroll').each(function(){
			$(this).css('position','relative');
			$(this).css('overflow','hidden');
			var ps = new PerfectScrollbar(this, {
				wheelSpeed: 1,
				scrollingThreshold: 1000,
				wheelPropagation: false,
			});

			$(window).on('resize', function(){
				ps.update();
			})
		});
	</script>
<!--===============================register form================================================================-->

{{-- <script>
	$(function () {
		$('#registerForm').submit(function (e) {
			e.preventDefault();
			let formData = $(this).serializeArray();
			$(".invalid-feedback").children("strong").text("");
			$("#registerForm input").removeClass("is-invalid");
			$.ajax({
				method: "POST",
				headers: {
					Accept: "application/json"
				},
				url: "{{ route('register') }}",
				data: formData,
				success: () => window.location.assign("{{ route('home') }}"),
				error: (response) => {
					if(response.status === 422) {
						let errors = response.responseJSON.errors;
						Object.keys(errors).forEach(function (key) {
							$("#" + key + "Input").addClass("is-invalid");
							$("#" + key + "Error").children("strong").text(errors[key][0]);
						});
					} else {
						window.location.reload();
					}
				}
			})
		});
	})
	</script> --}}

<!--===============================================================================================-->
@if($errors->has('email') || $errors->has('password'))
    <script>
    $(function() {
        $('#loginModal').modal({
            show: true
        });
    });
    </script>
@endif


<script>
$('.dropdown-toggle').click(function(e){
	e.stopPropagation();
	$('.dropdown-toggle').dropdown('toggle');
  });
</script>


	<script src="{{ URL::asset('frontend/js/main.js')}}"></script>