<form action="{{ url('/area_trabajo/') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <!-- Aqui en el include estamos incluyendo el formulario que esta en form.blade.php -->
    @include('area_trabajo.nuevo',['modo'=>'Crear']);

    </form>
