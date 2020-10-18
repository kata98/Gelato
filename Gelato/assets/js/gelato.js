$(document).ready(function(){
    getItem();
    promenaBoje();

    $("#sortiranje").change(function() {
        let sort = $(this).val();

        $.ajax({
            url: "index.php?page=flavoursGet",
            method: "get",
            data: {
                sort: sort
            },
            dataType: 'json',
            success: function(data) {
                console.log(data);
                printItem(data);
            },
            error: function(error) {
                console.log(error);
            }
        })
    });

    $("#filter").keyup(function() {
        let naziv = $(this).val();

        $.ajax({
            url: "index.php?page=flavoursFilter",
            method: "GET",
            data: {
                naziv: naziv
            },
            dataType: 'json',
            success: function(data) {
                console.log("Kata");
                printItem(data);
            },
            error: function(xhr, status, error) {
                console.log(error);
            }
        })
    });
});

function promenaBoje(){
    let url="http://localhost/Gelato/index.php?page=";
    switch (window.location.href) {
        case url+"home":
            $("#slajder").css("backgroundColor", "#FFE07C");
            break;
        case url+"flavours":
            $("#slajder").css("backgroundColor", "#B1EDD6");
            break;
        case url+"sign%20up":
            $("#slajder").css("backgroundColor", "#FFC0AC");
            break;
        case url+"about":
            $("#slajder").css("backgroundColor", "#C9ACDC");
            break;
        case url+"admin":
            $("#slajder").css("backgroundColor", "#BAE2FA");
            break;
    }
}

function getItem(){
    $.ajax({
        url: "index.php?page=flavoursGet",
        method: "GET",
        dataType: "json",
        success: function (data){
            printItem(data);
        },
        error: function (xhr, status, error) {

        }
    });
}

function printItem(data){
    let html="";
    data.forEach(i=>{
        html+=`<div class="artikl">
        <h4>${i.naziv}</h4><br/>
        <p>${i.cena}<br/><br/>${i.opis}</p>
    </div>`;
    });
    $("#menu").html(html);
}


