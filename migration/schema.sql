CREATE DATABASE IF NOT EXISTS museum_db;
USE museum_db;

DROP TABLE IF EXISTS collections;

CREATE TABLE collections (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    origin VARCHAR(100),
    description TEXT,
    year_found INT,
    photo_url VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
