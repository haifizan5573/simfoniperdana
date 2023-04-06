@section('css')

<style>
    .google-visualization-orgchart-node {
        border: none !important;
    }
</style>


@endsection
<div>
    <div id="orgchart"></div>
</div>
@push('scripts')

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', {packages: ['orgchart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        const data = new google.visualization.DataTable();
        data.addColumn('string', 'Name');
        data.addColumn('string', 'Manager');
        data.addColumn('string', 'ToolTip');

        // Add your organization chart data here
        data.addRows([
            [{'v':'CEO', 'f':'CEO<div style="color:red; font-style:italic">Boss</div>'}, '', 'The Boss'],
            [{'v':'Manager1', 'f':'Manager1<div style="color:blue; font-style:italic">Sub-Boss</div>'}, 'CEO', 'Manager 1'],
            ['Employee1', 'Manager1', 'Employee 1'],
            ['Employee2', 'Manager1', 'Employee 2'],
        ]);

        const chart = new google.visualization.OrgChart(document.getElementById('orgchart'));
        chart.draw(data, {allowHtml:true});
    }
</script>


@endpush