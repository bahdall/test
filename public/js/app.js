$( document ).ready(function() {
    $('.tsort').tsort();

    $('.tsort thead th a').click(function(e){
        e.preventDefault();
    });

    $('input[name=options]').on('change', function() {
        if($('input[name=options]:checked').val() == "js") {
            $('.tsort thead th a').unbind('click');
            $('.tsort').tsort();
        } else {
            $('.tsort').tsort('stop');
            init();
        }
    });

    function init() {
        $('.tsort thead th a').click(function(e){
            e.preventDefault();
            $.get($(this).attr('href'),function(data){
                $("#regions").html($("#regions",data));
                init();
            });
        });
    }
});