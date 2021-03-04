@extends('layouts.app')

@section('content')
<div class="container">
<!-- enctype = para fotos -->
<form action="{{ url('/empleado') }}" method="post" enctype="multipart/form-data">
<!-- llave de seguridad -->
@csrf

@include('empleado.form',['modo'=>'Crear'])

</form> 
@endsection