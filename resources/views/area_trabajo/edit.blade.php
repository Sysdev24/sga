<form action="{{ url('/area_trabajo/'.$area_trabajo->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    {{ method_field('PATCH') }}

    @include('area_trabajo.nuevo',['modo'=>'Editar']);

    </form>
