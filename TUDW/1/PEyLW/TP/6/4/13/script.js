  
function iniciarTabla() {
    var a = new []();
    a[0]=["Juan Pérez","Av. Argentina 3000","Neuquén Capital","154888888"];
    a[1]=["Tito Sánchez","Av. Del Trabajador 300","Neuquén Capital","154555555"];
    a[2]=["Cecilia Carrizo","Sierra Grande 900","Neuquén Capital","4485895"];
    a[3]=["Pedro González","Amaranto Usares 1254","Neuquén Capital","4420444"];
    a[4]=["Verónica Lozano","Saturnino Torres 100","Neuquén Capital","5425842"];
    var myTable=document.getElementById('myTable');

    for(var i in a){
        insertarRow(a[i][0],a[i][1],a[i][2],a[i][3],a[i][4]);
    }
}

function insertarRow(Nombre,Direccion,Ciudad,Telefono) {
    var myTable=document.getElementById("myTable");
    var row=myTable.insertRow(myTable.rows.length);
    var cel0=row.insertCell(0);
    var cel1=row.insertCell(1);
    var cel2=row.insertCell(2);
    var cel3=row.insertCell(3);
    var cel4=row.insertCell(4);
    cel0.innerHTML=Nombre;
    cel1.innerHTML=Direccion;
    cel2.innerHTML=Ciudad;
    cel3.innerHTML=Telefono;
    cel4.innerHTML="<a href='#' onclick='borrarRow(this.parentNode.parentNode.rowIndex)'>borrar</a>";
}

function borrarRow(Numero) {
    var myTable=document.getElementById("myTable");
    myTable.deleteRow(Numero);
}