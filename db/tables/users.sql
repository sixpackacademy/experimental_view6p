CREATE TABLE users (
    id INT PRIMARY KEY NOT NULL,
    identification_number INT NOT NULL,
    password VARCHAR(255) NOT NULL,
    role INT NOT NULL -- 0 é user normal, 1 é administrador
);

-- criar users default
INSERT INTO users (id, identification_number, password, role) VALUES (1, 1875, 'tanjilkh', 1);
INSERT INTO users (id, identification_number, password, role) VALUES (2, 1134, 'ricardomaga', 0);