<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
    <!-- fav icon-->
    <link href="/public/assets/img/fav/favicon3.png" rel="icon" type="image/png" sizes="16x16" />

    <!-- bootstrap css1 & js1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    {{-- fontawesom cdn --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


    <!-- jQuery css1 js1 -->
    <link href="/assets/libs/jquery-ui-1.13.1/jquery-ui.min.css" rel="stylesheet" type="text/css">

    <!-- lightslider css1 js1 -->
    <link href="/assets/libs/lightslider-master/dist/css/lightslider.min.css" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">


    <!-- custom css  -->
    <link href="/css/style.css" rel="stylesheet" type="text/css" />

    <link href="/css/admin_style.css" rel="stylesheet" type="text/css" />

    {{-- webpixels --}}
    <link href="https://unpkg.com/@webpixels/css@1.2.6/dist/index.css" rel="stylesheet">

</head>

<body>
    @include('admin/include/sideBar')

    <!--bootstrap css1 & js1 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <script src="js/popper.js"></script>


    <!-- jQuery js1 -->
    <script src="/assets/libs/jquery-3.6.0/jquery-3.6.0.min.js" type="text/javascript"></script>

    <!-- jQuery ui css1 js1 -->
    <script src="/assets/libs/jquery-ui-1.13.1/jquery-ui.min.js" type="text/javascript"></script>

    {{-- chart library --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- custom js  -->
    <script src="/js/app.js" type="text/javascript"></script>



</body>

</html>
