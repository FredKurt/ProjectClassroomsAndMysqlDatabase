--Students table

CREATE TABLE `students` (
    student_id INTEGER NOT NULL AUTO_INCREMENT,
    firstName VARCHAR(50) NOT NULL,
    lastName VARCHAR(50) NOT NULL,
    birth_day DATE,
    grade INTEGER NOT NULL,
    class_id INTEGER NOT NULL,
    user_id INTEGER NOT NULL,
    PRIMARY KEY (student_id),
    FOREIGN KEY (class_id) REFERENCES classrooms(class_id),
    FOREIGN KEY (user_id) REFERENCES users(user_id)
);

--Classrooms table

CREATE TABLE `classrooms` (
    class_id INTEGER NOT NULL AUTO_INCREMENT,
    class_name VARCHAR(50) UNIQUE NOT NULL,
    room_number VARCHAR(20) NOT NULL,
    capacity INTEGER NOT NULL,
    user_id INTEGER NOT NULL,
    PRIMARY KEY (classroom_id),
    FOREIGN KEY (user_id) REFERENCES users(user_id)
);

--Users table
CREATE TABLE `users` (
    user_id INTEGER NOT NUL AUTO_INCREMENT,
    full_name VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    password VARCHAR(11) NOT NULL,
    is_active SMALLINT(1) UNSIGNED NOT NULL DEFAULT 1 COMMENTS '1 = active, 0 = not active',
    PRIMARY KEY (user_id)
);
