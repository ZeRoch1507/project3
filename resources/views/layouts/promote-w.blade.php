<!DOCTYPE html>
<html lang="en">

<head>
    @include('include.promote-w.head')

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">


        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="con">

                @include('include.promote-w.header-w')



                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                @yield('content')
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            @include('include.promote-w.footer')

</body>

</html>
