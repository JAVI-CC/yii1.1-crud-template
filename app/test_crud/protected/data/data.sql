-- Crear la tabla roles
CREATE TABLE roles (
    id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(128) NOT NULL UNIQUE
);

-- Insertar roles
INSERT INTO roles (nombre) VALUES ('Admin');
INSERT INTO roles (nombre) VALUES ('Usuario');
INSERT INTO roles (nombre) VALUES ('Moderador');

-- Crear la tabla users
CREATE TABLE users (
    id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(128) NOT NULL,
    apellidos VARCHAR(128) NOT NULL,
    email VARCHAR(128) NOT NULL UNIQUE,
    password VARCHAR(128) NOT NULL,
    fecha_nacimiento DATE NOT NULL,
    active BOOLEAN NOT NULL DEFAULT 1,
    points INTEGER NOT NULL DEFAULT 0,
    role_id INTEGER NOT NULL,
    FOREIGN KEY (role_id) REFERENCES roles(id)
);

-- Insertar usuarios
INSERT INTO users (nombre, apellidos, email, password, fecha_nacimiento, active, points, role_id)
VALUES
('Juan', 'Pérez', 'juan.perez@example.com', 'password123', '1990-03-15', 1, 10, 1),  -- Admin
('Ana', 'López', 'ana.lopez@example.com', 'password123', '1995-07-20', 1, 15, 2),  -- Usuario
('Carlos', 'Martínez', 'carlos.martinez@example.com', 'password123', '1988-11-11', 1, 25, 3),  -- Moderador
('Lucía', 'Gómez', 'lucia.gomez@example.com', 'password123', '1992-06-10', 1, 5, 2);  -- Usuario

-- Crear la tabla tags
CREATE TABLE tags (
    id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(128) NOT NULL UNIQUE
);

-- Insertar tags
INSERT INTO tags (nombre) VALUES ('Tecnología');
INSERT INTO tags (nombre) VALUES ('Deportes');
INSERT INTO tags (nombre) VALUES ('Arte');
INSERT INTO tags (nombre) VALUES ('Cine');
INSERT INTO tags (nombre) VALUES ('Música');

-- Crear la tabla user_tags (relación muchos a muchos entre users y tags)
CREATE TABLE user_tags (
    user_id INTEGER NOT NULL,
    tag_id INTEGER NOT NULL,
    PRIMARY KEY (user_id, tag_id),
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (tag_id) REFERENCES tags(id)
);

-- Insertar relaciones entre usuarios y tags
INSERT INTO user_tags (user_id, tag_id) VALUES
(1, 1),  -- Juan Pérez con "Tecnología"
(1, 4),  -- Juan Pérez con "Cine"
(2, 2),  -- Ana López con "Deportes"
(2, 5),  -- Ana López con "Música"
(3, 1),  -- Carlos Martínez con "Tecnología"
(3, 3),  -- Carlos Martínez con "Arte"
(4, 4),  -- Lucía Gómez con "Cine"
(4, 5);  -- Lucía Gómez con "Música"

-- Crear la tabla direcciones
CREATE TABLE direcciones (
    id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    user_id INTEGER NOT NULL,
    nombre VARCHAR(128) NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

-- Insertar direcciones de usuarios
INSERT INTO direcciones (user_id, nombre) VALUES
(1, 'Casa principal de Juan'),
(2, 'Apartamento de Ana'),
(3, 'Casa de Carlos'),
(4, 'Casa de Lucía');
