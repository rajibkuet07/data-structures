/**
 * @param {number[]} nums
 * @return {number}
 */
const lengthOfLIS = nums => {
	if (nums.length === 0) return 0;
	if (nums.length === 1) return 1;

	const stack = [nums[0]];

	for (let i = 1; i < nums.length; i++) {
		// if item is grater than push it to the array
		if (nums[i] > stack[stack.length - 1]) stack.push(nums[i]);
		// else binary search and place the item in the correct position
		else {
			let pos = binarySearch(stack, nums[i]);
			stack[pos] = nums[i];
		}
		console.log(nums[i], stack);
	}
	return stack.length;
};

const binarySearch = (stack, value, left = 0, right = stack.length - 1) => {
	while (right - left > 1) {
		let mid = left + Math.floor((right - left) / 2);

		if (stack[mid] >= value) right = mid;
		else left = mid;
	}
	return right;

	//   if ( left > right ) return -1;
	//   if ( left === right ) return left;

	//   let mid = left + Math.floor( ( right - left ) / 2 );

	//   if ( stack[mid] <= value && stack[mid + 1] > value ) return mid;
	//   else if ( value > stack[mid] ) return binarySearch( stack, value, mid + 1, right );
	//   else  return binarySearch( stack, value, left, mid - 1 );
};

const length = lengthOfLIS([10, 9, 2, 5, 3, 7, 101, 18]);
console.log(length);
