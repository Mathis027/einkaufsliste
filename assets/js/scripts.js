
$('#newArtikelForm').on('submit', function(event){
    event.preventDefault();
    let add = document.getElementById("add");
    let artikeltext = document.getElementById("artikel").value;
    console.log(artikeltext);
    add.disabled = true;
        $.ajax({
            type: 'POST',
            url: 'assets/functionsPHP/newArtikel.php',
            data: $(this).serialize(),
        })
            .done(function (data){
                console.log(data)
                $('#relList').html(data)
                add.disabled = false
                const artikel = document.getElementById("artikel").value="";
                if(artikeltext !== ""){
                    startAlert("Artikel hinzugefügt", "alert-success", "alert-danger")

                } else {
                    startAlert("Bitte tätige eine Eingabe", "alert-danger", "alert-success")

                }
            })
            .fail(function (){
                console.log("Error");
            })
})
$("#newListForm").on("submit", function(event) {
    event.preventDefault();
    $.ajax({
        type: 'POST',
        url: '../assets/functionsPHP/newList.php',
        data: $(this).serialize(),
        })
        .done(function (data){
            startAlert("Neue Liste wurde erstellt" , "alert-success", "alert-danger");
            window.location.reload();

        })
        .fail(function () {
            startAlert("Liste bereits vorhanen!" , "alert-danger", "alert-success");
        })

});
$("#deleteListForm").on("submit", function(event) {
    event.preventDefault();
    $.ajax({
        type: 'POST',
        url: '../assets/functionsPHP/loschen.php',
        data: $(this).serialize(),
    })
        .done(function (data){
            startAlert("Dises Liste wurde gelöscht" , "alert-danger", "alert-success");
            window.location.reload();

        })
        .fail(function () {
            startAlert("Liste konnte nicht gelöscht werden!" , "alert-warn", "alert-success");
        })

});
$(".checkedSent").change(function(event){
    event.preventDefault();
    console.log("Feldname: " + $(this.name).val());
    $.ajax({
        type: 'POST',
        url: 'assets/functionsPHP/ChangeChecked.php',
        data: { checked: $(this).val() },
    })
        .done(function (data){
            console.log(data)
            $('#relList').html(data)
        })
        .fail(function (){
            console.log("Error");
        })
})

$(".uncheckedSent").change(function(event){
    event.preventDefault();
    console.log("Hallo" + $( this ).val())
    $.ajax({
        type: 'POST',
        url: 'assets/functionsPHP/ChangeChecked.php',
        data: { notchecked: $(this).val() },
    })
        .done(function (data){
            console.log(data)
            $('#relList').html(data)
        })
        .fail(function (){
            console.log("Error");
        })
})
function changeAnzahl(anzahl, id) {
    if (anzahl.search(/^[a-zA-Z0-9]+$/) == -1) {
        startAlert("Anzahl enthält falsche Zeichen", "alert-danger", "alert-success")

    } else {
        $.ajax({
            type: 'POST',
            url: 'assets/functionsPHP/ChangeAnzahl.php',
            data: {
                id : id,
                anzahl : anzahl,
            },
        })
            .done(function (data){
                console.log(data)
                $('#relList').html(data)
                startAlert("Anzahl geändert", "alert-success", "alert-danger")
            })
            .fail(function (){
                console.log("Error");
            })
    }
}

$(".anzahlInputForm").on("submit", function(event){
    event.preventDefault();
})
$(".anzahlInput").on("blur", function(event){
    let anzahl = $(this).val();
    let id = $(this).attr("name").split("-")[1];
    event.preventDefault();
    changeAnzahl(anzahl, id) // Funktion aufrufen
})


// on Focus Event aktualisiert jedes mal die Liste

$(window).on("focus", function(event){
    $.ajax({
        type: 'POST',
        url: 'assets/functionsPHP/reloadList.php',
        data: $(this).serialize(),
    })
        .done(function (data){
            $('#relList').html(data)
        })
        .fail(function (){
            console.log("On Focus reload Function failed");
        })
})






// Alert function
function startAlert(value, add, remove ) {
    let alert = document.getElementById("alert");
    const alerttext = document.getElementById("alerttext");
    alerttext.innerHTML = value;
    alert.classList.add(add);
    alert.classList.remove(remove);
    alert.style.display="block";
    setTimeout(closeAlert, 4000)

}
function closeAlert(){
    const alert = document.getElementById("alert");
    alert.style.display="none";

}
