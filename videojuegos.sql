CREATE TABLE personal(
	id_personal int(10) PRIMARY KEY AUTO_INCREMENT,
	nombre varchar(100) NOT NULL
	);
CREATE TABLE tipo_usuario(
	id_tipo int(10) PRIMARY KEY AUTO_INCREMENT,
	tipo varchar(100) NOT NULL
);
CREATE TABLE usuarios(
	id_usuario int(10) PRIMARY KEY AUTO_INCREMENT,
	nombre_usuario varchar(100) NOT NULL,
	password varchar(20) NOT NULL,
	id_personal int(10) NOT NULL,
	id_tipo int(10) NOT NULL
);

CREATE TABLE videojuegos(
	id_videojuego int(10) PRIMARY KEY AUTO_INCREMENT,
	nombre_videojuego varchar(100) NOT NULL,
	precio float NOT NULL,
	categoria varchar(100) NOT NULL
);

CREATE TABLE pedidos(
	id_pedido int(10) PRIMARY KEY AUTO_INCREMENT,
	id_usuario int(10) NOT NULL,
	id_videojuego int(10) NOT NULL,
	cantidad int(10) NOT NULL,
	total float NOT NULL,
	CONSTRAINT fk_id_usuario FOREIGN KEY(id_usuario)
	REFERENCES usuarios(id_usuario) ON DELETE CASCADE,
	CONSTRAINT fk_id_videojuego FOREIGN KEY(id_videojuego)
	REFERENCES videojuegos(id_videojuego) ON DELETE CASCADE

);




