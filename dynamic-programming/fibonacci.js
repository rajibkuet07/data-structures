console.log('Working');

const fib = (n, memo = {}) => {
	console.log(n);
	console.log(memo);
	console.log('======');
	if (n in memo) return memo[n];
	if (n <= 2) return 1;

	memo[n] = fib(n - 1, memo) + fib(n - 2, memo);
	return memo[n];
};

console.log(fib(50));
// console.log(fib(50));
