CREATE TABLE _bp_estados_civiles (
	estcivil_id serial PRIMARY KEY,
	estcivil text not null,
	estcivil_registrado timestamp NOT NULL DEFAULT now(),
	estcivil_modificado timestamp NOT NULL DEFAULT now(),
	estcivil_usr_id integer NOT NULL,
	estcivil_estado char(1) NOT NULL DEFAULT 'A'
);
INSERT INTO _bp_estados_civiles (estcivil, estcivil_usr_id, estcivil_estado) VALUES 
                                ('Soltero/a', 1, 'A'),
								('Casado/a', 1, 'A'),
								('Divorciado/a', 1, 'A'),
								('Viudo/a', 1, 'A'),
								('Prs. Jurídica', 1, 'A');
CREATE TABLE _bp_personas (
	prs_id serial PRIMARY KEY,
	prs_id_estado_civil integer NOT NULL,
	prs_id_archivo_cv integer,
	prs_ci text NOT NULL,
	prs_nombres text NOT NULL,
	prs_paterno text NOT NULL,
	prs_materno text NOT NULL,
	prs_direccion text NOT NULL,
	prs_direccion2 text DEFAULT '',
	prs_telefono text DEFAULT '',
	prs_telefono2 text DEFAULT '',
	prs_celular text DEFAULT '',
	prs_empresa_telefonica text DEFAULT '',
	prs_correo text DEFAULT '',
	prs_sexo char(1) DEFAULT 'F',
	prs_fec_nacimiento date NOT NULL,
	prs_registrado timestamp NOT NULL DEFAULT now(),
	prs_modificado timestamp NOT NULL DEFAULT now(),
	prs_usr_id integer NOT NULL,
	prs_estado char(1) NOT NULL DEFAULT 'A',
	FOREIGN KEY(prs_id_estado_civil) REFERENCES _bp_estados_civiles(estcivil_id)
	

);

INSERT INTO _bp_personas (prs_id_estado_civil, prs_id_archivo_cv, prs_ci, prs_nombres, prs_paterno, prs_materno, prs_direccion, prs_direccion2, prs_telefono, prs_telefono2, prs_celular,prs_empresa_telefonica, prs_correo, prs_sexo, prs_fec_nacimiento, prs_usr_id, prs_estado) 
VALUES (1, 0, 1, 'Administrador', 'Admin', 'Admin', '', '', '', '', '', '', '', 'M', '2016-01-01', 1, 'A');
INSERT INTO _bp_personas (prs_id_estado_civil, prs_id_archivo_cv, prs_ci, prs_nombres, prs_paterno, prs_materno, prs_direccion, prs_direccion2, prs_telefono, prs_telefono2, prs_celular,prs_empresa_telefonica, prs_correo, prs_sexo, prs_fec_nacimiento, prs_usr_id, prs_estado) 
VALUES (1, 0, 1, 'Alvaro', 'Duran', 'Sanchez', '', '', '', '', '', '', '', 'M', '2016-01-01', 1, 'A');
INSERT INTO _bp_personas (prs_id_estado_civil, prs_id_archivo_cv, prs_ci, prs_nombres, prs_paterno, prs_materno, prs_direccion, prs_direccion2, prs_telefono, prs_telefono2, prs_celular,prs_empresa_telefonica, prs_correo, prs_sexo, prs_fec_nacimiento, prs_usr_id, prs_estado) 
VALUES (1, 0, 1, 'ciudadano', 'ciudadano', 'ciudadano', '', '', '', '', '', '', '', 'M', '2015-01-01', 1, 'A');




CREATE TABLE _bp_usuarios (
	usr_id serial PRIMARY KEY,
	usr_prs_id integer NOT NULL DEFAULT '1',
	usr_usuario text NOT NULL,
	usr_clave text NOT NULL,
	usr_controlar_ip char(1) NOT NULL DEFAULT 'S',
	usr_encargado_procesos char(2) NOT NULL DEFAULT 'NO',
	usr_registrado timestamp NOT NULL DEFAULT now(),
	usr_modificado timestamp NOT NULL DEFAULT now(),
	usr_usr_id integer NOT NULL,
	usr_estado char(1) NOT NULL DEFAULT 'A',
	FOREIGN KEY(usr_prs_id) REFERENCES _bp_personas(prs_id)
);

INSERT INTO _bp_usuarios (usr_prs_id, usr_usuario, usr_clave, usr_controlar_ip,usr_encargado_procesos, usr_usr_id, usr_estado) 
VALUES ( 1, 'admin', 'admin', 'N', 'SI',1, 'A');
INSERT INTO _bp_usuarios (usr_prs_id, usr_usuario, usr_clave, usr_controlar_ip,usr_encargado_procesos, usr_usr_id, usr_estado)
VALUES ( 1, 'alvaro.duran', '123', 'N','SI', 1, 'A');
INSERT INTO _bp_usuarios (usr_prs_id, usr_usuario, usr_clave, usr_controlar_ip,usr_encargado_procesos, usr_usr_id, usr_estado)
VALUES ( 1, 'ciudadano', '123', 'N','NO', 1, 'A');

CREATE TABLE _bp_roles(
	rls_id serial PRIMARY KEY,
	rls_rol text NOT NULL,
	rls_registrado timestamp NOT NULL DEFAULT now(),
	rls_modificado timestamp NOT NULL DEFAULT now(),
	rls_usr_id integer NOT NULL,
	rls_estado char(1) NOT NULL DEFAULT 'A'
);

INSERT INTO _bp_roles (rls_rol, rls_usr_id, rls_estado) 
VALUES ('Super Usuario', 1, 'A');
INSERT INTO _bp_roles (rls_rol, rls_usr_id, rls_estado) 
VALUES ('Encargado de Proceso', 1, 'A');
INSERT INTO _bp_roles (rls_rol, rls_usr_id, rls_estado) 
VALUES ('Ciudadano', 1, 'A');




CREATE TABLE _bp_grupos(
	grp_id serial PRIMARY KEY,
	grp_grupo text NOT NULL,
	grp_imagen text DEFAULT '',
	grp_registrado timestamp NOT NULL DEFAULT now(),
	grp_modificado timestamp NOT NULL DEFAULT now(),
	grp_usr_id integer NOT NULL,
	grp_estado char(1) NOT NULL DEFAULT 'A'

);


INSERT INTO _bp_grupos (grp_grupo, grp_imagen, grp_usr_id, grp_estado) VALUES ('SEGURIDAD', '', 1, 'A');
INSERT INTO _bp_grupos (grp_grupo, grp_imagen, grp_usr_id, grp_estado) VALUES ('MONITOREO', '', 1, 'A');
INSERT INTO _bp_grupos (grp_grupo, grp_imagen, grp_usr_id, grp_estado) VALUES ('AREA PERSONAL', '', 1, 'A');



CREATE TABLE _bp_opciones(
	opc_id serial PRIMARY KEY,
	opc_grp_id integer NOT NULL,
	opc_opcion text NOT NULL,
	opc_contenido text DEFAULT '',
	opc_adicional text DEFAULT '',
	opc_orden integer,
	opc_imagen text DEFAULT '',
	opc_registrado timestamp NOT NULL DEFAULT now(),
	opc_modificado timestamp NOT NULL DEFAULT now(),
	opc_usr_id integer NOT NULL,
	opc_estado char(1) NOT NULL DEFAULT 'A',
	FOREIGN KEY(opc_grp_id) REFERENCES _bp_grupos(grp_id)
);

                                                                 
 INSERT INTO _bp_opciones (opc_grp_id, opc_opcion, opc_contenido, opc_adicional, opc_orden, opc_imagen, opc_usr_id, opc_estado) VALUES (1, 'Personas', 'Persona', '', 20, '', 1, 'A');
 INSERT INTO _bp_opciones (opc_grp_id, opc_opcion, opc_contenido, opc_adicional, opc_orden, opc_imagen, opc_usr_id, opc_estado) VALUES (1, 'Usuarios', 'Usuario', '', 30, '', 1, 'A');
 INSERT INTO _bp_opciones (opc_grp_id, opc_opcion, opc_contenido, opc_adicional, opc_orden, opc_imagen, opc_usr_id, opc_estado) VALUES (1, 'Roles', 'Rol', '', 30, '', 1, 'A');
 INSERT INTO _bp_opciones (opc_grp_id, opc_opcion, opc_contenido, opc_adicional, opc_orden, opc_imagen, opc_usr_id, opc_estado) VALUES (1, 'UsuariosRoles', 'Usuario', '', 30, '', 1, 'A');
 INSERT INTO _bp_opciones (opc_grp_id, opc_opcion, opc_contenido, opc_adicional, opc_orden, opc_imagen, opc_usr_id, opc_estado) VALUES (1, 'Grupos', 'Grupo', '', 30, '', 1, 'A');
 INSERT INTO _bp_opciones (opc_grp_id, opc_opcion, opc_contenido, opc_adicional, opc_orden, opc_imagen, opc_usr_id, opc_estado) VALUES (1, 'Opciones', 'Opcion', '', 30, '', 1, 'A');
 INSERT INTO _bp_opciones (opc_grp_id, opc_opcion, opc_contenido, opc_adicional, opc_orden, opc_imagen, opc_usr_id, opc_estado) VALUES (1, 'Accesos', 'Acceso', '', 30, '', 1, 'A');
                    
INSERT INTO _bp_opciones (opc_grp_id, opc_opcion, opc_contenido, opc_adicional, opc_orden, opc_imagen, opc_usr_id, opc_estado) VALUES (2, 'Registro Ciudadano', 'Persona', '', 10, '', 1, 'A');
INSERT INTO _bp_opciones (opc_grp_id, opc_opcion, opc_contenido, opc_adicional, opc_orden, opc_imagen, opc_usr_id, opc_estado) VALUES (3, 'Actualización de datos personales', 'Persona', '', 10, '', 1, 'A');
INSERT INTO _bp_opciones (opc_grp_id, opc_opcion, opc_contenido, opc_adicional, opc_orden, opc_imagen, opc_usr_id, opc_estado) VALUES (3, 'Cambio de Pin', 'Usuario', '', 10, '', 1, 'A');
INSERT INTO _bp_opciones (opc_grp_id, opc_opcion, opc_contenido, opc_adicional, opc_orden, opc_imagen, opc_usr_id, opc_estado) VALUES (3, 'Registro Medico', 'Usuario', '', 10, '', 1, 'A');




CREATE TABLE _bp_accesos(
	acc_id serial PRIMARY KEY,
	acc_opc_id integer NOT NULL,
	acc_rls_id integer NOT NULL,
	acc_registrado timestamp NOT NULL DEFAULT now(),
	acc_modificado timestamp NOT NULL DEFAULT now(),
	acc_usr_id integer NOT NULL,
	acc_estado char(1) NOT NULL DEFAULT 'A',
	FOREIGN KEY(acc_opc_id) REFERENCES _bp_opciones(opc_id),
	FOREIGN KEY(acc_rls_id) REFERENCES _bp_roles(rls_id)
);

INSERT INTO _bp_accesos (acc_opc_id, acc_rls_id, acc_usr_id, acc_estado) VALUES (1, 1, 1, 'A');
INSERT INTO _bp_accesos (acc_opc_id, acc_rls_id, acc_usr_id, acc_estado) VALUES (2, 1, 1, 'A');
INSERT INTO _bp_accesos (acc_opc_id, acc_rls_id, acc_usr_id, acc_estado) VALUES (3, 1, 1, 'A');
INSERT INTO _bp_accesos (acc_opc_id, acc_rls_id, acc_usr_id, acc_estado) VALUES (4, 1, 1, 'A');
INSERT INTO _bp_accesos (acc_opc_id, acc_rls_id, acc_usr_id, acc_estado) VALUES (5, 1, 1, 'A');
INSERT INTO _bp_accesos (acc_opc_id, acc_rls_id, acc_usr_id, acc_estado) VALUES (6, 1, 1, 'A');
INSERT INTO _bp_accesos (acc_opc_id, acc_rls_id, acc_usr_id, acc_estado) VALUES (7, 1, 1, 'A');
INSERT INTO _bp_accesos (acc_opc_id, acc_rls_id, acc_usr_id, acc_estado) VALUES (8, 1, 1, 'A');
INSERT INTO _bp_accesos (acc_opc_id, acc_rls_id, acc_usr_id, acc_estado) VALUES (8, 3, 1, 'A');




CREATE TABLE _bp_usuarios_roles (
	usrls_id serial PRIMARY KEY,
	usrls_usr_id integer NOT NULL,
	usrls_rls_id integer NOT NULL,
	usrls_registrado timestamp NOT NULL DEFAULT now(),
	usrls_modificado timestamp NOT NULL DEFAULT now(),
	usrls_usuarios_usr_id integer NOT NULL,
	usrls_estado char(1) NOT NULL DEFAULT 'A',
	FOREIGN KEY(usrls_usr_id) REFERENCES _bp_usuarios(usr_id),
	FOREIGN KEY(usrls_rls_id) REFERENCES _bp_roles(rls_id)
);

INSERT INTO _bp_usuarios_roles (usrls_usr_id, usrls_rls_id, usrls_usuarios_usr_id, usrls_estado) VALUES (1, 1, 1, 'A');
INSERT INTO _bp_usuarios_roles (usrls_usr_id, usrls_rls_id, usrls_usuarios_usr_id, usrls_estado) VALUES (2, 2, 1, 'A');
INSERT INTO _bp_usuarios_roles (usrls_usr_id, usrls_rls_id, usrls_usuarios_usr_id, usrls_estado) VALUES (3, 3, 1, 'A');






								   