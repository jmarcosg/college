package rpa2020;
import utiles.TecladoIn;

public class trianguloRectangulo {

    public static void main (String[] args) {
        // Declaracion de variables
        double angulo1, angulo2, angulo3, sumatoriaAngulos;
        boolean esTrianguloRectangulo = false;

        // Ingreso y lectura de datos
        System.out.println ("Ingrese angulo 1: ");
        angulo1 = TecladoIn.readDouble();       
        System.out.println ("Ingrese angulo 2: ");
        angulo2 = TecladoIn.readDouble();
        System.out.println ("Ingrese angulo 3: ");
        angulo3 = TecladoIn.readDouble();

        // Condicion y operacion para verificar si es un triangulo y luego si es triangulo rectangulo
        sumatoriaAngulos = angulo1 + angulo2 + angulo3;
        if (sumatoriaAngulos == 180) {
            if (angulo1 == 90 || angulo2 == 90 || angulo3 == 90){
                esTrianguloRectangulo = true;
            }  
        } else {
            System.out.println("No es un triangulo.");
        }

        // Resultado
        System.out.println ("Es triangulo rectangulo: " + esTrianguloRectangulo);
    }
    
}