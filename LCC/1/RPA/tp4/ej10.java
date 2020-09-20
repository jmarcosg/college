package tp4;

/**
 *
 * @author kcy0
 */
public class ej10 {

    public static void main(String[] args) {
        // Algoritmo que calcula el tamaño de una caja para guardar una bicicleta.
        // Declaracion y asignacion de variables.
        int radioRueda, diametroRueda, alturaAsiento, largoCaja, altoCaja;
        radioRueda = 30;
        diametroRueda = radioRueda * 2;
        largoCaja = diametroRueda * 2;
        alturaAsiento = radioRueda / 2;
        altoCaja = radioRueda * 3;
        System.out.println("Se va necesitar una caja de "+largoCaja + " cm de largo y "+altoCaja + (" cm de alto.") );
    }
    
}
