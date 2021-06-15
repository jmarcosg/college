function metodos() {
    var cadena;
    cadena=prompt("ingrese un mensaje: ","");
    var enMayuscula=cadena.toUpperCase();
    document.write(cadena+'<br/>');
    document.write(enMayuscula+'<br/>');
    
    for(i in cadena) {
        document.write(cadena[i]+enMayuscula[i]);
    }
    
    document.write('<br/>');
    document.write(cadena.replace('hola','[hola que tal]'));
    
    var res = cadena.substring(5, 10);
    document.write('<br/>');
    document.write(res);
    document.write('<br/>');
    
    //elimina espacios en blanco de la cadena string
    document.write(cadena.replace(/\s/g,""));
    document.write('<br/>');
    document.write(cadena.replace('hola mi nombre es rocio','hello my name is rocio')); 
}