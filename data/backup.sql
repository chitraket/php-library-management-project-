DROP TABLE add_books;

CREATE TABLE `add_books` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `books_name` varchar(50) NOT NULL,
  `cat_id` int(10) NOT NULL,
  `books_image` varchar(500) NOT NULL,
  `books_isbn` text NOT NULL,
  `books_author_name` varchar(50) NOT NULL,
  `books_publication_name` varchar(50) NOT NULL,
  `books_publication_date` varchar(20) NOT NULL,
  `books_date` varchar(20) NOT NULL,
  `books_price` varchar(20) NOT NULL,
  `books_qty` varchar(20) NOT NULL,
  `available_qty` varchar(20) NOT NULL,
  `librarian_username` varchar(50) NOT NULL,
  `status` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

INSERT INTO add_books VALUES("8","chit","1","5e2d0b6cda4b2h-man.jpg","1001","chit","chit","2020-06-01","2020-06-01 23:07:40","2000","2","2","chitraketsavani@gmail.com","yes");



DROP TABLE category;

CREATE TABLE `category` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `cat_name` text NOT NULL,
  `status` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

INSERT INTO category VALUES("1","cars","yes");



DROP TABLE issue_books;

CREATE TABLE `issue_books` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `student_enrollment` varchar(50) NOT NULL,
  `student_name` varchar(50) NOT NULL,
  `student_sem` varchar(50) NOT NULL,
  `student_contact` varchar(50) NOT NULL,
  `student_email` varchar(50) NOT NULL,
  `books_name` varchar(50) NOT NULL,
  `books_issue_date` varchar(50) NOT NULL,
  `books_return_date` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

INSERT INTO issue_books VALUES("5","201706100110091","test narola","4","9601994607","test@gmail.com","php","2020-06-01 23:01:12","2020-06-18 00:17:36");
INSERT INTO issue_books VALUES("6","201706100110091","aman narola","4","9601994607","narolaaman987@gmail.com","chit","2020-06-18 00:18:28","2020-06-18 00:18:35");
INSERT INTO issue_books VALUES("7","201706100110091","aman narola","4","9601994607","narolaaman987@gmail.com","chit","2020-06-18 00:18:54","2020-06-18 00:25:29");
INSERT INTO issue_books VALUES("8","201706100110091","aman narola","4","9601994607","narolaaman987@gmail.com","chit","2020-06-18 00:26:19","2020-06-20 00:28:14");
INSERT INTO issue_books VALUES("9","201706100110091","aman narola","4","9601994607","narolaaman987@gmail.com","chit","2020-06-01 00:28:22","2020-06-21 01:06:12");
INSERT INTO issue_books VALUES("10","201706100110091","aman narola","4","9601994607","narolaaman987@gmail.com","chit","2020-06-02 01:06:52","2020-06-02 01:17:41");
INSERT INTO issue_books VALUES("11","201706100110091","aman narola","4","9601994607","narolaaman987@gmail.com","chit","2020-06-02 01:17:54","2020-06-20 01:18:26");
INSERT INTO issue_books VALUES("12","201706100110091","aman narola","4","9601994607","narolaaman987@gmail.com","chit","2020-06-07 01:18:49","2020-06-07 01:18:55");
INSERT INTO issue_books VALUES("13","201706100110091","aman narola","4","9601994607","narolaaman987@gmail.com","chit","2020-06-02 01:21:36","2020-06-02 01:21:43");
INSERT INTO issue_books VALUES("14","201706100110091","aman narola","4","9601994607","narolaaman987@gmail.com","chit","2020-06-02 10:00:05","");



DROP TABLE librarian_registration;

CREATE TABLE `librarian_registration` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `images` text NOT NULL,
  `contact` varchar(50) NOT NULL,
  `roles` text NOT NULL,
  `permission` text NOT NULL,
  `status` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

INSERT INTO librarian_registration VALUES("3","test","narola","123456","test@gmail.com","Arief.jpeg","9601994607","sub","1,2,3,4,8,9,5,6,7","yes");
INSERT INTO librarian_registration VALUES("4","chit","savani","Chit@9125","chitraketsavani@gmail.com","5e2d0b6cda4b2h-man.jpg","7984498992","admin","1,2,3,4,5,6,7,8,9,44","yes");



DROP TABLE messages;

CREATE TABLE `messages` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `enrollment` text NOT NULL,
  `title` varchar(100) NOT NULL,
  `msg` varchar(500) NOT NULL,
  `date` text NOT NULL,
  `status` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

INSERT INTO messages VALUES("2","","Hello","                    Please submit your book                            ","","");
INSERT INTO messages VALUES("3","","Hello","            sdfsfsdfsdf                                    ","","");
INSERT INTO messages VALUES("4","","sasdsaf","           dsfsdfd                                     ","","");
INSERT INTO messages VALUES("5","201706100110091","chit","<p>vjfdgnm,gjusghorjcxfgutrhurtiu</p>","2020-06-02 10:03:13","yes");



DROP TABLE student_registration;

CREATE TABLE `student_registration` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `sem` varchar(50) NOT NULL,
  `enrollment` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

INSERT INTO student_registration VALUES("1","aman","narola","Ab7man91","narolaaman987@gmail.com","9601994607","4","201706100110091","yes");



