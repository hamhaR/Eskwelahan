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
-- Name: course; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE course (
    course_id integer NOT NULL,
    course_code character varying(10) NOT NULL,
    course_title character varying(32) NOT NULL,
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL,
    deleted_at timestamp without time zone
);


ALTER TABLE public.course OWNER TO postgres;

--
-- Name: course_course_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE course_course_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.course_course_id_seq OWNER TO postgres;

--
-- Name: course_course_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE course_course_id_seq OWNED BY course.course_id;


--
-- Name: friends; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE friends (
    friend_id integer NOT NULL,
    user_id integer NOT NULL,
    f_id integer NOT NULL,
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL,
    deleted_at timestamp without time zone
);


ALTER TABLE public.friends OWNER TO postgres;

--
-- Name: friends_friend_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE friends_friend_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.friends_friend_id_seq OWNER TO postgres;

--
-- Name: friends_friend_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE friends_friend_id_seq OWNED BY friends.friend_id;


--
-- Name: migrations; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE migrations (
    migration character varying(255) NOT NULL,
    batch integer NOT NULL
);


ALTER TABLE public.migrations OWNER TO postgres;

--
-- Name: student; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE student (
    student_course_id integer NOT NULL,
    student_id integer NOT NULL,
    course_id integer NOT NULL,
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL,
    deleted_at timestamp without time zone
);


ALTER TABLE public.student OWNER TO postgres;

--
-- Name: student_student_course_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE student_student_course_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.student_student_course_id_seq OWNER TO postgres;

--
-- Name: student_student_course_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE student_student_course_id_seq OWNED BY student.student_course_id;


--
-- Name: teacher; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE teacher (
    teacher_course_id integer NOT NULL,
    teacher_id integer NOT NULL,
    course_id integer NOT NULL,
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL,
    deleted_at timestamp without time zone
);


ALTER TABLE public.teacher OWNER TO postgres;

--
-- Name: teacher_teacher_course_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE teacher_teacher_course_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.teacher_teacher_course_id_seq OWNER TO postgres;

--
-- Name: teacher_teacher_course_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE teacher_teacher_course_id_seq OWNED BY teacher.teacher_course_id;


--
-- Name: users; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE users (
    id integer NOT NULL,
    username character varying(32) NOT NULL,
    password character varying(64) NOT NULL,
    role character varying(255) NOT NULL,
    fname character varying(32) NOT NULL,
    mname character varying(32) NOT NULL,
    lname character varying(32) NOT NULL,
    gender character varying(255) NOT NULL,
    address character varying(255) NOT NULL,
    email character varying(255) NOT NULL,
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL,
    deleted_at timestamp without time zone,
    CONSTRAINT users_gender_check CHECK (((gender)::text = ANY ((ARRAY['male'::character varying, 'female'::character varying])::text[]))),
    CONSTRAINT users_role_check CHECK (((role)::text = ANY ((ARRAY['student'::character varying, 'teacher'::character varying])::text[])))
);


ALTER TABLE public.users OWNER TO postgres;

--
-- Name: users_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.users_id_seq OWNER TO postgres;

--
-- Name: users_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE users_id_seq OWNED BY users.id;


--
-- Name: course_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY course ALTER COLUMN course_id SET DEFAULT nextval('course_course_id_seq'::regclass);


--
-- Name: friend_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY friends ALTER COLUMN friend_id SET DEFAULT nextval('friends_friend_id_seq'::regclass);


--
-- Name: student_course_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY student ALTER COLUMN student_course_id SET DEFAULT nextval('student_student_course_id_seq'::regclass);


--
-- Name: teacher_course_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY teacher ALTER COLUMN teacher_course_id SET DEFAULT nextval('teacher_teacher_course_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY users ALTER COLUMN id SET DEFAULT nextval('users_id_seq'::regclass);


--
-- Data for Name: course; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- Name: course_course_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('course_course_id_seq', 1, false);


--
-- Data for Name: friends; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- Name: friends_friend_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('friends_friend_id_seq', 1, false);


--
-- Data for Name: migrations; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO migrations VALUES ('2014_07_06_035050_create_users_table', 1);
INSERT INTO migrations VALUES ('2014_07_07_012737_create_course_table', 1);
INSERT INTO migrations VALUES ('2014_07_07_012911_create_teacher_course_table', 1);
INSERT INTO migrations VALUES ('2014_07_07_014813_create_student_course_table', 1);
INSERT INTO migrations VALUES ('2014_07_07_014835_create_friends_table', 1);


--
-- Data for Name: student; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- Name: student_student_course_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('student_student_course_id_seq', 1, false);


--
-- Data for Name: teacher; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- Name: teacher_teacher_course_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('teacher_teacher_course_id_seq', 1, false);


--
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO users VALUES (4, 'jervey', 'ani', 'student', 'jervey', 'ricablanca', 'benitez', 'male', 'palao', 'jervey2008@gmail.com', '2014-08-04 01:56:57', '2014-08-04 01:56:57', NULL);
INSERT INTO users VALUES (5, 'asdf', 'lkjh', 'student', 'qwre', 'asd', 'vbxcb', 'male', 'zxuygvzixuytv', 'askufga@asdkufyasgdf.com', '2014-08-04 01:59:19', '2014-08-04 01:59:19', NULL);
INSERT INTO users VALUES (6, 'jerveyb', 'lkasjdflakj', 'student', 'ani', 'rica', 'beni', 'male', 'palao iligan pod', 'jervey2007@gmail.com', '2014-08-04 02:03:34', '2014-08-04 02:03:34', NULL);
INSERT INTO users VALUES (7, 'manny', 'pacman', 'teacher', 'manny', 'pacman', 'pacquiao', 'male', 'general santos', 'asdfasdf@adfkjal.com', '2014-08-04 02:04:38', '2014-08-04 02:04:38', NULL);


--
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('users_id_seq', 7, true);


--
-- Name: course_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY course
    ADD CONSTRAINT course_pkey PRIMARY KEY (course_id);


--
-- Name: friends_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY friends
    ADD CONSTRAINT friends_pkey PRIMARY KEY (friend_id);


--
-- Name: student_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY student
    ADD CONSTRAINT student_pkey PRIMARY KEY (student_course_id);


--
-- Name: teacher_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY teacher
    ADD CONSTRAINT teacher_pkey PRIMARY KEY (teacher_course_id);


--
-- Name: users_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);


--
-- Name: friends_f_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY friends
    ADD CONSTRAINT friends_f_id_foreign FOREIGN KEY (f_id) REFERENCES users(id);


--
-- Name: friends_user_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY friends
    ADD CONSTRAINT friends_user_id_foreign FOREIGN KEY (user_id) REFERENCES users(id);


--
-- Name: student_course_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY student
    ADD CONSTRAINT student_course_id_foreign FOREIGN KEY (course_id) REFERENCES course(course_id);


--
-- Name: student_student_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY student
    ADD CONSTRAINT student_student_id_foreign FOREIGN KEY (student_id) REFERENCES users(id);


--
-- Name: teacher_course_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY teacher
    ADD CONSTRAINT teacher_course_id_foreign FOREIGN KEY (course_id) REFERENCES course(course_id);


--
-- Name: teacher_teacher_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY teacher
    ADD CONSTRAINT teacher_teacher_id_foreign FOREIGN KEY (teacher_id) REFERENCES users(id);


--
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- PostgreSQL database dump complete
--

