package testsTDA;

public class Racional {
	int numerador;
	int denominador;
	
	public Racional(int numerador,int den) {
		this.numerador = numerador; //cuando hay ambigüedad entre el nombre de la variable y el parámetro
		denominador=den; //acá podría no usar el this. No hay ambigüedad.
	}
	
	//mcd() y mcm() son privadas porque no son operaciones básicas de racionales sino necesarias para operaciones internas.
	private int mcd(int n1, int n2) { 
        int mcd = 0;
        int a = Math.max(n1, n2);
        int b = Math.min(n1, n2);
        do {
            mcd = b;
            b = a%b;
            a = mcd;
        } while(b!=0);
        return mcd;
    }
 
	private int mcm(int n1, int n2) {
        int mcm = 0;
        int a = Math.max(n1, n2);
        int b = Math.min(n1, n2);
        mcm = (a/mcd(a, b))*b;
        return mcm;
    }
 
	public Racional suma(Racional r) {
		Racional rsuma;
		int num, den;
		den = mcm(this.denominador, r.denominador);
		num = (den/this.denominador)*this.numerador + (den/r.denominador)*r.numerador;
		rsuma = new Racional(num, den);
		return rsuma;
	}
	
	public Racional resta(Racional r) {
		Racional rresta;
		int den = mcm(this.denominador, r.denominador);
		int num = (den/this.denominador)*this.numerador - (den/r.denominador)*r.numerador;
		rresta = new Racional(num, den);
		return rresta;
	}
	
	
	
	public Racional divide(Racional r) {
		Racional rdivision;
		int num = this.numerador * r.denominador;
		int den =  this.denominador * r.numerador;
		rdivision = new Racional(num, den);
		rdivision = rdivision.reducir();
		return rdivision;
	}
	
	public Racional reducir() {
		Racional rreducido;
		int divisor=mcd(numerador,denominador);
		int num = numerador/divisor;
		int den = denominador/divisor;
		rreducido = new Racional(num,den);
		return rreducido;
	}
	
	public Racional multiplica(Racional r) {
		Racional rdivision;
		int num = this.numerador * r.numerador;
		int den =  this.denominador * r.denominador;
		rdivision = new Racional(num, den);
		rdivision = rdivision.reducir();
		return rdivision;
	}
	
	public boolean equivalente(Racional r) {
		return this.reducir().equals(r.reducir());
	}
	
	public boolean equals(Racional r) {
		return (this.numerador == r.numerador) && (this.denominador == r.denominador);
	}
	
	public String toString() {
		return numerador + "/" + denominador;
	}
}
