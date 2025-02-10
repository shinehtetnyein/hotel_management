<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
    {{-- webpixels --}}
    {{-- <link href="https://unpkg.com/@webpixels/css@1.2.6/dist/index.css" rel="stylesheet"> --}}
    <!-- fav icon-->
    <link href="/public/assets/img/fav/favicon3.png" rel="icon" type="image/png" sizes="16x16" />

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- bootstrap css1 & js1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    {{-- fontawesom cdn --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


    <!-- jQuery css1 js1 -->
    <link href="/assets/libs/jquery-ui-1.13.1/jquery-ui.min.css" rel="stylesheet" type="text/css">

    <!-- lightslider css1 js1 -->
    <link href="/assets/libs/lightslider-master/dist/css/lightslider.min.css" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">


    <!-- custom css  -->
    <link href="/css/style.css" rel="stylesheet" type="text/css" />


</head>

<body>

    @include('hotel.include.header')
    @yield('content')
    @include('hotel.include.footer')

    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015"
        integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ=="
        data-cf-beacon='{"rayId":"8c7fb804fa3c19ad","serverTiming":{"name":{"cfExtPri":true,"cfL4":true}},"version":"2024.8.0","token":"cd0b4b3a733644fc843ef0b185f98241"}'
        crossorigin="anonymous"></script>

    <script src="js/popper.js"></script>


    <!--bootstrap css1 & js1 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <!-- jQuery js1 -->
    <script src="/assets/libs/jquery-3.6.0/jquery-3.6.0.min.js" type="text/javascript"></script>

    <!-- jQuery ui css1 js1 -->
    <script src="/assets/libs/jquery-ui-1.13.1/jquery-ui.min.js" type="text/javascript"></script>


    <!-- lightslider css1 js1 -->
    <script src="/assets/libs/lightslider-master/dist/js/lightslider.min.js" type="text/javascript"></script>

    <!-- custom js  -->
    <script src="/js/app.js" type="text/javascript"></script>



</body>

</html>
