# Library API

### library
* id: bigint (primary key, not null, autoincrement)
* location: varchar(255)
* name: varchar(255)
* books: ?

### books
* id: bigint (primary key, not null, autoincrement)
* title: varchar(255) (not null)
* author_id: bigint (forgein key, not null)
* published_date: timestamp (not null)

### authors
* id: bigint (primary key, not null, autoincrement)
* name: varchar(255) (not null)
* nationality: varchar(255)
* gender: varchar(255)
* birthday: timestamp


