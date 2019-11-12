<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title') - Forum Admin</title>

    <link href="{{asset('css/admin.css')}}" rel="stylesheet">

    @yield('styles')


</head>

<body id="page-top">

@include('inc.admin_nav')

<div id="wrapper">

    <!-- Sidebar -->
    @include('inc.admin_sidebar')




    <div id="content-wrapper">

        <div class="container-fluid">

            @yield('content')

        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <footer class="sticky-footer">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright © Forum {{date('Y')}} - All Rights Reserved</span>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-primary" href="{{route('logout')}}">Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Bootstrap core JavaScript-->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="{{asset('js/admin.js')}}"></script>
<script src="{{asset('js/charts/chart-area-demo.js')}}"></script>
<script src="{{asset('js/dataTables.bootstrap4.js')}}"></script>
<script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('js/sweetalert.js')}}"></script>
<script>

    $(document).ready(function() {

        $('#dataTable').DataTable();


    });

</script>



@yield('scripts')




@if(!empty(session('success')))
    {{--{{session('success')}}--}}
    <script>
        swal({
            title: "{{session('success')}}",
            icon: "success",
            button: "ok",
            timer: 3000,
        });

    </script>

@endif
@if(!empty(session('error')))
    {{--{{session('deleted')}}--}}
    <script>
        swal({
            title: "{{session('error')}}",
            icon: "error",
            button: "ok",
            timer: 3000,
        });

    </script>
@endif


</body>

</html>