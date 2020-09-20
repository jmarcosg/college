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
public class Ej8 {
    
    public static void main (String [] args) {
        //Este algoritmo determina el descuento a aplicar y el monto final a pagar
        
        //Zona declaracion de variables
        char tipoPlan;
        double montoMensual, totalPagar, descuento;
        
        //Zona de entrada y lectura de datos 
        System.out.println("Ingrese el valor de la taza de servicio a la propiedad");
        montoMensual = TecladoIn.readLineDouble();
        System.out.println("Ingrese el tipo plan");
        tipoPlan = TecladoIn.readLineNonwhiteChar();
        
        switch(tipoPlan){
            
            case '1':
                descuento = (25*montoMensual)/100;
                totalPagar = montoMensual - descuento;
                System.out.println("Usted debe abonar "+totalPagar);
                break;
                        
            case '2':
                descuento = (10*montoMensual)/100;
                totalPagar = montoMensual - descuento;
                System.out.println("Usted debe abonar "+totalPagar);
                break;
                               
            case '3':
                System.out.println("Usted debe abonar "+montoMensual);
                break;
                                      
            default: 
                System.out.println("Usted no ha ingresado un plan valido");
            
        }
                
                          
                                  
        
    }

                
    }
    

