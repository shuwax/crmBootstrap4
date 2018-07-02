<!--   Core JS Files   -->
<script src="{{ asset("/assets/js/jquery-3.2.1.min.js")}}" type="text/javascript"></script>
<script src="{{ asset("/assets/bootstrap/js/bootstrap.min.js")}}" type="text/javascript"></script>
<script src="{{ asset("/assets/js/material.min.js")}}" type="text/javascript"></script>
<script src="{{ asset("/assets/js/perfect-scrollbar.jquery.min.js")}}" type="text/javascript"></script>
<!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
<!-- Library for adding dinamically elements -->
<script src="{{ asset("/assets/js/arrive.min.js")}}" type="text/javascript"></script>
<!-- Forms Validations Plugin -->
<script src="{{ asset("/assets/js/jquery.validate.min.js")}}"></script>
<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
<script src="{{ asset("/assets/js/moment.min.js")}}"></script>
<!--  Charts Plugin, full documentation here: https://gionkunz.github.io/chartist-js/ -->
<script src="{{ asset("/assets/js/chartist.min.js")}}"></script>
<!--  Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
<script src="{{ asset("/assets/js/jquery.bootstrap-wizard.js")}}"></script>
<!--  Notifications Plugin, full documentation here: http://bootstrap-notify.remabledesigns.com/    -->
<script src="{{ asset("/assets/js/bootstrap-notify.js")}}"></script>
<!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
<script src="{{ asset("/assets/js/bootstrap-datetimepicker.js")}}"></script>
<!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
<script src="{{ asset("/assets/js/jquery-jvectormap.js")}}"></script>
<!-- Sliders Plugin, full documentation here: https://refreshless.com/nouislider/ -->
<script src="{{ asset("/assets/js/nouislider.min.js")}}"></script>
<!--  Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
<script src="{{ asset("/assets/js/jquery.select-bootstrap.js")}}"></script>
<!--  DataTables.net Plugin, full documentation here: https://datatables.net/    -->
<script src="{{ asset("/assets/js/jquery.datatables.js")}}"></script>
<!-- Sweet Alert 2 plugin, full documentation here: https://limonte.github.io/sweetalert2/ -->
<script src="{{ asset("/assets/js/sweetalert2.js")}}"></script>
<!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="{{ asset("/assets/js/jasny-bootstrap.min.js")}}"></script>
<!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
<script src="{{ asset("/assets/js/fullcalendar.min.js")}}"></script>
<!-- Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
<script src="{{ asset("/assets/js/jquery.tagsinput.js")}}"></script>
<!-- Material Dashboard javascript methods -->
<script src="{{ asset("/assets/js/material-dashboard.js?v=1.2.1")}}"></script>
<script src="{{ asset("/assets/js/demo.js")}}"></script>
<script type="text/javascript">
    $(document).ready(function() {

        // Javascript method's body can be found in assets/js/demos.js
        demo.initDashboardPageCharts();

        demo.initVectorMap();
    });
</script>








{{--<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->--}}

{{--<script src="http://code.jquery.com/jquery-2.1.3.min.js"></script>--}}
{{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>--}}
{{--<script src="{{ asset('/js/bootstrap.min.js')}}"></script>--}}
{{--<script src="{{ asset('/vendor/bootstrap/js/bootstrap.min.js')}}"></script>--}}
{{--<script src="{{ asset('/js/bootstrap-datetimepicker.min.js')}}"></script>--}}
{{--<script src="{{ asset('/js/bootstrapLanguage.js')}}"></script>--}}
{{--<!-- Metis Menu Plugin JavaScript -->--}}
{{--<script src="{{ asset('/vendor/metisMenu/metisMenu.min.js')}}"></script>--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>--}}

{{--<!-- Custom Theme JavaScript -->--}}
{{--<script src="{{ asset('/js/sb-admin-2.js')}}"></script>--}}
{{--<!-- Bootstrap Core JavaScript -->--}}
{{--<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>--}}
{{--<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>--}}

{{--<script src="//cdnjs.cloudflare.com/ajax/libs/mouse0270-bootstrap-notify/3.1.5/bootstrap-notify.min.js"></script>--}}

{{-- Here go includes from folder js_includes --}}

{{-- Include JS for moving notifications div--}}
{{--@include('partials.js_includes._janky_notifications')--}}

{{-- Include JS for multiple table sliders --}}
{{--@include('partials.js_includes._sliders')--}}

{{-- Include JS for sound notifications--}}
{{--@include('partials.js_includes._sound_notifications')--}}

{{-- Include small janky table for DKJ--}}
{{--@include('partials.js_includes._janky_table_small')--}}

{{-- Include big janky table for DKJ--}}
{{--@include('partials.js_includes._janky_table_big')--}}

{{-- Include JS for change department--}}
{{--@include('partials.js_includes._change_department')--}}

{{-- Include JS for notifications--}}
{{--@include('partials.js_includes._notifications')--}}

{{-- Include JS for users table--}}
{{--@include('partials.js_includes._users_table')--}}

{{-- Include JS for bootstrap notifications --}}
{{--@include('partials.nav_includes._bootstrap_notifications')--}}

{{-- End of includes --}}

{{--<script>--}}
{{--/*--}}
{{--$(document).ready(function() {--}}

{{--var menu_visible = localStorage.menu_visible;--}}
{{--var windowMenu = $('#menu-toggle').attr('aria-pressed');--}}

{{--if (menu_visible == 'false') {--}}
{{--$('#menu-toggle').attr('aria-pressed', true);--}}
{{--$('#menu-toggle').addClass('active');--}}
{{--}--}}


{{--// });--}}
{{--// window.onfocus = function() {--}}
{{--//     checkForMenu();--}}
{{--// };--}}
{{--// function checkForMenu(){--}}
{{--//     var menu_visible = localStorage.menu_visible;--}}
{{--// console.log('focus');--}}
{{--//     var windowMenu = $('#menu-toggle').attr('aria-pressed');--}}
{{--//     console.log(menu_visible+ " " +windowMenu);--}}
{{--//     if (menu_visible == 'true' && windowMenu == 'true') {--}}
{{--//         $('#menu-toggle').attr('aria-pressed', false);--}}
{{--//         $('#sidebar-wrapper').fadeIn(0);--}}
{{--//     }--}}
{{--//--}}
{{--//     if (menu_visible == 'false' && windowMenu == 'false') {--}}
{{--//         $('#menu-toggle').attr('aria-pressed', true);--}}
{{--//         $('#sidebar-wrapper').fadeOut(0);--}}
{{--//         $("#wrapper").toggleClass("toggled");--}}
{{--//         $('#wrapper.toggled').find("#sidebar-wrapper").find(".collapse").collapse('hide');--}}
{{--//     }--}}
{{--// }--}}
{{--*/--}}

{{--//Auto resize--}}

{{--$(window).on('resize',function (e) {--}}
{{--let side_bar_status = $('#sidebar-wrapper').css('display'); //none or block--}}
{{--if($(window).width() <= 880 && side_bar_status == 'block'){--}}
{{--console.log();--}}
{{--$('.toggle-on').trigger('click');--}}
{{--}else if($(window).width() > 880 && side_bar_status == 'none'){--}}
{{--console.log();--}}
{{--$('.toggle-on').trigger('click');--}}
{{--}--}}
{{--});--}}



{{--if (typeof(Storage) !== "undefined") {--}}
{{--if (!localStorage.menu_visible) {--}}
{{--localStorage.setItem("menu_visible", "true");--}}
{{--}--}}
{{--}--}}

{{--$(document).ready(function() {--}}
{{--var menu_visible = localStorage.menu_visible;--}}

{{--let side_bar_status = $('#sidebar-wrapper').css('display'); //none or block--}}

{{--if($(window).width() <= 880 && side_bar_status == 'block'){--}}
{{--console.log();--}}
{{--$('.toggle-on').trigger('click');--}}
{{--}else if($(window).width() > 880 && side_bar_status == 'none'){--}}
{{--console.log();--}}
{{--$('.toggle-on').trigger('click');--}}
{{--}--}}


{{--if (menu_visible == 'false') {--}}
{{--$('#menu-toggle').prop('checked', true).change();--}}
{{--$('#sidebar-wrapper').fadeOut(0);--}}
{{--localStorage.setItem("menu_visible", "false");--}}
{{--$("#wrapper").toggleClass("toggled");--}}
{{--$('#wrapper.toggled').find("#sidebar-wrapper").find(".collapse").collapse('hide');--}}
{{--}--}}
{{--});--}}

{{--$('#menu-toggle').change(function() {--}}

{{--var menu_visible = localStorage.menu_visible;--}}
{{--if (menu_visible == 'true') {--}}
{{--$('#sidebar-wrapper').fadeOut(0);--}}
{{--/*$('#menu-toggle').attr('aria-pressed', true);*/--}}
{{--localStorage.setItem("menu_visible", "false");--}}
{{--} else {--}}
{{--$('#sidebar-wrapper').fadeIn(0);--}}
{{--/*$('#menu-toggle').attr('aria-pressed', false);*/--}}
{{--localStorage.setItem("menu_visible", "true");--}}
{{--}--}}

{{--$("#wrapper").toggleClass("toggled");--}}
{{--$('#wrapper.toggled').find("#sidebar-wrapper").find(".collapse").collapse('hide');--}}

{{--});--}}



{{--$('#blok').on('click', () => {--}}
{{--window.location.replace("{{URL::to('/dkjVerification/')}}");--}}
{{--});--}}

{{--setInterval(function () {--}}
{{--countNotifications();--}}
{{--},60000);--}}

{{--$(document).ready(function(){--}}
{{--countNotifications();--}}
{{--});--}}

{{--</script>--}}
