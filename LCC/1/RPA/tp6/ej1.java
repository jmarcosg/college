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
 /*
En una escuela primaria necesitan desarrollar un programa que ayude a sus estudiantes a reconocer
el mayor entre dos números. Para esto el sistema pedirá el nombre y edad de dos niñ@s y les
informará acerca de quién es el mayor y la diferencia entre las edades.
Por ejemplo si los datos ingresados corresponden a Juan de 12 años y María de 10, se debe mostrar
los siguientes mensajes: “Juan es mayor que María”, “Juan tiene 2 años más que María”.
Desarrollar un programa pida el nombre y edad de dos personas y muestre por pantalla quién es el
mayor y por cuántos años los supera.
*/
public class ej1 {
    public static void main (String[] args){
        //Este algoritmo muestra quien es el mayor y por cuantos años lo supera
        
        //Zona declaracion de variables
        int edad1, edad2, resto;
        String nombre1, nombre2;
        
        //Zona de entrada y lectura de datos
        System.out.println ("Escribir el primer nombre");
        nombre1= TecladoIn.readLine();
        System.out.println ("Escribir la edad");
        edad1= TecladoIn.readLineInt();
        System.out.println ("Escribir el segundo nombre");
        nombre2 = TecladoIn.readLine();
        System.out.println("Escribir la edad");
        edad2 = TecladoIn.readLineInt();
        
        if (edad1 > edad2) {
            resto = edad1 - edad2;
            System.out.println(nombre1+ " es mayor que "+nombre2+ "y " +nombre1+ " tiene " +resto+ " años mas que " +nombre2);
               
        }
        else {
            if (edad1 < edad2){
                resto = edad2 - edad1;
                System.out.println(nombre2+ " es mayor que "+nombre1+ "y " +nombre2+ " tiene " +resto+ " años mas que " +nombre1);
                
            }
            else {
                System.out.println (nombre1+ " tiene la misma edad que " +nombre2);
                
            }
        }
        
        
    }

    
    
    
    
}
