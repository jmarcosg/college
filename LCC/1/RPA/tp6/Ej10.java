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
public class Ej10 {
    
    public static void main (String [] args) {
        //Este algoritmo determina la cantidad de raices que tiene la expresion
        
        //Zona declaracion de variables
        int a,b,c;
        int disc;
        
        //Zona de entrada y lectura de datos
        System.out.println("Ingrese el valor de a");
        a = TecladoIn.readLineInt();
        System.out.println("Ingrese el valor de b");
        b = TecladoIn.readLineInt();
        System.out.println("Ingrese el valor de c");
        c = TecladoIn.readLineInt();
        
        
        //Inicializacion de variable
        disc = b*b - 4*a*c;
        
        if (disc > 0) {
            System.out.println("Tiene dos raices reales");       
            
        }
        else {
            if (disc < 0) {
                System.out.println("Tiene dos raices complejas");
                
            }
            else {
                if (disc == 0) {
                    System.out.println("Tiene una raiz real");
                    
                }
            }
        }
        
                
              
        
  
    }
    
}
