<?php
require_once "./controlador/login.controlador.php";

$cerrar = new LoginControlador();

if (!isset($_SESSION['usuario']) || !isset($_SESSION['password'])) {
    $cerrar->CtrCerrarSession();
}
?>
<script src="vista/js/modernizr-2.0.6.min.js"></script>
<link rel="stylesheet" href="vista/css/stepform.css">

<div id="wrapper">
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Historia clinica de ortodoncia</h1>
                </div>
            </div>
            <div>
                <ul id="progressbar">
                    <li class="active">Account Setup</li>
                    <li><strong>Social Profiles</strong> </li>
                    <li><strong>Personal Details</strong></li>
                    <li><strong>Personal Details</strong></li>
                </ul>
            </div>

            <div class="row">
                <div class="col-lg-12">

                    <div class="panel-body">
                        <div class="row">
                            <form role="form" id="regiration_form">
                                <!-- Informacion del paciente -->
                                <fieldset>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input class="form-control" placeholder="Historia clinica No">
                                        </div>
                                        <div class="form-group">

                                            <input class="form-control" placeholder="Nombre del odontologo">
                                        </div>
                                        <div class="form-group">
                                            <label>Informacion general del Paciente</label>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon">Apellido</span>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon">Nombre</span>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <select class="form-control">
                                                <option value="0">Sexo</option>
                                                <option value="1">Masculino</option>
                                                <option value="2">Femenino</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon">Edad</span>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input type="date" class="form-control">
                                                <span class="input-group-btn">
                                                    <label class="btn btn-default" disabled>Fecha de nacimiento</label>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <select class="form-control">
                                                <option value="0">Seleccione tipo de sangre</option>
                                                <option>O Negativo</option>
                                                <option>O Positivo</option>
                                                <option>A Negativo</option>
                                                <option>A Positivo</option>
                                                <option>B Negativo</option>
                                                <option>B Positivo</option>
                                                <option>AB Negativo</option>
                                                <option>AB Negativo</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <select class="form-control">
                                                <option value="0">Seleccionar Estado Civil</option>
                                                <option>Soltero</option>
                                                <option>Casado</option>
                                                <option>Viudo</option>
                                                <option>Divorciado</option>
                                                <option>Union Libre</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon">Direccion y lugra de trabajo</span>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon">Telefono de residencia</span>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon">Direccion y lugra de residencia</span>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon">Telefono de trabajo</span>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-group">
                                            <input type="date" class="form-control">
                                            <span class="input-group-btn">
                                                <label class="btn btn-default" disabled>Fecha de elaboracion</label>
                                            </span>
                                        </div><br><br><br>
                                        <div class="form-group">
                                            <span class="help-block">Motivo y fecha de ultima visita al odontologo</span>
                                            <div class="input-group">
                                                <input type="text" class="form-control">
                                                <span class="input-group-btn">
                                                    <input type="date" class="form-control">
                                                </span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon">Nombre del acompañante</span>
                                                <input type="text" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon">Telefono del acompañante</span>
                                                <input type="text" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <select class="form-control">
                                                <option value="0">VIH</option>
                                                <option value="1">Positivo</option>
                                                <option value="2">Negativo</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Diagnosticado en:</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control">
                                                <span class="input-group-btn">
                                                    <input type="date" class="form-control">
                                                </span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon">Estatura</span>
                                                <input type="text" class="form-control" placeholder="cm.">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon">Temperatura</span>
                                                <input type="text" class="form-control" placeholder="°C">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon">Pulso</span>
                                                <input type="text" class="form-control" placeholder="ppm.">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon">Peso</span>
                                                <input type="text" class="form-control" placeholder="Kg.">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon">Tension Arterial</span>
                                                <input type="text" class="form-control" placeholder="mm/Hg">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon">Frecuencia respiratoria</span>
                                                <input type="text" class="form-control" placeholder="rpm">
                                            </div>

                                        </div>
                                    </div>
                                    <input type="button" name="data[password]" class="next btn btn-info" value="Siguiente" />
                                </fieldset>
                                <!--Anamnesis y antecedentes-->
                                <fieldset>
                                    <div class="col-lg-12">
                                        <h1>Anamnesis</h1>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <span class="input-group-addon">Motivo de consulta</span>
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <span class="input-group-addon">Enfermedades Actuales</span>
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <h2>Antecedentes medicos y odontologicos</h2>
                                    </div>

                                    <div class="col-lg-6">
                                        <table class="table table-striped">

                                            <thead>
                                                <tr>
                                                    <th>Tipos de antecedentes</th>
                                                    <th>SI</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th>Tratamiento medico actual</th>
                                                    <td><input type="checkbox"></td>
                                                </tr>
                                                <tr>
                                                    <th>Toma de medicamentos</th>
                                                    <td><input type="checkbox"></td>
                                                </tr>
                                                <tr>
                                                    <th>Alergias</th>
                                                    <td><input type="checkbox"></td>
                                                </tr>
                                                <tr>
                                                    <th>Cardiopatias</th>
                                                    <td><input type="checkbox"></td>
                                                </tr>
                                                <tr>
                                                    <th>Alteracion presion alterial</th>
                                                    <td><input type="checkbox"></td>
                                                </tr>
                                                <tr>
                                                    <th>Embarazo</th>
                                                    <td><input type="checkbox"></td>
                                                </tr>
                                                <tr>
                                                    <th>Diabetes</th>
                                                    <td><input type="checkbox"></td>
                                                </tr>
                                                <tr>
                                                    <th>Hepatitis</th>
                                                    <td><input type="checkbox"></td>
                                                </tr>
                                                <tr>
                                                    <th>Irradiaciones</th>
                                                    <td><input type="checkbox"></td>
                                                </tr>
                                                <tr>
                                                    <th>Discrasias sanguinias</th>
                                                    <td><input type="checkbox"></td>
                                                </tr>
                                                <tr>
                                                    <th>Fiebre reumatica</th>
                                                    <td><input type="checkbox"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-lg-6">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Tipos de antecedentes</th>
                                                    <th>SI</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th>Enfermedades renales</th>
                                                    <td><input type="checkbox"></td>
                                                </tr>
                                                <tr>
                                                    <th>Inmunosupresion</th>
                                                    <td><input type="checkbox"></td>
                                                </tr>
                                                <tr>
                                                    <th>Trastornos emocionales</th>
                                                    <td><input type="checkbox"></td>
                                                </tr>
                                                <tr>
                                                    <th>Trastornos gastricos</th>
                                                    <td><input type="checkbox"></td>
                                                </tr>
                                                <tr>
                                                    <th>Epilepsia</th>
                                                    <td><input type="checkbox"></td>
                                                </tr>
                                                <tr>
                                                    <th>Trastornos Respiratorios</th>
                                                    <td><input type="checkbox"></td>
                                                </tr>
                                                <tr>
                                                    <th>Cirugias (incluye orales)</th>
                                                    <td><input type="checkbox"></td>
                                                </tr>
                                                <tr>
                                                    <th>Enfermedades orales</th>
                                                    <td><input type="checkbox"></td>
                                                </tr>
                                                <tr>
                                                    <th>Otras Enfermedades</th>
                                                    <td><input type="checkbox"></td>
                                                </tr>
                                                <tr>
                                                    <th>Fuma o consume licor</th>
                                                    <td><input type="checkbox"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-lg-6"><br></div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <textarea class="form-control" rows="3" placeholder="Observaciones"></textarea>
                                        </div>
                                    </div>

                                    <input type="button" name="previous" class="previous btn btn-default" value="Previo" />
                                    <input type="button" name="next" class="next btn btn-info" value="Siguiente" />






                                </fieldset>

                                <fieldset>
                                    <div class="col-lg-12">

                                        <label for="">Antecedentes Medicos Familiares</label>

                                        <div class="field_wrapper">
                                            <div class="form-group col-lg-5">
                                                <label>Tipo de Antecedente </label>
                                                <input class="form-control" type="text" name="field_name[]" value="" />
                                            </div>
                                            <div class="col-lg-5">
                                                <label>Observaciones </label>
                                                <input class="form-control" type="text" name="field_name[]" value="" />
                                            </div>
                                            <div class="col-lg-1">
                                                <a href="javascript:void(0);" class="add_button " title="Add field"><i class="fa fa-plus fa-2x"></i></a>
                                            </div>
                                            <div class="col-lg-10"></div>
                                        </div>

                                    </div>
                                    <div class="col-lg-12">
                                        <h2>Examen Estomatologico</h2>
                                    </div>
                                    <div class="col-lg-6">
                                        <table class="table table-striped">

                                            <thead>
                                                <tr>
                                                    <th>Tejidos Blandos</th>
                                                    <th>Normal</th>
                                                    <th>Anormal</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th>Labio Superior</th>
                                                    <td><input type="checkbox"></td>
                                                    <td><input type="checkbox"></td>
                                                </tr>
                                                <tr>
                                                    <th>Labio Inferior</th>
                                                    <td><input type="checkbox"></td>
                                                    <td><input type="checkbox"></td>
                                                </tr>
                                                <tr>
                                                    <th>Comisuras</th>
                                                    <td><input type="checkbox"></td>
                                                    <td><input type="checkbox"></td>
                                                </tr>
                                                <tr>
                                                    <th>Mucosa Oral</th>
                                                    <td><input type="checkbox"></td>
                                                    <td><input type="checkbox"></td>
                                                </tr>
                                                <tr>
                                                    <th>Surcos Yugales</th>
                                                    <td><input type="checkbox"></td>
                                                    <td><input type="checkbox"></td>
                                                </tr>
                                                <tr>
                                                    <th>Frenillos</th>
                                                    <td><input type="checkbox"></td>
                                                    <td><input type="checkbox"></td>
                                                </tr>
                                                <tr>
                                                    <th>Paladar</th>
                                                    <td><input type="checkbox"></td>
                                                    <td><input type="checkbox"></td>
                                                </tr>
                                                <tr>
                                                    <th>Orofaringe</th>
                                                    <td><input type="checkbox"></td>
                                                    <td><input type="checkbox"></td>
                                                </tr>
                                                <tr>
                                                    <th>Lengua</th>
                                                    <td><input type="checkbox"></td>
                                                    <td><input type="checkbox"></td>
                                                </tr>
                                                <tr>
                                                    <th>Piso de boca</th>
                                                    <td><input type="checkbox"></td>
                                                    <td><input type="checkbox"></td>
                                                </tr>
                                                <tr>
                                                    <th>Rebordes Residuales</th>
                                                    <td><input type="checkbox"></td>
                                                    <td><input type="checkbox"></td>
                                                </tr>
                                                <tr>
                                                    <th>G.salivares</th>
                                                    <td><input type="checkbox"></td>
                                                    <td><input type="checkbox"></td>
                                                </tr>
                                                <tr>
                                                    <th>Otros Hallazgos</th>
                                                    <td><input type="checkbox"></td>
                                                    <td><input type="checkbox"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-lg-6">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>ATM-Oclusion</th>
                                                    <th>Normal</th>
                                                    <th>Anormal</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th>Dolor Muscular</th>
                                                    <td><input type="checkbox"></td>
                                                    <td><input type="checkbox"></td>
                                                </tr>
                                                <tr>
                                                    <th>Labio Inferior</th>
                                                    <td><input type="checkbox"></td>
                                                    <td><input type="checkbox"></td>
                                                </tr>
                                                <tr>
                                                    <th>Ruido Artcular</th>
                                                    <td><input type="checkbox"></td>
                                                    <td><input type="checkbox"></td>
                                                </tr>
                                                <tr>
                                                    <th>Alteracion del Movimiento</th>
                                                    <td><input type="checkbox"></td>
                                                    <td><input type="checkbox"></td>
                                                </tr>
                                                <tr>
                                                    <th>Maloclusiones</th>
                                                    <td><input type="checkbox"></td>
                                                    <td><input type="checkbox"></td>
                                                </tr>
                                                <tr>
                                                    <th>Alteraciones Crecimiento</th>
                                                    <td><input type="checkbox"></td>
                                                    <td><input type="checkbox"></td>
                                                </tr>
                                                <tr>
                                                    <th>Otros Hallazgos</th>
                                                    <td><input type="checkbox"></td>
                                                    <td><input type="checkbox"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-lg-6"><br><br><br><br><br><br><br><br><br></div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <textarea class="form-control" rows="3" placeholder="Observaciones"></textarea>
                                        </div>
                                    </div>

                                    <input type="button" name="previous" class="previous btn btn-default" value="Previo" />
                                    <input type="button" name="next" class="next btn btn-info" value="Siguiente" />
                                </fieldset>
                                <fieldset>
                                    <div class="col-lg-3 form-group">
                                        <div class="form-group">
                                            <h2>Tratamiento</h2>
                                            <select class="form-control" data-bind=" options: tratamientosPosibles, 
                                                                value: tratamientoSeleccionado, 
                                                                optionsText: function(item){ return item.nombre; },
                                                                optionsCaption: 'Seleccione un tratamiento...'">
                                            </select>



                                            <ul data-bind="foreach: tratamientosAplicados">
                                                <li>
                                                    P<span data-bind="text: diente.id"></span><span data-bind="text: cara"></span>
                                                    -
                                                    <span data-bind="text: tratamiento.nombre"></span>
                                                    |
                                                    <a href="#" data-bind="click: $parent.quitarTratamiento">Eliminar</a>
                                                </li>
                                            </ul>

                                        </div>
                                    </div>

                                        <div class="col-lg-9 form-group">
                                            <h2>Odontograma</h2>
                                            <div id="odontograma"></div>
                                        </div>
                                        <input type="button" name="previous" class="previous btn btn-default" value="Previo" />


                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<script src="vista/js/stepform.js"></script>
<script src="vista/js/jquery.svg.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/knockout/2.2.1/knockout-min.js"></script>
<script src="vista/js/odontograma.js"></script>