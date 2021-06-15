var prime = [];
var cap = 4;
for (var i = 2; i < cap ; i++) {
	var num = isPrime(i);
	if (num) {
		prime.push(i);
	}
	if (prime.length <25) {
		cap++;
    }
}

function isPrime(num) {
  	var prime = num != 1;
	for (var i = 2; i < num; i++) {
		if (num % i == 0) {
			prime = false;
			break;
		}
	}
    
	return prime;
}	