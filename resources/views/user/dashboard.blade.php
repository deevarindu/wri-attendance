@extends('layouts.master')

@section('content')

<div class="container-fluid pb-5 px-4">
    @if(session()->has('success'))
    <div class="alert alert-success alert-dismissible col-lg-12 fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    {{-- <h4 class="fw-normal mb-0"></h4> --}}
    <div class="col-12 mt-4">
        <div class="row align-items-center justify-content-between flex-column flex-lg-row">
            <div class="col-12 col-md-12 col-lg-7 d-flex flex-column shadow-cs bg-white rounded-cs p-5">
                <h4 class="m-0">Prosentase Kehadiran</h4>
                <div class="row align-items-center justify-content-center justify-sm-content-start">
                    <div class="mt-5 col-sm-8 col-md-4">
                        <canvas id="pieKehadiran"></canvas>
                    </div>
                    <div class="mt-3 mt-lg-0 col-12 col-md-8">
                        <div class="col-12 d-flex justify-content-around align-items-center mb-2">
                            <p class="m-0 ms-md-5 d-inline col-2">Hadir</p>
                            <div class="progress col-8 ms-2 p-0" style="height: .8rem">
                                <div class="progress-bar bg-teal rounded" role="progressbar"
                                    style="width: {{ $prosentase_hadir }}%" aria-valuenow="{{ $prosentase_hadir }}"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <p class="m-0 d-inline col-2 text-end text-md-center">{{ $prosentase_hadir }}%</p>
                        </div>
                        <div class="col-12 d-flex justify-content-around align-items-center mb-2">
                            <p class="m-0 ms-md-5 d-inline col-2">Izin</p>
                            <div class="progress col-8 ms-2 p-0" style="height: .8rem">
                                <div class="progress-bar bg-primary rounded" role="progressbar"
                                    style="width: {{ $prosentase_izin }}%" aria-valuenow="{{ $prosentase_izin }}"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <p class="m-0 d-inline col-2 text-end text-md-center">{{ $prosentase_izin }}%</p>
                        </div>
                        <div class="col-12 d-flex justify-content-around align-items-center">
                            <p class="m-0 ms-md-5 d-inline col-2">Sakit</p>
                            <div class="progress col-8 ms-2 p-0" style="height: .8rem">
                                <div class="progress-bar bg-warning rounded" role="progressbar"
                                    style="width: {{ $prosentase_sakit }}%" aria-valuenow="{{ $prosentase_sakit }}"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <p class="m-0 d-inline col-2 text-end text-md-center">{{ $prosentase_sakit }}%</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-12 col-lg-4 shadow-cs bg-white rounded-cs p-4 mt-4 mt-md-0">
                <p class="text-secondary">Timeline</p>
                @foreach ($timeline as $item)
                <div class="col-12 d-flex p-0">
                    <div class="col-8 d-flex flex-column p-0">
                        <a href="{{ url('/') }}" class="fw-bold text-dark text-decoration-none mb-3">
                            Pertemuan {{$item->pertemuan}}
                        </a>
                        <p class="text-truncate">{{$item->topik}}</p>
                    </div>
                    <div class="col-4 d-flex flex-column p-0 text-end">
                        <p class="text-secondary">{{date('d F Y', strtotime($item->tanggal)) }}</p>
                        <p class="text-secondary">{{date('H:i', strtotime($item->start_time))}} -
                            {{date('H:i', strtotime($item->end_time))}}
                        </p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="row mt-4 md-mt-5">
            <h4 class="fw-normal mb-4">Absensi</h4>
            <div class="table-responsive shadow-cs rounded-cs bg-white px-5 py-3">
                <table class="table mt-3 table-borderless">
                    <tr class="border-bottom border-dark mb-3">
                        <th class="py-3 border-top-0">Pertemuan</th>
                        <th class="py-3 border-top-0">Tanggal</th>
                        <th class="py-3 border-top-0">Waktu</th>
                        <th class="py-3 border-top-0">Topik</th>
                        <th class="py-3 border-top-0">Status</th>
                        <th class="py-3 border-top-0">Keterangan</th>
                    </tr>
                    @foreach ($daftar_kehadiran as $item)
                    @php
                    $statusColor = "";
                    if($item->status === "Hadir") $statusColor = "text-info";
                    elseif($item->status === "Izin") $statusColor = "text-primary";
                    elseif($item->status === "Alpha") $statusColor = "text-danger";
                    @endphp
                    <tr class="align-middle">
                        <td>{{$item->meetings->pertemuan}}</td>
                        <td>{{\Carbon\Carbon::parse($item->meetings->tanggal)->format('d M Y')}}</td>
                        <td>{{date('H:i:s', strtotime($item->meetings->start_time))}} WIB</td>
                        <td class="col-1 text-truncate">{{$item->meetings->topik}}</td>
                        <td class="{{$statusColor}}">{{$item->status}}</td>
                        <td><button class="btn w-100 btn-warning text-light">Pilih</button></td>
                    </tr>
                    @endforeach
                </table>
                <a class="mt-3 mb-3 link-secondary text-decoration-none text-center d-block" href="">Lihat Semua</a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('overrideScript')
<script>
    controlBodyBackgroundColor()
    const zeros = {
        datasets: [{
            data: [100],
            backgroundColor: ['#C8C8C8']
        }]
    }

    const data = {

        labels: ["Hadir", "Izin", "Sakit"],
        datasets: [{
            backgroundColor: ["rgb(32, 201, 151)", "rgb(13,110,253)", "rgb(255, 205, 86)"],
            data: @json($data_pie_kehadiran),
        }, ],
    };

    if(data.datasets[0].data.every((v) => v === 0 )) {
        data.datasets[0].data = [0.1,0,0]
        data.datasets[0].backgroundColor = ["rgb(192,192,192)","rgb(192,192,192)","rgb(192,192,192)"]
    }

    const pieKehadiran = new Chart(document.getElementById("pieKehadiran"), {
        type: "doughnut",
        data: (data.length > 0) ? data : zeros,
        options: {
            cutout: 60,
            borderWidth: 0,
            plugins: {
                legend: {
                    display: false
                },
            }
        },
    });
</script>
@endsection