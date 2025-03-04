O nosso projeto final da disciplina PWC (Programação Web-Cliente) o mesmo que pertence ao curso de DS (Desenvolvimento de Software) 1°ano do CESTP de ISTEC (Instituto Superior de Tecnologias Avançadas) do Porto, baseia-se na criação do website do ginásio local chamado sixpackacademy. Os utilizadores devem ter a possibilidade de marcar os seguintes serviços:  
- Fisioterapia desportiva
-  Fisioterapia
- Reabilitação desportiva
-  Avaliação postural
- Massagem de relaxamento
- Massagem descontrotaturante
- Drenagem linfática
- Knesio taping

## Requisitos
- PHP
- MySQL

Criar ficheiro `.env`

```
SMTP_USERNAME='my-email@mail.com'
SMTP_PASSWORD='mysecretpass'
```

Criar a estrutura base de dados dentro do MySql
```sql
CREATE DATABASE view6pa;
use view6pa;

CREATE TABLE users (
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    username VARCHAR(255) NOT NULL,
    first_name VARCHAR(255) NOT NULL,
    last_name VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    phone_number VARCHAR(255) NOT NULL,
    identification_number INT NOT NULL,
    password VARCHAR(255) NOT NULL,
    role INT NOT NULL -- 0 é user normal, 1 é administrador
);

CREATE TABLE produtos (
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nome VARCHAR(255) NOT NULL,
    preco DECIMAL NOT NULL
);

INSERT INTO produtos (id, nome, preco) VALUES (1, 'Whey Protein', 30.99);
INSERT INTO produtos (id, nome, preco) VALUES (2, 'Barra Energética de Aveia', 5.99);
INSERT INTO produtos (id, nome, preco) VALUES (3, 'Barra Energética de Chocolate', 4.99);

ALTER TABLE produtos ADD COLUMN imagem VARCHAR(255);

CREATE TABLE contactos (
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    cliente VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    num_telemovel VARCHAR(255) NOT NULL,
    mensagem LONGTEXT NOT NULL
);

```
