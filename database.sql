CREATE DATABASE IF NOT EXISTS restaurante;

USE restaurante;

CREATE TABLE IF NOT EXISTS estoque (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    quantidade INT NOT NULL CHECK (quantidade >= 0)
);
