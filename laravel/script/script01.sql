
CREATE TABLE cnt_modalidades(
mdl_id serial PRIMARY KEY,
mdl_descripcion char (100) null,
mdl_sigla char (30) null,
mdl_cuantia int not null,
mdl_registrado timestamp DEFAULT now(),
mdl_modificado timestamp DEFAULT now(),
mdl_usuario_id integer not null,
mdl_estado char (1) NOT NULL DEFAULT 'A',
FOREIGN KEY(mdl_usuario_id) REFERENCES _bp_usuarios(usr_id)
);

INSERT INTO  cnt_modalidades (mdl_descripcion, mdl_sigla, mdl_cuantia, mdl_usuario_id) 
VALUES ('Contratacion menor','CM',20000,1),
('Apoyo nacional a la produccion y empleo','ANPE',20000,1),
('Contratacion por excepcion','CE',20000,1),
('Contratacion directa de bienes y servicios','CD',20000,1),
('Contrataciones en el extranjero','CEXT',20000,1),
('Auditoria ee ff','AUD',20000,1),
('Licitacion publica','LP',20000,1);

CREATE TABLE cnt_unidades_solicitantes(
uns_id serial PRIMARY KEY,
uns_descripcion char (100) null,
uns_sigla char (30) null,
uns_registrado timestamp DEFAULT now(),
uns_modificado timestamp DEFAULT now(),
uns_usuario_id integer not null,
uns_estado char (1) NOT NULL DEFAULT 'A',
FOREIGN KEY(uns_usuario_id) REFERENCES _bp_usuarios(usr_id)
);

INSERT INTO  cnt_unidades_solicitantes(uns_descripcion, uns_sigla, uns_usuario_id) VALUES ('direccion de administracion y finanzas','daf',1);

CREATE TABLE cnt_partidas_presupuestarias(
prt_id serial PRIMARY KEY,
prt_partida_presupuestaria char (100) null,
prt_nombre_partida char (100) null,
prt_registrado timestamp DEFAULT now(),
prt_modificado timestamp DEFAULT now(),
prt_usuario_id integer not null,
prt_estado char (1) NOT NULL DEFAULT 'A',
FOREIGN KEY(prt_usuario_id) REFERENCES _bp_usuarios(usr_id)
);

INSERT INTO  cnt_partidas_presupuestarias (prt_partida_presupuestaria, prt_nombre_partida,prt_usuario_id) 
VALUES ('25220','Consultores individuales de línea',1),
('23100','Alquiler de edificios',1),
('31120','Gastos por alimentación y otros similares',1),
('32200','Productos de artes gráficas',1);

CREATE TABLE cnt_tipos_contratacion(
tpc_id serial PRIMARY KEY,
tpc_descripcion char (30) null,
tpc_registrado timestamp DEFAULT now(),
tpc_modificado timestamp DEFAULT now(),
tpc_usuario_id integer not null,
tpc_estado char (1) NOT NULL DEFAULT 'A',
FOREIGN KEY(tpc_usuario_id) REFERENCES _bp_usuarios(usr_id)
);

INSERT INTO  cnt_tipos_contratacion (tpc_descripcion,tpc_usuario_id)VALUES('bienes',1),('servicios generales',1),('consultorias',1);

CREATE TABLE cnt_proponentes_adjudicados(
prp_id_proponente_adjudicado serial PRIMARY KEY,
prp_nombre_proponente char (30) not null,
prp_personeria_juridica char (30) not null,
prp_ci char (30) null,
prp_nit char (30) null,
prp_telefono char (30) null,
prp_representante_legal char (100) null,
prp_registrado timestamp DEFAULT now(),
prp_modificado timestamp DEFAULT now(),
prp_usuario_id integer not null,
prp_estado char (1) NOT NULL DEFAULT 'A',
FOREIGN KEY(prp_usuario_id) REFERENCES _bp_usuarios(usr_id)
);

CREATE TABLE cnt_procesos_contratacion(
prc_id_proceso serial PRIMARY KEY,
prc_id_modalidad int not null,
prc_cuce char (50) not null,
prc_fecha_solicitud date not null,
prc_objeto char (300) not null,
prc_id_tipo_contratacion int not null,
prc_tipo_servicio char (50) null,
prc_nro_proceso char (50) null,
prc_id_unidad_solicitante int not null,
prc_nro_certificacion_pres char (40) not null,
prc_precio_referencial numeric not null,
prc_id_encargado int,
prc_fecha_autorizacion date not null,
prc_fecha_publicacion date not null,
prc_fecha_presentacion date not null,
prc_fecha_reg_sicoes date not null,
prc_estado_proceso char (30) not null,
prc_registrado timestamp DEFAULT now(),
prc_modificado timestamp DEFAULT now(),
prc_usuario_id integer not null,
prc_estado char (1) NOT NULL DEFAULT 'A',
FOREIGN KEY(prc_id_encargado) REFERENCES _bp_usuarios(usr_id),
FOREIGN KEY(prc_usuario_id) REFERENCES _bp_usuarios(usr_id)
);

ALTER TABLE cnt_procesos_contratacion
ADD CONSTRAINT fk_procesos_contratacion FOREIGN KEY(prc_id_encargado)
REFERENCES _bp_personas (prs_id)
ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE cnt_procesos_contratacion
ADD CONSTRAINT fk_procesos_contratacion1 FOREIGN KEY(prc_id_tipo_contratacion)
REFERENCES cnt_tipos_contratacion (tpc_id)
ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE cnt_procesos_contratacion
ADD CONSTRAINT fk_procesos_contratacion2 FOREIGN KEY(prc_id_unidad_solicitante)
REFERENCES cnt_unidades_solicitantes (uns_id)
ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE cnt_procesos_contratacion
ADD CONSTRAINT fk_procesos_contratacion3 FOREIGN KEY(prc_id_modalidad)
REFERENCES cnt_modalidades (mdl_id
)
ON DELETE RESTRICT ON UPDATE RESTRICT;

CREATE TABLE cnt_convocatorias(
cnv_id serial PRIMARY KEY,
cnv_id_contratacion int null,
cnv_numero char (50) not null,
cnv_fecha_publicacion date not null,
cnv_fecha_limite date not null,
cnv_url_imagen char (255) null,
cnv_url_dbc char (255) null,
cnv_estado_convocatoria char (50) not null,
cnv_registrado timestamp DEFAULT now(),
cnv_modificado timestamp DEFAULT now(),
cnv_usuario_id integer not null,
cnv_estado char (1) NOT NULL DEFAULT 'A',
FOREIGN KEY(cnv_usuario_id) REFERENCES _bp_usuarios(usr_id)
);

ALTER TABLE cnt_convocatorias
ADD CONSTRAINT fk_convocatorias FOREIGN KEY(cnv_id_contratacion)
REFERENCES cnt_procesos_contratacion (prc_id_proceso)
ON DELETE RESTRICT ON UPDATE RESTRICT;

CREATE TABLE cnt_resoluciones(
res_id serial PRIMARY KEY,
res_id_contratacion int null,
res_cite char (100) not null,
res_fecha_resolucion date not null,
res_fecha_vigencia date not null,
res_tipo char (50) not null,
res_url_documento char (255) null,
res_registrado timestamp DEFAULT now(),
res_modificado timestamp DEFAULT now(),
res_usuario_id integer not null,
res_estado char (1) NOT NULL DEFAULT 'A',
FOREIGN KEY(res_usuario_id) REFERENCES _bp_usuarios(usr_id)
);

ALTER TABLE cnt_resoluciones
ADD CONSTRAINT fk_resoluciones FOREIGN KEY(res_id_contratacion)
REFERENCES cnt_procesos_contratacion (prc_id_proceso)
ON DELETE RESTRICT ON UPDATE RESTRICT;

CREATE TABLE cnt_contratos( 
cnt_id serial PRIMARY KEY,
cnt_id_contratacion int null,
cnt_cite char (100) not null,
cnt_fecha_contrato date not null,
cnt_fecha_inicio date null,
cnt_fecha_fin date null,
cnt_tipo char (50) not null,
cnt_registrado timestamp DEFAULT now(),
cnt_modificado timestamp DEFAULT now(),
cnt_usuario_id integer not null,
cnt_estado char (1) NOT NULL DEFAULT 'A',
FOREIGN KEY(cnt_usuario_id) REFERENCES _bp_usuarios(usr_id)
);

ALTER TABLE cnt_contratos
ADD CONSTRAINT fk_contratos FOREIGN KEY(cnt_id_contratacion)
REFERENCES cnt_procesos_contratacion (prc_id_proceso)
ON DELETE RESTRICT ON UPDATE RESTRICT;

CREATE TABLE cnt_proponentes_procesos( 
prpp_id serial PRIMARY KEY,
prpp_id_proponente int null,
prpp_id_proceso int null,
prpp_registrado timestamp DEFAULT now(),
prpp_modificado timestamp DEFAULT now(),
prpp_usuario_id integer not null,
prpp_estado char (1) NOT NULL DEFAULT 'A',
FOREIGN KEY(prpp_usuario_id) REFERENCES _bp_usuarios(usr_id)
);

ALTER TABLE cnt_proponentes_procesos
ADD CONSTRAINT fk_proponentes_procesos FOREIGN KEY(prpp_id_proponente)
REFERENCES cnt_proponentes_adjudicados (prp_id_proponente_adjudicado)
ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE cnt_proponentes_procesos
ADD CONSTRAINT fk_proponentes_procesos1 FOREIGN KEY(prpp_id_proceso)
REFERENCES cnt_procesos_contratacion (prc_id_proceso)
ON DELETE RESTRICT ON UPDATE RESTRICT;

CREATE TABLE cnt_partidas_procesos( 
prtp_id serial PRIMARY KEY,
prtp_id_partida int null,
prtp_id_proceso int null,
prtp_registrado timestamp DEFAULT now(),
prtp_modificado timestamp DEFAULT now(),
prtp_usuario_id integer not null,
prtp_estado char (1) NOT NULL DEFAULT 'A',
FOREIGN KEY(prtp_usuario_id) REFERENCES _bp_usuarios(usr_id)
);

ALTER TABLE cnt_partidas_procesos
ADD CONSTRAINT fk_partidas_procesos FOREIGN KEY(prtp_id_partida)
REFERENCES cnt_partidas_presupuestarias (prt_id)
ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE cnt_partidas_procesos
ADD CONSTRAINT fk_partidas_procesos1 FOREIGN KEY(prtp_id_proceso)
REFERENCES cnt_procesos_contratacion (prc_id_proceso)
ON DELETE RESTRICT ON UPDATE RESTRICT;

CREATE TABLE cnt_miembros_calificacion( 
mbc_id serial PRIMARY KEY,
mbc_id_persona int not null,
mbc_id_proceso int not null,
mbc_memo char(50) not null,
mbc_fecha_memo date not null,
mbc_registrado timestamp DEFAULT now(),
mbc_modificado timestamp DEFAULT now(),
mbc_usuario_id integer not null,
mbc_estado char (1) NOT NULL DEFAULT 'A',
FOREIGN KEY(mbc_usuario_id) REFERENCES _bp_usuarios(usr_id)
);

ALTER TABLE cnt_miembros_calificacion
ADD CONSTRAINT fk_miembros_calificacion FOREIGN KEY(mbc_id_persona)
REFERENCES _bp_personas (prs_id)
ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE cnt_miembros_calificacion
ADD CONSTRAINT fk_miembros_calificacion1 FOREIGN KEY(mbc_id_proceso)
REFERENCES cnt_procesos_contratacion (prc_id_proceso)
ON DELETE RESTRICT ON UPDATE RESTRICT;

CREATE TABLE cnt_miembros_recepcion( 
mbr_id serial PRIMARY KEY,
mbr_id_persona int not null,
mbr_id_proceso int not null,
mbr_memo char(50) not null,
mbr_fecha_memo date not null,
mbr_registrado timestamp DEFAULT now(),
mbr_modificado timestamp DEFAULT now(),
mbr_usuario_id integer not null,
mbr_estado char (1) NOT NULL DEFAULT 'A',
FOREIGN KEY(mbr_usuario_id) REFERENCES _bp_usuarios(usr_id)
);

ALTER TABLE cnt_miembros_recepcion
ADD CONSTRAINT fk_miembros_recepcion FOREIGN KEY(mbr_id_persona)
REFERENCES _bp_personas (prs_id)
ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE cnt_miembros_recepcion
ADD CONSTRAINT fk_miembros_recepcion1 FOREIGN KEY(mbr_id_proceso)
REFERENCES cnt_procesos_contratacion (prc_id_proceso)
ON DELETE RESTRICT ON UPDATE RESTRICT;
