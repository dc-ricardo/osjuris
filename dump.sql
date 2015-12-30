--
-- PostgreSQL database dump
--

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: pessoas; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE pessoas (
    id_pessoas integer NOT NULL,
    codigo character(6) NOT NULL,
    cpf_cnpj character varying NOT NULL,
    rg_ie character varying,
    nome_razao character varying(80) NOT NULL,
    endereco character varying(80),
    numero integer DEFAULT 0 NOT NULL,
    complemento character varying(20),
    bairro character varying(40),
    cidade character varying(40),
    estado character(2),
    cep character(8),
    telefone character varying(20),
    celular character varying(20),
    email character varying(40),
    observacoes text,
    tipo smallint DEFAULT 1::smallint NOT NULL
);


ALTER TABLE pessoas OWNER TO postgres;

--
-- Name: pessoas_id_pessoas_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE pessoas_id_pessoas_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE pessoas_id_pessoas_seq OWNER TO postgres;

--
-- Name: pessoas_id_pessoas_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE pessoas_id_pessoas_seq OWNED BY pessoas.id_pessoas;


--
-- Name: usuarios; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE usuarios (
    id_usuarios integer NOT NULL,
    email character varying(80) NOT NULL,
    nome character varying(80) NOT NULL,
    senha character(40) NOT NULL,
    nivel smallint NOT NULL
);


ALTER TABLE usuarios OWNER TO postgres;

--
-- Name: usuarios_id_usuarios_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE usuarios_id_usuarios_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE usuarios_id_usuarios_seq OWNER TO postgres;

--
-- Name: usuarios_id_usuarios_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE usuarios_id_usuarios_seq OWNED BY usuarios.id_usuarios;


--
-- Name: id_pessoas; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY pessoas ALTER COLUMN id_pessoas SET DEFAULT nextval('pessoas_id_pessoas_seq'::regclass);


--
-- Name: id_usuarios; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY usuarios ALTER COLUMN id_usuarios SET DEFAULT nextval('usuarios_id_usuarios_seq'::regclass);


--
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;
GRANT USAGE ON SCHEMA public TO osjuris;


--
-- Name: pessoas; Type: ACL; Schema: public; Owner: postgres
--

REVOKE ALL ON TABLE pessoas FROM PUBLIC;
REVOKE ALL ON TABLE pessoas FROM postgres;
GRANT ALL ON TABLE pessoas TO postgres;
GRANT SELECT,INSERT,REFERENCES,DELETE,TRIGGER,UPDATE ON TABLE pessoas TO osjuris;


--
-- Name: pessoas_id_pessoas_seq; Type: ACL; Schema: public; Owner: postgres
--

REVOKE ALL ON SEQUENCE pessoas_id_pessoas_seq FROM PUBLIC;
REVOKE ALL ON SEQUENCE pessoas_id_pessoas_seq FROM postgres;
GRANT ALL ON SEQUENCE pessoas_id_pessoas_seq TO postgres;
GRANT SELECT,UPDATE ON SEQUENCE pessoas_id_pessoas_seq TO osjuris;


--
-- Name: usuarios; Type: ACL; Schema: public; Owner: postgres
--

REVOKE ALL ON TABLE usuarios FROM PUBLIC;
REVOKE ALL ON TABLE usuarios FROM postgres;
GRANT ALL ON TABLE usuarios TO postgres;
GRANT SELECT,INSERT,REFERENCES,DELETE,TRIGGER,UPDATE ON TABLE usuarios TO osjuris;


--
-- Name: usuarios_id_usuarios_seq; Type: ACL; Schema: public; Owner: postgres
--

REVOKE ALL ON SEQUENCE usuarios_id_usuarios_seq FROM PUBLIC;
REVOKE ALL ON SEQUENCE usuarios_id_usuarios_seq FROM postgres;
GRANT ALL ON SEQUENCE usuarios_id_usuarios_seq TO postgres;
GRANT SELECT,UPDATE ON SEQUENCE usuarios_id_usuarios_seq TO osjuris;


--
-- PostgreSQL database dump complete
--


