import $ from 'jquery';
import 'datatables.net';
import 'datatables.net-bs4';

window.$ = window.jQuery = $;

$.extend(true, $.fn.dataTable.defaults, {
    language: {
        url: '//cdn.datatables.net/plug-ins/1.10.24/i18n/Indonesian.json'
    },
    processing: true,
    serverSide: true,
    responsive: true,
    dom: 'Bfrtip',
    lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "Semua"]],
}); 