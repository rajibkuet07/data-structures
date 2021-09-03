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

const threeSum = nums => {
	// [-1, 0, 1, 2, -1, -4]

	let result = [];

	// return if item count is less than 3
	if (nums.length < 3) return result;

	nums.sort((a, b) => a - b); // [ -4, -1, -1, 0, 1, 2 ]
	console.log(nums);

	for (let [index, number] of nums.entries()) {
		let [left, right] = [index + 1, nums.length - 1];

		if (number > 0) return result;

		if (index > 0 && nums[index] === nums[index - 1]) continue;

		while (left < right) {
			let sum = number + nums[left] + nums[right];
			console.log(number, left, right, sum);

			if (sum > 0) {
				right--;
			} else if (sum < 0) {
				left++;
			} else {
				console.log('Here');
				result.push([number, nums[left], nums[right]]);
				left++;
				while (nums[left] === nums[left - 1] && left < right) {
					left++;
				}
			}
		}
	}
	return result;
};
const sum = threeSum([-1, 0, 1, 2, -1, -4, -2, -3, 3, 0, 4]);
console.log(sum);
