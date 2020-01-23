<footer class="container-fluid">
    <div class="row">
        <div class="col-6 d-flex justify-content-start align-items-center">
            <span>{{ env('APP_NAME') }} - &copy;MASP {{ date('Y') }}</span>
        </div>
        <div class="col-6 d-flex justify-content-end align-items-center">
            <span>{{ strtoupper('Ambiente: ' . env('APP_ENV')) }}</span>
        </div>
    </div>
</footer>