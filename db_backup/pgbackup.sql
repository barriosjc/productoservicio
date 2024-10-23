--
-- PostgreSQL database dump
--

-- Dumped from database version 17.0
-- Dumped by pg_dump version 17.0

-- Started on 2024-10-22 15:14:53

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET transaction_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- TOC entry 5 (class 2615 OID 16526)
-- Name: public; Type: SCHEMA; Schema: -; Owner: pg_database_owner
--

DO $$
BEGIN
    IF NOT EXISTS (SELECT 1 FROM pg_namespace WHERE nspname = 'public') THEN
        CREATE SCHEMA public;
    END IF;
END $$;
   
ALTER SCHEMA public OWNER TO pg_database_owner;

--
-- TOC entry 4826 (class 0 OID 0)
-- Dependencies: 5
-- Name: SCHEMA public; Type: COMMENT; Schema: -; Owner: pg_database_owner
--

COMMENT ON SCHEMA public IS 'standard public schema';


SET default_tablespace = '';

SET default_table_access_method = heap;

-- Crear esquema 'public' solo si no existe
DO $$
BEGIN
    IF NOT EXISTS (SELECT 1 FROM pg_namespace WHERE nspname = 'public') THEN
        CREATE SCHEMA public;
    END IF;
END $$;

ALTER SCHEMA public OWNER TO pg_database_owner;

COMMENT ON SCHEMA public IS 'standard public schema';

-- Crear la tabla 'condicion_iva' solo si no existe
CREATE TABLE  public.condicion_iva (
    id_condicion_iva integer NOT NULL,
    codigo integer,
    condicion_iva character varying(50) DEFAULT NULL::character varying,
    alicuota double precision
);

ALTER TABLE public.condicion_iva OWNER TO postgres;

-- Crear la secuencia 'condicion_iva_id_condicion_iva_seq' solo si no existe
CREATE SEQUENCE IF NOT EXISTS public.condicion_iva_id_condicion_iva_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;

ALTER SEQUENCE public.condicion_iva_id_condicion_iva_seq OWNER TO postgres;

-- Asignar secuencia a la columna 'id_condicion_iva' si es necesario
ALTER SEQUENCE public.condicion_iva_id_condicion_iva_seq OWNED BY public.condicion_iva.id_condicion_iva;

-- Crear la tabla 'producto_servicio' solo si no existe
CREATE TABLE IF NOT EXISTS public.producto_servicio (
    id_producto_servicio integer NOT NULL,
    id_rubro integer,
    tipo character varying(1) DEFAULT NULL::character varying,
    id_unidad_medida integer,
    codigo character varying(20) DEFAULT NULL::character varying,
    producto_servicio character varying(255) DEFAULT NULL::character varying,
    id_condicion_iva integer,
    precio_bruto_unitario double precision,
    created_at timestamp without time zone DEFAULT CURRENT_TIMESTAMP
);

ALTER TABLE public.producto_servicio OWNER TO postgres;

-- Crear la secuencia 'producto_servicio_id_producto_servicio_seq' solo si no existe
CREATE SEQUENCE IF NOT EXISTS public.producto_servicio_id_producto_servicio_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;

ALTER SEQUENCE public.producto_servicio_id_producto_servicio_seq OWNER TO postgres;

-- Asignar secuencia a la columna 'id_producto_servicio' si es necesario
ALTER SEQUENCE public.producto_servicio_id_producto_servicio_seq OWNED BY public.producto_servicio.id_producto_servicio;

-- Crear la tabla 'rubro' solo si no existe
CREATE TABLE IF NOT EXISTS public.rubro (
    id_rubro integer NOT NULL,
    rubro character varying(50) DEFAULT NULL::character varying
);

ALTER TABLE public.rubro OWNER TO postgres;

-- Crear la secuencia 'rubro_id_rubro_seq' solo si no existe
CREATE SEQUENCE IF NOT EXISTS public.rubro_id_rubro_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;

ALTER SEQUENCE public.rubro_id_rubro_seq OWNER TO postgres;

-- Asignar secuencia a la columna 'id_rubro' si es necesario
ALTER SEQUENCE public.rubro_id_rubro_seq OWNED BY public.rubro.id_rubro;

-- Crear la tabla 'unidad_medida' solo si no existe
CREATE TABLE IF NOT EXISTS public.unidad_medida (
    id_unidad_medida integer NOT NULL,
    codigo character varying(5) DEFAULT NULL::character varying,
    unidad_medida character varying(50) DEFAULT NULL::character varying
);

ALTER TABLE public.unidad_medida OWNER TO postgres;

-- Crear la secuencia 'unidad_medida_id_unidad_medida_seq' solo si no existe
CREATE SEQUENCE IF NOT EXISTS public.unidad_medida_id_unidad_medida_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;

ALTER SEQUENCE public.unidad_medida_id_unidad_medida_seq OWNER TO postgres;

-- Asignar secuencia a la columna 'id_unidad_medida' si es necesario
ALTER SEQUENCE public.unidad_medida_id_unidad_medida_seq OWNED BY public.unidad_medida.id_unidad_medida;

-- Establecer los valores por defecto para las secuencias

ALTER TABLE ONLY public.condicion_iva ALTER COLUMN id_condicion_iva SET DEFAULT nextval('public.condicion_iva_id_condicion_iva_seq'::regclass);

ALTER TABLE ONLY public.producto_servicio ALTER COLUMN id_producto_servicio SET DEFAULT nextval('public.producto_servicio_id_producto_servicio_seq'::regclass);

ALTER TABLE ONLY public.rubro ALTER COLUMN id_rubro SET DEFAULT nextval('public.rubro_id_rubro_seq'::regclass);

ALTER TABLE ONLY public.unidad_medida ALTER COLUMN id_unidad_medida SET DEFAULT nextval('public.unidad_medida_id_unidad_medida_seq'::regclass);

-- Insertar datos en las tablas solo si no existen

INSERT INTO public.condicion_iva (id_condicion_iva, codigo, condicion_iva, alicuota) 
VALUES (1, 10105, 'inscripto', 10.5);

INSERT INTO public.condicion_iva (id_condicion_iva, codigo, condicion_iva, alicuota) 
VALUES (2, 10205, 'exento', 0);

INSERT INTO public.producto_servicio (id_producto_servicio, id_rubro, tipo, id_unidad_medida, codigo, producto_servicio, id_condicion_iva, precio_bruto_unitario, created_at) 
VALUES (1, 1, 'P', 1, '147', 'papel fino xe', 1, 258.43, '2023-10-11 02:14:39') ;

INSERT INTO public.producto_servicio (id_producto_servicio, id_rubro, tipo, id_unidad_medida, codigo, producto_servicio, id_condicion_iva, precio_bruto_unitario, created_at) 
VALUES (1, 1, 'P', 1, 'A200', 'papel grueso xe', 1, 345.43, '2022-10-11 02:14:39') ;

INSERT INTO public.producto_servicio (id_producto_servicio, id_rubro, tipo, id_unidad_medida, codigo, producto_servicio, id_condicion_iva, precio_bruto_unitario, created_at) 
VALUES (1, 1, 'P', 1, 'A200', 'rollo alumnio 2 mm', 1, 2500, '2024-08-11 02:14:39') ;

INSERT INTO public.producto_servicio (id_producto_servicio, id_rubro, tipo, id_unidad_medida, codigo, producto_servicio, id_condicion_iva, precio_bruto_unitario, created_at) 
VALUES (1, 1, 'S', 1, '202', 'transcripciones', 1, 1000, '2024-10-11 02:14:39') ;

-- (Otros valores similares para las demás tablas...)

INSERT INTO public.rubro (id_rubro, rubro) VALUES (1, 'Minorista') ;
INSERT INTO public.rubro (id_rubro, rubro) VALUES (2, 'Mayorista') ;

INSERT INTO public.unidad_medida (id_unidad_medida, codigo, unidad_medida) 
VALUES (1, '01', 'cm');
INSERT INTO public.unidad_medida (id_unidad_medida, codigo, unidad_medida) 
VALUES (1, '02', 'mtrs');
INSERT INTO public.unidad_medida (id_unidad_medida, codigo, unidad_medida) 
VALUES (1, '03', 'kg');

-- Restablecer los valores de las secuencias

SELECT pg_catalog.setval('public.condicion_iva_id_condicion_iva_seq', 1, false);
SELECT pg_catalog.setval('public.producto_servicio_id_producto_servicio_seq', 1, false);
SELECT pg_catalog.setval('public.rubro_id_rubro_seq', 1, false);
SELECT pg_catalog.setval('public.unidad_medida_id_unidad_medida_seq', 1, false);

-- Revocar permisos de uso del esquema 'public'
REVOKE USAGE ON SCHEMA public FROM PUBLIC;
