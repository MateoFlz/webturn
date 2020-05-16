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
                                <span style="display:none;" id="userid">${element.id}</span><span class="card-category">Cc:</span><span>${element.cedula}</span>
                                <li class="list-group-item lis" style="display: inline; font-size: 15px;"><a href="#">${element.name}</a></li>
                            </ul>`;
                        });
                    }
                    $("#resultuser").fadeIn();
                    $("#resultuser").html(templete);
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
        $("#idnameuser").val($(this).text());
        $("#resultuser").fadeOut();
        $("#cc").val($("#userid").text());
    });

    $(document).on("click", "#turnespera", function () {
        alert('pnda')
    });

    $('#poppersv').popover();
    $(document).on("click", "#turnodia", function () {
        $('#poppersv').not(this).popover('hide');
        $('#exampleModal').show();
    });
});


