  
function DOM(objeto){
    switch (objeto.nodeType){
        case 1: //Element
            //cambia el estilo del objeto para que se visualice
            objeto.style.backgroundColor="silver";
            //se mustra un alert con tagName y innerHTML
            alert("Elemento Node type:"+objeto.nodeType+"\nTag name:"+objeto.tagName+"\n"+objeto.innerHTML);
            //se vuelve al color default
            objeto.style.backgroundColor="";
            //le asigno a la variable 'a' el arreglo de nodos hijos
            var a=objeto.childNodes;
            
            //para cada uno de los nodos hijos ejecuto la función DOM
            for(var i in a)
                DOM(a[i]);
        break;
        case 3: //Text
            //Se muestra un alert con la propiedad nodeValue
            alert("Texto Node type:"+objeto.nodeType+"\nnode Value:"+objeto.nodeValue);
        break;
    }
}