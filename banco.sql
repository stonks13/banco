--
-- PostgreSQL database dump
--

-- Dumped from database version 11.9 (Debian 11.9-0+deb10u1)
-- Dumped by pg_dump version 11.9 (Debian 11.9-0+deb10u1)

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: cliente; Type: TABLE; Schema: public; Owner: itb
--

CREATE TABLE public.cliente (
    id integer NOT NULL,
    nombre text,
    apellidos character varying(50),
    fecha_nacimiento date,
    sexo character(1),
    telefono character varying(9),
    dni character varying(9),
    email character varying(50),
    password text,
    imagen bytea
);


ALTER TABLE public.cliente OWNER TO itb;

--
-- Name: cliente_id_seq; Type: SEQUENCE; Schema: public; Owner: itb
--

CREATE SEQUENCE public.cliente_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.cliente_id_seq OWNER TO itb;

--
-- Name: cliente_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: itb
--

ALTER SEQUENCE public.cliente_id_seq OWNED BY public.cliente.id;


--
-- Name: cuenta; Type: TABLE; Schema: public; Owner: itb
--

CREATE TABLE public.cuenta (
    id integer NOT NULL,
    id_cliente integer,
    saldo numeric(100,2),
    creacion timestamp without time zone
);


ALTER TABLE public.cuenta OWNER TO itb;

--
-- Name: cuenta_id_seq; Type: SEQUENCE; Schema: public; Owner: itb
--

CREATE SEQUENCE public.cuenta_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.cuenta_id_seq OWNER TO itb;

--
-- Name: cuenta_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: itb
--

ALTER SEQUENCE public.cuenta_id_seq OWNED BY public.cuenta.id;


--
-- Name: movimientos; Type: TABLE; Schema: public; Owner: itb
--

CREATE TABLE public.movimientos (
    id integer NOT NULL,
    id_origen integer,
    id_destino integer,
    fecha timestamp without time zone,
    cantidad numeric(100,2)
);


ALTER TABLE public.movimientos OWNER TO itb;

--
-- Name: movimientos_id_seq; Type: SEQUENCE; Schema: public; Owner: itb
--

CREATE SEQUENCE public.movimientos_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.movimientos_id_seq OWNER TO itb;

--
-- Name: movimientos_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: itb
--

ALTER SEQUENCE public.movimientos_id_seq OWNED BY public.movimientos.id;


--
-- Name: cliente id; Type: DEFAULT; Schema: public; Owner: itb
--

ALTER TABLE ONLY public.cliente ALTER COLUMN id SET DEFAULT nextval('public.cliente_id_seq'::regclass);


--
-- Name: cuenta id; Type: DEFAULT; Schema: public; Owner: itb
--

ALTER TABLE ONLY public.cuenta ALTER COLUMN id SET DEFAULT nextval('public.cuenta_id_seq'::regclass);


--
-- Name: movimientos id; Type: DEFAULT; Schema: public; Owner: itb
--

ALTER TABLE ONLY public.movimientos ALTER COLUMN id SET DEFAULT nextval('public.movimientos_id_seq'::regclass);


--
-- Data for Name: cliente; Type: TABLE DATA; Schema: public; Owner: itb
--

COPY public.cliente (id, nombre, apellidos, fecha_nacimiento, sexo, telefono, dni, email, password, imagen) FROM stdin;
\.


--
-- Data for Name: cuenta; Type: TABLE DATA; Schema: public; Owner: itb
--

COPY public.cuenta (id, id_cliente, saldo, creacion) FROM stdin;
\.


--
-- Data for Name: movimientos; Type: TABLE DATA; Schema: public; Owner: itb
--

COPY public.movimientos (id, id_origen, id_destino, fecha, cantidad) FROM stdin;
\.


--
-- Name: cliente_id_seq; Type: SEQUENCE SET; Schema: public; Owner: itb
--

SELECT pg_catalog.setval('public.cliente_id_seq', 1, false);


--
-- Name: cuenta_id_seq; Type: SEQUENCE SET; Schema: public; Owner: itb
--

SELECT pg_catalog.setval('public.cuenta_id_seq', 1, false);


--
-- Name: movimientos_id_seq; Type: SEQUENCE SET; Schema: public; Owner: itb
--

SELECT pg_catalog.setval('public.movimientos_id_seq', 1, false);


--
-- Name: cliente cliente_pkey; Type: CONSTRAINT; Schema: public; Owner: itb
--

ALTER TABLE ONLY public.cliente
    ADD CONSTRAINT cliente_pkey PRIMARY KEY (id);


--
-- Name: cuenta cuenta_pkey; Type: CONSTRAINT; Schema: public; Owner: itb
--

ALTER TABLE ONLY public.cuenta
    ADD CONSTRAINT cuenta_pkey PRIMARY KEY (id);


--
-- Name: movimientos movimientos_pkey; Type: CONSTRAINT; Schema: public; Owner: itb
--

ALTER TABLE ONLY public.movimientos
    ADD CONSTRAINT movimientos_pkey PRIMARY KEY (id);


--
-- Name: cliente unico; Type: CONSTRAINT; Schema: public; Owner: itb
--

ALTER TABLE ONLY public.cliente
    ADD CONSTRAINT unico UNIQUE (dni);


--
-- Name: cuenta id_cliente; Type: FK CONSTRAINT; Schema: public; Owner: itb
--

ALTER TABLE ONLY public.cuenta
    ADD CONSTRAINT id_cliente FOREIGN KEY (id_cliente) REFERENCES public.cliente(id);


--
-- Name: movimientos id_origen; Type: FK CONSTRAINT; Schema: public; Owner: itb
--

ALTER TABLE ONLY public.movimientos
    ADD CONSTRAINT id_origen FOREIGN KEY (id_origen) REFERENCES public.cuenta(id);


--
-- PostgreSQL database dump complete
--

