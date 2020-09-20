package tp1;
import utiles.TecladoIn;

/**
 *
 * @author kcy0
 */
public class ej3 {
    public static void main (String []args){
        // Algoritmo que calcula el promedio de N notas (numeros enteros)
        // Declaracion de variables 
        int cantNotas, nota, i, promedio, notaFinal;
        promedio = 0;
        // Ingreso y lectura de datos
        System.out.print("Cantidad de notas a ingresar: ");
        cantNotas = TecladoIn.readInt();
        for (i = 1; i <= cantNotas; i++){
            System.out.println("Ingrese nota: ");
            nota = TecladoIn.readInt();
            promedio = promedio + nota;
        }
        // Calculo promedio
        notaFinal = promedio / cantNotas;
        // Devolucion de datos
        System.out.println("Nota final: "+notaFinal);
    }
    
}
