$('table.dataTable').DataTable( {
    "paging": false,
    "lengthChange": false,
    ajax: {
        url: '/api/vehicles',
        dataSrc: ''
    },
    columns: [
        { data: 'name' },
        { data: 'color' },
        { data: 'truncDescription' },
        { data: 'type' },
        { data: 'formatPrice' }
    ]
});