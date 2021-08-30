/**
 * Question: Given an integer array nums, find a contiguous non-empty subarray within the array that has the largest product, and return the product.
 * It is guaranteed that the answer will fit in a 32-bit integer.
 * A subarray is a contiguous subsequence of the array.
 *
 * @param {*} nums
 * @returns
 */
// 0  1   2   3   4   5
// 2  -1  3   -2  -4  7
// start res = 2, maxsofar = 2, minsofar = 2
// maxsofar = maximum(num, num*maxsofar, num*minsofar);
// minsofar = minimum(num, num*maxsofar, num*minsofar);
// res = maximum(res, maxsofar);
// -1 -1  -2  2  num, maxsofar, minsofar, res
// 3  3   -6  3
// -2 12  -6  12
// -4 24  -48 24
// 7  168 -336  168

const maxProduct = nums => {
	let maxSofar = [nums[0]];
	let minSofar = [nums[0]];
	let result = nums[0];

	for (let i = 1; i < nums.length; i++) {
		let num = nums[i];

		maxSofar[i] = Math.max(num, num * maxSofar[i - 1], num * minSofar[i - 1]);
		minSofar[i] = Math.min(num, num * maxSofar[i - 1], num * minSofar[i - 1]);

		result = Math.max(result, maxSofar[i]);
		console.log(nums[i], maxSofar[i], minSofar[i], result);
	}

	return result;
};

const max = maxProduct([2, -1, 3, -2, -4, 7]);
console.log(max);
