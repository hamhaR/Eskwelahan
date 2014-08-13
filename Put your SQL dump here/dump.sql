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
-- Name: homework; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE homework (
    homework_id integer NOT NULL,
    homework_num integer NOT NULL,
    homework_description text NOT NULL,
    homework_deadline timestamp without time zone NOT NULL,
    teacher_id integer NOT NULL,
    course_id integer NOT NULL,
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL,
    deleted_at timestamp without time zone
);


ALTER TABLE public.homework OWNER TO postgres;

--
-- Name: homework_homework_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE homework_homework_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.homework_homework_id_seq OWNER TO postgres;

--
-- Name: homework_homework_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE homework_homework_id_seq OWNED BY homework.homework_id;


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
-- Name: submit_homework; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE submit_homework (
    submit_homework_id integer NOT NULL,
    date_submitted timestamp without time zone NOT NULL,
    homework_id integer NOT NULL,
    student_id integer NOT NULL,
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL,
    deleted_at timestamp without time zone
);


ALTER TABLE public.submit_homework OWNER TO postgres;

--
-- Name: submit_homework_submit_homework_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE submit_homework_submit_homework_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.submit_homework_submit_homework_id_seq OWNER TO postgres;

--
-- Name: submit_homework_submit_homework_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE submit_homework_submit_homework_id_seq OWNED BY submit_homework.submit_homework_id;


--
-- Name: take_test; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE take_test (
    take_test_id integer NOT NULL,
    time_started timestamp without time zone NOT NULL,
    time_remaining timestamp without time zone NOT NULL,
    student_id integer NOT NULL,
    test_id integer NOT NULL,
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL,
    deleted_at timestamp without time zone
);


ALTER TABLE public.take_test OWNER TO postgres;

--
-- Name: take_test_take_test_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE take_test_take_test_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.take_test_take_test_id_seq OWNER TO postgres;

--
-- Name: take_test_take_test_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE take_test_take_test_id_seq OWNED BY take_test.take_test_id;


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
-- Name: test; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE test (
    test_id integer NOT NULL,
    test_num integer NOT NULL,
    questions text NOT NULL,
    answer_key text NOT NULL,
    teacher_id integer NOT NULL,
    course_id integer NOT NULL,
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL,
    deleted_at timestamp without time zone
);


ALTER TABLE public.test OWNER TO postgres;

--
-- Name: test_test_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE test_test_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.test_test_id_seq OWNER TO postgres;

--
-- Name: test_test_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE test_test_id_seq OWNED BY test.test_id;


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
    CONSTRAINT users_gender_check CHECK (((gender)::text = ANY (ARRAY[('male'::character varying)::text, ('female'::character varying)::text]))),
    CONSTRAINT users_role_check CHECK (((role)::text = ANY (ARRAY[('student'::character varying)::text, ('teacher'::character varying)::text])))
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
-- Name: homework_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY homework ALTER COLUMN homework_id SET DEFAULT nextval('homework_homework_id_seq'::regclass);


--
-- Name: student_course_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY student ALTER COLUMN student_course_id SET DEFAULT nextval('student_student_course_id_seq'::regclass);


--
-- Name: submit_homework_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY submit_homework ALTER COLUMN submit_homework_id SET DEFAULT nextval('submit_homework_submit_homework_id_seq'::regclass);


--
-- Name: take_test_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY take_test ALTER COLUMN take_test_id SET DEFAULT nextval('take_test_take_test_id_seq'::regclass);


--
-- Name: teacher_course_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY teacher ALTER COLUMN teacher_course_id SET DEFAULT nextval('teacher_teacher_course_id_seq'::regclass);


--
-- Name: test_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY test ALTER COLUMN test_id SET DEFAULT nextval('test_test_id_seq'::regclass);


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

SELECT pg_catalog.setval('friends_friend_id_seq', 4, true);


--
-- Data for Name: homework; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- Name: homework_homework_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('homework_homework_id_seq', 1, false);


--
-- Data for Name: migrations; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO migrations VALUES ('2014_07_06_035050_create_users_table', 1);
INSERT INTO migrations VALUES ('2014_07_07_012737_create_course_table', 1);
INSERT INTO migrations VALUES ('2014_07_07_012911_create_teacher_course_table', 1);
INSERT INTO migrations VALUES ('2014_07_07_014813_create_student_course_table', 1);
INSERT INTO migrations VALUES ('2014_07_07_014835_create_friends_table', 1);
INSERT INTO migrations VALUES ('2014_08_07_054909_create_homework_table', 2);
INSERT INTO migrations VALUES ('2014_08_07_054934_create_test_table', 2);
INSERT INTO migrations VALUES ('2014_08_07_055017_create_submit_homework_table', 2);
INSERT INTO migrations VALUES ('2014_08_07_055221_create_take_test_table', 2);


--
-- Data for Name: student; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- Name: student_student_course_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('student_student_course_id_seq', 1, false);


--
-- Data for Name: submit_homework; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- Name: submit_homework_submit_homework_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('submit_homework_submit_homework_id_seq', 1, false);


--
-- Data for Name: take_test; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- Name: take_test_take_test_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('take_test_take_test_id_seq', 1, false);


--
-- Data for Name: teacher; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- Name: teacher_teacher_course_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('teacher_teacher_course_id_seq', 1, false);


--
-- Data for Name: test; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- Name: test_test_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('test_test_id_seq', 1, false);


--
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO users VALUES (1, 'student1', '$2y$10$tubqgo4qELEAiiqyF7VYPuhU8LK9gOVHRaIy/F8N8SgnU4v51hYZm', 'student', 'San', 'Juan', 'Dela Cruz', 'male', 'Iligan City', 'sanjuan.delacruz@wailing-mountains.net', '2014-08-10 03:37:16', '2014-08-10 03:37:16', NULL);
INSERT INTO users VALUES (2, '2student', '$2y$10$baLYW8NZJdgrCV2AzLbzlOcwjAOl2xjfhtn3DzRmCIpafCfBlxnj2', 'student', 'Pablo', 'Tan', 'Yu', 'male', 'Bacolod City', 'pablo.yu@seharbinger.au', '2014-08-10 03:37:16', '2014-08-10 03:37:16', NULL);
INSERT INTO users VALUES (3, 'teacher', '$2y$10$.3xlDrpbWuQnlJd3.t5oEOr0oohN5x.wVppGnsXswByirLYG4LxjG', 'teacher', 'Francesca', 'Alde', 'Merced', 'female', 'Manila City', 'francesca@yahoo.com.au', '2014-08-10 03:37:16', '2014-08-10 03:37:16', NULL);


--
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('users_id_seq', 3, true);


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
-- Name: homework_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY homework
    ADD CONSTRAINT homework_pkey PRIMARY KEY (homework_id);


--
-- Name: student_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY student
    ADD CONSTRAINT student_pkey PRIMARY KEY (student_course_id);


--
-- Name: submit_homework_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY submit_homework
    ADD CONSTRAINT submit_homework_pkey PRIMARY KEY (submit_homework_id);


--
-- Name: take_test_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY take_test
    ADD CONSTRAINT take_test_pkey PRIMARY KEY (take_test_id);


--
-- Name: teacher_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY teacher
    ADD CONSTRAINT teacher_pkey PRIMARY KEY (teacher_course_id);


--
-- Name: test_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY test
    ADD CONSTRAINT test_pkey PRIMARY KEY (test_id);


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
-- Name: homework_course_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY homework
    ADD CONSTRAINT homework_course_id_foreign FOREIGN KEY (course_id) REFERENCES course(course_id);


--
-- Name: homework_teacher_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY homework
    ADD CONSTRAINT homework_teacher_id_foreign FOREIGN KEY (teacher_id) REFERENCES users(id);


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
-- Name: submit_homework_homework_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY submit_homework
    ADD CONSTRAINT submit_homework_homework_id_foreign FOREIGN KEY (homework_id) REFERENCES homework(homework_id);


--
-- Name: submit_homework_student_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY submit_homework
    ADD CONSTRAINT submit_homework_student_id_foreign FOREIGN KEY (student_id) REFERENCES users(id);


--
-- Name: take_test_student_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY take_test
    ADD CONSTRAINT take_test_student_id_foreign FOREIGN KEY (student_id) REFERENCES users(id);


--
-- Name: take_test_test_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY take_test
    ADD CONSTRAINT take_test_test_id_foreign FOREIGN KEY (test_id) REFERENCES test(test_id);


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
-- Name: test_course_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY test
    ADD CONSTRAINT test_course_id_foreign FOREIGN KEY (course_id) REFERENCES course(course_id);


--
-- Name: test_teacher_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY test
    ADD CONSTRAINT test_teacher_id_foreign FOREIGN KEY (teacher_id) REFERENCES users(id);


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

