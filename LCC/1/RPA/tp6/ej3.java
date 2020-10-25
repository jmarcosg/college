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
public class ej3 {
    public static void main (String [] args){
        //Este algoritmo determina si un numero es capicua o no
        
        //Zona declaracion de variable
        int num, numCent, numDec, numUnid, resto;
        
        //Zona de entrada y lectura de datos
        System.out.println ("Ingrese el numero");
        num = TecladoIn.readLineInt();
        
        //Zona de calculos 
        numCent = num/100;
        resto = num%100;
        numDec = resto/10;
        numUnid = resto%10;
        
        if (numCent == numUnid){
            System.out.println ("La primer cifra y la tercera son iguales. El numero es "+numCent);
           
        }
        else {
            System.out.println ("La primer cifra y la tercera no son iguales");
            
        }
        
        
    }
    
}
