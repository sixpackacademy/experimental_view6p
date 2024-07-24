CREATE TABLE produtos (
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nome VARCHAR(255) NOT NULL,
    preco DECIMAL NOT NULL
);

-- criar users default
INSERT INTO produtos (id, nome, preco) VALUES (1, 'Whey Protein', 30.99);
INSERT INTO produtos (id, nome, preco) VALUES (2, 'Barra Energética de Aveia', 5.99);
INSERT INTO produtos (id, nome, preco) VALUES (3, 'Barra Energética de Chocolate', 4.99);

ALTER TABLE produtos ADD COLUMN imagem VARCHAR(255);