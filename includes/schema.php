<?php

function lms_table_exists(mysqli $con, string $table): bool
{
    $table = mysqli_real_escape_string($con, $table);
    $result = mysqli_query($con, "SHOW TABLES LIKE '$table'");
    return $result && mysqli_num_rows($result) > 0;
}

function lms_column_exists(mysqli $con, string $table, string $column): bool
{
    $table = mysqli_real_escape_string($con, $table);
    $column = mysqli_real_escape_string($con, $column);
    $result = mysqli_query($con, "SHOW COLUMNS FROM `$table` LIKE '$column'");
    return $result && mysqli_num_rows($result) > 0;
}

function lms_index_exists(mysqli $con, string $table, string $index): bool
{
    $table = mysqli_real_escape_string($con, $table);
    $index = mysqli_real_escape_string($con, $index);
    $result = mysqli_query($con, "SHOW INDEX FROM `$table` WHERE Key_name = '$index'");
    return $result && mysqli_num_rows($result) > 0;
}

function lms_run_schema_query(mysqli $con, string $sql): void
{
    mysqli_query($con, $sql);
}

function lms_ensure_users_table(mysqli $con): void
{
    lms_run_schema_query($con, "CREATE TABLE IF NOT EXISTS users (
        id INT(11) NOT NULL AUTO_INCREMENT,
        fullname VARCHAR(100) NOT NULL,
        username VARCHAR(50) NOT NULL UNIQUE,
        email VARCHAR(100) NOT NULL UNIQUE,
        phone VARCHAR(20) NOT NULL,
        country VARCHAR(50) NOT NULL,
        gender ENUM('Male','Female','Other') NOT NULL,
        password VARCHAR(255) NOT NULL,
        role ENUM('student','instructor','admin') DEFAULT 'student',
        status ENUM('active','inactive','suspended') DEFAULT 'active',
        ip_address VARCHAR(45) DEFAULT NULL,
        user_agent TEXT DEFAULT NULL,
        last_login TIMESTAMP NULL,
        created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        PRIMARY KEY (id),
        UNIQUE KEY unique_username (username),
        UNIQUE KEY unique_email (email),
        INDEX idx_created_at (created_at),
        INDEX idx_status (status)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci");

    $columns = [
        'username' => "ALTER TABLE users ADD COLUMN username VARCHAR(50) NULL AFTER fullname",
        'phone' => "ALTER TABLE users ADD COLUMN phone VARCHAR(20) NOT NULL DEFAULT '' AFTER email",
        'country' => "ALTER TABLE users ADD COLUMN country VARCHAR(50) NOT NULL DEFAULT 'India' AFTER phone",
        'gender' => "ALTER TABLE users ADD COLUMN gender ENUM('Male','Female','Other') NOT NULL DEFAULT 'Other' AFTER country",
        'role' => "ALTER TABLE users ADD COLUMN role ENUM('student','instructor','admin') DEFAULT 'student' AFTER password",
        'status' => "ALTER TABLE users ADD COLUMN status ENUM('active','inactive','suspended') DEFAULT 'active' AFTER role",
        'ip_address' => "ALTER TABLE users ADD COLUMN ip_address VARCHAR(45) DEFAULT NULL AFTER status",
        'user_agent' => "ALTER TABLE users ADD COLUMN user_agent TEXT DEFAULT NULL AFTER ip_address",
        'last_login' => "ALTER TABLE users ADD COLUMN last_login TIMESTAMP NULL AFTER user_agent",
        'created_at' => "ALTER TABLE users ADD COLUMN created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP AFTER last_login",
        'updated_at' => "ALTER TABLE users ADD COLUMN updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP AFTER created_at",
    ];

    foreach ($columns as $column => $sql) {
        if (!lms_column_exists($con, 'users', $column)) {
            lms_run_schema_query($con, $sql);
        }
    }

    lms_run_schema_query($con, "UPDATE users SET username = CONCAT('user', id) WHERE username IS NULL OR username = ''");
}

function lms_ensure_contact_table(mysqli $con): void
{
    lms_run_schema_query($con, "CREATE TABLE IF NOT EXISTS contact (
        id INT(11) NOT NULL AUTO_INCREMENT,
        name VARCHAR(100) NOT NULL,
        email VARCHAR(100) NOT NULL,
        phone VARCHAR(20) DEFAULT NULL,
        subject VARCHAR(50) NOT NULL,
        message TEXT NOT NULL,
        agreed TINYINT(1) NOT NULL DEFAULT 0,
        ip_address VARCHAR(45) DEFAULT NULL,
        user_agent TEXT DEFAULT NULL,
        status ENUM('new','read','replied','archived') DEFAULT 'new',
        created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        PRIMARY KEY (id),
        INDEX idx_email (email),
        INDEX idx_created_at (created_at),
        INDEX idx_status (status)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci");

    if (lms_column_exists($con, 'contact', 'Id') && !lms_column_exists($con, 'contact', 'id')) {
        lms_run_schema_query($con, "ALTER TABLE contact CHANGE `Id` `id` INT NOT NULL");
    }

    if (!lms_index_exists($con, 'contact', 'PRIMARY')) {
        lms_run_schema_query($con, "ALTER TABLE contact ADD PRIMARY KEY (`id`)");
    }

    if (lms_column_exists($con, 'contact', 'id')) {
        lms_run_schema_query($con, "ALTER TABLE contact MODIFY `id` INT NOT NULL AUTO_INCREMENT");
    }

    $columns = [
        'name' => "ALTER TABLE contact ADD COLUMN name VARCHAR(100) NOT NULL AFTER id",
        'email' => "ALTER TABLE contact ADD COLUMN email VARCHAR(100) NOT NULL AFTER name",
        'phone' => "ALTER TABLE contact ADD COLUMN phone VARCHAR(20) DEFAULT NULL AFTER email",
        'subject' => "ALTER TABLE contact ADD COLUMN subject VARCHAR(50) NOT NULL AFTER phone",
        'message' => "ALTER TABLE contact ADD COLUMN message TEXT NOT NULL AFTER subject",
        'agreed' => "ALTER TABLE contact ADD COLUMN agreed TINYINT(1) NOT NULL DEFAULT 0 AFTER message",
        'ip_address' => "ALTER TABLE contact ADD COLUMN ip_address VARCHAR(45) DEFAULT NULL AFTER agreed",
        'user_agent' => "ALTER TABLE contact ADD COLUMN user_agent TEXT DEFAULT NULL AFTER ip_address",
        'status' => "ALTER TABLE contact ADD COLUMN status ENUM('new','read','replied','archived') DEFAULT 'new' AFTER user_agent",
        'created_at' => "ALTER TABLE contact ADD COLUMN created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP AFTER status",
        'updated_at' => "ALTER TABLE contact ADD COLUMN updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP AFTER created_at",
    ];

    foreach ($columns as $column => $sql) {
        if (!lms_column_exists($con, 'contact', $column)) {
            lms_run_schema_query($con, $sql);
        }
    }

    lms_run_schema_query($con, "ALTER TABLE contact MODIFY name VARCHAR(100) NOT NULL");
    lms_run_schema_query($con, "ALTER TABLE contact MODIFY email VARCHAR(100) NOT NULL");
    lms_run_schema_query($con, "ALTER TABLE contact MODIFY phone VARCHAR(20) DEFAULT NULL");
    lms_run_schema_query($con, "ALTER TABLE contact MODIFY subject VARCHAR(50) NOT NULL");
    lms_run_schema_query($con, "ALTER TABLE contact MODIFY message TEXT NOT NULL");
}
?>
