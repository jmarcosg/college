package patinador;
import patinador.Patinador.*;
import utiles.TecladoIn;

/**
 *
 * @author kcy0
 */
public class TestPatinador {

    public static Patinador crearPatinador() {

        Patinador e;
        String ape, nom, dn;
        int ed;
        char cat;
        e = new Patinador();
        System.out.print("Ingrese el apellido: ");
        ape = TecladoIn.readLine();
        e.setApellido(ape);
        System.out.print("Ingrese el nombre: ");
        nom = TecladoIn.readLine();
        e.setNombre(nom);
        System.out.print("Ingrese el DNI: ");
        dn = TecladoIn.readLine();
        e.setDNI(dn);
        System.out.print("Ingrese la edad: ");
        ed = TecladoIn.readLineInt();
        e.setEdad(ed);
        System.out.print("Ingrese la categoria: ");
        cat = TecladoIn.readLineNonwhiteChar();
        e.setCategoria(cat);
        return e;
    }

    public static void cargarPatinadores(Patinador[] arr) {
        int i;
        for (i = 0; i < arr.length; i++) {
            arr[i] = crearPatinador();
        }
    }

    public static void mostrarPatinadores(Patinador[] arr) {
        int i;
        for (i = 0; i < arr.length; i++) {
            System.out.println(arr[i].toString());
        }
    }

    public static void mostrarPatPorCat(Patinador[] arr, char cat) {
        int i;
        for (i = 0; i < arr.length; i++) {
            if (arr[i].getCategoria() == cat) {
                System.out.println(arr[i].toString());
            }
        }
    }

    public static void promover(Patinador[] arr, String dn) {
        int i;
        i=0;
        boolean cont= true;
        while (i < arr.length && cont) {
            if (arr[i].getDNI().equals(dn)) {
                arr[i].asciendeCategoria();
                cont = false;
            }
            i++;
        }
    }

    public static void main(String[] args) {
        // TODO code application logic here
        Patinador[] arreglo;
        String dn;
        int cant;
        char ca;
        System.out.print("Ingrese la cantidad de patinadores: ");
        cant = TecladoIn.readLineInt();
        arreglo = new Patinador[cant];
        cargarPatinadores(arreglo);
        mostrarPatinadores(arreglo);
        // Ud. deberá implementar un menú
        // aca mostramos una resolucion sin menú
        System.out.print("Ingrese una categoria: ");
        ca = TecladoIn.readLineNonwhiteChar();
        mostrarPatPorCat(arreglo, ca);
        System.out.print("Ingrese el dni de un patinador a promover: ");
        dn = TecladoIn.readLine();
        promover(arreglo, dn);
    }
}
