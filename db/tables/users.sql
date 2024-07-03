CREATE TABLE users (
    id INT PRIMARY KEY NOT NULL,
    identification_number INT NOT NULL,
    password VARCHAR(255) NOT NULL
);

INSERT INTO users (id, identification_number, password) VALUES (1, 1875, 'tanjilkh');
INSERT INTO users (id, identification_number, password) VALUES (2, 1134, 'ricardomaga');