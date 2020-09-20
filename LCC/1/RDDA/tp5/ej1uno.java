package tp5;

public class ej1uno {
	
	public static void main(String[] args) {
		int n, m;
		int producto [][] = new int [3][3];
		
		for (n = 1; n <= 3; n++) {
			for (m = 1; m <= 3; m++) {
				producto[n-1][m-1] = n* m;
			}
		}
		
		for (n = 2; n >= 0; n--) {
			for (m = 2; m >= 0; m--) {
				System.out.println(producto[n][m]);
			}
		}

	}

}
