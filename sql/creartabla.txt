CREATE TABLE `edificios`.`copropiedades` 
(`id` INT(255) NOT NULL AUTO_INCREMENT , 
`nit` VARCHAR(12) NOT NULL , 
`nombre` VARCHAR(100) NOT NULL , 
`direccion` VARCHAR(100) NOT NULL , 
`telefono` VARCHAR(10) NOT NULL , 
`ciudad` VARCHAR(20) NOT NULL , 
`iniciocontrato` DATE NOT NULL , 
PRIMARY KEY (`id`)) 
ENGINE = InnoDB;