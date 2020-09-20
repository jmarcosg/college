package tp5;

public class ej1dos {
	
	public static void main(String[] args) {
		int n, m;
		double promedio[] = new double [3];
		
		
		for (n = 1; n <= 3; n++) {
			for (m = 2; m <= 3; m++) {
				promedio [n-1] = promedio [n-1] + (n * m);
			}
			promedio [n-1] = promedio [n-1]/3.0;
		}
		

	}

}
