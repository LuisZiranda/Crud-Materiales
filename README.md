Para funcionar se debe crear primero la siguiente BD, las instrucciones son las siguientes y modificar el archivo de conexion

CREATE DATABASE IF NOT EXISTS constructionmaterials;
USE constructionmaterials;
CREATE TABLE materials (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(200) NOT NULL,
    unit VARCHAR(200) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    stock INT UNSIGNED NOT NULL,
    totalValue DECIMAL(12,2) NOT NULL
);
