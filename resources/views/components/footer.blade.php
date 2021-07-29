<footer>

    <div class="row align-items-center">
        <div class="col-lg-6">
            <span>© 2021 French Bull Dogs. All rights reserved.</span>
        </div>
        <div class="col-lg-6">
            <div class="container mt-4">
                <?php $shareComponent = app('App\Http\Controllers\HomeController')->ShareComponent() ?>
                {!! $shareComponent !!}
            </div>
        </div>
    </div>
</footer>
