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
public class Ej7 {
    
    public static void main (String [] args) {
        //Este algoritmo calcula el monto a pagar ademas del descuento aplicado
        
        //Zona declaracion de variables
        char compra, pagoContado;
        double precioKg, precioRegular, descuento;
        
        //Zona de entrada y lectura de datos
        System.out.println("¿Su compra supera los 5 kilogramos? , responder con s/n");
        compra = TecladoIn.readLineNonwhiteChar();
        System.out.println("¡Usted utiliza pago contado? , responder con s/n");
        pagoContado = TecladoIn.readLineNonwhiteChar();
        
        if (compra == 's' && pagoContado == 's') {
            descuento = (80*10)/100;
            precioKg = 80 - descuento;
            System.out.println("Usted debe abonar "+precioKg);
            
        }
        else {
            if (compra == 's' && pagoContado == 'n') {
                precioKg = 80;
                System.out.println("Usted debe abonar "+precioKg);
                System.out.println("Si usted abona con Pago Contado obtendra un descuento de 10%");
                
            }
            else {
                if (compra == 'n' && pagoContado == 'n') {
                precioRegular = 100;
                System.out.println("Usted debe abonar "+precioRegular);
                
                }
                else {
                    if (compra == 'n' && pagoContado == 's') {
                    precioRegular = 100;
                    System.out.println("Usted debe abonar "+precioRegular);
                    System.out.println("Usted no obtendra el descuento porque su compra no supera los 5 kilogramos");
                    
                    }
                    
                }
            }
        }
    }
}
