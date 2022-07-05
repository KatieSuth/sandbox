# LeetCode: Package Matcher

## Description

As the owner of an online store, you need to fulfill orders everyday. To optimize the packing of each order, you decide to write an algorithm to match boxes and items based on their respective sizes.

You have access to the following two boxes:
    * A medium box (identifier: M)
    * A large box (identifier: L)

When possible, you should try to fit multiple items in the same box but boxes can only contain one type of product.
This is the list of items you sell along with associated boxes:

    * Camera (identifier: Cam): one can fit in a medium box, and up to two can fit in a large box
    * Gaming Console (identifier: Game): too big for a medium box, but up to two can fit in a large box
    * Bluetooth speaker (identifier: Blue): one can fit in a large box. Max is 1 per large box

Your goal is to design a function that takes a list of items and returns each box & item matches (examples below).
Your solution should work for any number of each item greater than or equal to zero.

## Examples

**Example 1**

```
Input: ["Cam"]
Output: [M: ["Cam"]]
```

**Example 2**

```
Input: ["Cam", "Game"]
Output: [M: ["Cam"], L: ["Game"]]
```

**Example 3**

```
Input: ["Game", "Blue"]
Output: [L: ["Game"], L: ["Blue"]]
```

**Example 4**

```
Input: ["Game", "Game", "Blue"]
Output: [L: ["Game", "Game"], L: ["Blue"]]
```

**Example 5**

```
Input: ["Cam", "Cam", "Game", "Game"]
Output: [L: ["Cam", "Cam"], L: ["Game", "Game"]]
```

**Example 6**

```
Input: ["Cam", "Cam", "Cam", "Game", "Game", "Game", "Cam", "Blue"]
Output: [L: ["Cam", "Cam"], L: ["Cam", "Cam"], L: ["Game", "Game"], L: ["Game"], L: ["Blue"]]
```

**Example 7**

```
Input: ["Cam", "Cam", "Cam", "Game", "Game", "Cam", "Cam", "Blue", "Blue"]
Output: [L: ["Cam", "Cam"] , L: ["Cam", "Cam"] , M: ["Cam"] , L: ["Game", "Game"] , L: ["Blue"] , L: ["Blue"]]
```
