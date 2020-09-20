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
public class Ej9bis {
    
    public static void main (String [] args) {
        //Este algoritmo determina el porcentaje de interes a aplicar y el monto final a pagar
        
        //Zona declaracion de variables
        char cantCuotas;
        int porcentajeInteres;
        double montoActual,montoFinal;
        
        //Zona de entrada y lectura de datos
        System.out.println("Ingrese el monto");
        montoActual = TecladoIn.readLineDouble();
        
        System.out.println("Ingrese la opcion correspondiente en cada caso");
        System.out.println("1: cuotas desde 1 a 3");
        System.out.println("2: cuotas desde 4 a 5");
        System.out.println("3: cuotas desde 6 en adelante");
        cantCuotas = TecladoIn.readLineNonwhiteChar();
        
        //Inicializacion de variable
        porcentajeInteres = 0;
     
        switch (cantCuotas) {         
            case '1': 
                porcentajeInteres = 0;
                break;
                
            case '2':
                porcentajeInteres = 10;
                break;
                
            case '3':
                porcentajeInteres = 20;
                    
                break;
                
            default:
                System.out.println("Usted no ha ingresado ninguna de las opciones");             
                 
        }
        montoFinal= montoActual+(montoActual*porcentajeInteres/100);       
       System.out.println("El monto final a abonar es: "+montoFinal+" con un interes del "+porcentajeInteres+ "%");
    }
}
