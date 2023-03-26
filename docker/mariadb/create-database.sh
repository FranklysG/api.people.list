#!/usr/bin/env bash

mysql --user=root --password="$MYSQL_ROOT_PASSWORD" <<-EOSQL
    CREATE DATABASE IF NOT EXISTS peoplelist;
    CREATE TABLE IF NOT EXISTS \`peoplelist\`.\`users\` (
            \`id\` INT(11) NOT NULL AUTO_INCREMENT,
            \`uuid\` VARCHAR(45) NULL DEFAULT NULL,
            \`name\` VARCHAR(45) NULL DEFAULT NULL,
            \`email\` VARCHAR(45) NULL DEFAULT NULL,
            \`phone\` VARCHAR(45) NULL DEFAULT NULL,
            \`date_born\` VARCHAR(45) NULL DEFAULT NULL,
            \`city_born\` VARCHAR(255) NULL DEFAULT NULL,
            PRIMARY KEY (\`id\`)
        );
    CREATE TABLE IF NOT EXISTS \`peoplelist\`.\`company\` (
            \`id\` INT(11) NOT NULL AUTO_INCREMENT,
            \`uuid\` VARCHAR(45) NULL DEFAULT NULL,
            \`name\` VARCHAR(45) NULL DEFAULT NULL,
            \`doc\` VARCHAR(45) NULL DEFAULT NULL,
            \`adrress\` VARCHAR(255) NULL DEFAULT NULL,
            PRIMARY KEY (\`id\`)
        );
    CREATE TABLE IF NOT EXISTS \`peoplelist\`.\`company_has_users\` (
            \`company_id\` INT(11) NOT NULL,
            \`users_id\` INT(11) NOT NULL,
            PRIMARY KEY (\`users_id\`, \`company_id\`),
            INDEX \`fk_company_has_users_company1_idx\` (\`company_id\` ASC) VISIBLE,
            INDEX \`fk_company_has_users_users_idx\` (\`users_id\` ASC) VISIBLE,
            CONSTRAINT \`fk_company_has_users_users\` FOREIGN KEY (\`users_id\`) REFERENCES \`peoplelist\`.\`users\` (\`id\`) ON DELETE NO ACTION ON UPDATE NO ACTION,
            CONSTRAINT \`fk_company_has_users_company1\` FOREIGN KEY (\`company_id\`) REFERENCES \`peoplelist\`.\`company\` (\`id\`) ON DELETE NO ACTION ON UPDATE NO ACTION
        );
    INSERT INTO \`peoplelist\`.\`users\` (\`uuid\`, \`name\`, \`email\`, \`phone\`, \`date_born\`, \`city_born\`) VALUES ('8b2c5ceb-280a-4c62-8c5f-8451c6b7c63d', 'Maria Lurdes Almeida', 'm.lurdes@gmail.com', '99984657328', '', '');
    INSERT INTO \`peoplelist\`.\`company\` (\`uuid\`, \`name\`, \`doc\`, \`adrress\`) VALUES ('6f4559fa-08d7-4022-bb31-3fce366ff763', 'Louisiana Comapany', '50.177.780/0001-18', 'Av. Alameda Jr, São Caetano, Mirante, Goiania - GO');
    INSERT INTO \`peoplelist\`.\`company_has_users\` (\`users_id\`, \`company_id\`) VALUES ('1', '1');

    GRANT ALL PRIVILEGES ON \`peoplelist%\`.* TO 'admin'@'%';
EOSQL