@extends('layouts.admin.admin')
@section('content')
<div class="card">
    <div class="card-header">
        Chart Votes
    </div>

    <div class="card-body">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="mb-5">
                    <canvas id="chartEmti"></canvas>
                </div>
                <div class="">
                    <canvas id="chartBpmti"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
@parent
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const namaEmti = <?= $kandidat_emti ?>;
    const dataEmti = <?= $count_emti ?>;
    const dataEmtii = {
        labels: namaEmti,
        datasets: [{
        label: 'EMTI',
        backgroundColor: 'rgb(255, 99, 132)',
        borderColor: 'rgb(255, 99, 132)',
        data: dataEmti,
        }]
    };

    const namaBpmti = <?= $kandidat_bpmti ?>;
    const dataBpmti = <?= $count_bpmti ?>;
    const dataBpmtii = {
        labels: namaBpmti,
        datasets: [{
        label: 'BPMTI',
        backgroundColor: 'rgb(255, 99, 132)',
        borderColor: 'rgb(255, 99, 132)',
        data: dataBpmti,
        }]
    };

    const configEmti = {
        type: 'bar',
        data: dataEmtii,
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'EMTI CHART'
                }
            }
        }
    };
    const configBpmti = {
        type: 'bar',
        data: dataBpmtii,
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'BPMTI CHART'
                }
            }
        }
    };

    const chartEmti = new Chart(
        document.getElementById('chartEmti'),
        configEmti
    );
    const chartBpmti = new Chart(
        document.getElementById('chartBpmti'),
        configBpmti
    );
</script>
@endsection
