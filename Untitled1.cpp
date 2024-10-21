#include <iostream>
#include <vector>
#include <ctime>
#include <cstdlib>

// Enum for different game elements
enum class GameElement {
    EMPTY,
    PLAYER,
    ITEM,
    OBSTACLE
};

// Function to generate the game grid
std::vector<std::vector<GameElement>> generateGrid(int width, int height) {
    std::vector<std::vector<GameElement>> grid(height, std::vector<GameElement>(width, GameElement::EMPTY));

    // Add player, item, and obstacle at random positions
    grid[rand() % height][rand() % width] = GameElement::PLAYER;
    grid[rand() % height][rand() % width] = GameElement::ITEM;
    grid[rand() % height][rand() % width] = GameElement::OBSTACLE;

    return grid;
}

// Function to display the game grid
void displayGrid(const std::vector<std::vector<GameElement>>& grid) {
    for (const auto& row : grid) {
        for (const auto& element : row) {
            switch (element) {
                case GameElement::EMPTY: std::cout << "."; break;
                case GameElement::PLAYER: std::cout << "P"; break;
                case GameElement::ITEM: std::cout << "I"; break;
                case GameElement::OBSTACLE: std::cout << "O"; break;
            }
        }
        std::cout << std::endl;
    }
}

// Function to move the player
void movePlayer(std::vector<std::vector<GameElement>>& grid, char direction) {
    for (int i = 0; i < grid.size(); i++) {
        for (int j = 0; j < grid[i].size(); j++) {
            if (grid[i][j] == GameElement::PLAYER) {
                switch (direction) {
                    case 'w': if (i > 0) grid[i][j] = GameElement::EMPTY, grid[i - 1][j] = GameElement::PLAYER; break;
                    case 'a': if (j > 0) grid[i][j] = GameElement::EMPTY, grid[i][j - 1] = GameElement::PLAYER; break;
                    case 's': if (i < grid.size() - 1) grid[i][j] = GameElement::EMPTY, grid[i + 1][j] = GameElement::PLAYER; break;
                    case 'd': if (j < grid[i].size() - 1) grid[i][j] = GameElement::EMPTY, grid[i][j + 1] = GameElement::PLAYER; break;
                }
                break;
            }
        }
    }
}

int main() {
    // Initialize random seed
    srand(time(0));

    // Game loop
    std::vector<std::vector<GameElement>> grid = generateGrid(20, 20);
    while (true) {
        // Display the grid
        displayGrid(grid);

        // Get user input for movement
        char direction;
        std::cout << "Move the player (WASD): ";
        std::cin >> direction;

        // Move the player and check for item collection or game over
        movePlayer(grid, direction);

        // Exit the game if the player collects the item
        for (const auto& row : grid) {
            for (const auto& element : row) {
                if (element == GameElement::PLAYER) {
                    std::cout << "Congratulations! You have collected the item!" << std::endl;
                    return 0;
                }
            }
        }
    }

    return 0;
}