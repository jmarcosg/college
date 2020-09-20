package ejerciciosClase;
import utiles.TecladoIn;

/**
 *
 * @author kcy0
 */
public class supermercado {

    public static void main(String[] args) {
        /* 
         * Este algoritmo calcula el descuento de una compra basado en el monto
         * y el tipo de pago. Tambien hace uso de modulos en el caso de compra
         * con cuotas.
         */
        // Declaracion de variables
        int cantCuotas = 1;
        double compra;
        char tipoPago;
        // Ingreso y lectura de datos.
        System.out.print("Ingrese el monto que gasto: ");
        compra = TecladoIn.readLineDouble();
        System.out.print("De que manera va a pagar? (e = efectivo, t= tarjeta): ");
        tipoPago = TecladoIn.readLineNonwhiteChar();
        // Condiciones
        if ((compra > 1000) && (tipoPago == 'e')) {
            System.out.println("Felicidades! Usted ha obtenido un descuento del 10%.");
            compra = compra * 0.9;
            System.out.println("Su monto a pagar con descuento es: " + compra);
        } else if (tipoPago == 't') {
            System.out.print("Cuantas cuotas? Le puedo hacer 1 cuota sin interes y el resto con interes. Tiene 3, 6 y 12 cuotas con interes: ");
            cantCuotas = TecladoIn.readLineInt();
            // Switch para los distintos casos de eleccion de cuotas.
            switch (cantCuotas) {
                case 1:
                    System.out.println("Su monto a pagar con 1 cuota sin interes es: " + compra);
                case 3:
                    compra = (compra + (compra * 0.03 * 3));
                    System.out.println("Su monto a pagar con 3 cuotas con interes es de: " + compra);
                    break;
                case 6:
                    compra = (compra + (compra * 0.06 * 6));
                    System.out.println("Su monto a pagar con 6 cuotas con interes es de: " + compra);
                    break;
                case 12:
                    compra = (compra + (compra * 0.12 * 12));
                    System.out.println("Su monto a pagar con 12 cuotas con interes es de: " + compra);
                    break;
            }
        }else {
            System.out.println("No obtiene descuento.");
            System.out.println("Su monto a pagar sin decuento es: "+compra);
        }
            System.out.println("Gracias por su compra, vuelva pronto.");
        }
    }


