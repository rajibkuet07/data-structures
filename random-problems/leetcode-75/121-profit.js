/**
 * You are given an array prices where prices[i] is the price of a given stock on the ith day.
 * You want to maximize your profit by choosing a single day to buy one stock and choosing a different day in the future to sell that stock.
 * Return the maximum profit you can achieve from this transaction. If you cannot achieve any profit, return 0.
 */

// O(n) - time
// O(1) - space

const maxProfit = prices => {
	let len = prices.length;
	let buy = prices[0];
	let profit = 0;

	for (let i = 1; i < len; i++) {
		if (prices[i] > buy) {
			profit = Math.max(prices[i] - buy, profit);
		} else {
			buy = prices[i];
		}
	}
	return profit;
};
console.log(maxProfit([1, 2]));
