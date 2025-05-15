-- Our Database :D!
CREATE DATABASE IF NOT EXISTS press_start_db;
USE press_start_db;

CREATE TABLE contact (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100),
  email VARCHAR(100),
  subject VARCHAR(255),
  message TEXT,
  rating VARCHAR(50)
);

CREATE TABLE questionnaire (
  id INT AUTO_INCREMENT PRIMARY KEY,
  favorite_game VARCHAR(100),
  favorite_developer VARCHAR(100),
  console VARCHAR(50),
  genres VARCHAR(255),
  message TEXT
);

CREATE TABLE consoles (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  release_year INT CHECK (release_year >= 1970),
  manufacturer VARCHAR(100) NOT NULL
);

CREATE TABLE games (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(100) NOT NULL,
  genre VARCHAR(50),
  release_year INT CHECK (release_year >= 1980)
);

CREATE TABLE developers (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  founded_year INT CHECK (founded_year >= 1960),
  country VARCHAR(50)
);