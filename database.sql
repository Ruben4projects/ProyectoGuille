CREATE DATABASE IF NOT EXISTS tfg2018;
USE tfg2018;

CREATE TABLE users(

	id 	int(255) auto_increment not null,
	role varchar(20) not null,
	name varchar(255) not null,
	surname varchar(255) not null,
	email varchar(255) not null,
	password varchar(255) not null,
	image varchar(255),
	created_at datetime,
	updated_at datetime,
	remember_token varchar(255),
	CONSTRAINT pk_users PRIMARY KEY(id)  
	 -- pk=primary key

)ENGINE = InnoDb;


CREATE TABLE rutinas(

	id 	int(255) auto_increment not null,
	user_id int(255) not null,
	nombre varchar(255) not null,
	sexo varchar(255) not null,
	tipo varchar(255) not null,
	nivel varchar(255) not null,
	descripcion text,
	puntuacion int(255),
	created_at datetime, 
	updated_at datetime,

	CONSTRAINT pk_rutinas PRIMARY KEY(id),
	CONSTRAINT fk_rutinas_users FOREIGN KEY (user_id) REFERENCES users(id)
)ENGINE = InnoDb;


CREATE TABLE commentrutinas (
		id 	int(255) auto_increment not null,
		user_id int(255) not null,
		receptor_id int(255) not null,
		rutina_id int(255) not null,
		comentario text,
		created_at datetime,
		updated_at datetime,
	CONSTRAINT pk_commentrutinas PRIMARY KEY(id),
	CONSTRAINT fk_commentrutinas_users FOREIGN KEY (user_id) REFERENCES users(id),
	CONSTRAINT fk_commentrutinasr_users FOREIGN KEY (receptor_id) REFERENCES users(id),
	CONSTRAINT fk_commentrutinas_rutinas FOREIGN KEY (rutina_id) REFERENCES rutinas(id)

)ENGINE = InnoDb;

CREATE TABLE ejercicios (
		id 	int(255) auto_increment not null,
		nombre varchar(255) not null,
		musculo_id int(255) not null,
		created_at datetime,
		updated_at datetime,
	CONSTRAINT pk_ejercicios PRIMARY KEY(id),
	CONSTRAINT fk_ejercicios_musculos FOREIGN KEY (musculo_id) REFERENCES musculos(id)


	
)ENGINE = InnoDb;

CREATE TABLE musculos (
		id 	int(255) auto_increment not null,
		nombre varchar(255),
		created_at datetime,
		updated_at datetime,
	CONSTRAINT pk_musculos PRIMARY KEY(id)
	
)ENGINE = InnoDb;

CREATE TABLE rutinasmusculo (
		id 	int(255) auto_increment not null,
		musculo_id int(255)  not null,
		rutina_id int(255) not null,
        ejercicio varchar(255) not null,
        cantidad varchar(255) not null,
		created_at datetime,
		updated_at datetime,

		
	CONSTRAINT pk_rutinasmusculo PRIMARY KEY(id),
	CONSTRAINT fk_rutinasmusculo_musculos FOREIGN KEY (musculo_id) REFERENCES musculos(id),
	CONSTRAINT fk_rutinasmusculo_rutinas FOREIGN KEY (rutina_id) REFERENCES rutinas(id),
	

)ENGINE = InnoDb;


CREATE TABLE dietas(

	id 	int(255) auto_increment not null,
	user_id int(255) not null,
	nombre varchar(255) not null,
	tipo varchar(255) not null,
	desayuno text,
	almuerzo text,
	comida text,
	merienda text,
	cena text,
	extra text,
	puntuacion int(255),
	created_at datetime,
	updated_at datetime,

	CONSTRAINT pk_dietas PRIMARY KEY(id),
	CONSTRAINT fk_dietas_users FOREIGN KEY (user_id) REFERENCES users(id)
)ENGINE = InnoDb;

CREATE TABLE commentdietas (
		id 	int(255) auto_increment not null,
		user_id int(255) not null,
		receptor_id int(255) not null,
		dieta_id int(255) not null,
		comentario text,
		created_at datetime,
		updated_at datetime,
	CONSTRAINT pk_commentdietas PRIMARY KEY(id),
	CONSTRAINT fk_commentdietas_users FOREIGN KEY (user_id) REFERENCES users(id),
    CONSTRAINT fk_commentdietasr_users FOREIGN KEY (receptor_id) REFERENCES users(id),
	CONSTRAINT fk_commentdietas_dietas FOREIGN KEY (dieta_id) REFERENCES dietas(id)

)ENGINE = InnoDb;



CREATE TABLE nutricion(

	id 	int(255) auto_increment not null,
	user_id int(255) not null,
	nombre varchar(255) not null,
	tipo varchar(255) not null,
	image varchar(255),
	descripcion text,
	puntuacion int(255),
	created_at datetime,
	updated_at datetime,

	CONSTRAINT pk_nutricion PRIMARY KEY(id),
	CONSTRAINT fk_nutricion_users FOREIGN KEY (user_id) REFERENCES users(id)
)ENGINE = InnoDb;

CREATE TABLE commentnutricion (
		id 	int(255) auto_increment not null,
		user_id int(255) not null,
		receptor_id int(255) not null,
		nutricion_id int(255) not null,
		comentario text,
		created_at datetime,
		updated_at datetime,
	CONSTRAINT pk_commentnutricion PRIMARY KEY(id),
	CONSTRAINT fk_commentnutricion_users FOREIGN KEY (user_id) REFERENCES users(id),
	CONSTRAINT fk_commentnutricionr_users FOREIGN KEY (receptor_id) REFERENCES users(id),
	CONSTRAINT fk_commentnutricion_dietas FOREIGN KEY (nutricion_id) REFERENCES nutricion(id)

)ENGINE = InnoDb;

CREATE TABLE likesnutricion (
		id 	int(255) auto_increment not null,
		user_id int(255) not null,
		nutricion_id int(255) not null,
		created_at datetime,
		updated_at datetime,
	CONSTRAINT pk_commentnutricion PRIMARY KEY(id),
	CONSTRAINT fk_likesnutricion_users FOREIGN KEY (user_id) REFERENCES users(id),	
	CONSTRAINT fk_likesnutricion_receta FOREIGN KEY (nutricion_id) REFERENCES nutricion(id)

)ENGINE = InnoDb;

CREATE TABLE likesdietas (
		id 	int(255) auto_increment not null,
		user_id int(255) not null,
		dieta_id int(255) not null,
		created_at datetime,
		updated_at datetime,
	CONSTRAINT pk_likesdietas PRIMARY KEY(id),
	CONSTRAINT fk_likesdietas_users FOREIGN KEY (user_id) REFERENCES users(id),	
	CONSTRAINT fk_likesdietas_dietas FOREIGN KEY (dieta_id) REFERENCES dietas(id)

)ENGINE = InnoDb;

CREATE TABLE likesrutinas (
		id 	int(255) auto_increment not null,
		user_id int(255) not null,
		rutina_id int(255) not null,
		created_at datetime,
		updated_at datetime,
	CONSTRAINT pk_likesrutinas PRIMARY KEY(id),
	CONSTRAINT fk_likesrutinas_users FOREIGN KEY (user_id) REFERENCES users(id),	
	CONSTRAINT fk_likesrutinas_rutinas FOREIGN KEY (rutina_id) REFERENCES rutinas(id)

)ENGINE = InnoDb;
