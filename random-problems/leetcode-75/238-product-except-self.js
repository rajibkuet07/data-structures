/**
 * Given an integer array nums, return an array answer such that answer[i] is equal to the product of all the elements of nums except nums[i].
 * The product of any prefix or suffix of nums is guaranteed to fit in a 32-bit integer.
 * You must write an algorithm that runs in O(n) time and without using the division operation.
 */

// O(n) - time
// O(n) - space

// Explanation:::
// [1, 2, 3, 4, 5]
// the product at index 2 is
// (1 * 2)(product of the left elements of the index)
// multiplied by
// (4 * 5)(product of the right elements of the index)

const productExceptSelf = nums => {
	const len = nums.length;
	let solution = [nums[0]];
	let rightProd = 1;

	for (let i = 1; i < len; i++) {
		solution[i] = nums[i] * solution[i - 1];
	}
	// solution = [ 1, 2, 6, 24 ]

	for (let i = len - 1; i > 0; i--) {
		solution[i] = solution[i - 1] * rightProd;
		rightProd *= nums[i];
	}
	solution[0] = rightProd;
	return solution;
};
console.log(productExceptSelf([1, 2, 3, 4]));
