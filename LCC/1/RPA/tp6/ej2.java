/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package tp6;

import utiles.TecladoIn;

/**
 *
 * @author usuario
 */
/*En una empresa se otorga a los trabajadores un monto especial por buena asistencia a quienes
registren 2 o menos inasistencias durante el mes. En este concepto se paga $3000, a este valor se le
resta $500 por cada inasistencia.
Por ejemplo si los datos ingresados corresponden a Juan, que registra 2 inasistencias, se debe
mostrar los siguientes mensajes: “A Juan le corresponde cobrar el bono por buena asistencia”,
“Monto a percibir $ 2000”.
Desarrollar un programa pida el nombre del trabajador y la cantidad de inasistencias y muestre el
monto a cobrar en concepto de buena asistencia
*/
public class ej2 {
    public static void main (String [] args) {
        //Este algoritmo muestra la cantidad de inasistencias y muestra el monto a cobrar
        
        //Zona declaracion de variables
        String nombre;
        int concepto, cantInasistencia, resto;
        
        //Zona de entrada y lectura de datos
        System.out.println ("Ingrese el nombre del trabajador");
        nombre= TecladoIn.readLine();
        System.out.println("Ingrese la cantidad de inasistencias");
        cantInasistencia = TecladoIn.readLineInt();
        
        //Inicializacion de variable
        concepto = 3000;
        resto = concepto - 500*cantInasistencia;
        
        if (cantInasistencia ==0){
            System.out.println ("A "+nombre+" le corresponde cobrar el bono por buena asistencia");
            System.out.println ("Monto a percibir "+concepto);
     
        }
        else {
            if (cantInasistencia <=2){
                System.out.println ("A "+nombre+ " le corresponde cobrar el bono por buena asistencia");
                System.out.println("Monto a percibir "+resto);
            }
            else {
                System.out.println ("A "+nombre+ " no le corresponde cobrar el bono");
                System.out.println ("Monto a percibir "+resto);
            }
        }
    }
    
}
