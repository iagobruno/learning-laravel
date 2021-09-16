@if ($message = Session::get('success'))
    <div class="alert alert-success">
        ✅ {{ $message }}
    </div>
@endif

@if ($message = Session::get('error'))
    <div class="alert alert-error">
        ❗ {{ $message }}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-error">
        ❗ Corrija os erros abaixo
    </div>
@endif

<style>
    .alert {
        display: block;
        margin-bottom: 16px;
    }
    .alert-success {
        color: green;
        font-weight: bold;
    }
    .alert-error {
        color: red;
    }
</style>
