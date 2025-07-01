CREATE TABLE products (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL UNIQUE,
    price INT NOT NULL,
    stock INT NOT NULL,
    category_id INT NOT NULL,
    FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE CASCADE ON UPDATE CASCADE
);


INSERT INTO products (name, price, stock, category_id) VALUES 
('Product 1', 100, 50, 1),
('Product 2', 150, 30, 2),
('Product 3', 200, 20, 3),
('Product 4', 250, 10, 1),
('Product 5', 300, 5, 2);

CREATE TABLE categories (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL UNIQUE
);

INSERT INTO categories (name) VALUES 
('Category 1'),
('Category 2'),
('Category 3'),
('Category 4'),
('Category 5');