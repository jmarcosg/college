/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package tp6;

import Utiles.TecladoIn;

/**
 *
 * @author usuario
 */
public class Ej5 {
    public static void main (String [] args) {
        //Este algoritmo muestra si el alumno esta en condiciones de promocionar la materia
        
        //Zona declaracion de variable
        String nombre, apellido;
        double nota1, nota2, promedio;
        
        //Zona de entrada y lectura de datos
        System.out.println("Ingrese el nombre del alumno");
        nombre = TecladoIn.readLine();
        System.out.println("Ingrese el apellido del alumno");
        apellido = TecladoIn.readLine();
        System.out.println("Ingrese la nota del primer parcial");
        nota1 = TecladoIn.readLineDouble();
        System.out.println("Ingrese la nota del segundo parcial");
        nota2 = TecladoIn.readLineDouble();
        
        //Inicializacion de variable
        promedio = (nota1 + nota2)/2;
        
        if (promedio >= 8) {
            System.out.println("El alumno esta en condicion de promocionar");
        }
        else {
            System.out.println("El alumno no esta en condicion de promocionar");
        }
    }
    
    
}
