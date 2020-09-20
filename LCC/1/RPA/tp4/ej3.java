package tp4;

/**
 *
 * @author kcy0
 */
public class ej3 {

    public static void main(String[] args) {
        // Programa que calcula la cuota mensual de un personal
        // Declaracion y asignacion de variables
        double cuotaPura, cuotaConImpuesto, cuotaTotal, imp, seg;
        cuotaPura = 1800;
        imp = 130;
        seg = 50;
        cuotaConImpuesto = cuotaPura + imp;
        cuotaTotal = cuotaConImpuesto + seg;
        // Devolucion de datos
        System.out.println("Cuota Pura: "+cuotaPura);
        System.out.println("Imp: "+imp);
        System.out.println("Seg: "+seg);
        System.out.println("Cuota Total: "+cuotaTotal);
    }
    
}
