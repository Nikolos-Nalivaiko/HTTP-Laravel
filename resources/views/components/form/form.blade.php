<form action="{{ $action }}" method="{{ $method }}" enctype="multipart/form-data" class="create-form">
    @csrf

    {{ $slot }}

</form>