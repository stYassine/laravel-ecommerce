<!-- Header -->
@include('partials.header')


<div class="content-wrapper">

    @include('partials.storeText')

    <!-- End Books products grid -->

    @yield('content')
    
    
</div>

<!-- Footer -->
@include('partials.footer')