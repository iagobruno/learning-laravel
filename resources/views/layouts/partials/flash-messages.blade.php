@if (session('success'))
    <div class="alert alert-success">
        ✅ {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-error">
        ❗ {{ session('error') }}
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
