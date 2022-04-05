@include('layouts.admin')
<div class="container my-5">
    <div class="card">
        <h5 class="card-header">Gestionar contactos</h5>
        <div class="card-body">
            <form action="{{ route('contactos.store') }}" method="POST" id="contactosvalidate" class="needs-validation" novalidate>
                @csrf
                <div class="form-row">

                    <div class="col-md-4">
                        <label for="exampleInputEmail1" class="form-label">Nombre</label>
                        <div class="form-group">
                            <input type="text" required class="form-control @error('contacto1') is-invalid @enderror" value="{{old('contacto1')}}" id="contacto1" name="contacto1">
                            <div class="valid-feedback">
                                Correcto!
                            </div>
                            @error('contacto1')
                            <small class="text-danger"> {{ $message }} </small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="exampleInputEmail1" class="form-label">Email</label>
                        <div class="form-group">
                            <input type="email" required class="form-control @error('telefono1') is-invalid @enderror" id="email1" name="email1" value="{{old('email1')}}">
                            <div class="valid-feedback">
                                Correcto!
                            </div>
                            @error('email1')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="exampleInputEmail1" class="form-label">Telefono</label>
                        <div class="form-group">
                            <input type="number" required class="form-control @error ('telefono1') is-invalid @enderror" id="telefono1" name="telefono1" value="{{old('telefono1')}}">
                            <div class="valid-feedback">
                                Correcto!
                            </div>
                            @error('telefono1')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-1">
                        <label for="code" class="text-left">Agregar</label>
                        <div class="form-group">
                            <button type="button" class="btn btn-success" id="addContacto">
                                <i class="fas fa-plus"></i>
                            </button>

                        </div>

                    </div>


                    <div class="container-fluid" id="incrementa">

                    </div>
                    <div class="col-md-12">
                        <label for="exampleInputEmail1" class="form-label">Seleccione el servicio</label>
                        <div class="form-group">
                            <select class="form-control  @error('servicios_id') is-invalid @enderror" name="servicios_id" id="servicios_id">
                                @foreach($servicios as $servicio)
                                <option {{ old('servicios_id') == $servicio->id ? 'selected' : '' }} value="{{ $servicio->id }}">
                                    {{$servicio->nombre}}
                                    @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label for="descripcion">Descripcion</label>
                        <div class="form-group">
                            <input type="hidden" required name="descripcion" id="descripcion" value="{{old('descripcion')}}">
                            <trix-editor input="descripcion"></trix-editor>
                        </div>
                        <div class="valid-feedback">
                            Correcto!
                        </div>
                        @error('descripcion')
                        <small class="text-danger"> {{ $message }} </small>
                        @enderror
                    </div>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary float-right">Guardar</button>

                </div>

            </form>
        </div>
    </div>
</div>
<script>
    $(function() {
        var c1 = 1;
        $('#addContacto').click(function() {

            var div = '<div class="form-row">';
            var divInput = '<div class="col-md-4"> <label for="exampleInputEmail1" class="form-label">Contacto 2</label>';
            var inputCode = '<input type = "text" required class="form-control" id="contacto2" name="contacto2"></div>' +
                '<div class="col-md-4"><label class="form-label">Email</label>' +
                '<input type="text" required class="form-control" id="email2" name="email2"></div>' +
                '<div class="col-md-3"><label class="form-label">Telefono</label>' +
                '<input type="number" required class="form-control" required id="telefono2" name="telefono2"></div>';
            c1++;
            //Importante esta variable debe ir debajo del autoincrementable
            var btnDelete = '<button type="button" name="remove" id="' + c1 + '"class="btn btn-danger btn_remove">X</button>';
            $('#incrementa').append('<div class="form-row' + c1 + '">' + div + divInput + inputCode + ' <div class="col-md-1"><br> ' + btnDelete + ' </div> </div> <br>');
        });


        $(document).on('click', '.btn_remove', function() {
            var button_id = $(this).attr("id");
            console.log(button_id);
            $('.form-row' + button_id + '').remove();
        });




        $("#addContacto").click(function(event) {
            event.preventDefault();
            $("#addContacto").prop('disabled', true)
            return false;
        })




    });
</script>


<script>
    $(document).ready(function() {
        $("#contactosvalidate").validate({
            rules: {
                contacto1: {
                    required: true
                },
                email1: {
                    required: true
                },
                telefono1: {
                    required: true,
                    minlength: 1,
                    maxlength: 10,
                },
                descripcion: {
                    required: true
                },
                contacto2: {
                    required: true
                },
                email2: {
                    required: true
                },
                telefono2: {
                    required: true,
                    minlength: 1,
                    maxlength: 10,
                },
                descripcion: {
                    required: true
                },
            },
            messages: {
                contacto1: {
                    required: "Campo requerido"
                },
                email1: {
                    required: "Campo requerido"
                },
                telefono1: {
                    required: "Campo requerido"
                }, contacto2: {
                    required: "Campo requerido"
                },
                email2: {
                    required: "Campo requerido"
                },
                telefono2: {
                    required: "Campo requerido"
                },
                descripcion: {
                    required: "Campo requerido"
                }
            }
        })
    })
</script>
<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>