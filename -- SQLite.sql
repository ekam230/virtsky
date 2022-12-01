-- SQLite
CREATE TABLE IF NOT EXISTS users (

id INTEGER NOT NULL,

name TEXT  UNIQUE NOT NULL,

age INTEGER NOT NULL,

PRIMARY KEY(id)

);


INSERT INTO users(name, age) VALUES
('Tom', 37),
('Bob', 41),
('Sam', 28);