package tp5;
import utiles.TecladoIn;

/**
 *
 * @author kcy0
 */
public class ej2 {

    public static void main(String[] args) {
        /* Este algoritmo se engarga de mostrar la cantidad de ingredientes 
         * necesarios para preparar una polenta para una n cantidad de personas
        */
        
        // Declaracion y asignacion de variables
        int personas;
        double tazaLeche, tazaAgua, tazaPolenta, cubitoCaldo, cucharadaManteca;
        tazaPolenta = 1;
        tazaLeche = 1.5;
        tazaAgua = 1.5;
        cubitoCaldo = 1;
        cucharadaManteca = 1;
        // Ingreso y lectura de datos
        System.out.print("Ingrese la cantidad de comensales: ");
        personas = TecladoIn.readLineInt();
        // Devolucion de datos
        System.out.println("Para esta cantidad de pesonas se van a necesitar:");
        System.out.println("Tazas de polenta: "+ tazaPolenta * personas);
        System.out.println("Tazas de leche: "+ tazaLeche * personas);
        System.out.println("Tazas de agua: "+ tazaAgua * personas);
        System.out.println("Cubitos de caldo: "+ cubitoCaldo * personas);
        System.out.println("Cucharadas de manteca: "+ cucharadaManteca * personas);
    }
    
}
