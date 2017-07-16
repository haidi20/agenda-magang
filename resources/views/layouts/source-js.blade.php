<!-- Jquery Core Js -->
<script src="{{!Request::secure()?secure_asset('plugins/jquery/jquery.min.js'):asset('plugins/jquery/jquery.min.js')}}"></script>

<!-- Bootstrap Core Js -->
<script src="{{!Request::secure()?secure_asset('plugins/bootstrap/js/bootstrap.js'):asset('plugins/bootstrap/js/bootstrap.js')}}"></script>

<!-- Waves Effect Plugin Js -->
<script src="{{!Request::secure()?secure_asset('plugins/node-waves/waves.js'):asset('plugins/node-waves/waves.js')}}"></script>

<!-- Validation Plugin Js -->
<script src="{{!Request::secure()?secure_asset('plugins/jquery-validation/jquery.validate.js'):asset('plugins/jquery-validation/jquery.validate.js')}}"></script>

<!-- Custom Js -->
<script src="{{!Request::secure()?secure_asset('js/admin.js'):asset('js/admin.js')}}"></script>
<script src="{{!Request::secure()?secure_asset('js/pages/examples/sign-in.js'):asset('js/pages/examples/sign-in.js')}}"></script>
