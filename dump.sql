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
-- Name: andamentos; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE andamentos (
    id_andamentos integer NOT NULL,
    id_processos integer NOT NULL,
    data_andamento date NOT NULL,
    descricao text NOT NULL,
    interesse smallint NOT NULL
);


ALTER TABLE andamentos OWNER TO postgres;

--
-- Name: andamentos_id_andamentos_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE andamentos_id_andamentos_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE andamentos_id_andamentos_seq OWNER TO postgres;

--
-- Name: andamentos_id_andamentos_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE andamentos_id_andamentos_seq OWNED BY andamentos.id_andamentos;


--
-- Name: apensos; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE apensos (
    id_apensos integer NOT NULL,
    id_processos integer NOT NULL,
    numero_apenso character varying(80) NOT NULL,
    data_apenso date NOT NULL,
    descricao text NOT NULL,
    id_localizacoes integer NOT NULL
);


ALTER TABLE apensos OWNER TO postgres;

--
-- Name: apensos_id_apensos_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE apensos_id_apensos_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE apensos_id_apensos_seq OWNER TO postgres;

--
-- Name: apensos_id_apensos_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE apensos_id_apensos_seq OWNED BY apensos.id_apensos;


--
-- Name: apensosand; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE apensosand (
    id_apensosand integer NOT NULL,
    id_apensos integer NOT NULL,
    data_andamento date NOT NULL,
    descricao text NOT NULL,
    interesse smallint NOT NULL
);


ALTER TABLE apensosand OWNER TO postgres;

--
-- Name: apensosand_id_apensosand_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE apensosand_id_apensosand_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE apensosand_id_apensosand_seq OWNER TO postgres;

--
-- Name: apensosand_id_apensosand_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE apensosand_id_apensosand_seq OWNED BY apensosand.id_apensosand;


--
-- Name: localizacoes; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE localizacoes (
    id_localizacoes integer NOT NULL,
    descricao character varying(80) NOT NULL
);


ALTER TABLE localizacoes OWNER TO postgres;

--
-- Name: localizacoes_id_localizacoes_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE localizacoes_id_localizacoes_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE localizacoes_id_localizacoes_seq OWNER TO postgres;

--
-- Name: localizacoes_id_localizacoes_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE localizacoes_id_localizacoes_seq OWNED BY localizacoes.id_localizacoes;


--
-- Name: partes; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE partes (
    id_partes integer NOT NULL,
    id_processos integer NOT NULL,
    id_pessoas integer NOT NULL,
    tipo_parte smallint NOT NULL
);


ALTER TABLE partes OWNER TO postgres;

--
-- Name: pessoas; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE pessoas (
    id_pessoas integer NOT NULL,
    codigo character(6) NOT NULL,
    cpf_cnpj character varying(20) NOT NULL,
    rg_ie character varying,
    nome_razao character varying(80) NOT NULL,
    endereco character varying(80),
    numero integer DEFAULT 0 NOT NULL,
    complemento character varying(20),
    bairro character varying(60),
    cidade character varying(60),
    estado character(2),
    cep character(8),
    telefone character varying(20),
    celular character varying(20),
    email character varying(60),
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
-- Name: prazos; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE prazos (
    id_prazos integer NOT NULL,
    id_processos integer NOT NULL,
    data_prazo date NOT NULL,
    descricao text NOT NULL
);


ALTER TABLE prazos OWNER TO postgres;

--
-- Name: prazos_id_prazos_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE prazos_id_prazos_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE prazos_id_prazos_seq OWNER TO postgres;

--
-- Name: prazos_id_prazos_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE prazos_id_prazos_seq OWNED BY prazos.id_prazos;


--
-- Name: processos; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE processos (
    id_processos integer NOT NULL,
    numero_processo character varying(80) NOT NULL,
    numero_interno character varying(80) NOT NULL,
    data_abertura date NOT NULL,
    id_localizacoes integer NOT NULL,
    descricao text
);


ALTER TABLE processos OWNER TO postgres;

--
-- Name: processos_id_processos_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE processos_id_processos_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE processos_id_processos_seq OWNER TO postgres;

--
-- Name: processos_id_processos_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE processos_id_processos_seq OWNED BY processos.id_processos;


--
-- Name: processospartes_id_processospartes_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE processospartes_id_processospartes_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE processospartes_id_processospartes_seq OWNER TO postgres;

--
-- Name: processospartes_id_processospartes_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE processospartes_id_processospartes_seq OWNED BY partes.id_partes;


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
-- Name: id_andamentos; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY andamentos ALTER COLUMN id_andamentos SET DEFAULT nextval('andamentos_id_andamentos_seq'::regclass);


--
-- Name: id_apensos; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY apensos ALTER COLUMN id_apensos SET DEFAULT nextval('apensos_id_apensos_seq'::regclass);


--
-- Name: id_apensosand; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY apensosand ALTER COLUMN id_apensosand SET DEFAULT nextval('apensosand_id_apensosand_seq'::regclass);


--
-- Name: id_localizacoes; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY localizacoes ALTER COLUMN id_localizacoes SET DEFAULT nextval('localizacoes_id_localizacoes_seq'::regclass);


--
-- Name: id_partes; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY partes ALTER COLUMN id_partes SET DEFAULT nextval('processospartes_id_processospartes_seq'::regclass);


--
-- Name: id_pessoas; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY pessoas ALTER COLUMN id_pessoas SET DEFAULT nextval('pessoas_id_pessoas_seq'::regclass);


--
-- Name: id_prazos; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY prazos ALTER COLUMN id_prazos SET DEFAULT nextval('prazos_id_prazos_seq'::regclass);


--
-- Name: id_processos; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY processos ALTER COLUMN id_processos SET DEFAULT nextval('processos_id_processos_seq'::regclass);


--
-- Name: id_usuarios; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY usuarios ALTER COLUMN id_usuarios SET DEFAULT nextval('usuarios_id_usuarios_seq'::regclass);


--
-- Name: andamentos_id_andamentos; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY andamentos
    ADD CONSTRAINT andamentos_id_andamentos PRIMARY KEY (id_andamentos);


--
-- Name: apensos_id_apensos; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY apensos
    ADD CONSTRAINT apensos_id_apensos PRIMARY KEY (id_apensos);


--
-- Name: apensosand_id_apensosand; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY apensosand
    ADD CONSTRAINT apensosand_id_apensosand PRIMARY KEY (id_apensosand);


--
-- Name: localizacoes_descricao; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY localizacoes
    ADD CONSTRAINT localizacoes_descricao UNIQUE (descricao);


--
-- Name: localizacoes_id_localizacoes; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY localizacoes
    ADD CONSTRAINT localizacoes_id_localizacoes PRIMARY KEY (id_localizacoes);


--
-- Name: pessoas_codigo; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY pessoas
    ADD CONSTRAINT pessoas_codigo UNIQUE (codigo);


--
-- Name: pessoas_cpf_cnpj; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY pessoas
    ADD CONSTRAINT pessoas_cpf_cnpj UNIQUE (cpf_cnpj);


--
-- Name: pessoas_id_pessoas; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY pessoas
    ADD CONSTRAINT pessoas_id_pessoas PRIMARY KEY (id_pessoas);


--
-- Name: processos_id_processos; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY processos
    ADD CONSTRAINT processos_id_processos PRIMARY KEY (id_processos);


--
-- Name: processos_numero_interno; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY processos
    ADD CONSTRAINT processos_numero_interno UNIQUE (numero_interno);


--
-- Name: processos_numero_processo; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY processos
    ADD CONSTRAINT processos_numero_processo UNIQUE (numero_processo);


--
-- Name: processospartes_id_processos_id_pessoas_tipo_parte; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY partes
    ADD CONSTRAINT processospartes_id_processos_id_pessoas_tipo_parte UNIQUE (id_processos, id_pessoas, tipo_parte);


--
-- Name: processospartes_id_processospartes; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY partes
    ADD CONSTRAINT processospartes_id_processospartes PRIMARY KEY (id_partes);


--
-- Name: usuarios_email; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY usuarios
    ADD CONSTRAINT usuarios_email UNIQUE (email);


--
-- Name: usuarios_id_usuarios; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY usuarios
    ADD CONSTRAINT usuarios_id_usuarios PRIMARY KEY (id_usuarios);


--
-- Name: pessoas_nome_razao; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE INDEX pessoas_nome_razao ON pessoas USING btree (nome_razao);


--
-- Name: andamentos_id_processos_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY andamentos
    ADD CONSTRAINT andamentos_id_processos_fkey FOREIGN KEY (id_processos) REFERENCES processos(id_processos) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: apensos_id_localizacoes_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY apensos
    ADD CONSTRAINT apensos_id_localizacoes_fkey FOREIGN KEY (id_localizacoes) REFERENCES localizacoes(id_localizacoes) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- Name: apensos_id_processos_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY apensos
    ADD CONSTRAINT apensos_id_processos_fkey FOREIGN KEY (id_processos) REFERENCES processos(id_processos) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: apensosand_id_apensos_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY apensosand
    ADD CONSTRAINT apensosand_id_apensos_fkey FOREIGN KEY (id_apensos) REFERENCES apensos(id_apensos) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: processos_id_localizacoes_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY processos
    ADD CONSTRAINT processos_id_localizacoes_fkey FOREIGN KEY (id_localizacoes) REFERENCES localizacoes(id_localizacoes) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- Name: processospartes_id_pessoas_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY partes
    ADD CONSTRAINT processospartes_id_pessoas_fkey FOREIGN KEY (id_pessoas) REFERENCES pessoas(id_pessoas) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- Name: processospartes_id_processos_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY partes
    ADD CONSTRAINT processospartes_id_processos_fkey FOREIGN KEY (id_processos) REFERENCES processos(id_processos) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;
GRANT USAGE ON SCHEMA public TO osjuris;


--
-- Name: andamentos; Type: ACL; Schema: public; Owner: postgres
--

REVOKE ALL ON TABLE andamentos FROM PUBLIC;
REVOKE ALL ON TABLE andamentos FROM postgres;
GRANT ALL ON TABLE andamentos TO postgres;
GRANT SELECT,INSERT,REFERENCES,DELETE,TRIGGER,UPDATE ON TABLE andamentos TO osjuris;


--
-- Name: andamentos_id_andamentos_seq; Type: ACL; Schema: public; Owner: postgres
--

REVOKE ALL ON SEQUENCE andamentos_id_andamentos_seq FROM PUBLIC;
REVOKE ALL ON SEQUENCE andamentos_id_andamentos_seq FROM postgres;
GRANT ALL ON SEQUENCE andamentos_id_andamentos_seq TO postgres;
GRANT SELECT,UPDATE ON SEQUENCE andamentos_id_andamentos_seq TO osjuris;


--
-- Name: apensos; Type: ACL; Schema: public; Owner: postgres
--

REVOKE ALL ON TABLE apensos FROM PUBLIC;
REVOKE ALL ON TABLE apensos FROM postgres;
GRANT ALL ON TABLE apensos TO postgres;
GRANT SELECT,INSERT,REFERENCES,DELETE,TRIGGER,UPDATE ON TABLE apensos TO osjuris;


--
-- Name: apensos_id_apensos_seq; Type: ACL; Schema: public; Owner: postgres
--

REVOKE ALL ON SEQUENCE apensos_id_apensos_seq FROM PUBLIC;
REVOKE ALL ON SEQUENCE apensos_id_apensos_seq FROM postgres;
GRANT ALL ON SEQUENCE apensos_id_apensos_seq TO postgres;
GRANT SELECT,UPDATE ON SEQUENCE apensos_id_apensos_seq TO osjuris;


--
-- Name: apensosand; Type: ACL; Schema: public; Owner: postgres
--

REVOKE ALL ON TABLE apensosand FROM PUBLIC;
REVOKE ALL ON TABLE apensosand FROM postgres;
GRANT ALL ON TABLE apensosand TO postgres;
GRANT SELECT,INSERT,REFERENCES,DELETE,TRIGGER,UPDATE ON TABLE apensosand TO osjuris;


--
-- Name: apensosand_id_apensosand_seq; Type: ACL; Schema: public; Owner: postgres
--

REVOKE ALL ON SEQUENCE apensosand_id_apensosand_seq FROM PUBLIC;
REVOKE ALL ON SEQUENCE apensosand_id_apensosand_seq FROM postgres;
GRANT ALL ON SEQUENCE apensosand_id_apensosand_seq TO postgres;
GRANT SELECT,UPDATE ON SEQUENCE apensosand_id_apensosand_seq TO osjuris;


--
-- Name: localizacoes; Type: ACL; Schema: public; Owner: postgres
--

REVOKE ALL ON TABLE localizacoes FROM PUBLIC;
REVOKE ALL ON TABLE localizacoes FROM postgres;
GRANT SELECT,INSERT,REFERENCES,DELETE,TRIGGER,UPDATE ON TABLE localizacoes TO postgres;
GRANT SELECT,INSERT,REFERENCES,DELETE,TRIGGER,UPDATE ON TABLE localizacoes TO osjuris;


--
-- Name: localizacoes_id_localizacoes_seq; Type: ACL; Schema: public; Owner: postgres
--

REVOKE ALL ON SEQUENCE localizacoes_id_localizacoes_seq FROM PUBLIC;
REVOKE ALL ON SEQUENCE localizacoes_id_localizacoes_seq FROM postgres;
GRANT ALL ON SEQUENCE localizacoes_id_localizacoes_seq TO postgres;
GRANT SELECT,UPDATE ON SEQUENCE localizacoes_id_localizacoes_seq TO osjuris;


--
-- Name: partes; Type: ACL; Schema: public; Owner: postgres
--

REVOKE ALL ON TABLE partes FROM PUBLIC;
REVOKE ALL ON TABLE partes FROM postgres;
GRANT ALL ON TABLE partes TO postgres;
GRANT SELECT,INSERT,REFERENCES,DELETE,TRIGGER,UPDATE ON TABLE partes TO osjuris;


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
-- Name: prazos; Type: ACL; Schema: public; Owner: postgres
--

REVOKE ALL ON TABLE prazos FROM PUBLIC;
REVOKE ALL ON TABLE prazos FROM postgres;
GRANT ALL ON TABLE prazos TO postgres;
GRANT SELECT,INSERT,REFERENCES,DELETE,TRIGGER,UPDATE ON TABLE prazos TO osjuris;


--
-- Name: prazos_id_prazos_seq; Type: ACL; Schema: public; Owner: postgres
--

REVOKE ALL ON SEQUENCE prazos_id_prazos_seq FROM PUBLIC;
REVOKE ALL ON SEQUENCE prazos_id_prazos_seq FROM postgres;
GRANT ALL ON SEQUENCE prazos_id_prazos_seq TO postgres;
GRANT SELECT,UPDATE ON SEQUENCE prazos_id_prazos_seq TO osjuris;


--
-- Name: processos; Type: ACL; Schema: public; Owner: postgres
--

REVOKE ALL ON TABLE processos FROM PUBLIC;
REVOKE ALL ON TABLE processos FROM postgres;
GRANT ALL ON TABLE processos TO postgres;
GRANT SELECT,INSERT,REFERENCES,DELETE,TRIGGER,UPDATE ON TABLE processos TO osjuris;


--
-- Name: processos_id_processos_seq; Type: ACL; Schema: public; Owner: postgres
--

REVOKE ALL ON SEQUENCE processos_id_processos_seq FROM PUBLIC;
REVOKE ALL ON SEQUENCE processos_id_processos_seq FROM postgres;
GRANT ALL ON SEQUENCE processos_id_processos_seq TO postgres;
GRANT SELECT,UPDATE ON SEQUENCE processos_id_processos_seq TO osjuris;


--
-- Name: processospartes_id_processospartes_seq; Type: ACL; Schema: public; Owner: postgres
--

REVOKE ALL ON SEQUENCE processospartes_id_processospartes_seq FROM PUBLIC;
REVOKE ALL ON SEQUENCE processospartes_id_processospartes_seq FROM postgres;
GRANT ALL ON SEQUENCE processospartes_id_processospartes_seq TO postgres;
GRANT SELECT,UPDATE ON SEQUENCE processospartes_id_processospartes_seq TO osjuris;


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

