package tp10;
import utiles.TecladoIn;

/**
 *
 * @author kcy0
 */
public class ej3 {
    
    public static String contrasenaSegura(String pw){
        // Modulo encargado de la verificacion de la contraseña
        // Al menos un numero, una letra y mayor a 6 caracteres
        // @pw string de contraseña
        int totalDigitos = 0;
        int totLetras = 0;
        boolean passwordSegura;
        String cartel;
        for (int i = 0; i < pw.length(); i++) {
            if (Character.isLetter(pw.charAt(i))){
                totLetras++;
            } else if (Character.isDigit(pw.charAt(i))){
                totalDigitos++;
            }
        }
        if ((pw.length() > 6) && (totLetras > 1) && (totalDigitos > 1)){
            passwordSegura = true;
            cartel = "Contraseña segura";
            System.out.println(cartel);
        } else {
            passwordSegura = false;
            cartel = "Contraseña insegura. Debe contener al menos un numero, una letra y ser mayor a 6 caracteres";
            System.out.println(cartel);
        }
    return cartel;
    }
    
    
    
    public static void main (String [] args) {
    // Este algoritmo pide el ingreso de una contraseña para luego ser verificada
    // Declaracion y asignacion de variables
    String password1, password2;
    // Ingreso y lectura de datos 
    System.out.print("Ingrese una contraseña: ");
    password1 = TecladoIn.readLine();
    System.out.print("Confirme la contraseña: ");
    password2 = TecladoIn.readLine();
    
    
    if (password1.equals(password2)){
        contrasenaSegura(password2);
    } else {
        System.out.println("Las contraseñas deben ser iguales");
    }
    
    }
    
}

    

