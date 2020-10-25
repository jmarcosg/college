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
public class Ej4 {
    public static void main (String [] args){
        //Este algoritmo determina si un alumno puede acceder a la beca o no
        
        //Zona declaracion de variable
        double promedio, distancia;
        int edad;
        
        //Zona de entrada y lectura de datos
        System.out.println("Ingrese el promedio del alumno");
        promedio = TecladoIn.readLineDouble();
        System.out.println("Ingrese la edad del alumno");
        edad = TecladoIn.readLineInt();
        System.out.println("Ingrese la distancia en la que vive el alumno");
        distancia = TecladoIn.readDouble();
        
        if (((promedio >=7) && (edad < 25))||(distancia > 30)){
            System.out.println("El alumno puede acceder a la beca");
            
        }
        else {
            System.out.println ("El alumno no puede acceder a la beca");
            
        }
    }
    
}
