-- ============================================================
-- ANÁLISIS COMPLETO DE TODAS LAS 29 TABLAS (db_tesis2.sql)
-- Proyecto: Gestion_clinica
-- ============================================================

/*
1. tbl_antecedente_familiar          -> OK (PK, FK a tbl_antecente_medico)
2. tbl_antecedente_paciente          -> OK (PK, 2 FKs)
3. tbl_antecedentesp                 -> OK (PK, FK a tbl_pacientep)
4. tbl_antecente_medico              -> OK (PK, referencia: id_atencedentes)
5. tbl_atencion                      -> OK (PK, FK paciente + FK medico)
6. tbl_categoria                     -> OK
7. tbl_citas                         -> OK (+ INDEX cit_start agregado)
8. tbl_cuerpop                       -> OK (PK, FK a tbl_encabezadop)
9. tbl_diagnosticop                  -> OK (PK, FK a tbl_cuerpop)
10. tbl_dientesp                     -> OK (PK, FK a tbl_cuerpop)
11. tbl_documento                    -> OK (PK, datos: DNI / Pasaporte)
12. tbl_encabezadop                  -> PROBLEMA: columna ` id_encabezado` (con espacio)
13. tbl_examen_estomatologico        -> PROBLEMA: `exa_detalle` es int(255) -> debe ser VARCHAR
14. tbl_examenesp                    -> OK (PK, FK a tbl_cuerpop)
15. tbl_haccionprevp                 -> OK (PK, FK a tbl_cuerpop)
16. tbl_medico                       -> OK (+ INDEX cit_start, falta INDEX med_estado)
17. tbl_observacionesp               -> OK (PK, 2 FKs)
18. tbl_paciente                     -> DUPLICADO: datos casi iguales a tbl_pacientep
19. tbl_pacientep                    -> FALTA UNIQUE(pac_dni)
20. tbl_perfil                       -> OK (1=Admin, 2=Medico, 3=Secretaria, 4=Especialista)
21. tbl_placabacp                    -> OK (PK, FK a tbl_cuerpop)
22. tbl_ptratamientop                -> OK (PK, FK a tbl_cuerpop)
23. tbl_signosvitalesp               -> OK (PK, FK a tbl_cuerpop)
24. tbl_visitas                      -> OK (+ INDEX vis_fecha agregado)

PROBLEMAS ENCONTRADOS:
- Duplicación paciente / pacientep
- `med_telefono` estaba como VARCHAR(10) (corregido en archivo optimizacion)
- `examen_estomatologico.exa_detalle`: tipo incorrecto (int(255) en vez de VARCHAR)
- Faltan índices en campos de búsqueda (med_telefono, enc_nhistoria, enc_fechaelab)
- Falta `UNIQUE` en `pac_dni`
- `tbl_encabezadop.id_encabezado` tiene espacio en nombre
- `MdlReporteriaPaciente()` consultaba `tbl_paciente` en vez de `tbl_pacientep` (corregido)
- `MdlReporteriaMedico()` usaba JOIN implícito (corregido a INNER JOIN explícito)

PARAMETRIZACIÓN (código PHP):
- `medico.controlador.php`: CtrPerfilista() y CtrCategorialista() usan concatenación string en SQL
  -> Deben usar prepare() con parámetros
- `historia.modelo.php`: MdlCrearHistoria() tiene bug SQL en línea con exa_com (falta coma)
*/

-- ============================================================
-- CORRECCIONES PENDIENTES (ejecutar en orden si aplica)
-- ============================================================

-- A) Corregir columna con espacio en nombre (si aplica en tu versión exacta)
-- ALTER TABLE tbl_encabezadop CHANGE ` id_encabezado` `id_encabezado` INT(3) NOT NULL AUTO_INCREMENT;

-- B) Corregir tipo de detalle en examen estomatológico
ALTER TABLE tbl_examen_estomatologico MODIFY `exa_detalle` VARCHAR(255) NULL DEFAULT NULL;

-- C) Evitar duplicados de DNI en pacientes
ALTER TABLE tbl_pacientep ADD UNIQUE (pac_dni);

-- D) Índices faltantes para rendimiento
ALTER TABLE tbl_medico ADD INDEX (med_estado);
ALTER TABLE tbl_medico ADD INDEX (med_telefono);
ALTER TABLE tbl_citas ADD INDEX (id_medico);
ALTER TABLE tbl_citas ADD INDEX (id_paciente);
ALTER TABLE tbl_encabezadop ADD INDEX (enc_nhistoria);
ALTER TABLE tbl_encabezadop ADD INDEX (enc_fechaelab);
ALTER TABLE tbl_citas ADD INDEX (cit_title);
