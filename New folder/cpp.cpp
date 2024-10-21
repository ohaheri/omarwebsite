cpp
#include <iostream>
#include <cmath>

int main() {
    double num1, num2, num3, sum, mean, squareSum;

    // Input three numbers
    std::cout << "Enter three numbers: ";
    std::cin >> num1 >> num2 >> num3;

    // Calculate the sum of the numbers
    sum = num1 + num2 + num3;

    // Calculate the arithmetic mean of the numbers
    mean = sum / 3;

    // Calculate the square of each of these three numbers
    squareSum = num1 * num1 + num2 * num2 + num3 * num3;

    // Output the results
    std::cout << "Sum of the numbers: " << sum << std::endl;
    std::cout << "Arithmetic mean of the numbers: " << mean << std::endl;
    std::cout << "Square of each of these three numbers: " << squareSum << std::endl;

    return 0;
}