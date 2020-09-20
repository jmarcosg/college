package tp2;
import utiles.TecladoIn;


public class ej1 {
    
    public static void main (String []args){
        int x, t, g, p;
        
        System.out.print("x: ");
        x = TecladoIn.readInt();
        
        t = x;
        p = 0; 
        do{
            g = t % 10;
            t = t / 10;
            p = p+k(t);
            t = g;
        }while (t !=0);
        
        System.out.println(p);
    }
    
    public static int k (int y){
        int h;
        if (y % 2 == 0){
            h = 1;
        
        }else {
           h=0;
        }
        return h;
    }
}
