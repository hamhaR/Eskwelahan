--
-- PostgreSQL database dump
--

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: courses; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE courses (
    id integer NOT NULL,
    course_code character varying(10) NOT NULL,
    course_title character varying(32) NOT NULL,
    course_description character varying(250) NOT NULL,
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL,
    deleted_at timestamp without time zone
);


ALTER TABLE public.courses OWNER TO postgres;

--
-- Name: courses_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE courses_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.courses_id_seq OWNER TO postgres;

--
-- Name: courses_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE courses_id_seq OWNED BY courses.id;


--
-- Name: friends; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE friends (
    id integer NOT NULL,
    user_id integer NOT NULL,
    f_id integer NOT NULL,
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL,
    deleted_at timestamp without time zone
);


ALTER TABLE public.friends OWNER TO postgres;

--
-- Name: friends_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE friends_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.friends_id_seq OWNER TO postgres;

--
-- Name: friends_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE friends_id_seq OWNED BY friends.id;


--
-- Name: homeworks; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE homeworks (
    id integer NOT NULL,
    homework_instruction text NOT NULL,
    teacher_id integer NOT NULL,
    course_id integer NOT NULL,
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL,
    deleted_at timestamp without time zone
);


ALTER TABLE public.homeworks OWNER TO postgres;

--
-- Name: homeworks_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE homeworks_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.homeworks_id_seq OWNER TO postgres;

--
-- Name: homeworks_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE homeworks_id_seq OWNED BY homeworks.id;


--
-- Name: migrations; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE migrations (
    migration character varying(255) NOT NULL,
    batch integer NOT NULL
);


ALTER TABLE public.migrations OWNER TO postgres;

--
-- Name: student_courses; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE student_courses (
    id integer NOT NULL,
    student_id integer NOT NULL,
    course_id integer NOT NULL,
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL,
    deleted_at timestamp without time zone
);


ALTER TABLE public.student_courses OWNER TO postgres;

--
-- Name: student_courses_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE student_courses_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.student_courses_id_seq OWNER TO postgres;

--
-- Name: student_courses_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE student_courses_id_seq OWNED BY student_courses.id;


--
-- Name: submit_homeworks; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE submit_homeworks (
    id integer NOT NULL,
    date_submitted timestamp without time zone NOT NULL,
    deadline timestamp without time zone NOT NULL,
    homework_id integer NOT NULL,
    student_id integer NOT NULL,
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL,
    deleted_at timestamp without time zone
);


ALTER TABLE public.submit_homeworks OWNER TO postgres;

--
-- Name: submit_homeworks_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE submit_homeworks_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.submit_homeworks_id_seq OWNER TO postgres;

--
-- Name: submit_homeworks_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE submit_homeworks_id_seq OWNED BY submit_homeworks.id;


--
-- Name: take_tests; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE take_tests (
    id integer NOT NULL,
    time_started timestamp without time zone NOT NULL,
    time_remaining timestamp without time zone NOT NULL,
    student_id integer NOT NULL,
    test_id integer NOT NULL,
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL,
    deleted_at timestamp without time zone
);


ALTER TABLE public.take_tests OWNER TO postgres;

--
-- Name: take_tests_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE take_tests_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.take_tests_id_seq OWNER TO postgres;

--
-- Name: take_tests_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE take_tests_id_seq OWNED BY take_tests.id;


--
-- Name: teacher_courses; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE teacher_courses (
    id integer NOT NULL,
    teacher_id integer NOT NULL,
    course_id integer NOT NULL,
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL,
    deleted_at timestamp without time zone
);


ALTER TABLE public.teacher_courses OWNER TO postgres;

--
-- Name: teacher_courses_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE teacher_courses_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.teacher_courses_id_seq OWNER TO postgres;

--
-- Name: teacher_courses_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE teacher_courses_id_seq OWNED BY teacher_courses.id;


--
-- Name: tests; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE tests (
    id integer NOT NULL,
    test_questions text NOT NULL,
    test_answer_key text NOT NULL,
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL,
    deleted_at timestamp without time zone
);


ALTER TABLE public.tests OWNER TO postgres;

--
-- Name: tests_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE tests_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tests_id_seq OWNER TO postgres;

--
-- Name: tests_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE tests_id_seq OWNED BY tests.id;


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
    remember_token text,
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL,
    deleted_at timestamp without time zone,
    CONSTRAINT users_gender_check CHECK (((gender)::text = ANY ((ARRAY['male'::character varying, 'female'::character varying])::text[]))),
    CONSTRAINT users_role_check CHECK (((role)::text = ANY ((ARRAY['admin'::character varying, 'student'::character varying, 'teacher'::character varying])::text[])))
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
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY courses ALTER COLUMN id SET DEFAULT nextval('courses_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY friends ALTER COLUMN id SET DEFAULT nextval('friends_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY homeworks ALTER COLUMN id SET DEFAULT nextval('homeworks_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY student_courses ALTER COLUMN id SET DEFAULT nextval('student_courses_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY submit_homeworks ALTER COLUMN id SET DEFAULT nextval('submit_homeworks_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY take_tests ALTER COLUMN id SET DEFAULT nextval('take_tests_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY teacher_courses ALTER COLUMN id SET DEFAULT nextval('teacher_courses_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tests ALTER COLUMN id SET DEFAULT nextval('tests_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY users ALTER COLUMN id SET DEFAULT nextval('users_id_seq'::regclass);


--
-- Data for Name: courses; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO courses VALUES (1, 'CSC188', 'Software Project Management', 'a software project management course', '2014-08-14 04:03:16', '2014-08-14 04:03:16', NULL);


--
-- Name: courses_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('courses_id_seq', 1, true);


--
-- Data for Name: friends; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO friends VALUES (1, 1, 2, '2014-08-14 04:03:16', '2014-08-14 04:03:16', NULL);


--
-- Name: friends_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('friends_id_seq', 1, true);


--
-- Data for Name: homeworks; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO homeworks VALUES (1, '<p>Homework 1: How to Headshot Trolls</p>

<p>Read up on basic sniping and write an essay on headshotting trolls.</p>

<p><strong>DEADLINE:</strong> 30 August 2014, 11:59 PM</p>
', 5, 1, '2014-08-14 04:18:46', '2014-08-14 04:18:46', NULL);


--
-- Name: homeworks_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('homeworks_id_seq', 1, true);


--
-- Data for Name: migrations; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO migrations VALUES ('2014_08_06_173551_create_test_table', 1);
INSERT INTO migrations VALUES ('2014_08_06_173732_create_users_table', 1);
INSERT INTO migrations VALUES ('2014_08_06_173813_create_course_table', 1);
INSERT INTO migrations VALUES ('2014_08_06_173635_create_homework_table', 2);
INSERT INTO migrations VALUES ('2014_08_06_173922_create_teacher_course_table', 2);
INSERT INTO migrations VALUES ('2014_08_06_173952_create_student_course_table', 2);
INSERT INTO migrations VALUES ('2014_08_06_174022_create_friends_table', 2);
INSERT INTO migrations VALUES ('2014_08_06_174101_create_submit_homework_table', 2);
INSERT INTO migrations VALUES ('2014_08_06_174124_create_take_test_table', 2);


--
-- Data for Name: student_courses; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO student_courses VALUES (1, 3, 1, '2014-08-14 04:03:16', '2014-08-14 04:03:16', NULL);


--
-- Name: student_courses_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('student_courses_id_seq', 1, true);


--
-- Data for Name: submit_homeworks; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- Name: submit_homeworks_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('submit_homeworks_id_seq', 1, false);


--
-- Data for Name: take_tests; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- Name: take_tests_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('take_tests_id_seq', 1, false);


--
-- Data for Name: teacher_courses; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO teacher_courses VALUES (1, 5, 1, '2014-08-14 04:03:16', '2014-08-14 04:03:16', NULL);


--
-- Name: teacher_courses_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('teacher_courses_id_seq', 1, true);


--
-- Data for Name: tests; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- Name: tests_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('tests_id_seq', 1, false);


--
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO users VALUES (1, 'student1', '$2y$10$8qpcItOG5yCfY26ohL9sze8pmP/2wltL95PGu.OntkBN63HF6zA42', 'student', 'San', 'Juan', 'Dela Cruz', 'male', 'Iligan City', 'sanjuan.delacruz@wailing-mountains.net', NULL, '2014-08-14 04:03:15', '2014-08-14 04:03:15', NULL);
INSERT INTO users VALUES (2, '2student', '$2y$10$Ctbvo7xZWGQ95CAhS9Syf.UPsziqECUTjwsuegdgo.VUAoNUGL9vO', 'student', 'Pablo', 'Tan', 'Yu', 'male', 'Bacolod City', 'pablo.yu@seharbinger.au', NULL, '2014-08-14 04:03:16', '2014-08-14 04:03:16', NULL);
INSERT INTO users VALUES (3, 'juan', '$2y$10$HdN8XU8T4nbs4maO.8eeRuRFZes5Y51fPCmKWAZujXBINYqYOCgFC', 'student', 'Juan', 'Hindi', 'Tamad', 'male', 'Iligan City', 'juan.tamad@seharbinger.au', NULL, '2014-08-14 04:03:16', '2014-08-14 04:03:16', NULL);
INSERT INTO users VALUES (4, 'teacher', '$2y$10$AmiL.OHJViFlhGll7roYkOyMPWDWwAB/Mn.7xkyL0iIUcQTwvE7Ym', 'teacher', 'Francesca', 'Alde', 'Merced', 'female', 'Manila City', 'francesca@yahoo.com.au', NULL, '2014-08-14 04:03:16', '2014-08-14 04:03:16', NULL);
INSERT INTO users VALUES (6, 'admin', '$2y$10$XaVUjUJGkkxEtUyONAAsKOW.3u4N.vI7byCLQMSz2rpyA/SOA/U6a', 'admin', 'Sunshine', 'Encabo', 'Podiotan', 'female', 'Iligan City', 'shine.podiotan@seharbinger.au', NULL, '2014-08-14 04:03:16', '2014-08-14 04:03:16', NULL);
INSERT INTO users VALUES (5, 'samantha', '$2y$10$ckO9kueYI5GCN6MKmxheauNG51cXFffbvzymVg8cUX/V0cs5RRWaq', 'teacher', 'Samantha', 'Tan', 'Reyes', 'female', 'Iligan City', 'sam.reyes@seharbinger.au', 'MudqYl2RI2FZXITj2oJ5kKhSsNOWKD8lGogbwKE20mFnSOhaxNA700EFOBR8', '2014-08-14 04:03:16', '2014-08-14 04:09:15', NULL);


--
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('users_id_seq', 6, true);


--
-- Name: courses_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY courses
    ADD CONSTRAINT courses_pkey PRIMARY KEY (id);


--
-- Name: friends_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY friends
    ADD CONSTRAINT friends_pkey PRIMARY KEY (id);


--
-- Name: homeworks_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY homeworks
    ADD CONSTRAINT homeworks_pkey PRIMARY KEY (id);


--
-- Name: student_courses_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY student_courses
    ADD CONSTRAINT student_courses_pkey PRIMARY KEY (id);


--
-- Name: submit_homeworks_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY submit_homeworks
    ADD CONSTRAINT submit_homeworks_pkey PRIMARY KEY (id);


--
-- Name: take_tests_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY take_tests
    ADD CONSTRAINT take_tests_pkey PRIMARY KEY (id);


--
-- Name: teacher_courses_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY teacher_courses
    ADD CONSTRAINT teacher_courses_pkey PRIMARY KEY (id);


--
-- Name: tests_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY tests
    ADD CONSTRAINT tests_pkey PRIMARY KEY (id);


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
-- Name: homeworks_course_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY homeworks
    ADD CONSTRAINT homeworks_course_id_foreign FOREIGN KEY (course_id) REFERENCES courses(id);


--
-- Name: homeworks_teacher_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY homeworks
    ADD CONSTRAINT homeworks_teacher_id_foreign FOREIGN KEY (teacher_id) REFERENCES users(id);


--
-- Name: student_courses_course_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY student_courses
    ADD CONSTRAINT student_courses_course_id_foreign FOREIGN KEY (course_id) REFERENCES courses(id);


--
-- Name: student_courses_student_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY student_courses
    ADD CONSTRAINT student_courses_student_id_foreign FOREIGN KEY (student_id) REFERENCES users(id);


--
-- Name: submit_homeworks_homework_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY submit_homeworks
    ADD CONSTRAINT submit_homeworks_homework_id_foreign FOREIGN KEY (homework_id) REFERENCES homeworks(id);


--
-- Name: submit_homeworks_student_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY submit_homeworks
    ADD CONSTRAINT submit_homeworks_student_id_foreign FOREIGN KEY (student_id) REFERENCES users(id);


--
-- Name: take_tests_student_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY take_tests
    ADD CONSTRAINT take_tests_student_id_foreign FOREIGN KEY (student_id) REFERENCES users(id);


--
-- Name: take_tests_test_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY take_tests
    ADD CONSTRAINT take_tests_test_id_foreign FOREIGN KEY (test_id) REFERENCES tests(id);


--
-- Name: teacher_courses_course_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY teacher_courses
    ADD CONSTRAINT teacher_courses_course_id_foreign FOREIGN KEY (course_id) REFERENCES courses(id);


--
-- Name: teacher_courses_teacher_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY teacher_courses
    ADD CONSTRAINT teacher_courses_teacher_id_foreign FOREIGN KEY (teacher_id) REFERENCES users(id);


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

