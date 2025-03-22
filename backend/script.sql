CREATE DATABASE IF NOT EXISTS easybuy;
USE easybuy;

-- Table Users (doit exister avant d'être référencée)
CREATE TABLE users (
    id BIGINT(20) AUTO_INCREMENT PRIMARY KEY,
    Nom VARCHAR(255) NOT NULL,
    Email VARCHAR(255) UNIQUE NOT NULL,
    Motdepasse VARCHAR(255) NOT NULL
);

-- Table Admin
CREATE TABLE Admin (
    id INT AUTO_INCREMENT PRIMARY KEY,
    Nom VARCHAR(255) NOT NULL,
    Email VARCHAR(255) UNIQUE NOT NULL,
    Motdepasse VARCHAR(255) NOT NULL
);

-- Table Produits
CREATE TABLE Produits (
    id INT AUTO_INCREMENT PRIMARY KEY,
    Nom VARCHAR(255) NOT NULL,
    Categorie VARCHAR(255),
    Prix DECIMAL(10,2) NOT NULL,
    Description TEXT,
    QntStock INT NOT NULL,
    SrcImage VARCHAR(255)
);

-- Table Panier (users_id doit exister dans users)
CREATE TABLE Panier (
    id INT AUTO_INCREMENT PRIMARY KEY,
    users_id BIGINT(20) NOT NULL UNIQUE,
    FOREIGN KEY (users_id) REFERENCES users(id) ON DELETE CASCADE
);

-- Table Panier_Produits (relation Panier et Produits)
CREATE TABLE Panier_Produits (
    Panier_id INT,
    Produit_id INT,
    Quantite INT NOT NULL DEFAULT 1,
    PRIMARY KEY (Panier_id, Produit_id),
    FOREIGN KEY (Panier_id) REFERENCES Panier(id) ON DELETE CASCADE,
    FOREIGN KEY (Produit_id) REFERENCES Produits(id) ON DELETE CASCADE
);

-- Table Commande (users_id doit exister dans users)
CREATE TABLE Commande (
    id INT AUTO_INCREMENT PRIMARY KEY,
    totalprix DECIMAL(10,2) NOT NULL,
    date_commande DATE NOT NULL,
    users_id BIGINT(20) NOT NULL,
    FOREIGN KEY (users_id) REFERENCES users(id) ON DELETE CASCADE
);

-- Table Commande_Produits (relation Commande et Produits)
CREATE TABLE Commande_Produits (
    Commande_id INT,
    Produit_id INT,
    Quantite INT NOT NULL DEFAULT 1,
    PRIMARY KEY (Commande_id, Produit_id),
    FOREIGN KEY (Commande_id) REFERENCES Commande(id) ON DELETE CASCADE,
    FOREIGN KEY (Produit_id) REFERENCES Produits(id) ON DELETE CASCADE
);

-- Table PaymentCarte (users_id doit exister dans users)
CREATE TABLE PaymentCarte (
    id INT AUTO_INCREMENT PRIMARY KEY,
    numcart BIGINT NOT NULL UNIQUE,
    ExpirationDate DATE NOT NULL,
    CVV INT NOT NULL,
    users_id BIGINT(20) NOT NULL,
    FOREIGN KEY (users_id) REFERENCES users(id) ON DELETE CASCADE
);

-- Insertion des données
INSERT INTO users (Nom, Email, Motdepasse) VALUES 
('John Doe', 'john@example.com', 'password123'),
('Jane Smith', 'jane@example.com', 'password456');

INSERT INTO Admin (Nom, Email, Motdepasse) VALUES 
('Admin Unique', 'admin@example.com', 'adminpass1');

INSERT INTO Produits (Nom, Categorie, Prix, Description, QntStock, SrcImage) VALUES
('Rog Zephyrus G16 16GB RAM 512GB SSD', 'laptop', 1699.99, 'Laptop Gaming ASUS', 10, 'assets/img/pc_roc.jpg'),
('HP Laptop 2024 - Intel i7, 32GB RAM, 1TB SSD', 'laptop', 1499.99, 'HP High Performance', 20, 'assets/img/3.jpg');

INSERT INTO Commande (totalprix, date_commande, users_id) VALUES 
(2499.98, '2025-03-16', 1),
(1549.98, '2025-03-16', 2);
