CREATE TABLE users (
    id INT PRIMARY KEY NOT NULL,
    username VARCHAR(255) NOT NULL,
    first_name VARCHAR(255) NOT NULL,
    last_name VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    phone_number VARCHAR(255) NOT NULL,
    identification_number INT NOT NULL,
    password VARCHAR(255) NOT NULL,
    role INT NOT NULL -- 0 é user normal, 1 é administrador
);

-- criar users default
INSERT INTO users (id, username, first_name, last_name, email, phone_number, identification_number, password, role) VALUES (1, 'tskxz', 'Tanjil', 'Khan', 'tanjilkh@gmail.com', '+351 914 720 543', 1875, 'tanjilkh', 1);
INSERT INTO users (id, username, first_name, last_name, email, phone_number, identification_number, password, role) VALUES (2, 'admin', 'Admin', 'Admin', 'admin@admin.com', '+351 111 111 111', 0000, 'admin', 1);
INSERT INTO users (id, username, first_name, last_name, email, phone_number, identification_number, password, role) VALUES (3, 'ricardo', 'Ricardo', 'Magalhães', 'ricardont@gmail.com', '+351 111 111 111', 1134, 'ricardo', 0);