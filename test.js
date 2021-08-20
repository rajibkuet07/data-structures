const A = [100, 100, 100, -10];
const B = ['2020-12-31', '2020-12-22', '2020-12-03', '2020-12-29'];
const monthsTotal = [];

const calculateEndBal = (A, B) => {
	let bal = 0; // initial balance is zero
	const monthsTotal = [];
	for (let i = 0; i < A.length; i++) {
		bal += A[i]; // add to balance
		const dateArr = B[i].split('-');
		const month = parseInt(dateArr[1], 10); // find the month

		// create a hash like array
		if (!monthsTotal[month]) {
			monthsTotal[month] = {
				total: 0, // total transaction value
				count: 0, // transaction count
			};
		}

		// only for card payments
		if (A[i] < 0) {
			monthsTotal[month].total += Math.abs(A[i]); // increase amount
			monthsTotal[month].count++; // increase transaciton count
		}
	}

	let paidMonths = 12;
	monthsTotal.map(({ count, total }) => {
		if (count >= 3 && total >= 100) {
			paidMonths--;
		}
	});

	bal = bal - paidMonths * 5;
	return bal;
};

console.log(calculateEndBal(A, B));
