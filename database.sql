-- ========================================================
-- Script de Inicialización: Álbum FIFA 2026 - Edición México
-- ========================================================

CREATE DATABASE IF NOT EXISTS album2026 
  CHARACTER SET utf8mb4 
  COLLATE utf8mb4_unicode_ci;

USE album2026;

-- 1. Tabla de secciones (Especiales y Países)
CREATE TABLE IF NOT EXISTS secciones (
  id INT AUTO_INCREMENT PRIMARY KEY,
  tipo ENUM('especial', 'seleccion') NOT NULL,
  nombre VARCHAR(100) NOT NULL,
  simbolo VARCHAR(10) NOT NULL,
  total_estampas INT NOT NULL DEFAULT 0,
  orden INT NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 2. Tabla de estampas individuales
CREATE TABLE IF NOT EXISTS estampas (
  id INT AUTO_INCREMENT PRIMARY KEY,
  seccion_id INT NOT NULL,
  numero INT NOT NULL,           -- número de estampa (1..20 o 0)
  tengo INT NOT NULL DEFAULT 0,  -- 0 = no tengo, 1 = pegada, >1 = repetidas
  FOREIGN KEY (seccion_id) REFERENCES secciones(id) ON DELETE CASCADE,
  UNIQUE KEY uq_seccion_numero (seccion_id, numero)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 3. Inserción de Secciones Especiales
INSERT INTO secciones (tipo, nombre, simbolo, total_estampas, orden) VALUES
('especial', 'FWC', 'FWC', 19, 1),
('especial', 'Coca Cola', 'CC', 14, 2),
('especial', 'Especial', '00', 1, 3);

-- 4. Inserción de las 48 Selecciones
INSERT INTO secciones (tipo, nombre, simbolo, total_estampas, orden) VALUES
('seleccion', 'México', 'MEX', 20, 10), ('seleccion', 'Sudáfrica', 'RSA', 20, 11),
('seleccion', 'Corea del Sur', 'KOR', 20, 12), ('seleccion', 'República Checa', 'CZE', 20, 13),
('seleccion', 'Canadá', 'CAN', 20, 14), ('seleccion', 'Bosnia', 'BIH', 20, 15),
('seleccion', 'Catar', 'QAT', 20, 16), ('seleccion', 'Suiza', 'SUI', 20, 17),
('seleccion', 'Brasil', 'BRA', 20, 18), ('seleccion', 'Marruecos', 'MAR', 20, 19),
('seleccion', 'Haití', 'HAI', 20, 20), ('seleccion', 'Escocia', 'SCO', 20, 21),
('seleccion', 'EUA', 'USA', 20, 22), ('seleccion', 'Paraguay', 'PAR', 20, 23),
('seleccion', 'Australia', 'AUS', 20, 24), ('seleccion', 'Turquía', 'TUR', 20, 25),
('seleccion', 'Alemania', 'GER', 20, 26), ('seleccion', 'Curazao', 'CUW', 20, 27),
('seleccion', 'Costa de Marfil', 'CIV', 20, 28), ('seleccion', 'Ecuador', 'ECU', 20, 29),
('seleccion', 'Países Bajos', 'NED', 20, 30), ('seleccion', 'Japón', 'JPN', 20, 31),
('seleccion', 'Suecia', 'SWE', 20, 32), ('seleccion', 'Túnez', 'TUN', 20, 33),
('seleccion', 'Bélgica', 'BEL', 20, 34), ('seleccion', 'Egipto', 'EGY', 20, 35),
('seleccion', 'Irán', 'IRN', 20, 36), ('seleccion', 'Nueva Zelanda', 'NZL', 20, 37),
('seleccion', 'España', 'ESP', 20, 38), ('seleccion', 'Cabo Verde', 'CPV', 20, 39),
('seleccion', 'Arabia Saudita', 'KSA', 20, 40), ('seleccion', 'Uruguay', 'URU', 20, 41),
('seleccion', 'Francia', 'FRA', 20, 42), ('seleccion', 'Senegal', 'SEN', 20, 43),
('seleccion', 'Irak', 'IRQ', 20, 44), ('seleccion', 'Noruega', 'NOR', 20, 45),
('seleccion', 'Argentina', 'ARG', 20, 46), ('seleccion', 'Argelia', 'ALG', 20, 47),
('seleccion', 'Austria', 'AUT', 20, 48), ('seleccion', 'Jordania', 'JOR', 20, 49),
('seleccion', 'Portugal', 'POR', 20, 50), ('seleccion', 'RD Congo', 'COD', 20, 51),
('seleccion', 'Uzbekistán', 'UZB', 20, 52), ('seleccion', 'Colombia', 'COL', 20, 53),
('seleccion', 'Inglaterra', 'ENG', 20, 54), ('seleccion', 'Croacia', 'CRO', 20, 55),
('seleccion', 'Ghana', 'GHA', 20, 56), ('seleccion', 'Panamá', 'PAN', 20, 57);

-- 5. Generación Automática de todas las Estampas (Vacías)

-- Estampas FWC (1-19)
INSERT INTO estampas (seccion_id, numero) 
SELECT id, n FROM secciones, 
(SELECT 1 n UNION SELECT 2 UNION SELECT 3 UNION SELECT 4 UNION SELECT 5 UNION SELECT 6 UNION SELECT 7 UNION SELECT 8 UNION SELECT 9 UNION SELECT 10 UNION SELECT 11 UNION SELECT 12 UNION SELECT 13 UNION SELECT 14 UNION SELECT 15 UNION SELECT 16 UNION SELECT 17 UNION SELECT 18 UNION SELECT 19) nums 
WHERE nombre = 'FWC';

-- Estampas Coca Cola (1-14)
INSERT INTO estampas (seccion_id, numero) 
SELECT id, n FROM secciones, 
(SELECT 1 n UNION SELECT 2 UNION SELECT 3 UNION SELECT 4 UNION SELECT 5 UNION SELECT 6 UNION SELECT 7 UNION SELECT 8 UNION SELECT 9 UNION SELECT 10 UNION SELECT 11 UNION SELECT 12 UNION SELECT 13 UNION SELECT 14) nums 
WHERE nombre = 'Coca Cola';

-- Estampa Especial (0)
INSERT INTO estampas (seccion_id, numero) 
SELECT id, 0 FROM secciones WHERE nombre = 'Especial';

-- Estampas para todas las Selecciones (1-20)
INSERT INTO estampas (seccion_id, numero) 
SELECT id, n FROM secciones, 
(SELECT 1 n UNION SELECT 2 UNION SELECT 3 UNION SELECT 4 UNION SELECT 5 UNION SELECT 6 UNION SELECT 7 UNION SELECT 8 UNION SELECT 9 UNION SELECT 10 UNION SELECT 11 UNION SELECT 12 UNION SELECT 13 UNION SELECT 14 UNION SELECT 15 UNION SELECT 16 UNION SELECT 17 UNION SELECT 18 UNION SELECT 19 UNION SELECT 20) nums 
WHERE tipo = 'seleccion';