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
public class Ej13 {
    
    public static double calcular(double monto, String estCivil){
        // Modulo que calcula el monto a cobrar segun el estado civil
        double total;
        switch (estCivil){
            
            case "soltero":
                total = monto * 0.8;     // Descuento del 2% 
                break;
                
            case "casado":
                total = monto * 0.6;      // Descuento del 4%
                break;
                
            case "divorciado":
                total = monto * 0.7;      // Descuento del 3%
                break;
                
            default:
                total = monto * 0.9;      // Descuento del 1%
                break;
        }
        return total;
    }
    
    
    public static void main (String [] args) {
        //Este algoritmo muestra el descuento a realizar y el valor del sueldo a cobrar, segun el estado civil
        
        //Zona declaracion de variable
        String nombre, apellido, estadoCivil;
        double sueldo;
        
        // Ingreso y lectura de datos
        System.out.print("Ingrese el nombre: ");
        nombre = TecladoIn.readLine();
        System.out.print("Ingrese el apellido: ");
        apellido = TecladoIn.readLine();
        System.out.print("Ingrese el estado civil: ");
        estadoCivil = TecladoIn.readLine();
        System.out.print("Ingrese el sueldo: ");
        sueldo = TecladoIn.readDouble();
        
        // Devolucion de datos
        System.out.println("Sueldo a cobrar para "+nombre+"  "+apellido+" : "+calcular(sueldo, estadoCivil));
        
    }
    
    
    
}
