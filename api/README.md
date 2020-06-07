# Library API
## Tables
### library
* id: bigint (primary key, not null, autoincrement)
* location: varchar(255)
* name: varchar(255)

### books
* id: bigint (primary key, not null, autoincrement)
* library_id: bigint (not null)
* title: varchar(255) (not null)
* author_id: bigint (forgein key, not null)
* published_date: date (not null)
* borrowed: boolean
* borrowedFrom_id: bigint (not null)

### authors
* id: bigint (primary key, not null, autoincrement)
* name: varchar(255) (not null)
* nationality: varchar(255)
* gender: varchar(255)
* birthday: date

### users
* id: bigint (primary key, not null, autoincrement)
* name: varchar(255) (not null)
* lastName: varchar(255) (not null) 
* age: int (not null) 
* brithday: date
