$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $("#idnameuser").keyup(function (e) {
        let name = $("#idnameuser").val();

        if (name.length > 0) {
            $.ajax({
                url: "search",
                type: "post",
                data: {
                    names: name,
                },
                success: function (response) {
                    let templete = "";
                    if (name.charAt(0) == " " || response.length == 0) {
                        templete += `
                        <p style="font-size: 18px;"><a href="#">No hay datos</a></p>
                        `;
                    } else {
                        response.forEach((element) => {
                            templete += `
                            <ul class="list-group" style="display: block; position: relative; z-index: 1">
                                <span class="card-category">Cc:</span><span>${element.cedula}</span>
                                <li class="list-group-item lis" style="display: inline; font-size: 15px;"><a href="#" ><span style="display:none;">${element.id}</span> ${element.name}</a></li>
                            </ul>`;
                        });

                        $("#resultuser").fadeIn();
                        $("#resultuser").html(templete);
                    }
                },
                error: function (error) {
                    alert("Ocurrio un error inesperado! " + error);
                },
            });
        } else {
            $("#resultuser").html("");
        }
    });

    $(document).on("click", ".lis", function () {
        var cadena = $(this).text().split(' ');

        $("#idnameuser").val(cadena[1]+' '+cadena[2]);
        $("#resultuser").fadeOut();
        $("#cc").val(cadena[0]);
    });

    $(document).on("click", "#turnespera", function () {

    });

    $('#poppersv').popover();
    $('#listurn').perfectScrollbar();
    $('.alertllamar').hide();
    $(document).on("click", "#turnodia", function () {
        $('#poppersv').not(this).popover('hide');
        $('#exampleModal').show();
    });


    $('#cerrar').on("click", function () {
        $('.alertllamar').hide();
    });

 /*

    $('#formturno').submit(function(e)
    {
        e.preventDefault();
        let numero = $('#deturnos').val();
        let posts = {
            turnosdias: numero
        };
        let url = 'http://127.0.0.1:8000/turnos/fichos';
        $.post(url, posts, function(response)
        {

            let templete = "";
            templete += `
            <div class="alert alert-`+response.tipoalert+` alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>`+ response.Alertamensaje +`</strong>
            </div>
            `
            $('#alertmodal').html(templete);
            $('#formturno').trigger("reset");
        })

    });*/



    /*$('table.paginated').each(function() {
        var currentPage = 0;
        var numPerPage = 4;
        var $table = $(this);
        $table.bind('repaginate', function() {
            $table.find('tbody tr').hide().slice(currentPage * numPerPage, (currentPage + 1) * numPerPage).show();
        });
        $table.trigger('repaginate');
        var numRows = $table.find('tbody tr').length;
        var numPages = Math.ceil(numRows / numPerPage);
        var $pager = $('<div class="pager"></div>');
        for (var page = 0; page < numPages; page++) {
            $('<span class="btn btn-link text-dark"></span>').text(page + 1).bind('click', {
                newPage: page
            }, function(event) {
                currentPage = event.data['newPage'];
                $table.trigger('repaginate');
                $(this).addClass('active').siblings().removeClass('active');
            }).appendTo($pager).addClass('clickable');
        }
        $pager.insertBefore($table).find('span.page-number:first').addClass('active');
    });*/
});

