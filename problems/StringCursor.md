# String Manipulation By Cursor Position

## Description

Given a string and a set of operations, perform the set of operations on the string starting at the first character in the string.

The operations are defined as follows:

```
 * Fn: Move cursor forward N spaces
 * Bn: Move cursor backward N spaces
 * Rx: Replace the current character at the cursor with character x
```

## Examples

### Example 1:
**Input:** `str = abcdefghijklmn, operations = F2B1F5Rw`
**Output:** `abcdefwhijklmn`
**Explanation:** Starting at `a` in str, move forward 2 spaces -> `c`. Move backward 1 space -> `b`. Move forward 5 spaces -> `g`. Replace `g` with `w`.

## Constraints:

 * `1 <= str.length <= 10^4`
 * `1 <= operations.length <= 10^9`
 * Operations must be an integer and cannot contain negative values
