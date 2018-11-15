CREATE TABLE category (
  id INTEGER PRIMARY KEY AUTO_INCREMENT,
  name varchar(200) NOT NULL,
  issue tinyint(1) default 1
);

CREATE TABLE entry (
  id INTEGER PRIMARY KEY AUTO_INCREMENT,
  name varchar(200) NOT NULL,
  date_of_entry date NOT NULL,
  amount float(5,2) NOT NULL,
  category_id integer NOT NULL
);