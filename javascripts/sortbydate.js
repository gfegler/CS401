$(document).ready(function() {

$('tr.Entries').each(function() {
     var $this = $(this),
             t = this.cells[1].textContent.split('-');
     $this.data('_ts', new Date(t[1], t[2]-1, t[0]).getTime());
}).sort(function (a, b) {
    return $(a).data('_ts') > $(b).data('_ts');
}).appendTo('tbody');

)}