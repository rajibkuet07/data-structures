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

/**
 * The product of the element except self can be consider the product of the elements in the left of the element and the product of the elements in the right side.
 * [1, 2, 3, 4]
 * if the position is 2 then the value will be the product of elements in position 0, 1 and the product of position 3
 * left product = 1 * 2, right product = 4
 * so value will be leftProd * rightProd = 2 * 4 = 8
 */

const productExceptSelf = nums => {
	const len = nums.length;
	let solution = [nums[0]];
	let rightProd = 1;

	// traverse from left to right to get the product of the left elements
	for (let i = 1; i < len; i++) {
		solution[i] = nums[i] * solution[i - 1];
	}
	// after this loop solution = [ 1, 2, 6, 24 ]

	// find the right product of the current position and multiply with the leftProd array(solution)
	for (let i = len - 1; i > 0; i--) {
		solution[i] = solution[i - 1] * rightProd;
		rightProd *= nums[i];
	}

	// finally the the prod of the first position will be the right prod itself (edge case)
	solution[0] = rightProd;

	return solution;
};
console.log(productExceptSelf([1, 2, 3, 4]));
console.log(productExceptSelf([-1, 1, 0, -3, 3]));
