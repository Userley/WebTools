@extends('layouts.plantilla')

@section('title', 'Home')

@section('header')
    <div class="col-lg-10">
        <h2>Dispositivos</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.html">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a href="index.html">Dispositivos</a>
            </li>
        </ol>
    </div>
@endsection

@section('content')
    <h1>Registro</h1>

    <div class="ibox">
        <div class="ibox-title">
            <h5>Wizard with Validation</h5>
            <div class="ibox-tools">
                <a class="collapse-link">
                    <i class="fa fa-chevron-up"></i>
                </a>
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-wrench"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="#">Config option 1</a>
                    </li>
                    <li><a href="#">Config option 2</a>
                    </li>
                </ul>
                <a class="close-link">
                    <i class="fa fa-times"></i>
                </a>
            </div>
        </div>
        <div class="ibox-content">
            <h2>
                Asociaciones
            </h2>

            <form id="form" action="#" class="wizard-big">
                <h1>Color</h1>
                <fieldset>
                    <h2>Color Information</h2>
                    <div class="row">
                        <div class="col-lg-8">
                            {{-- <div class="form-group">
                                <label>Username *</label>
                                <input id="userName" name="userName" type="text" class="form-control ">
                            </div>
                            <div class="form-group">
                                <label>Password *</label>
                                <input id="password" name="password" type="text" class="form-control ">
                            </div>
                            <div class="form-group">
                                <label>Confirm Password *</label>
                                <input id="confirm" name="confirm" type="text" class="form-control ">
                            </div> --}}

                            <table class="table" class="listado_subproductos" id="tabla1" >
                                <thead>
                                    <th>Item</th>
                                    <th>Texto1</th>
                                    <th>Texto2</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <input id="check1" name="acceptTerms" type="checkbox" class="" onchange="revisar()">
                                        </td>
                                        <td>aaaaaaa</td>
                                        <td>aaaaaaa</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input id="check2" name="acceptTerms" type="checkbox" class="" onchange="revisar()">
                                        </td>
                                        <td>bbbbbbbb</td>
                                        <td>bbbbbb</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input id="check3" name="acceptTerms" type="checkbox" class="" onchange="revisar()">
                                        </td>
                                        <td>cccccccc</td>
                                        <td>ccccc</td>
                                    </tr>
                                </tbody>
                            </table>
                            <br>
                            <button onclick="siguiente()" class="btn btn-secondary">Siguiente </button>
                        </div>
                        <div class="col-lg-4">
                            <div class="text-center">

                                <button type="button" id="modalx" class="btn btn-primary" onclick="agregarFila()">
                                    New Color
                                </button>


                            </div>

                        </div>
                    </div>

                </fieldset>
                <h1>Profile</h1>
                <fieldset>
                    <h2>Profile Information</h2>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>First name *</label>
                                <input id="name" name="name" type="text" class="form-control ">
                            </div>
                            <div class="form-group">
                                <label>Last name *</label>
                                <input id="surname" name="surname" type="text" class="form-control ">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Email *</label>
                                <input id="email" name="email" type="text" class="form-control  email">
                            </div>
                            <div class="form-group">
                                <label>Address *</label>
                                <input id="address" name="address" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                </fieldset>

                <h1>Warning</h1>
                <fieldset>
                    <div class="text-center" style="margin-top: 120px">
                        <h2>You did it Man :-)</h2>
                    </div>
                </fieldset>

                <h1>Finish</h1>
                <fieldset>
                    <h2>Terms and Conditions</h2>
                    <input id="acceptTerms" name="acceptTerms" type="checkbox" class=""> <label for="acceptTerms">I
                        agree with the Terms and Conditions.</label>
                </fieldset>
            </form>
        </div>
    </div>
    </div>


@endsection

<script>
    window.addEventListener('load', function() {
        $(".actions").hide();
    });

    function revisar() {
        var selected = '';    
        $('#tabla1 input[type=checkbox]').each(function(){
            if (this.checked) {
                selected += $(this).val()+', ';
            }
        }); 
        console.log(selected);
    }

    function agregarFila() {
        document.getElementById('tabla1').insertRow(-1).innerHTML =
            '<td> <input id="check1" name="acceptTerms" type="checkbox" class=""></td><td>eeeeeeee</td><td>eeeeeee</td>';
    }


    function siguiente() {
        // alert("Hola");
        window.location.href = "#next";
    }

    var myModal = document.getElementById('exampleModal')
    var myInput = document.getElementById('modalx')

    myModal.addEventListener('shown.bs.modal', function() {
        myInput.focus()
    })
</script>
