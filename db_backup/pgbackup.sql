--
-- PostgreSQL database dump
--

-- Dumped from database version 17.0
-- Dumped by pg_dump version 17.0

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

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: condicion_iva; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.condicion_iva (
    id_condicion_iva integer NOT NULL,
    codigo integer,
    condicion_iva character varying(50) DEFAULT NULL::character varying,
    alicuota double precision
);


ALTER TABLE public.condicion_iva OWNER TO postgres;

--
-- Name: condicion_iva_id_condicion_iva_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.condicion_iva_id_condicion_iva_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.condicion_iva_id_condicion_iva_seq OWNER TO postgres;

--
-- Name: condicion_iva_id_condicion_iva_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.condicion_iva_id_condicion_iva_seq OWNED BY public.condicion_iva.id_condicion_iva;


--
-- Name: producto_servicio; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.producto_servicio (
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

--
-- Name: producto_servicio_id_producto_servicio_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.producto_servicio_id_producto_servicio_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.producto_servicio_id_producto_servicio_seq OWNER TO postgres;

--
-- Name: producto_servicio_id_producto_servicio_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.producto_servicio_id_producto_servicio_seq OWNED BY public.producto_servicio.id_producto_servicio;


--
-- Name: rubro; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.rubro (
    id_rubro integer NOT NULL,
    rubro character varying(50) DEFAULT NULL::character varying
);


ALTER TABLE public.rubro OWNER TO postgres;

--
-- Name: rubro_id_rubro_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.rubro_id_rubro_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.rubro_id_rubro_seq OWNER TO postgres;

--
-- Name: rubro_id_rubro_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.rubro_id_rubro_seq OWNED BY public.rubro.id_rubro;


--
-- Name: unidad_medida; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.unidad_medida (
    id_unidad_medida integer NOT NULL,
    codigo character varying(5) DEFAULT NULL::character varying,
    unidad_medida character varying(50) DEFAULT NULL::character varying
);


ALTER TABLE public.unidad_medida OWNER TO postgres;

--
-- Name: unidad_medida_id_unidad_medida_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.unidad_medida_id_unidad_medida_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.unidad_medida_id_unidad_medida_seq OWNER TO postgres;

--
-- Name: unidad_medida_id_unidad_medida_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.unidad_medida_id_unidad_medida_seq OWNED BY public.unidad_medida.id_unidad_medida;


--
-- Name: condicion_iva id_condicion_iva; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.condicion_iva ALTER COLUMN id_condicion_iva SET DEFAULT nextval('public.condicion_iva_id_condicion_iva_seq'::regclass);


--
-- Name: producto_servicio id_producto_servicio; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.producto_servicio ALTER COLUMN id_producto_servicio SET DEFAULT nextval('public.producto_servicio_id_producto_servicio_seq'::regclass);


--
-- Name: rubro id_rubro; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.rubro ALTER COLUMN id_rubro SET DEFAULT nextval('public.rubro_id_rubro_seq'::regclass);


--
-- Name: unidad_medida id_unidad_medida; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.unidad_medida ALTER COLUMN id_unidad_medida SET DEFAULT nextval('public.unidad_medida_id_unidad_medida_seq'::regclass);


--
-- Data for Name: condicion_iva; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.condicion_iva (id_condicion_iva, codigo, condicion_iva, alicuota) FROM stdin;
1	10105	inscripto	10.5
2	10205	exente	0
\.


--
-- Data for Name: producto_servicio; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.producto_servicio (id_producto_servicio, id_rubro, tipo, id_unidad_medida, codigo, producto_servicio, id_condicion_iva, precio_bruto_unitario, created_at) FROM stdin;
4	2	P	1	080616	papel fomenol we	1	168.78	2024-10-13 02:14:39
6	2	S	1	555477	principal	1	258000	2024-01-02 02:14:39
7	2	S	1	234	films	1	1472.35	2022-10-11 02:14:39
8	2	S	2	A369	metal print	2	258.25	2022-01-02 02:14:39
2	1	P	1	0103042	prueba 02	1	123	2024-10-12 22:04:52.716842
3	1	P	1	1477	papel fomenol we	1	1000	2024-10-12 22:15:40.949222
14	1	P	1	155	films	1	155	2024-10-12 23:10:36.790808
1	1	P	1	147	papel fino xe	1	258.43	2024-10-11 02:14:39
\.


--
-- Data for Name: rubro; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.rubro (id_rubro, rubro) FROM stdin;
1	Minorista
2	Mayorista
\.


--
-- Data for Name: unidad_medida; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.unidad_medida (id_unidad_medida, codigo, unidad_medida) FROM stdin;
1	01	cm
2	02	km
3	03	lts
4	04	kg
\.


--
-- Name: condicion_iva_id_condicion_iva_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.condicion_iva_id_condicion_iva_seq', 1, false);


--
-- Name: producto_servicio_id_producto_servicio_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.producto_servicio_id_producto_servicio_seq', 15, true);


--
-- Name: rubro_id_rubro_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.rubro_id_rubro_seq', 1, false);


--
-- Name: unidad_medida_id_unidad_medida_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.unidad_medida_id_unidad_medida_seq', 1, false);


--
-- Name: condicion_iva condicion_iva_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.condicion_iva
    ADD CONSTRAINT condicion_iva_pkey PRIMARY KEY (id_condicion_iva);


--
-- Name: producto_servicio producto_servicio_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.producto_servicio
    ADD CONSTRAINT producto_servicio_pkey PRIMARY KEY (id_producto_servicio);


--
-- Name: rubro rubro_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.rubro
    ADD CONSTRAINT rubro_pkey PRIMARY KEY (id_rubro);


--
-- Name: unidad_medida unidad_medida_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.unidad_medida
    ADD CONSTRAINT unidad_medida_pkey PRIMARY KEY (id_unidad_medida);


--
-- PostgreSQL database dump complete
--

