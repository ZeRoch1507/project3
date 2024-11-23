<!DOCTYPE html>
<html lang="en">

<head>
    @include('include.admin.head')

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">

        @include('include.admin.sidebar')

        <!-- Body Wrapper -->
        <div class="body-wrapper">

            <!-- Main Content -->
            <div id="content">

                @include('include.admin.header')



                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                @yield('con')
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            @include('include.admin.footer')

</body>

</html>
