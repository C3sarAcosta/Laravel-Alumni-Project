@extends('admin.admin_master')

@section('TopTitle')Reportes @endsection

@section('title_section')Reporte Ubicación Laboral @endsection

@section('admin_content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Ubicación laboral de los egresadosW</h3>
            </div>

            <!-- /.card-header -->
            <div class="card-body">
                <table id="table-filter" class="table table-responsive table-bordered table-striped"
                    style="width: 100%;">
                    <thead class="bg-gray-dark">
                        <tr>
                            <th>ID</th>
                            <th>Actividad a la que se dedica actualmente</th>
                            <th>¿Qué están estudiando?</th>
                            <th>Especialidad</th>
                            <th>Tiempo transcurrido para obtener el primer empleo</th>
                            <th>Medio para obtener el empleo</th>
                            <th>Competencias laborales</th>
                            <th>Título Profesional</th>
                            <th>Examen de selección</th>
                            <th>Idioma Extranjero</th>
                            <th>Actitudes y habilidades socio-comunicativas (principios y
                                valores)</th>
                            <th>Ninguno</th>
                            <th>Idioma que utiliza en su trabajo actual</th>
                            <th>% Hablar</th>
                            <th>% Escribir</th>
                            <th>% Leer</th>
                            <th>% Escuchar</th>
                            <th>Antigüedad en el empleo actual</th>
                            <th>Año de ingreso</th>
                            <th>Ingreso (Salario minimo diario)</th>
                            <th>Nivel jerárquico en el trabajo</th>
                            <th>Condición de trabajo</th>
                            <th>Relación del trabajo con su área de formación</th>
                            <th>Razón Social</th>
                            <th>Giro o actividad principal de la empresa u organismo</th>
                            <th>Domicilio</th>
                            <th>Código Postal</th>
                            <th>Colonia</th>
                            <th>Estado</th>
                            <th>Ciudad</th>
                            <th>Municipio</th>
                            <th>Teléfono</th>
                            <th>Fax</th>
                            <th>Página Web</th>
                            <th>Jefe inmediato</th>
                            <th>Su empresa u organismo es</th>
                            <th>Tamaño de la empresa u organismo</th>
                            <th>Actividad económica de la empresa u organismo</th>
                            <th>Contestada</th>
                            <th>Actualizada</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($survey_data as $data)
                        <tr>
                            <td>{{ $data->id }}</td>
                            <td>{{ $data->do_for_living }}</td>
                            <td>
                                {{ (str_contains($data->do_for_living, 'ESTUDIA') &&
                                !str_contains($data->do_for_living, 'NO'))
                                ? $data->speciality
                                : "" }}
                            </td>
                            <td>
                                {{ (str_contains($data->do_for_living, 'ESTUDIA') &&
                                !str_contains($data->do_for_living, 'NO'))
                                ? $data->school
                                : "" }}
                            </td>
                            <td>{{ $data->long_take_job }}</td>
                            <td>{{ $data->hear_about }}</td>
                            <td>
                                {{ (str_contains($data->do_for_living, 'TRABAJA') &&
                                !str_contains($data->do_for_living, 'NO'))
                                ? ($data->competence1 == 1 ? "SÍ" : "NO")
                                : "" }}
                            </td>
                            <td>
                                {{ (str_contains($data->do_for_living, 'TRABAJA') &&
                                !str_contains($data->do_for_living, 'NO'))
                                ? ($data->competence2 == 1 ? "SÍ" : "NO")
                                : "" }}
                            </td>
                            <td>
                                {{ (str_contains($data->do_for_living, 'TRABAJA') &&
                                !str_contains($data->do_for_living, 'NO'))
                                ? ($data->competence3 == 1 ? "SÍ" : "NO")
                                : "" }}
                            </td>
                            <td>
                                {{ (str_contains($data->do_for_living, 'TRABAJA') &&
                                !str_contains($data->do_for_living, 'NO'))
                                ? ($data->competence4 == 1 ? "SÍ" : "NO")
                                : "" }}
                            </td>
                            <td>
                                {{ (str_contains($data->do_for_living, 'TRABAJA') &&
                                !str_contains($data->do_for_living, 'NO'))
                                ? ($data->competence5 == 1 ? "SÍ" : "NO")
                                : "" }}
                            </td>
                            <td>
                                {{ (str_contains($data->do_for_living, 'TRABAJA') &&
                                !str_contains($data->do_for_living, 'NO'))
                                ? ($data->competence6 == 1 ? "SÍ" : "NO")
                                : "" }}
                            </td>
                            <td>{{ $data->language_most_spoken }}</td>
                            <td>{{ $data->speak_percent }}</td>
                            <td>{{ $data->write_percent }}</td>
                            <td>{{ $data->read_percent }}</td>
                            <td>{{ $data->listen_percent }}</td>
                            <td>{{ $data->seniority }}</td>
                            <td>{{ $data->year }}</td>
                            <td>{{ $data->salary }}</td>
                            <td>{{ $data->management_level }}</td>
                            <td>{{ $data->job_condition }}</td>
                            <td>{{ $data->job_relationship }}</td>
                            <td>{{ $data->business_name }}</td>
                            <td>{{ $data->business_activity }}</td>
                            <td>{{ $data->address }}</td>
                            <td>{{ $data->zip }}</td>
                            <td>{{ $data->suburb }}</td>
                            <td>{{ $data->state }}</td>
                            <td>{{ $data->city }}</td>
                            <td>{{ $data->municipality }}</td>
                            <td>{{ $data->phone }}</td>
                            <td>{{ $data->fax }}</td>
                            <td>{{ $data->web_page }}</td>
                            <td>{{ $data->boss_email }}</td>
                            <td>{{ $data->business_structure }}</td>
                            <td>{{ $data->company_size }}</td>
                            <td>{{ $data->business_activity_selector }}</td>
                            <td>{{ $data->created_at }}</td>
                            <td>{{ $data->updated_at }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
</div>
@endsection