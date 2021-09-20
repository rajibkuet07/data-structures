/**
 * Given an integer array nums, find the contiguous subarray (containing at least one number) which has the largest sum and return its sum.
 * A subarray is a contiguous part of an array.
 */

// O(n) - time
// O(n) - space

// Explanation:::
// [-2, 1, -3, 4, -1, 2, 1, -5, 4]
// loop start
// sum nums[i] and nums[i+1]
// if sum < nums[i+1] - sum = nums[i+1]

const maxSubArray = nums => {
	let sum = nums[0];

	for (let i = 1; i < nums.length; i++) {
		nums[i] = Math.max(nums[i], nums[i] + nums[i - 1]);
		sum = Math.max(nums[i], sum);
	}

	return sum;
};
console.log(maxSubArray([-2, 1, -3, 4, -1, 2, 1, -5, 4]));
