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
                                        <h6>{{ count($articles) }}</h6>
                                        {{-- <span class="text-success small pt-1 fw-bold">{{ count($operations->where('active', false)) }}</span>
                                        <span class="text-muted small pt-2 ps-1">Instrumentos</span> --}}

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
                                        <h6>{{ count($students) }}</h6>
                                        <span class="text-danger small pt-1 fw-bold">{{ count($students->where('type','Autodidacta')) }}</span>
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
                                        <h6>{{ count($operations->where('active', true)) }}</h6>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Loans Card -->

                    <!-- Website Stadistics -->
                    <div class="card">

                        <div class="card-body pb-0">
                            <h5 class="card-title">Estadísticas de Estado de los Artículos</h5>

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
                                            name: 'Estado:',
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
                                            data: [
                                                {
                                                    value: {{ count($articles->where('status', 'Regular')) }},
                                                    name: 'Regular'
                                                },
                                                {
                                                    value: {{ count($articles->where('status', 'Bueno')) }},
                                                    name: 'Bueno'
                                                },
                                                {
                                                    value: {{ count($articles->where('status', 'Malo')) }},
                                                    name: 'Malo'
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
                            @if ($last_operations->isEmpty())
                                <div class="text-center small">Sin Operaciones</div>
                            @endif
                            
                            @foreach ($last_operations as $operation)
                            
                            @isset($operation->article_id) 

                            <div class="activity-item d-flex">
                                <div class="activite-label">{{$operation->updated_at->locale('es')->diffForHumans(now(),true)}}</div>
                                @if ($operation->active == true)
                                    <i class='bi bi-circle-fill activity-badge text-primary align-self-start'></i>
                                @else
                                    <i class='bi bi-circle-fill activity-badge text-secondary align-self-start'></i>
                                @endif
                                <div class="activity-content">
                                    @if ($operation->active ==true)
                                        Préstamo
                                    @else
                                        Devolución
                                    @endif de <a href="{{route('articles.show', ['article'=> $operation->article->id ])}}" class="fw-bold text-dark">{{$operation->article->type}}</a>
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
