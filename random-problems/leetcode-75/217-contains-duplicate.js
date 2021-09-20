/**
 Given an integer array nums, return true if any value appears at least twice in the array, and return false if every element is distinct.
 */

// O(n) - time
// O(1) - space

// using Set in JS
// O(1) - time
// O(1) - space
const containsDuplicate = nums => {
	if (new Set(nums).size === nums.length) return false;
	return true;
};
console.log(containsDuplicate([1, 2, 3, 4]));

// using Hash Map
// O(n) - time
// O(n) - space
const containsDuplicate_I = nums => {
	const hashMap = {};
	for (const [ind, val] of nums.entries()) {
		if (hashMap[val] !== undefined) return true;
		else hashMap[val] = ind;
	}
	return false;
};
console.log(containsDuplicate_I([1, 2, 1, 4]));

// using Sorting Algorithm
// O(nlogn) - time / as sorting algo needs time nlogn
// O(1) - space
const containsDuplicate_II = nums => {
	nums.sort((a, b) => b - a);
	for (const [ind, val] of nums.entries()) {
		if (nums[ind + 1] === val) return true;
	}
	return false;
};
console.log(containsDuplicate_II([1, 2, 1, 4]));

// using O(n) & O(1) - condition: the array values should be less than the number of elements
// O(nlogn) - time / as sorting algo needs time nlogn
// O(1) - space
// It can be done using the associative array. However, JS does not support assoc array.
