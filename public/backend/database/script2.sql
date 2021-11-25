use new 
/*** Users ***/
select
  CONCAT(
    'INSERT INTO users(`name`, `email`, `password`, `role`, `control_number`, `is_new_user`, `created_at`, `updated_at`)',
    'VALUES(\'',
    UPPER(
      CONVERT(
        CAST(CONVERT(exalumno.nombres USING latin1) AS BINARY) USING utf8
      )
    ),
    '\',\'',
    login.email,
    '\',\' \', \'student\', \'',
    exalumno.nControl,
    '\',1,NOW(),NOW());'
  )
from
  login
  inner join exalumno on TRIM(exalumno.nControl) = TRIM(login.NumeroControl)
group by
  login.NumeroControl
order by
  login.id_user




/*** Survey 1 ***/
select
  /* CONCAT(
              'INSERT INTO users(`name`, `email`, `password`, `role`, `control_number`, `is_new_user`, `created_at`, `updated_at`)',
              'VALUES(\'',
              UPPER(
                CONVERT(
                  CAST(CONVERT(exalumno.nombres USING latin1) AS BINARY) USING utf8
                )
              ),
              '\',\'',
              login.email,
              '\',\' \', \'student\', \'',
              login.NumeroControl,
              '\',1,NOW(),NOW());'
            ) */
  users.id,
  perfilegresados.*
from
  users
  inner join perfilegresados on TRIM(perfilegresados.NumeroControl) = TRIM(users.control_number)
  

/*** Survey 2 ***/
select
  CONCAT(
    'INSERT INTO survey_twos(`user_id`, `quality_teachers`,`syllabus`
    ,`study_condition`,`experience`,`study_emphasis`,`participate_projects`
    ,`created_at`, `updated_at`)',
    'VALUES(\'',
    users.id,
    '\', \'', UPPER(pertinenciadisponibilidadmediosrecursosaprendizaje.CalidadDocente), '\',',
    '\'', UPPER(pertinenciadisponibilidadmediosrecursosaprendizaje.PlanEstudios), '\',',
    '\'', UPPER(pertinenciadisponibilidadmediosrecursosaprendizaje.SatisfaccionCondicionesEstudio), '\',',
    '\'', UPPER(pertinenciadisponibilidadmediosrecursosaprendizaje.ExperienciaObtenidaResidenciaProfesional), '\',',
    '\'', UPPER(pertinenciadisponibilidadmediosrecursosaprendizaje.InvestigacionProcesoEnsenanza), '\',',
    '\'', UPPER(pertinenciadisponibilidadmediosrecursosaprendizaje.OportunidadProyectosInvestigacionDesarrollo), '\',',
    'NOW(),NOW());'
  )
from
  users
  inner join pertinenciadisponibilidadmediosrecursosaprendizaje on TRIM(pertinenciadisponibilidadmediosrecursosaprendizaje.NumeroControl) = TRIM(users.control_number)



/*** Survey 4 ***/
select
  CONCAT(
    'INSERT INTO survey_fours(`user_id`, `efficiency_work_activities`,`academic_training`
    ,`usefulness_professional_residence`,`study_area`,`title`,`experience`,`job_competence`
    ,`positioning`,`languages`,`recommendations`,`personality`,`leadership`,`others`
    ,`created_at`, `updated_at`)',
    'VALUES(\'',
    users.id,
    '\',\'',
    UPPER(CONVERT(
      CAST(
        CONVERT(
          desempenoprofesionalegresados.EficienciaLaboral USING latin1
        ) AS BINARY
      ) USING utf8
    )),
    '\', \'',
    UPPER(CONVERT(
      CAST(
        CONVERT(
          desempenoprofesionalegresados.FormacionAcademica USING latin1
        ) AS BINARY
      ) USING utf8
    )),
    '\', \'',
    UPPER(CONVERT(
      CAST(
        CONVERT(
          desempenoprofesionalegresados.UtilidadResidencia USING latin1
        ) AS BINARY
      ) USING utf8
    )),
    '\', \'', desempenoprofesionalegresados.UtilidadResidencia, '\',',
    '\'', desempenoprofesionalegresados.Area, '\',',
    '\'', desempenoprofesionalegresados.Titulacion, '\',',
    '\'', desempenoprofesionalegresados.ExperienciaLaboral, '\',',
    '\'', desempenoprofesionalegresados.CompeteniaLaboral, '\',',
    '\'', desempenoprofesionalegresados.Poicionamiento, '\',',
    '\'', desempenoprofesionalegresados.ConocimientoIdiomas, '\',',
    '\'', desempenoprofesionalegresados.Recomendaciones, '\',',
    '\'', desempenoprofesionalegresados.Personalidad, '\',',
    '\'', desempenoprofesionalegresados.CapacidadLiderazgo, '\',',
    '\'', desempenoprofesionalegresados.Otros, '\',',
    'NOW(),NOW());'
  )
from
  users
  inner join desempenoprofesionalegresados on TRIM(desempenoprofesionalegresados.NumeroControl) = TRIM(users.control_number)


/*** Survey 5 ***/
select
  CONCAT(
    'INSERT INTO survey_fives(`user_id`, `courses_yes_no`,`courses`,`master_yes_no`,`master`,`created_at`, `updated_at`)',
    'VALUES(\'',
    users.id,
    '\',\'',
    IF(
      expectativasdesarrollo.CursoActualizacion = 'No',
      'NO',
      'SÍ'
    ),
    '\', \'',
    CONVERT(
      CAST(
        CONVERT(
          expectativasdesarrollo.CurActCuales USING latin1
        ) AS BINARY
      ) USING utf8
    ),
    '\',\'',
    IF(
      expectativasdesarrollo.Posgrado = 'No',
      'NO',
      'SÍ'
    ),
    '\', \'',
    CONVERT(
      CAST(
        CONVERT(
          expectativasdesarrollo.Cual USING latin1
        ) AS BINARY
      ) USING utf8
    ),
    '\',NOW(),NOW());'
  )
from
  users
  inner join expectativasdesarrollo on TRIM(expectativasdesarrollo.NumeroControl) = TRIM(users.control_number)


/*** Survey 6 ***/
select
  CONCAT(
    'INSERT INTO survey_sixes(`user_id`, `organization_yes_no`,`organization`,`agency_yes_no`,`agency`,`association_yes_no`, `association`,`created_at`, `updated_at`)',
    'VALUES(\'',
    users.id,
    '\',\'',
    IF(
      participacionsocialegresados.OrganizacionSocial = 'No',
      'NO',
      'SÍ'
    ),
    '\', \'',
    CONVERT(
      CAST(
        CONVERT(
          participacionsocialegresados.OrgSocCuales USING latin1
        ) AS BINARY
      ) USING utf8
    ),
    '\',\'',
    IF(
      participacionsocialegresados.OrganismoProfesional = 'No',
      'NO',
      'SÍ'
    ),
    '\', \'',
    CONVERT(
      CAST(
        CONVERT(
          participacionsocialegresados.OrgProfCuales USING latin1
        ) AS BINARY
      ) USING utf8
    ),
    '\',\'',
    IF(
      participacionsocialegresados.AsociacionEgresados = 'No',
      'NO',
      'SÍ'
    ),
    '\', \'',
    CONVERT(
      CAST(
        CONVERT(
          participacionsocialegresados.AsoEgreCuales USING latin1
        ) AS BINARY
      ) USING utf8
    ),    
    '\',NOW(),NOW());'
  )
from
  users
  inner join participacionsocialegresados on TRIM(participacionsocialegresados.NumeroControl) = TRIM(users.control_number)


/*** Survey 7 ***/
select
  CONCAT(
    'INSERT INTO survey_sevens(`user_id`, `comments`, `created_at`, `updated_at`)',
    'VALUES(\'',
    users.id,
    '\',\'',
    CONVERT(
      CAST(
        CONVERT(
          comentariossugerencias.OpinionMejoraProfesional USING latin1
        ) AS BINARY
      ) USING utf8
    ),
    '\',NOW(),NOW());'
  )
from
  users
  inner join comentariossugerencias on TRIM(comentariossugerencias.NumeroControl) = TRIM(users.control_number)
where
  comentariossugerencias.OpinionMejoraProfesional <> ''
  or comentariossugerencias.OpinionMejoraProfesional <> ' '