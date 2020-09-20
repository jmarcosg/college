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
public class Ej6 {
    
    public static void main (String []args) {
        //Este algoritmo determina el monto total a pagar y el descuento aplicado
        
        //Zona declaracion de variables
        char socioPleno, cuotaAlDia;
        double montoAPagar, descuento;
        int mesesDebidos;
        
        //Zona de entrada y lectura de datos
        System.out.println ("¿Usted es socio pleno? , responder con s/n");
        socioPleno = TecladoIn.readLineNonwhiteChar();
        System.out.println ("¿Usted tiene las cuotas al dia? , responder con s/n");
        cuotaAlDia = TecladoIn.readLineNonwhiteChar();
        
        if (socioPleno == 's' && cuotaAlDia == 's'){
            descuento = (15*420)/100;
            montoAPagar = 420 - descuento;
            System.out.println ("Usted debe abonar "+montoAPagar);
        }
        else {
            if (socioPleno == 's' && cuotaAlDia == 'n'){
                System.out.println ("¿Cuantas cuotas debe?");
                mesesDebidos = TecladoIn.readLineInt();
                montoAPagar = 420*mesesDebidos + 420;
                System.out.println ("Usted debe abonar "+montoAPagar);
                               
            }
            else {
                if (socioPleno == 'n' && cuotaAlDia == 's') {
                    montoAPagar = 310;
                    System.out.println ("Usted debe abonar "+montoAPagar);
                }
                else {
                    if (socioPleno == 'n' && cuotaAlDia == 'n'){
                        System.out.println ("¿Cuantos meses debe?");
                        mesesDebidos = TecladoIn.readLineInt();
                        montoAPagar = 310*mesesDebidos+310;
                        System.out.println ("Usted debe abonar "+montoAPagar);
                    }
                    
                }
            }
        }
    }
    
}
