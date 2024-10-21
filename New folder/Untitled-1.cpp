#include <iostream>
#include <string>
#include <vector>
#include <cstdlib>
#include <ctime>
using namespace std;
// Define the player class
class Player {
public:
  // Constructor
  Player(string name, int health, int attack, int defense) {
    this->name = name;
    this->health = health;
    this->attack = attack;
    this->defense = defense;
  }
  // Getters
  string getName() { return name; }
  int getHealth() { return health; }
  int getAttack() { return attack; }
  int getDefense() { return defense; }
  // Setters
  void setHealth(int health) { this->health = health; }
  void setAttack(int attack) { this->attack = attack; }
  void setDefense(int defense) { this->defense = defense; }
  // Methods
  void attack(Player* enemy) {
    int damage = attack - enemy->getDefense();
    if (damage < 0) {
      damage = 0;
    }
    enemy->setHealth(enemy->getHealth() - damage);
  }
  void defend(Player* enemy) {
    int damage = enemy->getAttack() - defense;
    if (damage < 0) {
      damage = 0;
    }
    health -= damage;
  }
private:
  string name;
  int health;
  int attack;
  int defense;
};
// Define the enemy class
class Enemy {
public:
  // Constructor
  Enemy(string name, int health, int attack, int defense) {
    this->name = name;
    this->health = health;
    this->attack = attack;
    this->defense = defense;
  }
  // Getters
  string getName() { return name; }
  int getHealth() { return health; }
  int getAttack() { return attack; }
  int getDefense() { return defense; }
  // Setters
  void setHealth(int health) { this->health = health; }
  void setAttack(int attack) { this->attack = attack; }