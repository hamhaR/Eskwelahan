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
-- Name: choices; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE choices (
    id integer NOT NULL,
    options character varying(255) NOT NULL,
    question_id integer NOT NULL,
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL,
    deleted_at timestamp without time zone
);


ALTER TABLE public.choices OWNER TO postgres;

--
-- Name: choices_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE choices_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.choices_id_seq OWNER TO postgres;

--
-- Name: choices_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE choices_id_seq OWNED BY choices.id;


--
-- Name: courses; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE courses (
    id integer NOT NULL,
    course_code character varying(10) NOT NULL,
    course_title text NOT NULL,
    course_description text NOT NULL,
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
    homework_title character varying(255) NOT NULL,
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
-- Name: questions; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE questions (
    id integer NOT NULL,
    content text NOT NULL,
    choice1 character varying(255) NOT NULL,
    choice2 character varying(255) NOT NULL,
    choice3 character varying(255) NOT NULL,
    choice4 character varying(255) NOT NULL,
    answer character varying(255) NOT NULL,
    test_id integer NOT NULL,
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL,
    deleted_at timestamp without time zone
);


ALTER TABLE public.questions OWNER TO postgres;

--
-- Name: questions_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE questions_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.questions_id_seq OWNER TO postgres;

--
-- Name: questions_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE questions_id_seq OWNED BY questions.id;


--
-- Name: section_course; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE section_course (
    section_course_id integer NOT NULL,
    section_id integer NOT NULL,
    course_id integer NOT NULL,
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL,
    deleted_at timestamp without time zone
);


ALTER TABLE public.section_course OWNER TO postgres;

--
-- Name: section_course_section_course_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE section_course_section_course_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.section_course_section_course_id_seq OWNER TO postgres;

--
-- Name: section_course_section_course_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE section_course_section_course_id_seq OWNED BY section_course.section_course_id;


--
-- Name: section_students; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE section_students (
    id integer NOT NULL,
    section_id integer NOT NULL,
    student_id integer NOT NULL,
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL,
    deleted_at timestamp without time zone
);


ALTER TABLE public.section_students OWNER TO postgres;

--
-- Name: section_students_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE section_students_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.section_students_id_seq OWNER TO postgres;

--
-- Name: section_students_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE section_students_id_seq OWNED BY section_students.id;


--
-- Name: sections; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE sections (
    section_id integer NOT NULL,
    section_name character varying(255) NOT NULL,
    teacher_id integer NOT NULL,
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL,
    deleted_at timestamp without time zone
);


ALTER TABLE public.sections OWNER TO postgres;

--
-- Name: sections_section_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE sections_section_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.sections_section_id_seq OWNER TO postgres;

--
-- Name: sections_section_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE sections_section_id_seq OWNED BY sections.section_id;


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
-- Name: students; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE students (
    id integer NOT NULL,
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL
);


ALTER TABLE public.students OWNER TO postgres;

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
    answer character(255) NOT NULL,
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
    test_name character varying(30) NOT NULL,
    "testDate" timestamp without time zone NOT NULL,
    teacher_id integer NOT NULL,
    course_id integer NOT NULL,
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

ALTER TABLE ONLY choices ALTER COLUMN id SET DEFAULT nextval('choices_id_seq'::regclass);


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

ALTER TABLE ONLY questions ALTER COLUMN id SET DEFAULT nextval('questions_id_seq'::regclass);


--
-- Name: section_course_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY section_course ALTER COLUMN section_course_id SET DEFAULT nextval('section_course_section_course_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY section_students ALTER COLUMN id SET DEFAULT nextval('section_students_id_seq'::regclass);


--
-- Name: section_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY sections ALTER COLUMN section_id SET DEFAULT nextval('sections_section_id_seq'::regclass);


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
-- Data for Name: choices; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- Name: choices_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('choices_id_seq', 1, false);


--
-- Data for Name: courses; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO courses VALUES (1, 'CSC188', 'Software Project Management', 'a software project management course', '2014-10-02 01:20:12', '2014-10-02 01:20:12', NULL);
INSERT INTO courses VALUES (2, 'CSC186', 'Human Computer Interaction', 'a human computer interaction course for cs students', '2014-10-02 01:20:12', '2014-10-02 01:20:12', NULL);
INSERT INTO courses VALUES (3, 'HIST1', 'Philippines History', 'the history of the philippines', '2014-10-02 01:20:12', '2014-10-02 01:20:12', NULL);


--
-- Name: courses_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('courses_id_seq', 3, true);


--
-- Data for Name: friends; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- Name: friends_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('friends_id_seq', 1, false);


--
-- Data for Name: homeworks; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- Name: homeworks_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('homeworks_id_seq', 1, false);


--
-- Data for Name: migrations; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO migrations VALUES ('2014_08_06_173732_create_users_table', 1);
INSERT INTO migrations VALUES ('2014_08_06_173813_create_course_table', 1);
INSERT INTO migrations VALUES ('2014_08_06_173922_create_teacher_course_table', 1);
INSERT INTO migrations VALUES ('2014_08_06_173935_create_homework_table', 1);
INSERT INTO migrations VALUES ('2014_08_06_174022_create_friends_table', 1);
INSERT INTO migrations VALUES ('2014_08_06_174034_create_test_table', 1);
INSERT INTO migrations VALUES ('2014_08_06_174101_create_submit_homework_table', 1);
INSERT INTO migrations VALUES ('2014_08_06_174124_create_take_test_table', 1);
INSERT INTO migrations VALUES ('2014_08_11_021911_create_student_course_table', 1);
INSERT INTO migrations VALUES ('2014_08_17_211919_create_student_table', 1);
INSERT INTO migrations VALUES ('2014_09_01_162204_create_questions_table', 1);
INSERT INTO migrations VALUES ('2014_09_03_171344_create_choices_table', 1);
INSERT INTO migrations VALUES ('2014_09_05_034004_create_sections_table', 1);
INSERT INTO migrations VALUES ('2014_09_06_143447_create_section_students_table', 1);
INSERT INTO migrations VALUES ('2014_09_07_105621_create_section_course_table', 1);


--
-- Data for Name: questions; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- Name: questions_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('questions_id_seq', 1, false);


--
-- Data for Name: section_course; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- Name: section_course_section_course_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('section_course_section_course_id_seq', 1, false);


--
-- Data for Name: section_students; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO section_students VALUES (1, 1, 7, '2014-10-02 01:20:13', '2014-10-02 01:20:13', NULL);
INSERT INTO section_students VALUES (2, 1, 8, '2014-10-02 01:20:13', '2014-10-02 01:20:13', NULL);
INSERT INTO section_students VALUES (3, 1, 9, '2014-10-02 01:20:13', '2014-10-02 01:20:13', NULL);
INSERT INTO section_students VALUES (4, 2, 7, '2014-10-02 01:20:13', '2014-10-02 01:20:13', NULL);
INSERT INTO section_students VALUES (5, 2, 8, '2014-10-02 01:20:13', '2014-10-02 01:20:13', NULL);
INSERT INTO section_students VALUES (6, 2, 9, '2014-10-02 01:20:13', '2014-10-02 01:20:13', NULL);
INSERT INTO section_students VALUES (7, 3, 7, '2014-10-02 01:20:13', '2014-10-02 01:20:13', NULL);
INSERT INTO section_students VALUES (8, 3, 8, '2014-10-02 01:20:13', '2014-10-02 01:20:13', NULL);
INSERT INTO section_students VALUES (9, 3, 9, '2014-10-02 01:20:13', '2014-10-02 01:20:13', NULL);


--
-- Name: section_students_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('section_students_id_seq', 9, true);


--
-- Data for Name: sections; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO sections VALUES (1, 'A123', 10, '2014-10-02 01:20:13', '2014-10-02 01:20:13', NULL);
INSERT INTO sections VALUES (2, 'B123', 11, '2014-10-02 01:20:13', '2014-10-02 01:20:13', NULL);
INSERT INTO sections VALUES (3, 'C123', 10, '2014-10-02 01:20:13', '2014-10-02 01:20:13', NULL);


--
-- Name: sections_section_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('sections_section_id_seq', 3, true);


--
-- Data for Name: student_courses; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- Name: student_courses_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('student_courses_id_seq', 1, false);


--
-- Data for Name: students; Type: TABLE DATA; Schema: public; Owner: postgres
--



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

INSERT INTO teacher_courses VALUES (1, 5, 1, '2014-10-02 01:20:13', '2014-10-02 01:20:13', NULL);
INSERT INTO teacher_courses VALUES (2, 5, 2, '2014-10-02 01:20:13', '2014-10-02 01:20:13', NULL);
INSERT INTO teacher_courses VALUES (3, 4, 3, '2014-10-02 01:20:13', '2014-10-02 01:20:13', NULL);


--
-- Name: teacher_courses_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('teacher_courses_id_seq', 3, true);


--
-- Data for Name: tests; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO tests VALUES (1, 'Exciting long exam', '2014-10-02 08:00:00', 5, 1, '2014-10-02 01:46:32', '2014-10-02 01:46:32', NULL);


--
-- Name: tests_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('tests_id_seq', 1, true);


--
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO users VALUES (1, 'student1', '$2y$10$aI4gwhSGgRkf0rWPmiI6aOqZbcGbX0dMv3IpnlNZWqU9KQ2NYIqma', 'student', 'San', 'Juan', 'Dela Cruz', 'male', 'Iligan City', 'sanjuan.delacruz@wailing-mountains.net', NULL, '2014-10-02 01:20:11', '2014-10-02 01:20:11', NULL);
INSERT INTO users VALUES (2, '2student', '$2y$10$/9vX4OLgQLZ11.TKo66KvOecnmWmwR/anRwU2AfE56rtT/37vFYf6', 'student', 'Pablo', 'Tan', 'Yu', 'male', 'Bacolod City', 'pablo.yu@seharbinger.au', NULL, '2014-10-02 01:20:11', '2014-10-02 01:20:11', NULL);
INSERT INTO users VALUES (3, 'juan', '$2y$10$M25rdOoflkGpWQ2AZvqy0.7HtUD9Pp.Va8C8TwhV.YNBWUgRvVRVO', 'student', 'Juan', 'Hindi', 'Tamad', 'male', 'Iligan City', 'juan.tamad@seharbinger.au', NULL, '2014-10-02 01:20:12', '2014-10-02 01:20:12', NULL);
INSERT INTO users VALUES (4, 'teacher', '$2y$10$yEqtEWUTZilaZU1JwvXP4uFsiaR8P0vcESi/SJKJZ7earkEOpTe5y', 'teacher', 'Francesca', 'Alde', 'Merced', 'female', 'Manila City', 'francesca@yahoo.com.au', NULL, '2014-10-02 01:20:12', '2014-10-02 01:20:12', NULL);
INSERT INTO users VALUES (6, 'admin', '$2y$10$0PqufhCDhTKKuJB6dUhfqOtJ8thoktaf5PrdGaoWy.ECyf/zHpJq6', 'admin', 'Sunshine', 'Encabo', 'Podiotan', 'female', 'Iligan City', 'shine.podiotan@seharbinger.au', NULL, '2014-10-02 01:20:12', '2014-10-02 01:20:12', NULL);
INSERT INTO users VALUES (7, 'student10', '$2y$10$iORI/LXSR5WC76KddEE3x.krJgvLAIXcOZok0jQBZ929vtj4U.QQi', 'student', 'Vercillius', 'Avanzado', 'Mila', 'male', 'Iligan City', 'vmila@gmail.com', NULL, '2014-10-02 01:20:13', '2014-10-02 01:20:13', NULL);
INSERT INTO users VALUES (8, 'student11', '$2y$10$D7v0DV3wpqRH7Ptwx2f8deCVBKh4s7P8Dj/6sNqWhQKP20/7Zt33C', 'student', 'Vercillius2', 'Avanzado2', 'Mila2', 'male', 'Iligan City', 'vmila@gmail.com', NULL, '2014-10-02 01:20:13', '2014-10-02 01:20:13', NULL);
INSERT INTO users VALUES (9, 'student13', '$2y$10$nGQE0TJhnRZkxHIQYqwyuOjZdzXnvrhbiT6EMZlYapcCA3sxOnNhK', 'student', 'Vercillius3', 'Avanzado3', 'Mila3', 'male', 'Iligan City', 'vmila@gmail.com', NULL, '2014-10-02 01:20:13', '2014-10-02 01:20:13', NULL);
INSERT INTO users VALUES (10, 'student15', '$2y$10$2ukXw6.k7XhRigqKALnDAeZ1HjXyiOnVaOMf/fnDIHStjYt3LU4oe', 'teacher', 'Vercillius5', 'Avanzado5', 'Mila3', 'male', 'Iligan City', 'vmila@gmail.com', NULL, '2014-10-02 01:20:13', '2014-10-02 01:20:13', NULL);
INSERT INTO users VALUES (11, 'student16', '$2y$10$iUcL8X6/eb8ReNk7z93PbO3eS1y27x.sBZkj4U770TiBhS6LxGfJi', 'teacher', 'Vercillius6', 'Avanzado6', 'Mila6', 'male', 'Iligan City', 'vmila@gmail.com', NULL, '2014-10-02 01:20:13', '2014-10-02 01:20:13', NULL);
INSERT INTO users VALUES (5, 'samantha', '$2y$10$QdFpUngULAUfkI8D9L6UROGAa/PO0sKbUJWw1p4rYOh02Q2N/VcEK', 'teacher', 'Samantha', 'Tan', 'Reyes', 'female', 'Iligan City', 'sam.reyes@seharbinger.au', 'HczKF8J5PPtyLu2EgO3G9E3UzzkRrsG56EGADejhCgujU8JMWpOO0kGBnHi7', '2014-10-02 01:20:12', '2014-10-02 01:22:55', NULL);


--
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('users_id_seq', 11, true);


--
-- Name: choices_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY choices
    ADD CONSTRAINT choices_pkey PRIMARY KEY (id);


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
-- Name: questions_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY questions
    ADD CONSTRAINT questions_pkey PRIMARY KEY (id);


--
-- Name: section_course_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY section_course
    ADD CONSTRAINT section_course_pkey PRIMARY KEY (section_course_id);


--
-- Name: section_students_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY section_students
    ADD CONSTRAINT section_students_pkey PRIMARY KEY (id);


--
-- Name: sections_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY sections
    ADD CONSTRAINT sections_pkey PRIMARY KEY (section_id);


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
-- Name: choices_question_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY choices
    ADD CONSTRAINT choices_question_id_foreign FOREIGN KEY (question_id) REFERENCES questions(id);


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
-- Name: questions_test_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY questions
    ADD CONSTRAINT questions_test_id_foreign FOREIGN KEY (test_id) REFERENCES tests(id);


--
-- Name: section_course_course_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY section_course
    ADD CONSTRAINT section_course_course_id_foreign FOREIGN KEY (course_id) REFERENCES courses(id);


--
-- Name: section_course_section_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY section_course
    ADD CONSTRAINT section_course_section_id_foreign FOREIGN KEY (section_id) REFERENCES sections(section_id);


--
-- Name: section_students_section_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY section_students
    ADD CONSTRAINT section_students_section_id_foreign FOREIGN KEY (section_id) REFERENCES sections(section_id);


--
-- Name: section_students_student_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY section_students
    ADD CONSTRAINT section_students_student_id_foreign FOREIGN KEY (student_id) REFERENCES users(id);


--
-- Name: sections_teacher_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY sections
    ADD CONSTRAINT sections_teacher_id_foreign FOREIGN KEY (teacher_id) REFERENCES users(id);


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
-- Name: students_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY students
    ADD CONSTRAINT students_id_foreign FOREIGN KEY (id) REFERENCES users(id);


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
-- Name: tests_course_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tests
    ADD CONSTRAINT tests_course_id_foreign FOREIGN KEY (course_id) REFERENCES courses(id);


--
-- Name: tests_teacher_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tests
    ADD CONSTRAINT tests_teacher_id_foreign FOREIGN KEY (teacher_id) REFERENCES users(id);


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

