function conversor() {
    var valor, opcion, resultado;
    alert(
        "Ingrese: \n 1 para peso a dolar \n 2 para dolar a peso \n 3 para pesos a reales \n 4 reales a peso \n 5 pesos a euros \n 6 euros a pesos"
    );
    opcion = prompt("Introduce una opcion ", 0);
    valor = prompt("Introduce un valor ", 0);
    switch (opcion) {
        case "1":
            document.write("peso a dolar <br>");
            resultado = valor / 155;
            document.write(resultado);
        break;
        case "2":
            document.write("dolar a peso <br>");
            resultado = valor * 158;
            document.write(resultado);
        break;
        case "3":
            document.write("pesos a relaes <br>");
            resultado = valor / 18.82;
            document.write(resultado);
        break;
        case "4":
            document.write("reales a pesos <br>");
            resultado = valor * 18.82;
            document.write(resultado);
        break;
        case "5":
            document.write("pesos a euros <br>");
            resultado = valor / 115.42;
            document.write(resultado);
        break;
        case "6":
            document.write("euros a pesos <br>");
            resultado = valor * 115.42;
            document.write(resultado);
        break;
        default:
            document.write("recargue la pagina para continuar <br>");
    }
}