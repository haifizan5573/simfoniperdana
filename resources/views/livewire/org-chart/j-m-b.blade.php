@section('css')

<style>
    .google-visualization-orgchart-node {
        border: none !important;
    }
</style>


@endsection
<div>
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12" >
            <div class="card" style="min-height: 340px">
                <div class="card-body">
                <h4 class="card-title">JMB Organization Chart {{date("Y")}}</h4>
                       <div id="orgchart"></div>
                </div>
            </div>
        </div>
</div>
@push('scripts')

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', {packages: ['orgchart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        // const data = new google.visualization.DataTable();
        // data.addColumn('string', 'Name');
        // data.addColumn('string', 'Manager');
        // data.addColumn('string', 'ToolTip');


        fetch("{{env('APP_URL')}}/position/jmb")
            .then(response => response.json())
            .then(data => {
                var chartData = new google.visualization.DataTable();
                chartData.addColumn('string', 'Name');
                chartData.addColumn('string', 'Manager');
                chartData.addColumn('string', 'ToolTip');

                data.forEach((item) => {
                    chartData.addRow([{v: item.title, f: item.title + '<div style="color:red; font-style:italic">' + item.title + '</div>'}, item.parent, item.title]);
                });

                var chart = new google.visualization.OrgChart(document.getElementById('chart_div'));
                chart.draw(chartData, {allowHtml:true});
            });


        // Add your organization chart data here
        // data.addRows([
        //     [{'v':'CEO', 'f':'CEO<div style="color:red; font-style:italic">Boss</div>'}, '', 'The Boss'],
        //     [{'v':'Manager1', 'f':'Manager1<div style="color:blue; font-style:italic">Sub-Boss</div>'}, 'CEO', 'Manager 1'],
        //     ['Employee1', 'Manager1', 'Employee 1'],
        //     ['Employee2', 'Manager1', 'Employee 2'],
        // ]);

        // const chart = new google.visualization.OrgChart(document.getElementById('orgchart'));
        // chart.draw(data, {allowHtml:true});
    }
</script>


@endpush