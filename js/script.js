$('table').on('click', 'td', function(e) {  
    
    var publication = e.delegateTarget.tHead.rows[0].cells[this.cellIndex],
        publisher  = this.parentNode.cells[0];
    
    var publication_str = $(publication).text();
    var publisher_str = $(publisher).text();
    
    var td = $(event.target);
    
    if(td.hasClass('done'))
        td.removeClass('done');
    else
        td.addClass('done');
    
    $.ajax({ 
        type: "POST",
        url: "../update_deliveries.php",
        data: {publication: publication_str , publisher: publisher_str },
       error: function(e) {
                    //location.reload(); // Rolad the hole page
                    td.removeClass('done');
                  }
    });
    
});

$('#gobtn').click(function() { 
    $('#search').toggleClass('expanded'); 
    $('#search').focus(); 
    $('#search').val(''); 
    $('#search').keyup(); 
});

var $rows = $('tbody tr');
$('#search').keyup(function() {

    var val = '^(?=.*\\b' + $.trim($(this).val()).split(/\s+/).join('\\b)(?=.*\\b') + ').*$',
        reg = RegExp(val, 'i'),
        text;

    $rows.show().filter(function() {
        text = $(this).text().replace(/\s+/g, ' ');
        return !reg.test(text);
    }).hide();
});
