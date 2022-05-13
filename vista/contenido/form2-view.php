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
                    <li><strong>Odontograma Ingreso</strong></li>
                    <li><strong>Odontograma Egreso</strong></li>
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
                                                    <input id="MoConsulta" <?php echo $res['cue_motivo_act'] ?> name="MoConsulta" type="text" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <span class="input-group-addon">Enfermedades Actuales</span>
                                                    <input id="EnfeActuales" <?php echo $res['cue_enfermedad'] ?> name="EnfeActuales" type="text" class="form-control">
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
                                                    <td><input id="TiposAnte1" <?php if ($res['ant_tmactual']=='true') {
                                                       echo 'checked';}?> name="TipoAnte1" type="checkbox"></td>
                                                </tr>
                                                <tr>
                                                    <th>Toma de medicamentos</th>
                                                    <td><input id="TiposAnte2" <?php if ($res['ant_tmedicamentos']=='true') {
                                                       echo 'checked'; } ?> name="TipoAnte2" type="checkbox"></td>
                                                </tr>
                                                <tr>
                                                    <th>Alergias</th>
                                                    <td><input id="TiposAnte3" <?php if ($res['ant_alergias']=='true') {
                                                         echo 'checked'; } ?> name="TipoAnte3" type="checkbox"></td>
                                                </tr>
                                                <tr>
                                                    <th>Cardiopatias</th>
                                                    <td><input id="TiposAnte4" <?php if ($res['ant_cardiopatia']=='true') {
                                                        echo 'checked'; } ?> name="TipoAnte4" type="checkbox"></td>
                                                </tr>
                                                <tr>
                                                    <th>Alteracion presion arterial</th>
                                                    <td><input id="TiposAnte5" <?php if ($res['ant_aparterial']=='true') {
                                                        echo 'checked'; } ?> name="TipoAnte5" type="checkbox"></td>
                                                </tr>
                                                <tr>
                                                    <th>Embarazo</th>
                                                    <td><input id="TiposAnte6" <?php if ($res['ant_embarazo']=='true') {
                                                        echo 'checked'; }  ?> name="TipoAnte6" type="checkbox"></td>
                                                </tr>
                                                <tr>
                                                    <th>Diabetes</th>
                                                    <td><input id="TiposAnte7" <?php if ($res['ant_diabetes']=='true') {
                                                        echo 'checked'; }  ?> name="TipoAnte7" type="checkbox"></td>
                                                </tr>
                                                <tr>
                                                    <th>Hepatitis</th>
                                                    <td><input id="TiposAnte8" <?php if ($res['ant_hepatitis']=='true') {
                                                        echo 'checked'; }  ?> name="TipoAnte8" type="checkbox"></td>
                                                </tr>
                                                <tr>
                                                    <th>Irradiaciones</th>
                                                    <td><input id="TiposAnte9" <?php if ($res['ant_irradiaciones']=='true') {
                                                        echo 'checked'; }  ?> name="TipoAnte9" type="checkbox"></td>
                                                </tr>
                                                <tr>
                                                    <th>Discrasias sanguinias</th>
                                                    <td><input id="TiposAnte10" <?php if ($res['ant_dsanguineas']=='true') {
                                                        echo 'checked'; }  ?> name="TipoAnte10" type="checkbox"></td>
                                                </tr>
                                                <tr>
                                                    <th>Fiebre reumatica</th>
                                                    <td><input id="TiposAnte11" <?php if ($res['ant_freumatica']=='true') {
                                                        echo 'checked'; }  ?> name="TipoAnte11" type="checkbox"></td>
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
                                                    <td><input id="TiposAnte12" <?php if ($res['ant_erenales']=='true') {
                                                        echo 'checked'; } ?> name="TipoAnte12" type="checkbox"></td>
                                                </tr>
                                                <tr>
                                                    <th>Inmunosupresion</th>
                                                    <td><input id="TiposAnte13" <?php if ($res['ant_inmunosupresion']=='true') {
                                                        echo 'checked'; } ?> name="TipoAnte13" type="checkbox"></td>
                                                </tr>
                                                <tr>
                                                    <th>Trastornos emocionales</th>
                                                    <td><input id="TiposAnte14" <?php if ( $res['ant_tranemocional']=='true') {
                                                        echo 'checked'; } ?> name="TipoAnte14" type="checkbox"></td>
                                                </tr>
                                                <tr>
                                                    <th>Trastornos gastricos</th>
                                                    <td><input id="TiposAnte15" <?php if ($res['ant_tgastricos']=='true') {
                                                        echo 'checked'; } ?> name="TipoAnte15" type="checkbox"></td>
                                                </tr>
                                                <tr>
                                                    <th>Epilepsia</th>
                                                    <td><input id="TiposAnte16" <?php if ($res['ant_epilepsia']=='true') {
                                                        echo 'checked'; } ?> name="TipoAnte16" type="checkbox"></td>
                                                </tr>
                                                <tr>
                                                    <th>Trastornos Respiratorios</th>
                                                    <td><input id="TiposAnte17" <?php if ($res['ant_trespiratorio']=='true') {
                                                        echo 'checked'; } ?> name="TipoAnte17" type="checkbox"></td>
                                                </tr>
                                                <tr>
                                                    <th>Cirugias (incluye orales)</th>
                                                    <td><input id="TiposAnte18" <?php if ($res['ant_cirugia']=='true') {
                                                        echo 'checked'; } ?> name="TipoAnte18" type="checkbox"></td>
                                                </tr>
                                                <tr>
                                                    <th>Enfermedades orales</th>
                                                    <td><input id="TiposAnte19" <?php if ($res['ant_eoral']=='true') {
                                                        echo 'checked'; } ?> name="TipoAnte19" type="checkbox"></td>
                                                </tr>
                                                <tr>
                                                    <th>Otras Enfermedades</th>
                                                    <td><input id="TiposAnte20" <?php if ($res['ant_otras']=='true') {
                                                        echo 'checked'; } ?> name="TipoAnte20" type="checkbox"></td>
                                                </tr>
                                                <tr>
                                                    <th>Fuma o consume licor</th>
                                                    <td><input id="TiposAnte21" <?php if ($res['ant_vicios']=='true') {
                                                        echo 'checked'; } ?> name="TipoAnte21" type="checkbox"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-lg-6"><br></div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <textarea class="form-control" value="<?php echo $res['ant_observaciones'] ?>" rows="3" placeholder="Observaciones" id="ObservaAntece" name="ObservaAntece"></textarea>
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
                                                            <td><input id="en1" <?php if ($res['anf_ementales']=='true') {
                                                        echo 'checked'; } ?> name="en1" type="checkbox"></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Anomalias Congenitas</th>
                                                            <td><input id="en2" <?php if ($res['anf_acongenitas']=='true') {
                                                        echo 'checked'; } ?> name="en2" type="checkbox"></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Diabetes</th>
                                                            <td><input id="en3" <?php if ($res['anf_diabetes']=='true') {
                                                        echo 'checked'; } ?> name="en3" type="checkbox"></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Cancer</th>
                                                            <td><input id="en4" <?php if ($res['anf_cancer']=='true') {
                                                        echo 'checked'; } ?> name="en4" type="checkbox"></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Tuberculosis</th>
                                                            <td><input id="en5" <?php if ($res['anf_tuberculosis']=='true') {
                                                        echo 'checked'; } ?> name="en5" type="checkbox"></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Hemopatas - Cuagulopaas</th>
                                                            <td><input id="en6" <?php if ($res['anf_hemo_cuagu']=='true') {
                                                        echo 'checked'; } ?> name="en6" type="checkbox"></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Policitemia</th>
                                                            <td><input id="en7" <?php if ($res['anf_policitemia']=='true') {
                                                        echo 'checked'; } ?> name="en7" type="checkbox"></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Leucemia</th>
                                                            <td><input id="en8" <?php if ($res['anf_leucemia']=='true') {
                                                        echo 'checked'; } ?> name="en8" type="checkbox"></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Enfermedades Cardiovasculares</th>
                                                            <td><input id="en9" <?php if ($res['anf_ecardio']=='true') {
                                                        echo 'checked'; } ?> name="en9" type="checkbox"></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Alcoholismo</th>
                                                            <td><input id="en10" <?php if ($res['anf_alcohol']=='true') {
                                                        echo 'checked'; } ?> name="en10" type="checkbox"></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Enfermedades de Transimision Sexual (ETS)</th>
                                                            <td><input id="en11" <?php if ($res['anf_ets']=='true') {
                                                        echo 'checked'; } ?> name="en11" type="checkbox"></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Consanguinidad con los padres</th>
                                                            <td><input id="en12" <?php if ($res['anf_consan']=='true') {
                                                        echo 'checked'; } ?> name="en12" type="checkbox"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <textarea class="form-control" value=" <?php echo $res['anf_observaciones'] ?>" id="en_obs" rows="3" placeholder="observaciones"></textarea>
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
                                                    <td><input id="TejidosN1" <?php if ($res['exa_t1n']=='true') {
                                                        echo 'checked'; } ?> name="TejidosN1" type="checkbox"></td>
                                                    <td><input id="TejidosA1" <?php if ($res['exa_t1a']=='true') {
                                                        echo 'checked'; } ?> name="TejidosA1" type="checkbox"></td>
                                                </tr>
                                                <tr>
                                                    <th>Labio Inferior</th>
                                                    <td><input id="TejidosN2" <?php if ($res['exa_t2n']=='true') {
                                                        echo 'checked'; } ?> name="TejidosN2" type="checkbox"></td>
                                                    <td><input id="TejidosA2" <?php if ($res['exa_t2a']=='true') {
                                                        echo 'checked'; } ?> name="TejidosA2" type="checkbox"></td>
                                                </tr>
                                                <tr>
                                                    <th>Comisuras</th>
                                                    <td><input id="TejidosN3" <?php if ($res['exa_t3n']=='true') {
                                                        echo 'checked'; } ?> name="TejidosN3" type="checkbox"></td>
                                                    <td><input id="TejidosA3" <?php if ($res['exa_t3a']=='true') {
                                                        echo 'checked'; } ?> name="TejidosA3" type="checkbox"></td>
                                                </tr>
                                                <tr>
                                                    <th>Mucosa Oral</th>
                                                    <td><input id="TejidosN4" <?php if ($res['exa_t4n']=='true') {
                                                        echo 'checked'; } ?> name="TejidosN4" type="checkbox"></td>
                                                    <td><input id="TejidosA4" <?php if ($res['exa_t4a']=='true') {
                                                        echo 'checked'; } ?> name="TejidosA4" type="checkbox"></td>
                                                </tr>
                                                <tr>
                                                    <th>Surcos Yugales</th>
                                                    <td><input id="TejidosN5" <?php if ($res['exa_t5n']=='true') {
                                                        echo 'checked'; } ?> name="TejidosN5" type="checkbox"></td>
                                                    <td><input id="TejidosA5" <?php if ($res['exa_t5a']=='true') {
                                                        echo 'checked'; } ?> name="TejidosA5" type="checkbox"></td>
                                                </tr>
                                                <tr>
                                                    <th>Frenillos</th>
                                                    <td><input id="TejidosN6" <?php if ($res['exa_t6n']=='true') {
                                                        echo 'checked'; } ?> name="TejidosN6" type="checkbox"></td>
                                                    <td><input id="TejidosA6" <?php if ($res['exa_t6a']=='true') {
                                                        echo 'checked'; } ?> name="TejidosA6" type="checkbox"></td>
                                                </tr>
                                                <tr>
                                                    <th>Paladar</th>
                                                    <td><input id="TejidosN7" <?php if ($res['exa_t7n']=='true') {
                                                        echo 'checked'; } ?> name="TejidosN7" type="checkbox"></td>
                                                    <td><input id="TejidosA7" <?php if ($res['exa_t7a']=='true') {
                                                        echo 'checked'; } ?> name="TejidosA7" type="checkbox"></td>
                                                </tr>
                                                <tr>
                                                    <th>Orofaringe</th>
                                                    <td><input id="TejidosN8" <?php if ($res['exa_t8n']=='true') {
                                                        echo 'checked'; } ?> name="TejidosN8" type="checkbox"></td>
                                                    <td><input id="TejidosA8" <?php if ($res['exa_t8a']=='true') {
                                                        echo 'checked'; } ?> name="TejidosA8" type="checkbox"></td>
                                                </tr>
                                                <tr>
                                                    <th>Lengua</th>
                                                    <td><input id="TejidosN9" <?php if ($res['exa_t9n']=='true') {
                                                        echo 'checked'; } ?> name="TejidosN9" type="checkbox"></td>
                                                    <td><input id="TejidosA9" <?php if ($res['exa_t9a']=='true') {
                                                        echo 'checked'; } ?> name="TejidosA9" type="checkbox"></td>
                                                </tr>
                                                <tr>
                                                    <th>Piso de boca</th>
                                                    <td><input id="TejidosN10" <?php if ($res['exa_t10n']=='true') {
                                                        echo 'checked'; } ?> name="TejidosN10" type="checkbox"></td>
                                                    <td><input id="TejidosA10" <?php if ($res['exa_t10a']=='true') {
                                                        echo 'checked'; } ?> name="TejidosA10" type="checkbox"></td>
                                                </tr>
                                                <tr>
                                                    <th>Rebordes Residuales</th>
                                                    <td><input id="TejidosN11" <?php if ($res['exa_t11n']=='true') {
                                                        echo 'checked'; } ?> name="TejidosN11" type="checkbox"></td>
                                                    <td><input id="TejidosA11" <?php if ($res['exa_t11a']=='true') {
                                                        echo 'checked'; } ?> name="TejidosA11" type="checkbox"></td>
                                                </tr>
                                                <tr>
                                                    <th>G.salivares</th>
                                                    <td><input id="TejidosN12" <?php if ($res['exa_t12n']=='true') {
                                                        echo 'checked'; } ?> name="TejidosN12" type="checkbox"></td>
                                                    <td><input id="TejidosA12" <?php if ($res['exa_t12a']=='true') {
                                                        echo 'checked'; } ?> name="TejidosA12" type="checkbox"></td>
                                                </tr>
                                                <tr>
                                                    <th>Otros Hallazgos</th>
                                                    <td><input id="TejidosN13" <?php if ($res['exa_t13n']=='true') {
                                                        echo 'checked'; } ?> name="TejidosN13" type="checkbox"></td>
                                                    <td><input id="TejidosA13" <?php if ($res['exa_t13a']=='true') {
                                                        echo 'checked'; } ?> name="TejidosA13" type="checkbox"></td>
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
                                                    <td><input id="AtmN1" <?php if ($res['exa_atm1']=='true') {
                                                        echo 'checked'; } ?> name="AtmN1" type="checkbox"></td>
                                                    <td><input id="AtmA1" <?php if ($res['exa_atm1a']=='true') {
                                                        echo 'checked'; } ?> name="AtmA1" type="checkbox"></td>
                                                </tr>
                                                <tr>
                                                    <th>Labio Inferior</th>
                                                    <td><input id="AtmN2" <?php if ($res['exa_atm2']=='true') {
                                                        echo 'checked'; } ?> name="AtmN2" type="checkbox"></td>
                                                    <td><input id="AtmA2" <?php if ($res['exa_atm2a']=='true') {
                                                        echo 'checked'; } ?> name="AtmA2" type="checkbox"></td>
                                                </tr>
                                                <tr>
                                                    <th>Ruido Artcular</th>
                                                    <td><input id="AtmN3" <?php if ($res['exa_atm3']=='true') {
                                                        echo 'checked'; } ?> name="AtmN3" type="checkbox"></td>
                                                    <td><input id="AtmA3" <?php if ($res['exa_atm3a']=='true') {
                                                        echo 'checked'; } ?> name="AtmA3" type="checkbox"></td>
                                                </tr>
                                                <tr>
                                                    <th>Alteracion del Movimiento</th>
                                                    <td><input id="AtmN4" <?php if ($res['exa_atm4']=='true') {
                                                        echo 'checked'; } ?> name="AtmN4" type="checkbox"></td>
                                                    <td><input id="AtmA4" <?php if ($res['exa_atm4a']=='true') {
                                                        echo 'checked'; } ?> name="AtmA4" type="checkbox"></td>
                                                </tr>
                                                <tr>
                                                    <th>Maloclusiones</th>
                                                    <td><input id="AtmN5" <?php if ($res['exa_atm5']=='true') {
                                                        echo 'checked'; } ?> name="AtmN5" type="checkbox"></td>
                                                    <td><input id="AtmA5" <?php if ($res['exa_atm5a']=='true') {
                                                        echo 'checked'; } ?> name="AtmA5" type="checkbox"></td>
                                                </tr>
                                                <tr>
                                                    <th>Alteraciones Crecimiento</th>
                                                    <td><input id="AtmN6" <?php if ($res['exa_atm6']=='true') {
                                                        echo 'checked'; } ?> name="AtmN6" type="checkbox"></td>
                                                    <td><input id="AtmA6" <?php if ($res['exa_atm6a']=='true') {
                                                        echo 'checked'; } ?> name="AtmA6" type="checkbox"></td>
                                                </tr>
                                                <tr>
                                                    <th>Otros Hallazgos</th>
                                                    <td><input id="AtmN7" <?php if ($res['exa_atm7']=='true') {
                                                        echo 'checked'; } ?> name="AtmN7" type="checkbox"></td>
                                                    <td><input id="AtmA7" <?php if ($res['exa_atm7a']=='true') {
                                                        echo 'checked'; } ?> name="AtmA7" type="checkbox"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-lg-6"><br><br><br><br><br><br><br><br><br></div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <textarea class="form-control" value="<?php echo $res['exa_observaciones']?>" id="exa_obs" rows="3" placeholder="Observaciones"></textarea>
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
                                                                <td><img id="d1" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/<?php if(!empty($res['die_1'])){
                                                                    echo $res['die_1'];
                                                                }else{ echo '1.png';} ?>" alt="img1">
                                                                    <p>8</p>
                                                                </td>
                                                                <td><img id="d2" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/<?php if(!empty($res['die_2'])){
                                                                    echo $res['die_2'];
                                                                }else{ echo '1.png';} ?>" alt="img2">
                                                                    <p>7</p>
                                                                </td>
                                                                <td><img id="d3" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/<?php if(!empty($res['die_3'])){
                                                                    echo $res['die_3'];
                                                                }else{ echo '1.png';} ?>" alt="img3">
                                                                    <p>6</p>
                                                                </td>
                                                                <td><img id="d4" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/<?php if(!empty($res['die_4'])){
                                                                    echo $res['die_4'];
                                                                }else{ echo '1.png';} ?>" alt="img4">
                                                                    <p>5</p>
                                                                </td>
                                                                <td><img id="d5" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/<?php if(!empty($res['die_5'])){
                                                                    echo $res['die_5'];
                                                                }else{ echo '1.png';} ?>" alt="img5">
                                                                    <p>4</p>
                                                                </td>
                                                                <td><img id="d6" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/<?php if(!empty($res['die_6'])){
                                                                    echo $res['die_6'];
                                                                }else{ echo '1.png';} ?>" alt="img6">
                                                                    <p>3</p>
                                                                </td>
                                                                <td><img id="d7" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/<?php if(!empty($res['die_7'])){
                                                                    echo $res['die_7'];
                                                                }else{ echo '1.png';} ?>" alt="img7">
                                                                    <p>2</p>
                                                                </td>
                                                                <td><img id="d8" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/<?php if(!empty($res['die_8'])){
                                                                    echo $res['die_8'];
                                                                }else{ echo '1.png';} ?>" alt="img8">
                                                                    <p>1</p>
                                                                </td>
                                                                <td><img id="d9" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/<?php if(!empty($res['die_9'])){
                                                                    echo $res['die_9'];
                                                                }else{ echo '1.png';} ?>" alt="img1">
                                                                    <p>1</p>
                                                                </td>
                                                                <td><img id="d10" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/<?php if(!empty($res['die_10'])){
                                                                    echo $res['die_10'];
                                                                }else{ echo '1.png';} ?>" alt="img2">
                                                                    <p>2</p>
                                                                </td>
                                                                <td><img id="d11" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/<?php if(!empty($res['die_11'])){
                                                                    echo $res['die_11'];
                                                                }else{ echo '1.png';} ?>" alt="img3">
                                                                    <p>3</p>
                                                                </td>
                                                                <td><img id="d12" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/<?php if(!empty($res['die_12'])){
                                                                    echo $res['die_12'];
                                                                }else{ echo '1.png';} ?>" alt="img4">
                                                                    <p>4</p>
                                                                </td>
                                                                <td><img id="d13" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/<?php if(!empty($res['die_13'])){
                                                                    echo $res['die_13'];
                                                                }else{ echo '1.png';} ?>" alt="img5">
                                                                    <p>5</p>
                                                                </td>
                                                                <td><img id="d14" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/<?php if(!empty($res['die_14'])){
                                                                    echo $res['die_14'];
                                                                }else{ echo '1.png';} ?>" alt="img6">
                                                                    <p>6</p>
                                                                </td>
                                                                <td><img id="d15" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/<?php if(!empty($res['die_15'])){
                                                                    echo $res['die_15'];
                                                                }else{ echo '1.png';} ?>" alt="img7">
                                                                    <p>7</p>
                                                                </td>
                                                                <td><img id="d16" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/<?php if(!empty($res['die_16'])){
                                                                    echo $res['die_16'];
                                                                }else{ echo '1.png';} ?>" alt="img8">
                                                                    <p>8</p>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>

                                                                <td><img id="d17" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/<?php if(!empty($res['die_17'])){
                                                                    echo $res['die_17'];
                                                                }else{ echo '1.png';} ?>" alt="img1">
                                                                    <p>1</p>
                                                                </td>
                                                                <td><img id="d18" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/<?php if(!empty($res['die_18'])){
                                                                    echo $res['die_18'];
                                                                }else{ echo '1.png';} ?>" alt="img2">
                                                                    <p>2</p>
                                                                </td>
                                                                <td><img id="d19" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/<?php if(!empty($res['die_19'])){
                                                                    echo $res['die_19'];
                                                                }else{ echo '1.png';} ?>" alt="img3">
                                                                    <p>3</p>
                                                                </td>
                                                                <td><img id="d20" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/<?php if(!empty($res['die_20'])){
                                                                    echo $res['die_20'];
                                                                }else{ echo '1.png';} ?>" alt="img4">
                                                                    <p>4</p>
                                                                </td>
                                                                <td><img id="d21" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/<?php if(!empty($res['die_21'])){
                                                                    echo $res['die_21'];
                                                                }else{ echo '1.png';} ?>" alt="img5">
                                                                    <p>5</p>
                                                                </td>
                                                                <td><img id="d22" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/<?php if(!empty($res['die_22'])){
                                                                    echo $res['die_22'];
                                                                }else{ echo '1.png';} ?>" alt="img1">
                                                                    <p>1</p>
                                                                </td>
                                                                <td><img id="d23" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/<?php if(!empty($res['die_23'])){
                                                                    echo $res['die_23'];
                                                                }else{ echo '1.png';} ?>" alt="img2">
                                                                    <p>2</p>
                                                                </td>
                                                                <td><img id="d24" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/<?php if(!empty($res['die_24'])){
                                                                    echo $res['die_24'];
                                                                }else{ echo '1.png';} ?>" alt="img3">
                                                                    <p>3</p>
                                                                </td>
                                                                <td><img id="d25" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/<?php if(!empty($res['die_25'])){
                                                                    echo $res['die_25'];
                                                                }else{ echo '1.png';} ?>" alt="img4">
                                                                    <p>4</p>
                                                                </td>
                                                                <td><img id="d26" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/<?php if(!empty($res['die_26'])){
                                                                    echo $res['die_26'];
                                                                }else{ echo '1.png';} ?>" alt="img5">
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
                                                                <td><img id="d27" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/<?php if(!empty($res['die_27'])){
                                                                    echo $res['die_27'];
                                                                }else{ echo '1.png';} ?>" alt="img1">
                                                                    <p>1</p>
                                                                </td>
                                                                <td><img id="d28" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/<?php if(!empty($res['die_28'])){
                                                                    echo $res['die_28'];
                                                                }else{ echo '1.png';} ?>" alt="img2">
                                                                    <p>2</p>
                                                                </td>
                                                                <td><img id="d29" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/<?php if(!empty($res['die_29'])){
                                                                    echo $res['die_29'];
                                                                }else{ echo '1.png';} ?>" alt="img3">
                                                                    <p>3</p>
                                                                </td>
                                                                <td><img id="d30" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/<?php if(!empty($res['die_30'])){
                                                                    echo $res['die_30'];
                                                                }else{ echo '1.png';} ?>" alt="img4">
                                                                    <p>4</p>
                                                                </td>
                                                                <td><img id="d31" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/<?php if(!empty($res['die_31'])){
                                                                    echo $res['die_31'];
                                                                }else{ echo '1.png';}?>" alt="img5">
                                                                    <p>5</p>
                                                                </td>
                                                                <td><img id="d32" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/<?php if(!empty($res['die_32'])){
                                                                    echo $res['die_32'];
                                                                }else{ echo '1.png';}?>" alt="img1">
                                                                    <p>1</p>
                                                                </td>
                                                                <td><img id="d33" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/<?php if(!empty($res['die_33'])){
                                                                    echo $res['die_33'];
                                                                }else{ echo '1.png';}?>" alt="img2">
                                                                    <p>2</p>
                                                                </td>
                                                                <td><img id="d34" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/<?php if(!empty($res['die_34'])){
                                                                    echo $res['die_34'];
                                                                }else{ echo '1.png';}?>" alt="img3">
                                                                    <p>3</p>
                                                                </td>
                                                                <td><img id="d35" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/<?php if(!empty($res['die_35'])){
                                                                    echo $res['die_35'];
                                                                }else{ echo '1.png';}?>" alt="img4">
                                                                    <p>4</p>
                                                                </td>
                                                                <td><img id="d36" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/<?php if(!empty($res['die_36'])){
                                                                    echo $res['die_36'];
                                                                }else{ echo '1.png';}?>" alt="img5">
                                                                    <p>5</p>
                                                                </td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td><img id="d37" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/<?php if(!empty($res['die_37'])){
                                                                    echo $res['die_37'];
                                                                }else{ echo '1.png';}?>" alt="img1">
                                                                    <p>8</p>
                                                                </td>
                                                                <td><img id="d38" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/<?php if(!empty($res['die_38'])){
                                                                    echo $res['die_38'];
                                                                }else{ echo '1.png';}?>" alt="img2">
                                                                    <p>7</p>
                                                                </td>
                                                                <td><img id="d39" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/<?php if(!empty($res['die_39'])){
                                                                    echo $res['die_39'];
                                                                }else{ echo '1.png';}?>" alt="img3">
                                                                    <p>6</p>
                                                                </td>
                                                                <td><img id="d40" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/<?php if(!empty($res['die_40'])){
                                                                    echo $res['die_40'];
                                                                }else{ echo '1.png';}?>" alt="img4">
                                                                    <p>5</p>
                                                                </td>
                                                                <td><img id="d41" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/<?php if(!empty($res['die_41'])){
                                                                    echo $res['die_41'];
                                                                }else{ echo '1.png';}?>" alt="img5">
                                                                    <p>4</p>
                                                                </td>
                                                                <td><img id="d42" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/<?php if(!empty($res['die_42'])){
                                                                    echo $res['die_42'];
                                                                }else{ echo '1.png';}?>" alt="img6">
                                                                    <p>3</p>
                                                                </td>
                                                                <td><img id="d43" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/<?php if(!empty($res['die_43'])){
                                                                    echo $res['die_43'];
                                                                }else{ echo '1.png';}?>" alt="img7">
                                                                    <p>2</p>
                                                                </td>
                                                                <td><img id="d44" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/<?php if(!empty($res['die_44'])){
                                                                    echo $res['die_44'];
                                                                }else{ echo '1.png';}?>" alt="img8">
                                                                    <p>1</p>
                                                                </td>
                                                                <td><img id="d45" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/<?php if(!empty($res['die_45'])){
                                                                    echo $res['die_45'];
                                                                }else{ echo '1.png';}?>" alt="img1">
                                                                    <p>1</p>
                                                                </td>
                                                                <td><img id="d46" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/<?php if(!empty($res['die_46'])){
                                                                    echo $res['die_46'];
                                                                }else{ echo '1.png';}?>" alt="img2">
                                                                    <p>2</p>
                                                                </td>
                                                                <td><img id="d47" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/<?php if(!empty($res['die_47'])){
                                                                    echo $res['die_47'];
                                                                }else{ echo '1.png';}?>" alt="img3">
                                                                    <p>3</p>
                                                                </td>
                                                                <td><img id="d48" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/<?php if(!empty($res['die_48'])){
                                                                    echo $res['die_48'];
                                                                }else{ echo '1.png';}?>" alt="img4">
                                                                    <p>4</p>
                                                                </td>
                                                                <td><img id="d49" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/<?php if(!empty($res['die_49'])){
                                                                    echo $res['die_49'];
                                                                }else{ echo '1.png';}?>" alt="img5">
                                                                    <p>5</p>
                                                                </td>
                                                                <td><img id="d50" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/<?php if(!empty($res['die_50'])){
                                                                    echo $res['die_50'];
                                                                }else{ echo '1.png';}?>" alt="img6">
                                                                    <p>6</p>
                                                                </td>
                                                                <td><img id="d51" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/<?php if(!empty($res['die_51'])){
                                                                    echo $res['die_51'];
                                                                }else{ echo '1.png';}?>" alt="img7">
                                                                    <p>7</p>
                                                                </td>
                                                                <td><img id="d52" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/<?php if(!empty($res['die_52'])){
                                                                    echo $res['die_52'];
                                                                }else{ echo '1.png';}?>" alt="img8">
                                                                    <p>8</p>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <input type="button" name="previous" class="previous btn btn-default" value="Previo" />
                                    <input type="button" name="next" class="next btn btn-info" value="Siguiente" />
                                </fieldset>
                                <fieldset>
                                    <div class="col-lg-12 form-group">
                                        <h2>Odontograma Egreso</h2>
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
                                            <div class="form-group" id="opciones1" style="width: 60%;"></div>
                                        </div>
                                        <div class="form-group ">
                                            <div class="col-lg-12 odontog">
                                                <table border="1">
                                                    <tbody>
                                                        <tr>
                                                            <td><img id="dd1" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/<?php if(!empty($res['ddie_1'])){
                                                                    echo $res['ddie_1'];
                                                                }else{ echo '1.png';}?>" alt="img1">
                                                                <p>8</p>
                                                            </td>
                                                            <td><img id="dd2" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/<?php if(!empty($res['ddie_2'])){
                                                                    echo $res['ddie_2'];
                                                                }else{ echo '1.png';}?>" alt="img2">
                                                                <p>7</p>
                                                            </td>
                                                            <td><img id="dd3" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/<?php if(!empty($res['ddie_3'])){
                                                                    echo $res['ddie_3'];
                                                                }else{ echo '1.png';}?>" alt="img3">
                                                                <p>6</p>
                                                            </td>
                                                            <td><img id="dd4" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/<?php if(!empty($res['ddie_4'])){
                                                                    echo $res['ddie_4'];
                                                                }else{ echo '1.png';}?>" alt="img4">
                                                                <p>5</p>
                                                            </td>
                                                            <td><img id="dd5" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/<?php if(!empty($res['ddie_5'])){
                                                                    echo $res['ddie_5'];
                                                                }else{ echo '1.png';}?>" alt="img5">
                                                                <p>4</p>
                                                            </td>
                                                            <td><img id="dd6" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/<?php if(!empty($res['ddie_6'])){
                                                                    echo $res['ddie_6'];
                                                                }else{ echo '1.png';}?>" alt="img6">
                                                                <p>3</p>
                                                            </td>
                                                            <td><img id="dd7" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/<?php if(!empty($res['ddie_7'])){
                                                                    echo $res['ddie_7'];
                                                                }else{ echo '1.png';}?>" alt="img7">
                                                                <p>2</p>
                                                            </td>
                                                            <td><img id="dd8" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/<?php if(!empty($res['ddie_8'])){
                                                                    echo $res['ddie_8'];
                                                                }else{ echo '1.png';}?>" alt="img8">
                                                                <p>1</p>
                                                            </td>
                                                            <td><img id="dd9" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/<?php if(!empty($res['ddie_9'])){
                                                                    echo $res['ddie_9'];
                                                                }else{ echo '1.png';}?>" alt="img1">
                                                                <p>1</p>
                                                            </td>
                                                            <td><img id="dd10" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/<?php if(!empty($res['ddie_10'])){
                                                                    echo $res['ddie_10'];
                                                                }else{ echo '1.png';}?>" alt="img2">
                                                                <p>2</p>
                                                            </td>
                                                            <td><img id="dd11" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/<?php if(!empty($res['ddie_11'])){
                                                                    echo $res['ddie_11'];
                                                                }else{ echo '1.png';}?>" alt="img3">
                                                                <p>3</p>
                                                            </td>
                                                            <td><img id="dd12" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/<?php if(!empty($res['ddie_12'])){
                                                                    echo $res['ddie_12'];
                                                                }else{ echo '1.png';}?>" alt="img4">
                                                                <p>4</p>
                                                            </td>
                                                            <td><img id="dd13" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/<?php if(!empty($res['ddie_13'])){
                                                                    echo $res['ddie_13'];
                                                                }else{ echo '1.png';}?>" alt="img5">
                                                                <p>5</p>
                                                            </td>
                                                            <td><img id="dd14" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/<?php if(!empty($res['ddie_14'])){
                                                                    echo $res['ddie_14'];
                                                                }else{ echo '1.png';}?>" alt="img6">
                                                                <p>6</p>
                                                            </td>
                                                            <td><img id="dd15" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/<?php if(!empty($res['ddie_15'])){
                                                                    echo $res['ddie_15'];
                                                                }else{ echo '1.png';}?>" alt="img7">
                                                                <p>7</p>
                                                            </td>
                                                            <td><img id="dd16" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/<?php if(!empty($res['ddie_16'])){
                                                                    echo $res['ddie_16'];
                                                                }else{ echo '1.png';}?>" alt="img8">
                                                                <p>8</p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>

                                                            <td><img id="dd17" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/<?php if(!empty($res['ddie_17'])){
                                                                    echo $res['ddie_17'];
                                                                }else{ echo '1.png';}?>" alt="img1">
                                                                <p>1</p>
                                                            </td>
                                                            <td><img id="dd18" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/<?php if(!empty($res['ddie_18'])){
                                                                    echo $res['ddie_18'];
                                                                }else{ echo '1.png';}?>" alt="img2">
                                                                <p>2</p>
                                                            </td>
                                                            <td><img id="dd19" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/<?php if(!empty($res['ddie_19'])){
                                                                    echo $res['ddie_19'];
                                                                }else{ echo '1.png';}?>" alt="img3">
                                                                <p>3</p>
                                                            </td>
                                                            <td><img id="dd20" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/<?php if(!empty($res['ddie_20'])){
                                                                    echo $res['ddie_20'];
                                                                }else{ echo '1.png';}?>" alt="img4">
                                                                <p>4</p>
                                                            </td>
                                                            <td><img id="dd21" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/<?php if(!empty($res['ddie_21'])){
                                                                    echo $res['ddie_21'];
                                                                }else{ echo '1.png';}?>" alt="img5">
                                                                <p>5</p>
                                                            </td>
                                                            <td><img id="dd22" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/<?php if(!empty($res['ddie_22'])){
                                                                    echo $res['ddie_22'];
                                                                }else{ echo '1.png';}?>" alt="img1">
                                                                <p>1</p>
                                                            </td>
                                                            <td><img id="dd23" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/<?php if(!empty($res['ddie_23'])){
                                                                    echo $res['ddie_23'];
                                                                }else{ echo '1.png';}?>" alt="img2">
                                                                <p>2</p>
                                                            </td>
                                                            <td><img id="dd24" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/<?php if(!empty($res['ddie_24'])){
                                                                    echo $res['ddie_24'];
                                                                }else{ echo '1.png';}?>" alt="img3">
                                                                <p>3</p>
                                                            </td>
                                                            <td><img id="dd25" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/<?php if(!empty($res['ddie_25'])){
                                                                    echo $res['ddie_25'];
                                                                }else{ echo '1.png';}?>" alt="img4">
                                                                <p>4</p>
                                                            </td>
                                                            <td><img id="dd26" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/<?php if(!empty($res['ddie_26'])){
                                                                    echo $res['ddie_26'];
                                                                }else{ echo '1.png';}?>" alt="img5">
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
                                                            <td><img id="dd27" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/<?php if(!empty($res['ddie_27'])){
                                                                    echo $res['ddie_27'];
                                                                }else{ echo '1.png';}?>" alt="img1">
                                                                <p>1</p>
                                                            </td>
                                                            <td><img id="dd28" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/<?php if(!empty($res['ddie_28'])){
                                                                    echo $res['ddie_28'];
                                                                }else{ echo '1.png';}?>" alt="img2">
                                                                <p>2</p>
                                                            </td>
                                                            <td><img id="dd29" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/<?php if(!empty($res['ddie_29'])){
                                                                    echo $res['ddie_29'];
                                                                }else{ echo '1.png';}?>" alt="img3">
                                                                <p>3</p>
                                                            </td>
                                                            <td><img id="dd30" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/<?php if(!empty($res['ddie_30'])){
                                                                    echo $res['ddie_30'];
                                                                }else{ echo '1.png';}?>" alt="img4">
                                                                <p>4</p>
                                                            </td>
                                                            <td><img id="dd31" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/<?php if(!empty($res['ddie_31'])){
                                                                    echo $res['ddie_31'];
                                                                }else{ echo '1.png';}?>" alt="img5">
                                                                <p>5</p>
                                                            </td>
                                                            <td><img id="dd32" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/<?php if(!empty($res['ddie_32'])){
                                                                    echo $res['ddie_32'];
                                                                }else{ echo '1.png';}?>" alt="img1">
                                                                <p>1</p>
                                                            </td>
                                                            <td><img id="dd33" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/<?php if(!empty($res['ddie_33'])){
                                                                    echo $res['ddie_33'];
                                                                }else{ echo '1.png';}?>" alt="img2">
                                                                <p>2</p>
                                                            </td>
                                                            <td><img id="dd34" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/<?php if(!empty($res['ddie_34'])){
                                                                    echo $res['ddie_34'];
                                                                }else{ echo '1.png';}?>" alt="img3">
                                                                <p>3</p>
                                                            </td>
                                                            <td><img id="dd35" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/<?php if(!empty($res['ddie_35'])){
                                                                    echo $res['ddie_35'];
                                                                }else{ echo '1.png';}?>" alt="img4">
                                                                <p>4</p>
                                                            </td>
                                                            <td><img id="dd36" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/<?php if(!empty($res['ddie_36'])){
                                                                    echo $res['ddie_36'];
                                                                }else{ echo '1.png';}?>" alt="img5">
                                                                <p>5</p>
                                                            </td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td><img id="dd37" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/<?php if(!empty($res['ddie_37'])){
                                                                    echo $res['ddie_37'];
                                                                }else{ echo '1.png';}?>" alt="img1">
                                                                <p>8</p>
                                                            </td>
                                                            <td><img id="dd38" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/<?php if(!empty($res['ddie_38'])){
                                                                    echo $res['ddie_38'];
                                                                }else{ echo '1.png';}?>" alt="img2">
                                                                <p>7</p>
                                                            </td>
                                                            <td><img id="dd39" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/<?php if(!empty($res['ddie_39'])){
                                                                    echo $res['ddie_39'];
                                                                }else{ echo '1.png';}?>" alt="img3">
                                                                <p>6</p>
                                                            </td>
                                                            <td><img id="dd40" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/<?php if(!empty($res['ddie_40'])){
                                                                    echo $res['ddie_40'];
                                                                }else{ echo '1.png';}?>" alt="img4">
                                                                <p>5</p>
                                                            </td>
                                                            <td><img id="dd41" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/<?php if(!empty($res['ddie_41'])){
                                                                    echo $res['ddie_41'];
                                                                }else{ echo '1.png';}?>" alt="img5">
                                                                <p>4</p>
                                                            </td>
                                                            <td><img id="dd42" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/<?php if(!empty($res['ddie_42'])){
                                                                    echo $res['ddie_42'];
                                                                }else{ echo '1.png';}?>" alt="img6">
                                                                <p>3</p>
                                                            </td>
                                                            <td><img id="dd43" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/<?php if(!empty($res['ddie_43'])){
                                                                    echo $res['ddie_43'];
                                                                }else{ echo '1.png';}?>" alt="img7">
                                                                <p>2</p>
                                                            </td>
                                                            <td><img id="dd44" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/<?php if(!empty($res['ddie_44'])){
                                                                    echo $res['ddie_44'];
                                                                }else{ echo '1.png';}?>" alt="img8">
                                                                <p>1</p>
                                                            </td>
                                                            <td><img id="dd45" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/<?php if(!empty($res['ddie_45'])){
                                                                    echo $res['ddie_45'];
                                                                }else{ echo '1.png';}?>" alt="img1">
                                                                <p>1</p>
                                                            </td>
                                                            <td><img id="dd46" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/<?php if(!empty($res['ddie_46'])){
                                                                    echo $res['ddie_46'];
                                                                }else{ echo '1.png';}?>" alt="img2">
                                                                <p>2</p>
                                                            </td>
                                                            <td><img id="dd47" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/<?php if(!empty($res['ddie_47'])){
                                                                    echo $res['ddie_47'];
                                                                }else{ echo '1.png';}?>" alt="img3">
                                                                <p>3</p>
                                                            </td>
                                                            <td><img id="dd48" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/<?php if(!empty($res['ddie_48'])){
                                                                    echo $res['ddie_48'];
                                                                }else{ echo '1.png';}?>" alt="img4">
                                                                <p>4</p>
                                                            </td>
                                                            <td><img id="dd49" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/<?php if(!empty($res['ddie_49'])){
                                                                    echo $res['ddie_49'];
                                                                }else{ echo '1.png';}?>" alt="img5">
                                                                <p>5</p>
                                                            </td>
                                                            <td><img id="dd50" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/<?php if(!empty($res['ddie_50'])){
                                                                    echo $res['ddie_50'];
                                                                }else{ echo '1.png';}?>" alt="img6">
                                                                <p>6</p>
                                                            </td>
                                                            <td><img id="dd51" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/<?php if(!empty($res['ddie_51'])){
                                                                    echo $res['ddie_51'];
                                                                }else{ echo '1.png';}?>" alt="img7">
                                                                <p>7</p>
                                                            </td>
                                                            <td><img id="dd52" class="odonto" src="<?php echo SERVERURL ?>/assets/dientes/<?php if(!empty($res['ddie_52'])){
                                                                    echo $res['ddie_52'];
                                                                }else{ echo '1.png';}?>" alt="img8">
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
                                                    <td><input id="AccioPreveSI1" <?php if ($res['hac_hi_oral']=='true') {
                                                        echo 'checked';} ?> name="AccioPreveSI1" type="checkbox"></td>
                                                    <td><input id="AccioPreveFre1" value="<?php echo $res['ha_hi1']; ?>" name="AccioPreveFre1" type="text"></td>
                                                </tr>
                                                <tr>
                                                    <th>Practica el cepillado diario</th>
                                                    <td><input id="AccioPreveSI2" <?php if ($res['ha_diario']=='true') {
                                                        echo 'checked'; } ?> name="AccioPreveSI2" type="checkbox"></td>
                                                    <td><input id="AccioPreveFre2" value="<?php echo $res['ha_hi2']; ?>" name="AccioPreveFre2" type="text"></td>
                                                </tr>
                                                <tr>
                                                    <th>Usa seda dental</th>
                                                    <td><input id="AccioPreveSI3" <?php if ($res['ha_dental']=='true') {
                                                        echo 'checked'; } ?> name="AccioPreveSI3" type="checkbox"></td>
                                                    <td><input id="AccioPreveFre3" value="<?php echo $res['ha_hi3']; ?>" name="AccioPreveFre3" type="text"></td>
                                                </tr>
                                                <tr>
                                                    <th>Usa enjuague bucal</th>
                                                    <td><input id="AccioPreveSI4" <?php if ($res['ha_bucal']=='true') {
                                                        echo 'checked'; } ?> name="AccioPreveSI4" type="checkbox"></td>
                                                    <td><input id="AccioPreveFre4" value="<?php echo $res['ha_hi4']; ?>" name="AccioPreveFre4" type="text"></td>
                                                </tr>
                                                <tr>
                                                    <th>Le han aplicado fluor</th>
                                                    <td><input id="AccioPreveSI5" <?php if ($res['ha_fluor']=='true') {
                                                        echo 'checked'; } ?> name="AccioPreveSI5" type="checkbox"></td>
                                                    <td><input id="AccioPreveFre5" value="<?php echo $res['ha_hi5']; ?>" name="AccioPreveFre5" type="text"></td>
                                                </tr>
                                                <tr>
                                                    <th>Le han colocado sellantes</th>
                                                    <td><input id="AccioPreveSI6" <?php if ($res['ha_sellantes']=='true') {
                                                        echo 'checked'; } ?> name="AccioPreveSI6" type="checkbox"></td>
                                                    <td><input id="AccioPreveFre6" value="<?php echo $res['ha_hi6']; ?>" name="AccioPreveFre6" type="text"></td>
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
                                 <  <div class="col-lg-12">
                                        <h2>Examenes complementarios</h2>
                                        <div class="col-lg-6">
                                            <input type="file" id="intra" name="intra" class="form-control">
                                        </div>

                                        <div class="col-lg-6">
                                            <input class="form-control" id="intrad" type="text" placeholder="Observaciones">
                                        </div>
                                    </div>
                                                    
                                    <div class="col-lg-6">
                                        <h3>Radiografia Extra oral</h3>
                                        <table class="table table-striped">

                                            <tbody>
                                                <tr>
                                                    <th>Panoramica</th>
                                                    <td><input id="RadioExtraO1" value="<?php echo $res['exa_panoramica'] ?>" name="RadioExtraO1" type="text"></td>
                                                </tr>
                                                <tr>
                                                    <th>Lateral de craneo</th>
                                                    <td><input id="RadioExtraO2" value="<?php echo $res['exa_lateral'] ?>" name="RadioExtraO2" type="text"></td>
                                                </tr>
                                                <tr>
                                                    <th>Carpograma</th>
                                                    <td><input id="RadioExtraO3" value="<?php echo $res['exa_carpograma'] ?>" name="RadioExtraO3" type="text"></td>
                                                </tr>
                                                <tr>
                                                    <th>Antero posaterior</th>
                                                    <td><input id="RadioExtraO4" value="<?php echo $res['exa_antero'] ?>" name="RadioExtraO4" type="text"></td>
                                                </tr>
                                                <tr>
                                                    <th>Postero anterior</th>
                                                    <td><input id="RadioExtraO5" value="<?php echo $res['exa_postero'] ?>" name="RadioExtraO5" type="text"></td>
                                                </tr>
                                                <tr>
                                                    <th>ATM</th>
                                                    <td><input id="RadioExtraO6" value="<?php echo $res['exa_atm'] ?>" name="RadioExtraO6" type="text"></td>
                                                </tr>
                                                <tr>
                                                    <th>Axial</th>
                                                    <td><input id="RadioExtraO7" value="<?php echo $res['exa_axial'] ?>" name="RadioExtraO7" type="text"></td>
                                                </tr>
                                                <tr>
                                                    <th>Trascraneal de condilos</th>
                                                    <td><input id="RadioExtraO8" value="<?php echo $res['exa_tras'] ?>" name="RadioExtraO8" type="text"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-lg-6">
                                        <h3>Examenes complementarios</h3>
                                        <input id="ExamenesComple" name="ExamenesComple" value="<?php echo $res['exa_com'] ?>" class="form-control" type="text" placeholder="Examenes de laboratorio">
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
                                        <input type="text" class="form-control" id="dia_obs" placeholder="Observaciones">
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