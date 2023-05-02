@extends('layouts.plantilla')

@section('title', 'Resumen')

@section('username', 'David Sardinas')
@section('userwork', 'Administrador')

@section('content')


    <section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-8">
                <div class="row">

                    <!-- Sales Card -->
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card sales-card">

                            <div class="card-body">
                                <h5 class="card-title">Artículos</h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-trophy"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ count($articles_total) }}</h6>
                                        <span class="text-success small pt-1 fw-bold">{{ count($articles_store) }}</span>
                                        <span class="text-muted small pt-2 ps-1">en almacén</span>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Sales Card -->

                    <!-- Academies Card -->
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card revenue-card">

                            <div class="card-body">
                                <h5 class="card-title">Academias Locales</h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-bank"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ count($academies) }}</h6>
                                        <!--<span class="text-success small pt-1 fw-bold">8%</span> <span
                                                    class="text-muted small pt-2 ps-1">increase</span>-->

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Academies Card -->

                    <!-- Students Card -->
                    <div class="col-xxl-4 col-md-6">

                        <div class="card info-card customers-card">

                            <div class="card-body">
                                <h5 class="card-title">Alumnos</h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-people"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ count($students_total) }}</h6>
                                        <span class="text-danger small pt-1 fw-bold">{{ count($students_auto) }}</span>
                                        <span class="text-muted small pt-2 ps-1">Autodidactas</span>

                                    </div>
                                </div>

                            </div>
                        </div>

                    </div><!-- End Students Card -->

                    <!-- Loans Card -->
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card revenue-card">

                            <div class="card-body">
                                <h5 class="card-title">Préstamos</h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-receipt-cutoff"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ count($articles_prest) }}</h6>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Loans Card -->

                    <!-- Website Stadistics -->
                    <div class="card">

                        <div class="card-body pb-0">
                            <h5 class="card-title">Estadísticas de Operaciones</h5>

                            <div id="trafficChart" style="min-height: 400px;" class="echart"></div>

                            <script>
                                document.addEventListener("DOMContentLoaded", () => {
                                    echarts.init(document.querySelector("#trafficChart")).setOption({
                                        tooltip: {
                                            trigger: 'item'
                                        },
                                        legend: {
                                            top: '5%',
                                            left: 'center'
                                        },
                                        series: [{
                                            name: 'Cantidad de:',
                                            type: 'pie',
                                            radius: ['40%', '70%'],
                                            avoidLabelOverlap: false,
                                            label: {
                                                show: false,
                                                position: 'center'
                                            },
                                            emphasis: {
                                                label: {
                                                    show: true,
                                                    fontSize: '18',
                                                    fontWeight: 'bold'
                                                }
                                            },
                                            labelLine: {
                                                show: false
                                            },
                                            data: [{
                                                    value: {{ count($echart_registros) }},
                                                    name: 'Registros'
                                                },
                                                {
                                                    value: {{ count($echart_prestamos) }},
                                                    name: 'Préstamos'
                                                },
                                                {
                                                    value: {{ count($echart_devolucion) }},
                                                    name: 'Devoluciones'
                                                },
                                                {
                                                    value: {{ count($echart_eliminacion) }},
                                                    name: 'Eliminaciones'
                                                },
                                                {
                                                    value: {{ count($echart_edicion) }},
                                                    name: 'Modificaciones'
                                                }
                                            ]
                                        }]
                                    });
                                });
                            </script>

                        </div>
                    </div><!-- End Stadistics -->

                </div>
            </div><!-- End Left side columns -->

            <!-- Right side columns -->
            <div class="col-lg-4">

                <!-- Recent Activity -->
                <div class="card">

                    <div class="card-body">
                        <h5 class="card-title">Actividad Reciente</h5>

                        <div class="activity">

                            @foreach ($last_operations as $operation)
                            @isset($operation->id_article) 

                            <div class="activity-item d-flex">
                                <div class="activite-label">{{$operation->created_at->locale('es')->diffForHumans(now(),true)}}</div>
                                @switch($operation->operation)
                                    @case('Préstamo') <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i> @break
                                    @case('Devolución') <i class='bi bi-circle-fill activity-badge text-warning align-self-start'></i> @break
                                    @case('Edición') <i class='bi bi-circle-fill activity-badge text-primary align-self-start'></i> @break
                                    @case('Registro') <i class='bi bi-circle-fill activity-badge text-info align-self-start'></i> @break
                                    @case('Eliminación') <i class='bi bi-circle-fill activity-badge text-danger align-self-start'></i> @break
                                @endswitch
                                <div class="activity-content">
                                    {{$operation->operation}} de <a href="{{route('articles.show', ['article'=> $operation->articles->id ])}}" class="fw-bold text-dark">{{$operation->articles->type}}</a>
                                </div>
                            </div><!-- End activity item-->
                                
                            @endisset
                            @endforeach

                        </div>

                    </div>
                </div><!-- End Recent Activity -->


            </div><!-- End Right side columns -->

        </div>
    </section>


@endsection
