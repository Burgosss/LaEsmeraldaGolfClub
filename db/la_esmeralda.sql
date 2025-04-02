drop database if exists golfclubesm;
CREATE DATABASE golfclubesm;
USE golfclubesm;

-- Tabla de Usuarios
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    apellido VARCHAR(100) NOT NULL,
    email VARCHAR(150) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    telefono VARCHAR(15),
    direccion TEXT,
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabla de Membresías
CREATE TABLE membresias (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tipo VARCHAR(50) NOT NULL, -- Ejemplo: "Oro", "Plata", "VIP"
    precio DECIMAL(10,2) NOT NULL,
    duracion_meses INT NOT NULL, -- Tiempo de duración
    descripcion TEXT
);

-- Relación Usuario - Membresía
CREATE TABLE usuario_membresia (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT NOT NULL,
    membresia_id INT NOT NULL,
    fecha_inicio DATE NOT NULL,
    fecha_fin DATE NOT NULL,
    estado ENUM('activa', 'vencida', 'cancelada') DEFAULT 'activa',
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id) ON DELETE CASCADE,
    FOREIGN KEY (membresia_id) REFERENCES membresias(id) ON DELETE CASCADE
);

CREATE TABLE sugerencias (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    telefono VARCHAR(20),
    estatus_membresia ENUM('member', 'guest', 'former-member', 'interested') NOT NULL,
    categoria ENUM('golf-course', 'facilities', 'service', 'restaurant', 'pro-shop', 'events', 'membership', 'other') NOT NULL,
    sugerencia TEXT NOT NULL,
    fecha_envio TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


-- Insertar usuarios
INSERT INTO usuarios (nombre, apellido, email, password, telefono, direccion) VALUES
('Juan', 'Pérez', 'juan.perez@email.com', 'hashedpassword123', '1234567890', 'Calle 123, Ciudad'),
('María', 'Gómez', 'maria.gomez@email.com', 'hashedpassword456', '0987654321', 'Avenida 456, Ciudad');

-- Insertar tipos de membresías
INSERT INTO membresias (tipo, precio, duracion_meses, descripcion) VALUES
('Plata', 500.00, 6, 'Acceso limitado a áreas recreativas.'),
('Oro', 1000.00, 12, 'Acceso completo a todas las áreas.'),
('VIP', 2000.00, 12, 'Acceso completo + eventos exclusivos.');

-- Asignar una membresía a un usuario
INSERT INTO usuario_membresia (usuario_id, membresia_id, fecha_inicio, fecha_fin, estado) VALUES
(1, 2, '2025-03-01', '2026-03-01', 'activa'),
(2, 3, '2025-03-01', '2026-03-01', 'activa');
