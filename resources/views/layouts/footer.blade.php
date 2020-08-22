
<div class="my-4"><br></div>

<!-- Footer -->
<footer class="fixed-bottom page-footer font-small mt-5">
    <div class="row footer-copyright text-left bg-secondary text-white mt-5 py-3">
        <!-- Copyright -->
        <div class="col ml-4"> 
            © 2018<?='2018' != date('Y')?'-' . date('Y'):'';?> Copyright&nbsp; <a href="https://brunofontes.net" class="link text-white-50" target="_blank">Bruno Fontes</a>
        </div>
        <div class="col mr-4 text-right">
            <a href="{{ url('/lang/pt-br') }}" class="link text-white">Português</a>
            <span class="d-none d-sm-inline"> | </span>
            <span class="d-xs-block d-sm-none"> <br> </span>
            <a href="{{ url('/lang/en') }}" class="link text-white">English</a>
        </div>
    <!-- Copyright -->
    </div>
</footer>
@include('layouts.tracker')