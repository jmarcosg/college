function ForMeses() {
    var meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio",
    "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
   
    for (i = 0; i < 12; i++) {
        document.getElementById("meses").innerHTML += "<li>"+meses[i]+"</li>";
        console.log((meses[i ]));
    }
}

function whileMeses() {
    var meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio",
    "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
    var i = 0;
    
    while(i < 12) {
        document.getElementById("meses").innerHTML += "<li>"+meses[i]+"</li>";
        console.log((meses[i ]));
        i++;
    }
}

function dowhileMeses() {
    var meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio",
    "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
    var i = 0;

    do {
        document.getElementById("meses").innerHTML += "<li>"+meses[i]+"</li>";
        console.log((meses[i ]));
        i++;
    }while(i < 12);
}

function forinMeses() {
    var meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio",
    "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
    var i = 0;

    for(i in meses) {
        document.getElementById("meses").innerHTML += "<li>"+meses[i]+"</li>";
        console.log((meses[i ]));
    }
}