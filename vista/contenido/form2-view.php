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
                    <li><strong>Accion Preventiva</strong></li>
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
                                            <input id="NumHist" name="NumHist" class="form-control" value="<?php echo $res['enc_nhistoria'] ?>" disabled>
                                        </div>
                                        <div class="input-group form-group">
                                            <span class="input-group-addon" id="basic-addon1">Nombre del odontologo</span>
                                            <input id="NomOdontologo" name="NomOdontologo" class="form-control" value="<?php echo $res['med_nombre'] . " " . $res["med_apellido"] ?>" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label>Informacion general del Paciente</label>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon">Apellido</span>
                                                <input type="text" value="<?php echo $res['pac_apellido'] ?>" class="form-control" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon">Nombre</span>
                                                <input type="text" value="<?php echo $res['pac_nombre'] ?>" class="form-control" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon">Sexo</span>
                                                <?php if ($res['pac_sexo'] = 1) { ?>
                                                    <input type="text" value="Masculino" class="form-control" disabled>
                                                <?php } else { ?>
                                                    <input type="text" value="Femenino" class="form-control" disabled>
                                                <?php  } ?>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon">Edad</span>
                                                <?php
                                                $fechaActual = date('Y-m-d');
                                                $datetime1 = date_create($res['pac_nacimiento']);
                                                $datetime2 = date_create($fechaActual);
                                                $contador = date_diff($datetime2, $datetime1);
                                                $differenceFormat = '%y';
                                                ?>
                                                <input type="text" value="<?php echo $contador->format($differenceFormat) ?>" class="form-control" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon">Fecha de nacimiento</span>
                                                <input type="date" value="<?php echo $res['pac_nacimiento'] ?>" class="form-control" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon">Sangre</span>
                                                <input type="text" value="<?php echo $res['pac_sangre'] ?>" class="form-control" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon">Estado Civil</span>
                                                <input type="text" value="<?php echo $res['pac_estado_civil'] ?>" class="form-control" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon">Telefono</span>
                                                <input type="text" value="<?php echo $res['pac_telefono'] ?>" class="form-control" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon">Direccion</span>
                                                <input type="text" value="<?php echo $res['pac_direccion'] ?>" class="form-control" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-group">
                                            <input id="FechaEla" name="FechaEla" type="date" value="<?php echo $res['enc_fechaelab'] ?>" class="form-control" disabled>
                                            <span class="input-group-addon">Fecha de elaboracion</span>
                                        </div><br><br><br>
                                        <div class="form-group">
                                            <span class="help-block">Motivo y fecha de ultima visita al odontologo</span>
                                            <div class="input-group">
                                                <input id="Motivo" name="Motivo" type="text" value="<?php echo $res['cue_motivo'] ?>" class="form-control">
                                                <span class="input-group-btn">
                                                    <input id="FechaMo" name="FechaMo" type="date" value="<?php echo $res['cue_fecha'] ?>" class="form-control">
                                                </span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon">Nombre del acompañante</span>
                                                <input id="NomAcompa" name="NomAcompa" type="text" value="<?php echo $res['cue_nacompanante'] ?>" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon">Telefono del acompañante</span>
                                                <input id="TeleAcompa" name="TeleAcompa" type="text" value="<?php echo $res['cue_telefonoacomp'] ?>" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon">VIH</span>
                                                <select id="Vih" name="Vih" class="form-control">
                                                    <?php if ($res['cue_vih'] == 1) { ?>
                                                        <option value="1">Positivo</option>
                                                        <option value="2">Negativo</option>
                                                    <?php  } else { ?>
                                                        <option value="2">Negativo</option>
                                                        <option value="1">Positivo</option>
                                                    <?php } ?>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Diagnosticado en:</label>
                                            <div class="input-group">
                                                <input id="DiagVIH" name="DiagVIH" type="text" value="<?php echo $res['cue_vihdiagnostico'] ?>" class="form-control">
                                                <span class="input-group-btn">
                                                    <input id="FechaVIH" name="FechaVIH" type="date" value="<?php echo $res['cue_vihfecha'] ?>" class="form-control">
                                                </span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon">Estatura</span>
                                                <input id="Estatura" name="Estatura" type="text" class="form-control" placeholder="cm." value="<?php echo $res['sig_estatura'] ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon">Temperatura</span>
                                                <input id="Temp" name="Temp" type="text" class="form-control" placeholder="°C" value="<?php echo $res['sig_temperatura'] ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon">Pulso</span>
                                                <input id="Pulso" name="Pulso" type="text" class="form-control" placeholder="ppm." value="<?php echo $res['sig_pulso'] ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon">Peso</span>
                                                <input id="Peso" name="Peso" type="text" class="form-control" placeholder="Kg." value="<?php echo $res['sig_peso'] ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon">Tension Arterial</span>
                                                <input id="TenArte" name="TenArte" type="text" class="form-control" placeholder="mm/Hg" value="<?php echo $res['sig_tensionarterial'] ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon">Frecuencia respiratoria</span>
                                                <input id="FrecuRespi" name="FrecuRespi" type="text" class="form-control" placeholder="rpm" value="<?php echo $res['sig_frecuenciarespiratoria'] ?>">
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
                                                    <th>Alteracion presion arterial</th>
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
                                            <div class="col-lg-12">
                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>Tipos de antecedentes</th>
                                                            <th>SI</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <th>Enfermedades Mentales</th>
                                                            <td><input id="en1" name="en1" type="checkbox"></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Anomalias Congenitas</th>
                                                            <td><input id="en2" name="en2" type="checkbox"></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Diabetes</th>
                                                            <td><input id="en3" name="en3" type="checkbox"></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Cancer</th>
                                                            <td><input id="en4" name="en4" type="checkbox"></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Tuberculosis</th>
                                                            <td><input id="en5" name="en5" type="checkbox"></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Hemopatas - Cuagulopaas</th>
                                                            <td><input id="en6" name="en6" type="checkbox"></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Policitemia</th>
                                                            <td><input id="en7" name="en7" type="checkbox"></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Leucemia</th>
                                                            <td><input id="en8" name="en8" type="checkbox"></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Enfermedades Cardiovasculares</th>
                                                            <td><input id="en9" name="en9" type="checkbox"></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Alcoholismo</th>
                                                            <td><input id="en10" name="en10" type="checkbox"></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Enfermedades de Transimision Sexual (ETS)</th>
                                                            <td><input id="en11" name="en11" type="checkbox"></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Consanguinidad con los padres</th>
                                                            <td><input id="en12" name="en12" type="checkbox"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <textarea class="form-control" id="en_obs" rows="3" placeholder="observaciones"></textarea>
                                                </div>
                                            </div>
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
                                            <textarea class="form-control" id="exa_obs" rows="3" placeholder="Observaciones"></textarea>
                                        </div>
                                    </div>

                                    <input type="button" name="previous" class="previous btn btn-default" value="Previo" />
                                    <input type="button" name="next" class="next btn btn-info" value="Siguiente" />
                                </fieldset>
                                <fieldset>
                                    <div class="col-lg-12 form-group" align="center">
                                        <div class="form-group">
                                            <h2>Odontograma de ingreso</h2>
                                            <div class=" contenedor">
                                                <div class="form-group ">
                                                    <a>
                                                        <img class="btn btn-default diente" id="1" src="<?php echo SERVERURL ?>/assets/dientes/1.png" alt=""><br>
                                                        <p> sano</p>
                                                    </a>
                                                    <a>
                                                        <img class="btn btn-default limpio" id="2" src="<?php echo SERVERURL ?>/assets/dientes/2-1.png" alt=""><br>
                                                        <p>Obturacion Temp</p>
                                                    </a>
                                                    <a>
                                                        <img class="btn btn-default limpio" id="3" src="<?php echo SERVERURL ?>/assets/dientes/3-1.png" alt=""><br>
                                                        <p> Sup. en Amalgama <br> o resina</p>
                                                    </a>
                                                    <a>
                                                        <img class="btn btn-default diente" id="4" src="<?php echo SERVERURL ?>/assets/dientes/4.png" alt=""><br>
                                                        <p> Superficie Sellada</p>
                                                    </a>
                                                    <a>
                                                        <img class="btn btn-default diente" id="5" src="<?php echo SERVERURL ?>/assets/dientes/5.png" alt=""><br>
                                                        <p> Superficie por Sellar</p>
                                                    </a>
                                                    <a>
                                                        <img class="btn btn-default diente" id="6" src="<?php echo SERVERURL ?>/assets/dientes/6.png" alt=""><br>
                                                        <p> Diente sin Erupcionar</p>
                                                    </a>
                                                </div>
                                                <div class="form-group ">
                                                    <a>
                                                        <img class="btn btn-default diente" id="7" src="<?php echo SERVERURL ?>/assets/dientes/7.png" alt=""><br>
                                                        Exodoncia Indicada
                                                    </a>
                                                    <a>
                                                        <img class="btn btn-default diente" id="8" src="<?php echo SERVERURL ?>/assets/dientes/8.png" alt=""><br>
                                                        Necesita Exodoncia
                                                    </a>
                                                    <a>
                                                        <img class="btn btn-default diente" id="9" src="<?php echo SERVERURL ?>/assets/dientes/9.png" alt=""><br>
                                                        Endodoncia Realizada</a>
                                                    <a>
                                                        <img class="btn btn-default diente" id="10" src="<?php echo SERVERURL ?>/assets/dientes/10.png" alt=""><br>
                                                        Ausente</a>
                                                    <a>
                                                        <img class="btn btn-default diente" id="11" src="<?php echo SERVERURL ?>/assets/dientes/11.png" alt=""><br>
                                                        <p>Protesis Existente</p>
                                                    </a>
                                                    <a>
                                                        <img class="btn btn-default diente" id="12" src="<?php echo SERVERURL ?>/assets/dientes/12.png" alt=""><br>
                                                        Protesis Existente
                                                    </a>
                                                </div>
                                                <div class="form-group" id="opciones" style="width: 60%;"></div>
                                            </div>

                                            <div class="form-group ">
                                                <div class="col-lg-12 odontog">
                                                    <table border="1">
                                                        <tbody>
                                                            <tr>
                                                                <td><img id="d1" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/1.png" alt="img1">
                                                                    <p>8</p>
                                                                </td>
                                                                <td><img id="d2" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/1.png" alt="img2">
                                                                    <p>7</p>
                                                                </td>
                                                                <td><img id="d3" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/1.png" alt="img3">
                                                                    <p>6</p>
                                                                </td>
                                                                <td><img id="d4" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/1.png" alt="img4">
                                                                    <p>5</p>
                                                                </td>
                                                                <td><img id="d5" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/1.png" alt="img5">
                                                                    <p>4</p>
                                                                </td>
                                                                <td><img id="d6" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/1.png" alt="img6">
                                                                    <p>3</p>
                                                                </td>
                                                                <td><img id="d7" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/1.png" alt="img7">
                                                                    <p>2</p>
                                                                </td>
                                                                <td><img id="d8" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/1.png" alt="img8">
                                                                    <p>1</p>
                                                                </td>
                                                                <td><img id="d9" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/1.png" alt="img1">
                                                                    <p>1</p>
                                                                </td>
                                                                <td><img id="d10" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/1.png" alt="img2">
                                                                    <p>2</p>
                                                                </td>
                                                                <td><img id="d11" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/1.png" alt="img3">
                                                                    <p>3</p>
                                                                </td>
                                                                <td><img id="d12" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/1.png" alt="img4">
                                                                    <p>4</p>
                                                                </td>
                                                                <td><img id="d13" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/1.png" alt="img5">
                                                                    <p>5</p>
                                                                </td>
                                                                <td><img id="d14" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/1.png" alt="img6">
                                                                    <p>6</p>
                                                                </td>
                                                                <td><img id="d15" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/1.png" alt="img7">
                                                                    <p>7</p>
                                                                </td>
                                                                <td><img id="d16" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/1.png" alt="img8">
                                                                    <p>8</p>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>

                                                                <td><img id="d17" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/1.png" alt="img1">
                                                                    <p>1</p>
                                                                </td>
                                                                <td><img id="d18" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/1.png" alt="img2">
                                                                    <p>2</p>
                                                                </td>
                                                                <td><img id="d19" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/1.png" alt="img3">
                                                                    <p>3</p>
                                                                </td>
                                                                <td><img id="d20" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/1.png" alt="img4">
                                                                    <p>4</p>
                                                                </td>
                                                                <td><img id="d21" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/1.png" alt="img5">
                                                                    <p>5</p>
                                                                </td>
                                                                <td><img id="d22" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/1.png" alt="img1">
                                                                    <p>1</p>
                                                                </td>
                                                                <td><img id="d23" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/1.png" alt="img2">
                                                                    <p>2</p>
                                                                </td>
                                                                <td><img id="d24" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/1.png" alt="img3">
                                                                    <p>3</p>
                                                                </td>
                                                                <td><img id="d25" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/1.png" alt="img4">
                                                                    <p>4</p>
                                                                </td>
                                                                <td><img id="d26" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/1.png" alt="img5">
                                                                    <p>5</p>
                                                                </td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td><img id="d27" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/1.png" alt="img1">
                                                                    <p>1</p>
                                                                </td>
                                                                <td><img id="d28" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/1.png" alt="img2">
                                                                    <p>2</p>
                                                                </td>
                                                                <td><img id="d29" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/1.png" alt="img3">
                                                                    <p>3</p>
                                                                </td>
                                                                <td><img id="d30" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/1.png" alt="img4">
                                                                    <p>4</p>
                                                                </td>
                                                                <td><img id="d31" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/1.png" alt="img5">
                                                                    <p>5</p>
                                                                </td>
                                                                <td><img id="d32" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/1.png" alt="img1">
                                                                    <p>1</p>
                                                                </td>
                                                                <td><img id="d33" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/1.png" alt="img2">
                                                                    <p>2</p>
                                                                </td>
                                                                <td><img id="d34" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/1.png" alt="img3">
                                                                    <p>3</p>
                                                                </td>
                                                                <td><img id="d35" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/1.png" alt="img4">
                                                                    <p>4</p>
                                                                </td>
                                                                <td><img id="d36" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/1.png" alt="img5">
                                                                    <p>5</p>
                                                                </td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td><img id="d37" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/1.png" alt="img1">
                                                                    <p>8</p>
                                                                </td>
                                                                <td><img id="d38" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/1.png" alt="img2">
                                                                    <p>7</p>
                                                                </td>
                                                                <td><img id="d39" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/1.png" alt="img3">
                                                                    <p>6</p>
                                                                </td>
                                                                <td><img id="d40" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/1.png" alt="img4">
                                                                    <p>5</p>
                                                                </td>
                                                                <td><img id="d41" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/1.png" alt="img5">
                                                                    <p>4</p>
                                                                </td>
                                                                <td><img id="d42" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/1.png" alt="img6">
                                                                    <p>3</p>
                                                                </td>
                                                                <td><img id="d43" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/1.png" alt="img7">
                                                                    <p>2</p>
                                                                </td>
                                                                <td><img id="d44" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/1.png" alt="img8">
                                                                    <p>1</p>
                                                                </td>
                                                                <td><img id="d45" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/1.png" alt="img1">
                                                                    <p>1</p>
                                                                </td>
                                                                <td><img id="d46" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/1.png" alt="img2">
                                                                    <p>2</p>
                                                                </td>
                                                                <td><img id="d47" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/1.png" alt="img3">
                                                                    <p>3</p>
                                                                </td>
                                                                <td><img id="d48" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/1.png" alt="img4">
                                                                    <p>4</p>
                                                                </td>
                                                                <td><img id="d49" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/1.png" alt="img5">
                                                                    <p>5</p>
                                                                </td>
                                                                <td><img id="d50" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/1.png" alt="img6">
                                                                    <p>6</p>
                                                                </td>
                                                                <td><img id="d51" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/1.png" alt="img7">
                                                                    <p>7</p>
                                                                </td>
                                                                <td><img id="d52" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/1.png" alt="img8">
                                                                    <p>8</p>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>

                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-lg-12 form-group">
                                        <h2>Odontograma Egreso</h2>
                                        <div class="form-group ">
                                            <div class="col-lg-12 odontog">
                                                <table border="1">
                                                    <tbody>
                                                        <tr>
                                                            <td><img id="I1" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/1.png" alt="img1">
                                                                <p>8</p>
                                                            </td>
                                                            <td><img id="I2" src="<?php echo SERVERURL ?>/assets/dientes/1.png" alt="img2">
                                                                <p>7</p>
                                                            </td>
                                                            <td><img id="I3" src="<?php echo SERVERURL ?>/assets/dientes/1.png" alt="img3">
                                                                <p>6</p>
                                                            </td>
                                                            <td><img id="I4" src="<?php echo SERVERURL ?>/assets/dientes/1.png" alt="img4">
                                                                <p>5</p>
                                                            </td>
                                                            <td><img id="I5" src="<?php echo SERVERURL ?>/assets/dientes/1.png" alt="img5">
                                                                <p>4</p>
                                                            </td>
                                                            <td><img id="I6" src="<?php echo SERVERURL ?>/assets/dientes/1.png" alt="img6">
                                                                <p>3</p>
                                                            </td>
                                                            <td><img id="I7" src="<?php echo SERVERURL ?>/assets/dientes/1.png" alt="img7">
                                                                <p>2</p>
                                                            </td>
                                                            <td><img id="I8" src="<?php echo SERVERURL ?>/assets/dientes/1.png" alt="img8">
                                                                <p>1</p>
                                                            </td>
                                                            <td><img id="II1" src="<?php echo SERVERURL ?>/assets/dientes/1.png" alt="img1">
                                                                <p>1</p>
                                                            </td>
                                                            <td><img id="II2" src="<?php echo SERVERURL ?>/assets/dientes/1.png" alt="img2">
                                                                <p>2</p>
                                                            </td>
                                                            <td><img id="II3" src="<?php echo SERVERURL ?>/assets/dientes/1.png" alt="img3">
                                                                <p>3</p>
                                                            </td>
                                                            <td><img id="II4" src="<?php echo SERVERURL ?>/assets/dientes/1.png" alt="img4">
                                                                <p>4</p>
                                                            </td>
                                                            <td><img id="II5" src="<?php echo SERVERURL ?>/assets/dientes/1.png" alt="img5">
                                                                <p>5</p>
                                                            </td>
                                                            <td><img id="II6" src="<?php echo SERVERURL ?>/assets/dientes/1.png" alt="img6">
                                                                <p>6</p>
                                                            </td>
                                                            <td><img id="II7" src="<?php echo SERVERURL ?>/assets/dientes/1.png" alt="img7">
                                                                <p>7</p>
                                                            </td>
                                                            <td><img id="II8" src="<?php echo SERVERURL ?>/assets/dientes/1.png" alt="img8">
                                                                <p>8</p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>

                                                            <td><img id="I9" src="<?php echo SERVERURL ?>/assets/dientes/1.png" alt="img1">
                                                                <p>1</p>
                                                            </td>
                                                            <td><img id="I10" src="<?php echo SERVERURL ?>/assets/dientes/1.png" alt="img2">
                                                                <p>2</p>
                                                            </td>
                                                            <td><img id="I11" src="<?php echo SERVERURL ?>/assets/dientes/1.png" alt="img3">
                                                                <p>3</p>
                                                            </td>
                                                            <td><img id="I12" src="<?php echo SERVERURL ?>/assets/dientes/1.png" alt="img4">
                                                                <p>4</p>
                                                            </td>
                                                            <td><img id="I13" src="<?php echo SERVERURL ?>/assets/dientes/1.png" alt="img5">
                                                                <p>5</p>
                                                            </td>
                                                            <td><img id="II9" src="<?php echo SERVERURL ?>/assets/dientes/1.png" alt="img1">
                                                                <p>1</p>
                                                            </td>
                                                            <td><img id="II10" src="<?php echo SERVERURL ?>/assets/dientes/1.png" alt="img2">
                                                                <p>2</p>
                                                            </td>
                                                            <td><img id="II11" src="<?php echo SERVERURL ?>/assets/dientes/1.png" alt="img3">
                                                                <p>3</p>
                                                            </td>
                                                            <td><img id="II12" src="<?php echo SERVERURL ?>/assets/dientes/1.png" alt="img4">
                                                                <p>4</p>
                                                            </td>
                                                            <td><img id="II13" src="<?php echo SERVERURL ?>/assets/dientes/1.png" alt="img5">
                                                                <p>5</p>
                                                            </td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td><img id="IV9" src="<?php echo SERVERURL ?>/assets/dientes/1.png" alt="img1">
                                                                <p>1</p>
                                                            </td>
                                                            <td><img id="IV10" src="<?php echo SERVERURL ?>/assets/dientes/1.png" alt="img2">
                                                                <p>2</p>
                                                            </td>
                                                            <td><img id="IV11" src="<?php echo SERVERURL ?>/assets/dientes/1.png" alt="img3">
                                                                <p>3</p>
                                                            </td>
                                                            <td><img id="IV12" src="<?php echo SERVERURL ?>/assets/dientes/1.png" alt="img4">
                                                                <p>4</p>
                                                            </td>
                                                            <td><img id="IV13" src="<?php echo SERVERURL ?>/assets/dientes/1.png" alt="img5">
                                                                <p>5</p>
                                                            </td>
                                                            <td><img id="III9" src="<?php echo SERVERURL ?>/assets/dientes/1.png" alt="img1">
                                                                <p>1</p>
                                                            </td>
                                                            <td><img id="III10" src="<?php echo SERVERURL ?>/assets/dientes/1.png" alt="img2">
                                                                <p>2</p>
                                                            </td>
                                                            <td><img id="III11" src="<?php echo SERVERURL ?>/assets/dientes/1.png" alt="img3">
                                                                <p>3</p>
                                                            </td>
                                                            <td><img id="III12" src="<?php echo SERVERURL ?>/assets/dientes/1.png" alt="img4">
                                                                <p>4</p>
                                                            </td>
                                                            <td><img id="III13" src="<?php echo SERVERURL ?>/assets/dientes/1.png" alt="img5">
                                                                <p>5</p>
                                                            </td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td><img id="IV1" src="<?php echo SERVERURL ?>/assets/dientes/1.png" alt="img1">
                                                                <p>8</p>
                                                            </td>
                                                            <td><img id="IV2" src="<?php echo SERVERURL ?>/assets/dientes/1.png" alt="img2">
                                                                <p>7</p>
                                                            </td>
                                                            <td><img id="IV3" src="<?php echo SERVERURL ?>/assets/dientes/1.png" alt="img3">
                                                                <p>6</p>
                                                            </td>
                                                            <td><img id="IV4" src="<?php echo SERVERURL ?>/assets/dientes/1.png" alt="img4">
                                                                <p>5</p>
                                                            </td>
                                                            <td><img id="IV5" src="<?php echo SERVERURL ?>/assets/dientes/1.png" alt="img5">
                                                                <p>4</p>
                                                            </td>
                                                            <td><img id="IV6" src="<?php echo SERVERURL ?>/assets/dientes/1.png" alt="img6">
                                                                <p>3</p>
                                                            </td>
                                                            <td><img id="IV7" src="<?php echo SERVERURL ?>/assets/dientes/1.png" alt="img7">
                                                                <p>2</p>
                                                            </td>
                                                            <td><img id="IV8" src="<?php echo SERVERURL ?>/assets/dientes/1.png" alt="img8">
                                                                <p>1</p>
                                                            </td>
                                                            <td><img id="III1" src="<?php echo SERVERURL ?>/assets/dientes/1.png" alt="img1">
                                                                <p>1</p>
                                                            </td>
                                                            <td><img id="III2" src="<?php echo SERVERURL ?>/assets/dientes/1.png" alt="img2">
                                                                <p>2</p>
                                                            </td>
                                                            <td><img id="III3" src="<?php echo SERVERURL ?>/assets/dientes/1.png" alt="img3">
                                                                <p>3</p>
                                                            </td>
                                                            <td><img id="III4" src="<?php echo SERVERURL ?>/assets/dientes/1.png" alt="img4">
                                                                <p>4</p>
                                                            </td>
                                                            <td><img id="III5" src="<?php echo SERVERURL ?>/assets/dientes/1.png" alt="img5">
                                                                <p>5</p>
                                                            </td>
                                                            <td><img id="III6" src="<?php echo SERVERURL ?>/assets/dientes/1.png" alt="img6">
                                                                <p>6</p>
                                                            </td>
                                                            <td><img id="III7" src="<?php echo SERVERURL ?>/assets/dientes/1.png" alt="img7">
                                                                <p>7</p>
                                                            </td>
                                                            <td><img id="III8" src="<?php echo SERVERURL ?>/assets/dientes/1.png" alt="img8">
                                                                <p>8</p>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
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
                                    <!--   <div class="col-lg-12">
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
                                    </div> -->
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
                                        <input type="text" class="form-control" placeholder="Observaciones">
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
                                    <input type="button" id="guardar" class="btn btn-info" value="Guardar" />
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
<script src="<?php echo SERVERURL ?>/vista/js/form2.js"></script>
<script src="<?php echo SERVERURL ?>/vista/js/odontograma.js"></script>