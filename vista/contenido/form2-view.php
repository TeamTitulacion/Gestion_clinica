<?php
require_once "./controlador/login.controlador.php";
require_once "./controlador/paciente.controlador.php";
require_once "./controlador/medico.controlador.php";

$cerrar = new LoginControlador();



if (!isset($_SESSION['usuario']) || !isset($_SESSION['password'])) {
    $cerrar->CtrCerrarSession();
}
$info = new PacienteControlador();
$res = $info->CtrHistoria();
$med = new MedicoControlador();
$medifo = $med->CtrDoctor();

?>
<script src="<?php echo SERVERURL ?>/vista/js/modernizr-2.0.6.min.js"></script>
<link rel="stylesheet" href="<?php echo SERVERURL ?>/vista/css/stepform.css">

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
                    <li class="active">Inicio</li>
                    <li><strong>Anamnesis</strong> </li>
                    <li><strong>Examenes y antecedentes medicos</strong></li>
                    <li><strong>Odontograma</strong></li>
                    <li><strong>Placa bacteriana</strong></li>
                    <li><strong>Examenes complementarios</strong></li>
                    <li><strong>Diagnostico y plan de tratamiento</strong></li>
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
                                        <div class="input-group form-group">
                                            <span class="input-group-addon" id="basic-addon1">Numero de historia</span>
                                            <input id="NumHist" name="NumHist" class="form-control" value="<?php echo $res['pac_nhistoria'] ?>" disabled>
                                        </div>
                                        <div class="input-group form-group">
                                            <span class="input-group-addon" id="basic-addon1">Nombre del odontologo</span>
                                            <select id="NomOdontologo" name="NomOdontologo" class="form-control" >
                                                <?php foreach ($medifo as $key => $value) {
                                                ?><option value="<?php echo $value["id_medico"]; ?>"><?php echo $value["med_nombre"] . " " . $value["med_apellido"]; ?></option>
                                                <?php }; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Informacion general del Paciente</label>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon">Apellido</span>
                                                <input id="Apellido" name="Apellido" type="text" value="<?php echo $res['pac_apellido'] ?>" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon">Nombre</span>
                                                <input id="Nombre" name="Nombre" type="text" value="<?php echo $res['pac_nombre'] ?>" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <select id="Sexo" name="Sexo" class="form-control">
                                                <option value="<?php echo $res['pac_sexo'] ?>">Masculino</option>
                                                <option value="2">Femenino</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon">Edad</span>
                                                <?php
                                                $fechaActual = date('Y-m-d');
                                                $datetime1 = date_create($res['pac_fecha_nacimiento']);
                                                $datetime2 = date_create($fechaActual);
                                                $contador = date_diff($datetime2, $datetime1);
                                                $differenceFormat = '%y';
                                                ?>
                                                <input id="Edad" name="Edad" type="text" value="<?php echo $contador->format($differenceFormat) ?>" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input id="FechaNac" name="FechaNac" type="date" value="<?php echo $res['pac_fecha_nacimiento'] ?>" class="form-control">
                                                <span class="input-group-btn">
                                                    <label class="btn btn-default" disabled>Fecha de nacimiento</label>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <select id="Sangre" name="Sangre" class="form-control">
                                                <option value="<?php echo $res['pac_sangre'] ?>"><?php echo $res['pac_sangre'] ?></option>
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
                                            <select id="Estado" name="Estado" class="form-control">
                                                <option value="<?php echo $res['pac_estado_civil'] ?>"><?php echo $res['pac_estado_civil'] ?></option>
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
                                                <input id="DirrTra" name="DirrTra" type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon">Telefono de residencia</span>
                                                <input name="Tele" id="Tele" type="text" value="<?php echo $res['pac_telefono'] ?>" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon">Direccion y lugra de residencia</span>
                                                <input id="DirrCas" name="DirrCas" type="text" value="<?php echo $res['pac_direccion'] ?>" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon">Telefono de trabajo</span>
                                                <input id="TeleTra" name="TeleTra" type="text" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-group">
                                            <input id="FechaEla" name="FechaEla" type="date" value="<?php echo $fechaActual ?>" class="form-control">
                                            <span class="input-group-btn">
                                                <label class="btn btn-default" disabled>Fecha de elaboracion</label>
                                            </span>
                                        </div><br><br><br>
                                        <div class="form-group">
                                            <span class="help-block">Motivo y fecha de ultima visita al odontologo</span>
                                            <div class="input-group">
                                                <input id="Motivo" name="Motivo" type="text" class="form-control">
                                                <span class="input-group-btn">
                                                    <input id="FechaMo" name="FechaMo" type="date" class="form-control">
                                                </span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon">Nombre del acompañante</span>
                                                <input id="NomAcompa" name="NomAcompa" type="text" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon">Telefono del acompañante</span>
                                                <input id="TeleAcompa" name="TeleAcompa" type="text" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <select id="Vih" name="Vih" class="form-control">
                                                <option value="0">VIH</option>
                                                <option value="1">Positivo</option>
                                                <option value="2">Negativo</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Diagnosticado en:</label>
                                            <div class="input-group">
                                                <input id="DiagVIH" name="DiagVIH" type="text" class="form-control">
                                                <span class="input-group-btn">
                                                    <input id="FechaVIH" name="FechaVIH"  type="date" class="form-control">
                                                </span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon">Estatura</span>
                                                <input id="Estatura" name="Estatura" type="text" class="form-control" placeholder="cm.">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon">Temperatura</span>
                                                <input id="Temp" name="Temp" type="text" class="form-control" placeholder="°C">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon">Pulso</span>
                                                <input id="Pulso" name="Pulso" type="text" class="form-control" placeholder="ppm.">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon">Peso</span>
                                                <input id="Peso" name="Peso" type="text" class="form-control" placeholder="Kg.">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon">Tension Arterial</span>
                                                <input id="TenArte" name="TenArte" type="text" class="form-control" placeholder="mm/Hg">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon">Frecuencia respiratoria</span>
                                                <input id="FrecuRespi" name="FrecuRespi" type="text" class="form-control" placeholder="rpm">
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
                                                    <input id="MoConsulta" name="MoConsulta" type="text" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <span class="input-group-addon">Enfermedades Actuales</span>
                                                    <input id="EnfeActuales" name="EnfeActuales" type="text" class="form-control">
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
                                                    <td><input id="TiposAnte1" name="TipoAnte1" type="checkbox"></td>
                                                </tr>
                                                <tr>
                                                    <th>Toma de medicamentos</th>
                                                    <td><input id="TiposAnte2" name="TipoAnte2" type="checkbox"></td>
                                                </tr>
                                                <tr>
                                                    <th>Alergias</th>
                                                    <td><input id="TiposAnte3" name="TipoAnte3" type="checkbox"></td>
                                                </tr>
                                                <tr>
                                                    <th>Cardiopatias</th>
                                                    <td><input id="TiposAnte4" name="TipoAnte4" type="checkbox"></td>
                                                </tr>
                                                <tr>
                                                    <th>Alteracion presion alterial</th>
                                                    <td><input id="TiposAnte5" name="TipoAnte5" type="checkbox"></td>
                                                </tr>
                                                <tr>
                                                    <th>Embarazo</th>
                                                    <td><input id="TiposAnte6" name="TipoAnte6" type="checkbox"></td>
                                                </tr>
                                                <tr>
                                                    <th>Diabetes</th>
                                                    <td><input id="TiposAnte7" name="TipoAnte7" type="checkbox"></td>
                                                </tr>
                                                <tr>
                                                    <th>Hepatitis</th>
                                                    <td><input id="TiposAnte8" name="TipoAnte8" type="checkbox"></td>
                                                </tr>
                                                <tr>
                                                    <th>Irradiaciones</th>
                                                    <td><input id="TiposAnte9" name="TipoAnte9" type="checkbox"></td>
                                                </tr>
                                                <tr>
                                                    <th>Discrasias sanguinias</th>
                                                    <td><input id="TiposAnte10" name="TipoAnte10" type="checkbox"></td>
                                                </tr>
                                                <tr>
                                                    <th>Fiebre reumatica</th>
                                                    <td><input id="TiposAnte11" name="TipoAnte11" type="checkbox"></td>
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
                                                    <td><input id="TiposAnte12" name="TipoAnte12" type="checkbox"></td>
                                                </tr>
                                                <tr>
                                                    <th>Inmunosupresion</th>
                                                    <td><input id="TiposAnte13" name="TipoAnte13" type="checkbox"></td>
                                                </tr>
                                                <tr>
                                                    <th>Trastornos emocionales</th>
                                                    <td><input id="TiposAnte14" name="TipoAnte14" type="checkbox"></td>
                                                </tr>
                                                <tr>
                                                    <th>Trastornos gastricos</th>
                                                    <td><input id="TiposAnte15" name="TipoAnte15" type="checkbox"></td>
                                                </tr>
                                                <tr>
                                                    <th>Epilepsia</th>
                                                    <td><input id="TiposAnte16" name="TipoAnte16" type="checkbox"></td>
                                                </tr>
                                                <tr>
                                                    <th>Trastornos Respiratorios</th>
                                                    <td><input id="TiposAnte17" name="TipoAnte17" type="checkbox"></td>
                                                </tr>
                                                <tr>
                                                    <th>Cirugias (incluye orales)</th>
                                                    <td><input id="TiposAnte18" name="TipoAnte18" type="checkbox"></td>
                                                </tr>
                                                <tr>
                                                    <th>Enfermedades orales</th>
                                                    <td><input id="TiposAnte19" name="TipoAnte19" type="checkbox"></td>
                                                </tr>
                                                <tr>
                                                    <th>Otras Enfermedades</th>
                                                    <td><input id="TiposAnte20" name="TipoAnte20" type="checkbox"></td>
                                                </tr>
                                                <tr>
                                                    <th>Fuma o consume licor</th>
                                                    <td><input id="TiposAnte21" name="TipoAnte21" type="checkbox"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-lg-6"><br></div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <textarea class="form-control" rows="3" placeholder="Observaciones" id="ObservaAntece" name="ObservaAntece"></textarea>
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
                                                <input class="form-control" type="text" name="field_name[]" id="field_name[]" value="" />
                                            </div>
                                            <div class="col-lg-5">
                                                <label>Observaciones </label>
                                                <input class="form-control" type="text" name="field_name[]" id="field_name[]" value="" />
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
                                                    <td><input id="TejidosN1" name="TejidosN1" type="checkbox"></td>
                                                    <td><input id="TejidosA1" name="TejidosA1" type="checkbox"></td>
                                                </tr>
                                                <tr>
                                                    <th>Labio Inferior</th>
                                                    <td><input id="TejidosN2" name="TejidosN2" type="checkbox"></td>
                                                    <td><input id="TejidosA2" name="TejidosA2" type="checkbox"></td>
                                                </tr>
                                                <tr>
                                                    <th>Comisuras</th>
                                                    <td><input id="TejidosN3" name="TejidosN3" type="checkbox"></td>
                                                    <td><input id="TejidosA3" name="TejidosA3" type="checkbox"></td>
                                                </tr>
                                                <tr>
                                                    <th>Mucosa Oral</th>
                                                    <td><input id="TejidosN4" name="TejidosN4" type="checkbox"></td>
                                                    <td><input id="TejidosA4" name="TejidosA4" type="checkbox"></td>
                                                </tr>
                                                <tr>
                                                    <th>Surcos Yugales</th>
                                                    <td><input id="TejidosN5" name="TejidosN5" type="checkbox"></td>
                                                    <td><input id="TejidosA5" name="TejidosA5" type="checkbox"></td>
                                                </tr>
                                                <tr>
                                                    <th>Frenillos</th>
                                                    <td><input id="TejidosN6" name="TejidosN6" type="checkbox"></td>
                                                    <td><input id="TejidosA6" name="TejidosA6" type="checkbox"></td>
                                                </tr>
                                                <tr>
                                                    <th>Paladar</th>
                                                    <td><input id="TejidosN7" name="TejidosN7" type="checkbox"></td>
                                                    <td><input id="TejidosA7" name="TejidosA7" type="checkbox"></td>
                                                </tr>
                                                <tr>
                                                    <th>Orofaringe</th>
                                                    <td><input id="TejidosN8" name="TejidosN8" type="checkbox"></td>
                                                    <td><input id="TejidosA8" name="TejidosA8" type="checkbox"></td>
                                                </tr>
                                                <tr>
                                                    <th>Lengua</th>
                                                    <td><input id="TejidosN9" name="TejidosN9" type="checkbox"></td>
                                                    <td><input id="TejidosA9" name="TejidosA9" type="checkbox"></td>
                                                </tr>
                                                <tr>
                                                    <th>Piso de boca</th>
                                                    <td><input id="TejidosN10" name="TejidosN10" type="checkbox"></td>
                                                    <td><input id="TejidosA10" name="TejidosA10" type="checkbox"></td>
                                                </tr>
                                                <tr>
                                                    <th>Rebordes Residuales</th>
                                                    <td><input id="TejidosN11" name="TejidosN11" type="checkbox"></td>
                                                    <td><input id="TejidosA11" name="TejidosA11" type="checkbox"></td>
                                                </tr>
                                                <tr>
                                                    <th>G.salivares</th>
                                                    <td><input id="TejidosN12" name="TejidosN12" type="checkbox"></td>
                                                    <td><input id="TejidosA12" name="TejidosA12" type="checkbox"></td>
                                                </tr>
                                                <tr>
                                                    <th>Otros Hallazgos</th>
                                                    <td><input id="TejidosN13" name="TejidosN13" type="checkbox"></td>
                                                    <td><input id="TejidosA13" name="TejidosA13" type="checkbox"></td>
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
                                                    <td><input id="AtmN1" name="AtmN1" type="checkbox"></td>
                                                    <td><input id="AtmA1" name="AtmA1" type="checkbox"></td>
                                                </tr>
                                                <tr>
                                                    <th>Labio Inferior</th>
                                                    <td><input id="AtmN2" name="AtmN2" type="checkbox"></td>
                                                    <td><input id="AtmA2" name="AtmA2" type="checkbox"></td>
                                                </tr>
                                                <tr>
                                                    <th>Ruido Artcular</th>
                                                    <td><input id="AtmN3" name="AtmN3" type="checkbox"></td>
                                                    <td><input id="AtmA3" name="AtmA3" type="checkbox"></td>
                                                </tr>
                                                <tr>
                                                    <th>Alteracion del Movimiento</th>
                                                    <td><input id="AtmN4" name="AtmN4" type="checkbox"></td>
                                                    <td><input id="AtmA4" name="AtmA4" type="checkbox"></td>
                                                </tr>
                                                <tr>
                                                    <th>Maloclusiones</th>
                                                    <td><input id="AtmN5" name="AtmN5" type="checkbox"></td>
                                                    <td><input id="AtmA5" name="AtmA5" type="checkbox"></td>
                                                </tr>
                                                <tr>
                                                    <th>Alteraciones Crecimiento</th>
                                                    <td><input id="AtmN6" name="AtmN6" type="checkbox"></td>
                                                    <td><input id="AtmA6" name="AtmA6" type="checkbox"></td>
                                                </tr>
                                                <tr>
                                                    <th>Otros Hallazgos</th>
                                                    <td><input id="AtmN7" name="AtmN7" type="checkbox"></td>
                                                    <td><input id="AtmA7" name="AtmA7" type="checkbox"></td>
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
                                            <select id="Tratamiento" name="Tratamiento" class="form-control" data-bind=" options: tratamientosPosibles, 
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
                                    <input type="button" name="next" class="next btn btn-info" value="Siguiente" />


                                </fieldset>
                                <fieldset>
                                    <div class="col-lg-12">
                                        <h2>Accion Preventiva</h2>
                                    </div>
                                    <div class="col-lg-12">
                                        <table class="table table-striped">

                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>Si</th>
                                                    <th>Frecuencia</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th>Ha recibido charlas de higiene oral</th>
                                                    <td><input id="AccioPreveSI1" name="AccioPreveSI1" type="checkbox"></td>
                                                    <td><input id="AccioPreveFre1" name="AccioPreveFre1" type="text"></td>
                                                </tr>
                                                <tr>
                                                    <th>Practica el cepillado diario</th>
                                                    <td><input id="AccioPreveSI2" name="AccioPreveSI2" type="checkbox"></td>
                                                    <td><input id="AccioPreveFre2" name="AccioPreveFre2" type="text"></td>
                                                </tr>
                                                <tr>
                                                    <th>Usa seda dental</th>
                                                    <td><input id="AccioPreveSI3" name="AccioPreveSI3" type="checkbox"></td>
                                                    <td><input id="AccioPreveFre3" name="AccioPreveFre3" type="text"></td>
                                                </tr>
                                                <tr>
                                                    <th>Usa enjuague bucal</th>
                                                    <td><input id="AccioPreveSI4" name="AccioPreveSI4" type="checkbox"></td>
                                                    <td><input id="AccioPreveFre4" name="AccioPreveFre4" type="text"></td>
                                                </tr>
                                                <tr>
                                                    <th>Le han aplicado fluor</th>
                                                    <td><input id="AccioPreveSI5" name="AccioPreveSI5" type="checkbox"></td>
                                                    <td><input id="AccioPreveFre5" name="AccioPreveFre5" type="text"></td>
                                                </tr>
                                                <tr>
                                                    <th>Le han colocado sellantes</th>
                                                    <td><input id="AccioPreveSI6" name="AccioPreveSI6" type="checkbox"></td>
                                                    <td><input id="AccioPreveFre6" name="AccioPreveFre6" type="text"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-lg-12">
                                        <h2>Indice de placa bacteriana inicial</h2>
                                    </div>
                                    <div class="col-lg-12">

                                    </div>
                                    <div class="col-lg-12">
                                        <h2>Indice de placa pos-tratamiento</h2>
                                    </div>
                                    <div class="col-lg-12">

                                    </div>
                                    <div class="col-lg-12">
                                        <h2>observacines al indice de placa</h2>
                                        <input class="form-control" type="text">
                                    </div>
                                    <input type="button" name="previous" class="previous btn btn-default" value="Previo" />
                                    <input type="button" name="next" class="next btn btn-info" value="Siguiente" />
                                </fieldset>
                                <fieldset>
                                    <div class="col-lg-12">
                                        <h2>Examenes complementarios</h2>
                                        <div class="col-lg-6">
                                            <input type="file" class="form-control">
                                        </div>

                                        <div class="col-lg-6">
                                            <input class="form-control" type="text" placeholder="Observaciones">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <h3>Radiografia Extra oral</h3>
                                        <table class="table table-striped">

                                            <tbody>
                                                <tr>
                                                    <th>Panoramica</th>
                                                    <td><input id="RadioExtraO1" name="RadioExtraO1" type="file"></td>
                                                </tr>
                                                <tr>
                                                    <th>Lateral de craneo</th>
                                                    <td><input id="RadioExtraO2" name="RadioExtraO2" type="file"></td>
                                                </tr>
                                                <tr>
                                                    <th>Carpograma</th>
                                                    <td><input id="RadioExtraO3" name="RadioExtraO3" type="file"></td>
                                                </tr>
                                                <tr>
                                                    <th>Antero posaterior</th>
                                                    <td><input id="RadioExtraO4" name="RadioExtraO4" type="file"></td>
                                                </tr>
                                                <tr>
                                                    <th>Postero anterior</th>
                                                    <td><input id="RadioExtraO5" name="RadioExtraO5" type="file"></td>
                                                </tr>
                                                <tr>
                                                    <th>ATM</th>
                                                    <td><input id="RadioExtraO6" name="RadioExtraO6" type="file"></td>
                                                </tr>
                                                <tr>
                                                    <th>Axial</th>
                                                    <td><input id="RadioExtraO7" name="RadioExtraO7" type="file"></td>
                                                </tr>
                                                <tr>
                                                    <th>Trascraneal de condilos</th>
                                                    <td><input id="RadioExtraO8" name="RadioExtraO8" type="file"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-lg-6">
                                        <h3>Examenes complementarios</h3>
                                        <input id="ExamenesComple" name="ExamenesComple" class="form-control" type="text" placeholder="Examenes de laboratorio">
                                    </div>
                                    <div class="col-lg-6">
                                        <br>
                                        <br>
                                        <br><br><br><br><br><br><br><br><br><br>
                                    </div>
                                    <input type="button" name="previous" class="previous btn btn-default" value="Previo" />
                                    <input type="button" name="next" class="next btn btn-info" value="Siguiente" />


                                </fieldset>
                                <fieldset>
                                    <div class="col-lg-6">
                                        <h1>Diagnosticos</h1>
                                        <div class="input-group form-group">
                                            <span class="input-group-addon" id="basic-addon1">Diagnostico General</span>
                                            <input id="Diag1" name="Diag1" type="text" class="form-control" placeholder="" aria-describedby="basic-addon1">
                                            <div class="input-group">
                                                <input id="Prono1" name="Prono1" type="text" class="form-control" placeholder="" aria-describedby="basic-addon2">
                                                <span class="input-group-addon" id="basic-addon2">Pronostico</span>
                                            </div>
                                        </div>
                                        <div class="input-group form-group">
                                            <span class="input-group-addon" id="basic-addon1">Diagnostico Bucal</span>
                                            <input id="Diag2" name="Diag2" type="text" class="form-control" placeholder="" aria-describedby="basic-addon1">

                                            <div class="input-group">
                                                <input id="Prono2" name="Prono2" type="text" class="form-control" placeholder="" aria-describedby="basic-addon2">
                                                <span class="input-group-addon" id="basic-addon2">Pronostico</span>
                                            </div>
                                        </div>
                                        <div class="input-group form-group">
                                            <span class="input-group-addon" id="basic-addon1">Diagnostico periodontal</span>
                                            <input id="Diag3" name="Diag3" type="text" class="form-control" placeholder="" aria-describedby="basic-addon1">

                                            <div class="input-group">
                                                <input id="Prono3" name="Prono3" type="text" class="form-control" placeholder="" aria-describedby="basic-addon2">
                                                <span class="input-group-addon" id="basic-addon2">Pronostico</span>
                                            </div>
                                        </div>
                                        <div class="input-group form-group">
                                            <span class="input-group-addon" id="basic-addon1">Diagnostico pulpar</span>
                                            <input id="Diag4" name="Diag4" type="text" class="form-control" placeholder="" aria-describedby="basic-addon1">

                                            <div class="input-group">
                                                <input id="Prono4" name="Prono4" type="text" class="form-control" placeholder="" aria-describedby="basic-addon2">
                                                <span class="input-group-addon" id="basic-addon2">Pronostico</span>
                                            </div>
                                        </div>
                                        <div class="input-group form-group">
                                            <span class="input-group-addon" id="basic-addon1">Diagnostico dental</span>
                                            <input id="Diag5" name="Diag5" type="text" class="form-control" placeholder="" aria-describedby="basic-addon1">

                                            <div class="input-group">
                                                <input id="Prono5" name="Prono5" type="text" class="form-control" placeholder="" aria-describedby="basic-addon2">
                                                <span class="input-group-addon" id="basic-addon2">Pronostico</span>
                                            </div>
                                        </div>
                                        <div class="input-group form-group">
                                            <span class="input-group-addon" id="basic-addon1">Diagnostico craneo facial</span>
                                            <input id="Diag6" name="Diag6" type="text" class="form-control" placeholder="" aria-describedby="basic-addon1">
                                            <div class="input-group">
                                                <input id="Prono6" name="Prono6" type="text" class="form-control" placeholder="" aria-describedby="basic-addon2">
                                                <span class="input-group-addon" id="basic-addon2">Pronostico</span>
                                            </div>
                                        </div>
                                        <div class="input-group form-group">
                                            <span class="input-group-addon" id="basic-addon1">Otros</span>
                                            <input id="Diag7" name="Diag7" type="text" class="form-control" placeholder="" aria-describedby="basic-addon1">

                                            <div class="input-group">
                                                <input id="Prono7" name="Prono7" type="text" class="form-control" placeholder="" aria-describedby="basic-addon2">
                                                <span class="input-group-addon" id="basic-addon2">Pronostico</span>
                                            </div>
                                        </div>
                                        <input  type="text" class="form-control" placeholder="Observaciones">
                                    </div>
                                    <div class="col-lg-6">
                                        <h2>Plan de tratamiento</h2>
                                        <div class="input-group form-group">
                                            <span class="input-group-addon" id="basic-addon1">Cirugia Oral</span>
                                            <input id="PlanTra1" name="PlanTra1" type="text" class="form-control" placeholder="" aria-describedby="basic-addon1">
                                        </div>
                                        <div class="input-group form-group">
                                            <span class="input-group-addon" id="basic-addon1">Endodoncia</span>
                                            <input id="PlanTra2" name="PlanTra2" type="text" class="form-control" placeholder="" aria-describedby="basic-addon1">
                                        </div>
                                        <div class="input-group form-group">
                                            <span class="input-group-addon" id="basic-addon1">Periodoncia</span>
                                            <input id="PlanTra3" name="PlanTra3" type="text" class="form-control" placeholder="" aria-describedby="basic-addon1">
                                        </div>
                                        <div class="input-group form-group">
                                            <span class="input-group-addon" id="basic-addon1">Operatoria</span>
                                            <input id="PlanTra4" name="PlanTra4" type="text" class="form-control" placeholder="" aria-describedby="basic-addon1">
                                        </div>

                                        <div class="input-group form-group">
                                            <span class="input-group-addon" id="basic-addon1">Prostodoncia</span>
                                            <input id="PlanTra5" name="PlanTra5" type="text" class="form-control" placeholder="" aria-describedby="basic-addon1">
                                        </div>
                                        <div class="input-group form-group">
                                            <span class="input-group-addon" id="basic-addon1">Oclucion</span>
                                            <input id="PlanTra6" name="PlanTra6" type="text" class="form-control" placeholder="" aria-describedby="basic-addon1">
                                        </div>
                                        <div class="input-group form-group">
                                            <span class="input-group-addon" id="basic-addon1">Otros</span>
                                            <input id="PlanTra7" name="PlanTra7" type="text" class="form-control" placeholder="" aria-describedby="basic-addon1">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <br><br><br><br><br><br><br><br><br><br><br>
                                    </div>
                                    <input type="button" name="previous" class="previous btn btn-default" value="Previo" />
                                    <input type="button" name="guardar" class="next btn btn-info" value="Guardar" />
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<script src="<?php echo SERVERURL ?>/vista/js/stepform.js"></script>
<script src="<?php echo SERVERURL ?>/vista/js/jquery.svg.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/knockout/2.2.1/knockout-min.js"></script>
<script src="<?php echo SERVERURL ?>/vista/js/odontograma.js"></script>