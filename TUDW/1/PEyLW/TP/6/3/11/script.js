function accionForm(){
    var tx1=document.getElementById("tx1");
    var fecha=new Date();
    var hora=new Date();
    var minuto=new Date();
    var segundo=new Date();
    var dias = ["Domingo","Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado"];
    var horas= [00,01,02,03,04,05,06,07,08,09,10,11,12,13,14,15,16,17,18,19,20,21,22,23];
    var minutos=[00,01,02,03,04,05,06,07,08,09,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50,51,52,53,54,55,56,57,58,59];
    var segundos=[00,01,02,03,04,05,06,07,08,09,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50,51,52,53,54,55,56,57,58,59];
    var f = new Date();
    var salida=document.getElementById("salida").innerHTML+=f.getDate() + "/" + (f.getMonth() +1) + "/" + f.getFullYear() +" "+ horas[hora.getHours()] + ":"+ minutos[minuto.getMinutes()] + ":"+ segundos[segundo.getSeconds()] +" "+"por"+" "+ tx1.value+"<br>"+tx2.value+"<br>";
    tx1.value="";
    tx1.focus();
    tx2.value="";
    tx2.focus();
}