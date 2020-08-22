$('table.dataTable').DataTable( {
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