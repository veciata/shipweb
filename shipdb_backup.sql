--
-- PostgreSQL database dump
--

-- Dumped from database version 15.4
-- Dumped by pg_dump version 15.4

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

SET default_table_access_method = heap;

--
-- Name: products; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.products (
    productid integer NOT NULL,
    productname character varying(255) NOT NULL,
    productdescription text,
    weight numeric(10,2) NOT NULL
);


ALTER TABLE public.products OWNER TO postgres;

--
-- Name: products_productid_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.products_productid_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.products_productid_seq OWNER TO postgres;

--
-- Name: products_productid_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.products_productid_seq OWNED BY public.products.productid;


--
-- Name: receivers; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.receivers (
    receiverid integer NOT NULL,
    userid integer NOT NULL
);


ALTER TABLE public.receivers OWNER TO postgres;

--
-- Name: receivers_receiverid_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.receivers_receiverid_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.receivers_receiverid_seq OWNER TO postgres;

--
-- Name: receivers_receiverid_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.receivers_receiverid_seq OWNED BY public.receivers.receiverid;


--
-- Name: senders; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.senders (
    senderid integer NOT NULL,
    userid integer NOT NULL
);


ALTER TABLE public.senders OWNER TO postgres;

--
-- Name: senders_senderid_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.senders_senderid_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.senders_senderid_seq OWNER TO postgres;

--
-- Name: senders_senderid_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.senders_senderid_seq OWNED BY public.senders.senderid;


--
-- Name: shipments; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.shipments (
    shipmentid integer NOT NULL,
    senderid integer NOT NULL,
    receiverid integer NOT NULL,
    productid integer NOT NULL,
    shippingdate date NOT NULL,
    arrivaldate date NOT NULL
);


ALTER TABLE public.shipments OWNER TO postgres;

--
-- Name: shipments_shipmentid_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.shipments_shipmentid_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.shipments_shipmentid_seq OWNER TO postgres;

--
-- Name: shipments_shipmentid_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.shipments_shipmentid_seq OWNED BY public.shipments.shipmentid;


--
-- Name: users; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.users (
    userid integer NOT NULL,
    username character varying(255) NOT NULL,
    password character varying(255) NOT NULL
);


ALTER TABLE public.users OWNER TO postgres;

--
-- Name: users_userid_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.users_userid_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.users_userid_seq OWNER TO postgres;

--
-- Name: users_userid_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.users_userid_seq OWNED BY public.users.userid;


--
-- Name: products productid; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.products ALTER COLUMN productid SET DEFAULT nextval('public.products_productid_seq'::regclass);


--
-- Name: receivers receiverid; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.receivers ALTER COLUMN receiverid SET DEFAULT nextval('public.receivers_receiverid_seq'::regclass);


--
-- Name: senders senderid; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.senders ALTER COLUMN senderid SET DEFAULT nextval('public.senders_senderid_seq'::regclass);


--
-- Name: shipments shipmentid; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.shipments ALTER COLUMN shipmentid SET DEFAULT nextval('public.shipments_shipmentid_seq'::regclass);


--
-- Name: users userid; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users ALTER COLUMN userid SET DEFAULT nextval('public.users_userid_seq'::regclass);


--
-- Data for Name: products; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.products (productid, productname, productdescription, weight) FROM stdin;
1	Ürün 1	Ürün 1 Açıklama	2.50
2	Ürün 2	Ürün 2 Açıklama	1.80
3	Ürün 3	Ürün 3 Açıklama	3.20
\.


--
-- Data for Name: receivers; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.receivers (receiverid, userid) FROM stdin;
1	1
2	2
3	3
4	4
5	5
\.


--
-- Data for Name: senders; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.senders (senderid, userid) FROM stdin;
1	6
2	7
3	8
\.


--
-- Data for Name: shipments; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.shipments (shipmentid, senderid, receiverid, productid, shippingdate, arrivaldate) FROM stdin;
1	1	1	1	2023-09-10	2023-09-15
2	1	2	2	2023-09-11	2023-09-16
3	1	3	3	2023-09-12	2023-09-17
4	2	4	1	2023-09-13	2023-09-18
5	2	5	2	2023-09-14	2023-09-19
6	3	1	3	2023-09-15	2023-09-20
7	3	2	1	2023-09-16	2023-09-21
8	3	3	2	2023-09-17	2023-09-22
9	1	4	3	2023-09-18	2023-09-23
10	2	5	1	2023-09-19	2023-09-24
11	3	1	2	2023-09-20	2023-09-25
12	1	2	3	2023-09-21	2023-09-26
13	2	3	1	2023-09-22	2023-09-27
14	3	4	2	2023-09-23	2023-09-28
15	1	5	3	2023-09-24	2023-09-29
\.


--
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.users (userid, username, password) FROM stdin;
1	alici1	sifre1
2	alici2	sifre2
3	alici3	sifre3
4	alici4	sifre4
5	alici5	sifre5
6	gonderici1	sifre6
7	gonderici2	sifre7
8	gonderici3	sifre8
\.


--
-- Name: products_productid_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.products_productid_seq', 3, true);


--
-- Name: receivers_receiverid_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.receivers_receiverid_seq', 5, true);


--
-- Name: senders_senderid_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.senders_senderid_seq', 3, true);


--
-- Name: shipments_shipmentid_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.shipments_shipmentid_seq', 15, true);


--
-- Name: users_userid_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.users_userid_seq', 8, true);


--
-- Name: products products_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.products
    ADD CONSTRAINT products_pkey PRIMARY KEY (productid);


--
-- Name: receivers receivers_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.receivers
    ADD CONSTRAINT receivers_pkey PRIMARY KEY (receiverid);


--
-- Name: senders senders_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.senders
    ADD CONSTRAINT senders_pkey PRIMARY KEY (senderid);


--
-- Name: shipments shipments_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.shipments
    ADD CONSTRAINT shipments_pkey PRIMARY KEY (shipmentid);


--
-- Name: users users_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (userid);


--
-- Name: users users_username_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_username_key UNIQUE (username);


--
-- Name: receivers receivers_userid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.receivers
    ADD CONSTRAINT receivers_userid_fkey FOREIGN KEY (userid) REFERENCES public.users(userid);


--
-- Name: senders senders_userid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.senders
    ADD CONSTRAINT senders_userid_fkey FOREIGN KEY (userid) REFERENCES public.users(userid);


--
-- Name: shipments shipments_productid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.shipments
    ADD CONSTRAINT shipments_productid_fkey FOREIGN KEY (productid) REFERENCES public.products(productid);


--
-- Name: shipments shipments_receiverid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.shipments
    ADD CONSTRAINT shipments_receiverid_fkey FOREIGN KEY (receiverid) REFERENCES public.receivers(receiverid);


--
-- Name: shipments shipments_senderid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.shipments
    ADD CONSTRAINT shipments_senderid_fkey FOREIGN KEY (senderid) REFERENCES public.senders(senderid);


--
-- PostgreSQL database dump complete
--

