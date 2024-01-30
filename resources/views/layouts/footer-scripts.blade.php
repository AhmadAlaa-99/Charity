  <!-- Required vendors -->
  <script src="{{ URL::asset('dashboard/vendor/global/global.min.js') }}"></script>
  <script src="{{ URL::asset('dashboard/vendor/chart.js/Chart.bundle.min.js') }}"></script>
  <script src="{{ URL::asset('dashboard/vendor/jquery-nice-select/js/jquery.nice-select.min.js') }}"></script>

  <script src="{{ URL::asset('dashboard/vendor/nouislider/nouislider.min.js') }}"></script>
  <script src="{{ URL::asset('dashboard/vendor/wnumb/wNumb.js') }}"></script>
  <script src="{{ URL::asset('dashboard/js/dashboard/dashboard-1.js') }}"></script>


  <script src="{{ URL::asset('dashboard/js/custom.min.js') }}"></script>
  <script src="{{ URL::asset('dashboard/js/dlabnav-init.js') }}"></script>
  <script src="{{ URL::asset('dashboard/js/demo.js') }}"></script>
  <script src="{{ URL::asset('dashboard/js/styleSwitcher.js') }}"></script>

  <script src="{{ asset('js/app.js') }}"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yEXdnpk+ALwxAJV9Dwdh47J7xvfzESX5c=" crossorigin="anonymous"></script>

  <script>
    $(document).ready(function() {
        // إخفاء الرسائل بعد 5 ثواني
        setTimeout(function() {
            $('.alert').fadeOut('slow');
        }, 2000); // 5000 ملي ثانية = 5 ثواني
    });
</script>







