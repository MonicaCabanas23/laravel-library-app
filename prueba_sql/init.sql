DROP TABLE IF EXISTS public.plan_operativos CASCADE;
DROP TABLE IF EXISTS public.actividads CASCADE;
DROP TABLE IF EXISTS public.responsables CASCADE;
DROP TABLE IF EXISTS public.sub_actividads CASCADE;

CREATE TABLE public.plan_operativos (
	id bigserial NOT NULL,
	anio_planificacion_id int8 NOT NULL,
	unidad_id int8 NOT NULL,
	fecha_finalizacion timestamp(0) NULL,
	aud_usuario varchar(25) NOT NULL,
	created_at timestamp(0) NULL,
	updated_at timestamp(0) NULL,
	estado_id int8 NULL,
	codigo varchar(11) NULL,
	CONSTRAINT plan_operativos_codigo_unique UNIQUE (codigo),
	CONSTRAINT plan_operativos_pkey PRIMARY KEY (id)
	--CONSTRAINT plan_operativos_anio_planificacion_id_foreign FOREIGN KEY (anio_planificacion_id) REFERENCES public.anio_planificacions(id),
	--CONSTRAINT plan_operativos_estado_id_foreign FOREIGN KEY (estado_id) REFERENCES public.estado_plan_operativos(id),
	--CONSTRAINT plan_operativos_unidad_id_foreign FOREIGN KEY (unidad_id) REFERENCES public.unidads(id)
);

CREATE TABLE public.responsables (
	id bigserial NOT NULL,
	nombre varchar(50) NOT NULL,
	apellido varchar(50) NOT NULL,
	correo varchar(50) NOT NULL,
	telefono varchar(15) NOT NULL,
	created_at timestamp(0) NULL,
	updated_at timestamp(0) NULL,
	CONSTRAINT responsables_pkey PRIMARY KEY (id)
);

CREATE TABLE public.actividads (
	id bigserial NOT NULL,
	plan_operativo_id int8 NOT NULL,
	tipo_actividad_id int8 NOT NULL,
	responsable_id int8 NOT NULL,
	mes_anio_inicio_id int8 NOT NULL,
	mes_anio_fin_id int8 NOT NULL,
	activo bool NOT NULL,
	nombre text NOT NULL,
	objetivo text NOT NULL,
	aud_usuario varchar(25) NOT NULL,
	created_at timestamp(0) NULL,
	updated_at timestamp(0) NULL,
	semestre_evaluacion int2 DEFAULT '0'::smallint NOT NULL,
	CONSTRAINT actividads_pkey PRIMARY KEY (id),
	--CONSTRAINT actividads_mes_anio_fin_id_foreign FOREIGN KEY (mes_anio_fin_id) REFERENCES public.mes_anios(id),
	--CONSTRAINT actividads_mes_anio_inicio_id_foreign FOREIGN KEY (mes_anio_inicio_id) REFERENCES public.mes_anios(id),
	CONSTRAINT actividads_plan_operativo_id_foreign FOREIGN KEY (plan_operativo_id) REFERENCES public.plan_operativos(id),
	CONSTRAINT actividads_responsable_id_foreign FOREIGN KEY (responsable_id) REFERENCES public.responsables(id)
	--CONSTRAINT actividads_tipo_actividad_id_foreign FOREIGN KEY (tipo_actividad_id) REFERENCES public.tipo_actividads(id)
);

CREATE TABLE public.sub_actividads (
	id bigserial NOT NULL,
	actividad_id int8 NOT NULL,
	responsable_id int8 NOT NULL,
	meses varchar(12) NOT NULL,
	detalle text NOT NULL,
	aud_usuario varchar(25) NOT NULL,
	created_at timestamp(0) NULL,
	updated_at timestamp(0) NULL,
	centro_costos varchar(15) NULL,
	porcentaje_avance int4 NULL,
	CONSTRAINT sub_actividads_pkey PRIMARY KEY (id),
	CONSTRAINT sub_actividads_actividad_id_foreign FOREIGN KEY (actividad_id) REFERENCES public.actividads(id),
	CONSTRAINT sub_actividads_responsable_id_foreign FOREIGN KEY (responsable_id) REFERENCES public.responsables(id)
);

INSERT INTO public.plan_operativos (anio_planificacion_id, unidad_id, fecha_finalizacion, aud_usuario, created_at, updated_at, estado_id, codigo)
VALUES 
(1, 1, '2024-12-31 23:59:59', 'usuario1', NOW(), NOW(), 1, 'COD001'),
(2, 2, '2025-12-31 23:59:59', 'usuario2', NOW(), NOW(), 2, 'COD002'),
(3, 3, '2026-12-31 23:59:59', 'usuario3', NOW(), NOW(), 3, 'COD003'),
(4, 4, '2027-12-31 23:59:59', 'usuario4', NOW(), NOW(), 4, 'COD004'),
(5, 5, '2028-12-31 23:59:59', 'usuario5', NOW(), NOW(), 5, 'COD005'),
(6, 6, '2029-12-31 23:59:59', 'usuario6', NOW(), NOW(), 6, 'COD006'),
(7, 7, '2030-12-31 23:59:59', 'usuario7', NOW(), NOW(), 7, 'COD007'),
(8, 8, '2031-12-31 23:59:59', 'usuario8', NOW(), NOW(), 8, 'COD008'),
(9, 9, '2032-12-31 23:59:59', 'usuario9', NOW(), NOW(), 9, 'COD009'),
(10, 10, '2033-12-31 23:59:59', 'usuario10', NOW(), NOW(), 10, 'COD010');


INSERT INTO public.responsables (nombre, apellido, correo, telefono, created_at, updated_at)
VALUES 
('Juan', 'Pérez', 'juan.perez@example.com', '123456789', NOW(), NOW()),
('Ana', 'Gómez', 'ana.gomez@example.com', '987654321', NOW(), NOW()),
('Carlos', 'López', 'carlos.lopez@example.com', '456123789', NOW(), NOW()),
('María', 'Fernández', 'maria.fernandez@example.com', '321654987', NOW(), NOW()),
('Pedro', 'Martínez', 'pedro.martinez@example.com', '789456123', NOW(), NOW()),
('Laura', 'Hernández', 'laura.hernandez@example.com', '654789321', NOW(), NOW()),
('Miguel', 'Rodríguez', 'miguel.rodriguez@example.com', '159753486', NOW(), NOW()),
('Lucía', 'González', 'lucia.gonzalez@example.com', '753159846', NOW(), NOW()),
('Sofía', 'Ramírez', 'sofia.ramirez@example.com', '951357462', NOW(), NOW()),
('Jorge', 'Sánchez', 'jorge.sanchez@example.com', '357951624', NOW(), NOW());


INSERT INTO public.actividads (plan_operativo_id, tipo_actividad_id, responsable_id, mes_anio_inicio_id, mes_anio_fin_id, activo, nombre, objetivo, aud_usuario, created_at, updated_at, semestre_evaluacion)
VALUES 
(1, 1, 1, 1, 12, true, 'Actividad 1', 'Objetivo 1', 'usuario1', NOW(), NOW(), 1),
(1, 2, 2, 1, 12, true, 'Actividad 2', 'Objetivo 2', 'usuario2', NOW(), NOW(), 1),
(2, 3, 3, 1, 12, true, 'Actividad 3', 'Objetivo 3', 'usuario3', NOW(), NOW(), 1),
(3, 4, 4, 1, 12, true, 'Actividad 4', 'Objetivo 4', 'usuario4', NOW(), NOW(), 1),
(4, 5, 5, 1, 12, true, 'Actividad 5', 'Objetivo 5', 'usuario5', NOW(), NOW(), 1),
(5, 6, 6, 1, 12, true, 'Actividad 6', 'Objetivo 6', 'usuario6', NOW(), NOW(), 1),
(6, 7, 7, 1, 12, true, 'Actividad 7', 'Objetivo 7', 'usuario7', NOW(), NOW(), 1),
(7, 8, 8, 1, 12, true, 'Actividad 8', 'Objetivo 8', 'usuario8', NOW(), NOW(), 1),
(8, 9, 9, 1, 12, true, 'Actividad 9', 'Objetivo 9', 'usuario9', NOW(), NOW(), 1),
(9, 10, 10, 1, 12, true, 'Actividad 10', 'Objetivo 10', 'usuario10', NOW(), NOW(), 1);

INSERT INTO public.sub_actividads (actividad_id, responsable_id, meses, detalle, aud_usuario, created_at, updated_at, centro_costos, porcentaje_avance)
VALUES 
(1, 1, 'Jan-Dec', 'Detalle 1', 'usuario1', NOW(), NOW(), 'CC001', 10),
(1, 1, 'Jan-Dec', 'Detalle 2', 'usuario2', NOW(), NOW(), 'CC002', 20),
(2, 3, 'Jan-Dec', 'Detalle 3', 'usuario3', NOW(), NOW(), 'CC003', 30),
(3, 4, 'Jan-Dec', 'Detalle 4', 'usuario4', NOW(), NOW(), 'CC004', 40),
(3, 5, 'Jan-Dec', 'Detalle 5', 'usuario5', NOW(), NOW(), 'CC005', 50),
(4, 6, 'Jan-Dec', 'Detalle 6', 'usuario6', NOW(), NOW(), 'CC006', 60),
(5, 7, 'Jan-Dec', 'Detalle 7', 'usuario7', NOW(), NOW(), 'CC007', 70),
(6, 8, 'Jan-Dec', 'Detalle 8', 'usuario8', NOW(), NOW(), 'CC008', 80),
(7, 9, 'Jan-Dec', 'Detalle 9', 'usuario9', NOW(), NOW(), 'CC009', 90),
(8, 10, 'Jan-Dec', 'Detalle 10', 'usuario10', NOW(), NOW(), 'CC010', 100),
(8, 1, 'Jan-Dec', 'Detalle 11', 'usuario1', NOW(), NOW(), 'CC011', 10),
(9, 2, 'Jan-Dec', 'Detalle 12', 'usuario2', NOW(), NOW(), 'CC012', 20),
(9, 3, 'Jan-Dec', 'Detalle 13', 'usuario3', NOW(), NOW(), 'CC013', 30);

