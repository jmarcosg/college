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
public class Ej11 {
    
    public static void main (String [] args) {
        //Este algoritmo calcula y muestra el monto a cobrar
        
        //Zona declararion de variable
        char socio;
        double descuento, cantLts, precioCombustible, monto, total;
        int tipoCombustible;
        
        //Zona de entrada y lectura de datos
        System.out.println("¿El cliente es socio del Automovil Club Argentino? , responder con s/n");
        socio = TecladoIn.readLineNonwhiteChar();
        
        System.out.println("Ingrese el tipo de combustible segun corresponda");
        System.out.println("1: Nafta Super");
        System.out.println("2: Nafta Premium");
        System.out.println("3: Diesel 500");
        tipoCombustible = TecladoIn.readLineInt();
        
        System.out.println("Ingrese la cantidad de litros");
        cantLts = TecladoIn.readLineDouble();
        
        switch (tipoCombustible) {
            
            case 1:
                precioCombustible = 13.49;
                monto = precioCombustible * cantLts;
                descuento = (monto * 5)/100;
                
                if (socio == 's') {
                    total = monto - descuento;
                    System.out.println ("Monto a pagar: "+total);
                }
                else {
                    System.out.print("Usted no obtiene descuento. Monto a pagar: "+monto);
                }
                break;
                
            case 2:
                precioCombustible = 14.99;
                monto = precioCombustible * cantLts;
                descuento = (monto * 5)/100;
                
                if (socio == 's') {
                    total = monto - descuento;
                    System.out.println ("Monto a pagar: "+total);
                }
                else {
                    System.out.print("Usted no obtiene descuento. Monto a pagar: "+monto);
                }
                break;
                
            case 3:
                precioCombustible = 15.12;
                monto = precioCombustible * cantLts;
                descuento = (monto * 5)/100;
                
                if (socio == 's') {
                    total = monto - descuento;
                    System.out.println ("Monto a pagar: "+total);
                }
                else {
                    System.out.print("Usted no obtiene descuento. Monto a pagar: "+monto);
                }
                break;
                
                         
        }
        
        
    }
    
}
