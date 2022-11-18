/**
 * Given an integer array nums, return true if any value appears at least twice in the array, and return false if every element is distinct.
 *
 * Example 1:
 * Input: nums = [1,2,3,1]
 * Output: true
 *
 * Example 2:
 * Input: nums = [1,2,3,4]
 * Output: false
 */

/* SOLUTION 01 */
const containsDuplicate = nums => {
	const storage = {};

	for (const [ind, val] of nums.entries()) {
		if (storage[val] !== undefined) return true;
		storage[val] = ind;
	}
	return false;
};
console.log(containsDuplicate([1, 2, 3]));
console.log(containsDuplicate([1, 1, 1, 3, 3, 4, 3, 2, 4, 2]));

/* SOLUTION 02 */
const containsDuplicate02 = nums => {
	nums.sort();

	for (const [ind, val] of nums.entries()) {
		if (nums[ind + 1] === val) return true;
	}
	return false;
};
console.log(containsDuplicate02([1, 2, 3]));
console.log(containsDuplicate02([1, 1, 1, 3, 3, 4, 3, 2, 4, 2]));
