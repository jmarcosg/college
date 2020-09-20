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
public class Ej12 {
    
    public static void main (String [] args) {
        //Este algoritmo devuelve el importe a pagar
        
        //Zona declaracion de variable
        char categoria;
        
        //Zona de entrada y lectura de datos
        System.out.println("Ingrese la categoria a renovar");
        categoria = TecladoIn.readLineNonwhiteChar();
        
        switch (categoria) {
            
            case 'A':
                System.out.println("Costo a renovar $850");
                break;
                
            case 'B':
                System.out.println("Costo a renovar $600");
                break;
            
            case 'C':
                System.out.println("Costo a renovar $450");
                break;
            
            default:
                System.out.println("Costo a renovar $305");
                break;
                
                
        }
    }
    
}
