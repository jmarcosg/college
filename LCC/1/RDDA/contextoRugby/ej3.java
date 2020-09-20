package contextoRugby;
import utiles.TecladoIn;

public class ej3 {

    public static void cargarArreglo(String[][] arreglo) {
        // Modulo que se encarga de cargar elementos al arreglo
        int fila, col;

        for (fila = 0; fila < arreglo.length; fila++) {
            for (col = 0; col < arreglo[fila].length; col++) {
                System.out.println("Ingrese una actividad para las " + horaEnPosicion(fila) + "hs del dia " + diaEnPosicion(col) + " : ");
                arreglo[fila][col] = TecladoIn.readLine();
            }
        }
    }

    public static String diaEnPosicion(int dia) {
        // Modulo que devuelve el dia correspondiente segun la posicion
        String texto = "";

        switch (dia) {
            case 0:
                texto = "Lunes";
                break;
            case 1:
                texto = "Martes";
                break;
            case 2:
                texto = "Miercoles";
                break;
            case 3:
                texto = "Jueves";
                break;
            case 4:
                texto = "Viernes";
                break;
        }
        return texto;
    }

    public static int horaEnPosicion(int hora) {
        // Modulo que devuelve la hora correspondiente a la posicion
        int valor = 0;

        switch (hora) {
            case 0:
                valor = 8;
                break;
            case 1:
                valor = 9;
                break;
            case 2:
                valor = 10;
                break;
            case 3:
                valor = 11;
                break;
            case 4:
                valor = 12;
                break;
            case 5:
                valor = 13;
                break;
            case 6:
                valor = 14;
                break;
            case 7:
                valor = 15;
                break;
            case 8:
                valor = 16;
                break;
            case 9:
                valor = 17;
                break;
            case 10:
                valor = 18;
                break;
            case 11:
                valor = 19;
                break;
            case 12:
                valor = 20;
                break;
        }
        return valor;
    }

    public static int posicionDia(String dia) {
        // Modulo que devuelve la posicion en la que se encuentra un dia
        int posicion = 0;

        switch (dia) {
            case "Lunes":
                posicion = 0;
                break;
            case "lunes":
                posicion = 0;
                break;
            case "Martes":
                posicion = 1;
                break;
            case "martes":
                posicion = 1;
                break;
            case "Miercoles":
                posicion = 2;
                break;
            case "miercoles":
                posicion = 2;
                break;
            case "Jueves":
                posicion = 3;
                break;
            case "jueves":
                posicion = 3;
                break;
            case "Viernes":
                posicion = 4;
                break;
            case "viernes":
                posicion = 4;
                break;
        }
        return posicion;
    }

    public static int posicionHoras(int hora) {
        // Modulo que devuelve la posicion en que se encuentra cierta hora
        int posicion = 0;

        // Para cada una de las posibles horas a ser ingresadas les corresponde una posicion
        switch (hora) {
            case 8:
                posicion = 0;
                break;
            case 9:
                posicion = 1;
                break;
            case 10:
                posicion = 2;
                break;
            case 11:
                posicion = 3;
                break;
            case 12:
                posicion = 4;
                break;
            case 13:
                posicion = 5;
                break;
            case 14:
                posicion = 6;
                break;
            case 15:
                posicion = 7;
                break;
            case 16:
                posicion = 8;
                break;
            case 17:
                posicion = 9;
                break;
            case 18:
                posicion = 10;
                break;
            case 19:
                posicion = 11;
                break;
            case 20:
                posicion = 12;
                break;
        }
        return posicion;
    }

    public static boolean validarDia(String dia)  {
        // Modulo que valida si el dia ingresado es correcto
        boolean esValido = false;

        switch (dia) {
            case "Lunes":
                esValido = true;
                break;
            case "lunes":
                esValido = true;
                break;
            case "Martes":
                esValido = true;
                break;
            case "martes":
                esValido = true;
                break;
            case "Miercoles":
                esValido = true;
                break;
            case "miercoles":
                esValido = true;
                break;
            case "Jueves":
                esValido = true;
                break;
            case "jueves":
                esValido = true;
                break;
            case "Viernes":
                esValido = true;
                break;
            case "viernes":
                esValido = true;
                break;
        }
        return esValido;
    }

    public static boolean validarHora(int hora) {
        // Modulo que valida si la hora ingresada es la correcta
        boolean esValida = false;

        // Si la hora ingresada esta dentro de las 8 y las 20hs inclusive, es valida
        if ((hora >= 8) && (hora <= 20)) {
            esValida = true;
        }
        return esValida;
    }

    public static void main(String[] args) {
        // Algortimo ppal
        // Declaracion e inicializacion de variables
        String arreglo[][] = new String[13][5];
        String dia;
        int hora, posDia, posHora;
        boolean diaValido, horaValida;

        // Carga de elementos al arreglo
        cargarArreglo(arreglo);

        // Ingreso y lectura de datos
        System.out.println("Ingrese un dia y hora para ver si hay actividad");
        System.out.println("Dia: ");
        dia = TecladoIn.readLine();
        System.out.println("Hora: ");
        hora = TecladoIn.readInt();

        // Validacion de valores
        diaValido = validarDia(dia);
        horaValida = validarHora(hora);

        // Si ambos valores a validar son correctos devuelve la informacion que corresponde
        if ((diaValido == true) && (horaValida == true)) {
            posDia = posicionDia(dia);
            posHora = posicionHoras(hora);
            System.out.println("El dia " + dia + " a las " + hora + "hs los participantes tienen: " + arreglo[posHora][posDia]);
        } else {
            System.out.println("El dia o la hora ingresada no es valida.");
        }
    }

}