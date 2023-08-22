<!DOCTYPE html>
<html lang="ja">

<head>
    @include('frontend.inc.head')
</head>

<body class="cnt-home">
    <!-- ============================================== HEADER ============================================== -->
    @include('frontend.inc.header')
    <!-- ============================================== HEADER : END ============================================== -->

    @yield('content')

    <!-- ============================================================= FOOTER ============================================================= -->
    @include('frontend.inc.footer')
    <!-- ============================================================= FOOTER : END============================================================= -->

    <!-- For demo purposes – can be removed on production -->

    <!-- For demo purposes – can be removed on production : End -->

    <!-- JavaScripts placed at the end of the document so the pages load faster -->
    @include('frontend.inc.script')
</body>

</html>
