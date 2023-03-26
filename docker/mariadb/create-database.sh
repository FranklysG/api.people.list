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
            \`address\` VARCHAR(255) NULL DEFAULT NULL,
            PRIMARY KEY (\`id\`)
        );
    CREATE TABLE IF NOT EXISTS \`peoplelist\`.\`company_has_users\` (
            \`id\` INT(11) NOT NULL AUTO_INCREMENT,
            \`company_id\` INT(11) NOT NULL,
            \`users_id\` INT(11) NOT NULL,
            PRIMARY KEY (\`id\`),
            INDEX \`fk_company_has_users_company1_idx\` (\`company_id\` ASC) VISIBLE,
            INDEX \`fk_company_has_users_users_idx\` (\`users_id\` ASC) VISIBLE,
            CONSTRAINT \`fk_company_has_users_users\` FOREIGN KEY (\`users_id\`) REFERENCES \`peoplelist\`.\`users\` (\`id\`) ON DELETE NO ACTION ON UPDATE NO ACTION,
            CONSTRAINT \`fk_company_has_users_company1\` FOREIGN KEY (\`company_id\`) REFERENCES \`peoplelist\`.\`company\` (\`id\`) ON DELETE NO ACTION ON UPDATE NO ACTION
        );
        
    INSERT INTO \`peoplelist\`.\`users\` (\`uuid\`, \`name\`, \`email\`, \`phone\`, \`date_born\`, \`city_born\`) VALUES ('8b2c5ceb-280a-4c62-8c5f-8451c6b7c63d', 'Maria Lurdes Almeida', 'm.lurdes@gmail.com', '99984657328', '', '');
    INSERT INTO \`peoplelist\`.\`users\` (\`uuid\`, \`name\`, \`email\`, \`phone\`, \`date_born\`, \`city_born\`) VALUES ('43097951-2b82-4681-94e5-d34f4e7ae49b', 'Amanda Lucia de Sá', 'amanda.lucia@gmail.com', '99985763456', '12/03/1858', 'Lagoa da Pedra - MA');
    INSERT INTO \`peoplelist\`.\`users\` (\`uuid\`, \`name\`, \`email\`, \`phone\`, \`date_born\`, \`city_born\`) VALUES ('55b7530e-9656-4c1f-b083-67019f7d8a35', 'Claudio Ferreira Belo', 'claudio.beto@gmail.com', '9994763489', '31/03/1989', 'Patos - PA');
    INSERT INTO \`peoplelist\`.\`users\` (\`uuid\`, \`name\`, \`email\`, \`phone\`, \`date_born\`, \`city_born\`) VALUES ('5e997344-2430-4872-bc47-5c98033f04a1', 'Amelia Brito Costa', 'amelia.brito@hotmail.com', '6798341254', '02/02/2003', 'Lajota - RJ');
    INSERT INTO \`peoplelist\`.\`users\` (\`uuid\`, \`name\`, \`email\`, \`phone\`, \`date_born\`, \`city_born\`) VALUES ('f66ac41c-fc17-48da-9b14-e6de74b420b6', 'Nunes Brito da silva', 'nunes.brito@outlook.com', '3298763490', '12/06/2001', 'Ribeirão Preto - AL');
    INSERT INTO \`peoplelist\`.\`users\` (\`uuid\`, \`name\`, \`email\`, \`phone\`, \`date_born\`, \`city_born\`) VALUES ('4f094351-2232-4741-94e5-d34f423ae49b', 'Amanda Lucia de Sá', 'amanda.lucia@gmail.com', '99985763456', '12/03/1858', 'Lagoa da Pedra - MA');
    INSERT INTO \`peoplelist\`.\`users\` (\`uuid\`, \`name\`, \`email\`, \`phone\`, \`date_born\`, \`city_born\`) VALUES ('17f4cb96-70c8-4a9f-9ea2-4972fc5c5a0a', 'Gabriel Gomes Nogueira', 'gabriel.gnogueira@hotmail.com', '99885783456', '08/09/1990', 'Recife - PE');
    INSERT INTO \`peoplelist\`.\`users\` (\`uuid\`, \`name\`, \`email\`, \`phone\`, \`date_born\`, \`city_born\`) VALUES ('46cfd8a9-9a92-4d11-a57e-8c0b981857c7', 'Juliana Marques Silva', 'juliana.marques@hotmail.com', '98835769853', '17/05/1978', 'Rio de Janeiro - RJ');
    INSERT INTO \`peoplelist\`.\`users\` (\`uuid\`, \`name\`, \`email\`, \`phone\`, \`date_born\`, \`city_born\`) VALUES ('7e55c072-264e-4a3b-9f8f-5a5f44e26df5', 'Felipe Oliveira Carvalho', 'felipeocarvalho@gmail.com', '99855737892', '03/11/1994', 'São Paulo - SP');
    INSERT INTO \`peoplelist\`.\`users\` (\`uuid\`, \`name\`, \`email\`, \`phone\`, \`date_born\`, \`city_born\`) VALUES ('310d7c67-08e8-44d2-b1b9-7b53c018b8aa', 'Luana Oliveira Souza', 'luaninhassouza@yahoo.com.br', '98734567834', '28/12/2000', 'Salvador - BA');
    INSERT INTO \`peoplelist\`.\`users\` (\`uuid\`, \`name\`, \`email\`, \`phone\`, \`date_born\`, \`city_born\`) VALUES ('c62b4de4-1f4a-4c9c-9d8f-298b056c56f2', 'Pedro Henrique dos Santos', 'pedro.henrique_santos@gmail.com', '99645727891', '22/06/1995', 'Belo Horizonte - MG');
    INSERT INTO \`peoplelist\`.\`users\` (\`uuid\`, \`name\`, \`email\`, \`phone\`, \`date_born\`, \`city_born\`) VALUES ('3f48a50d-9f27-4832-baa2-c6ef77f06a94', 'Isabela Cardoso Costa', 'isabela_costa@hotmail.com', '98755623491', '09/02/1997', 'Fortaleza - CE');

    INSERT INTO \`peoplelist\`.\`company\` (\`uuid\`, \`name\`, \`doc\`, \`address\`) VALUES ('7g4595fa-08d7-4022-bb31-3fce366ff763', 'America Comapany', '24.717.870/0001-81', 'Av. Alameda Jr, São Caetano, Mirante, Goiania - GO');
    INSERT INTO \`peoplelist\`.\`company\` (\`uuid\`, \`name\`, \`doc\`, \`address\`) VALUES ('6f4559fa-08d7-4022-bb31-3fce366ff763', 'Louisiana Comapany', '50.177.780/0001-18', 'Av. Alameda Jr, São Caetano, Mirante, Goiania - GO');
    INSERT INTO \`peoplelist\`.\`company\` (\`uuid\`, \`name\`, \`doc\`, \`address\`) VALUES ('f01c6d0e-bba7-4c9f-b83d-1d3fa1fbb54f', 'ABC Comércio', '17.568.123/0001-90', 'Rua Pedro Alves, 20, Centro, São Paulo - SP');
    INSERT INTO \`peoplelist\`.\`company\` (\`uuid\`, \`name\`, \`doc\`, \`address\`) VALUES ('b66c7485-25e5-474d-90d7-6c1a6e3a87d9', 'XPTO Industries', '22.098.897/0001-20', 'Rua José dos Santos, 121, Cidade Jardim, Belo Horizonte - MG');
    INSERT INTO \`peoplelist\`.\`company\` (\`uuid\`, \`name\`, \`doc\`, \`address\`) VALUES ('44a998cb-b4f4-47f8-ba87-202d9357a66e', 'YZ Industries', '55.352.101/0001-05', 'Rua Francisco Pedro, 400, Vila dos Remédios, Recife - PE');
    INSERT INTO \`peoplelist\`.\`company\` (\`uuid\`, \`name\`, \`doc\`, \`address\`) VALUES ('5c5ba5d7-b8ea-40c4-96cf-767e5154a4f4', 'Supermarkets Inc', '12.345.678/0001-09', 'Avenida Juscelino Kubitschek, 1400, Vila Olímpia, São Paulo - SP');
    INSERT INTO \`peoplelist\`.\`company\` (\`uuid\`, \`name\`, \`doc\`, \`address\`) VALUES ('39e57bf2-1d28-481c-8656-91de1ba68c46', 'ACME Corporation', '78.901.234/0001-12', 'Rua do Sol, 32, Centro, Rio de Janeiro - RJ');
    INSERT INTO \`peoplelist\`.\`company\` (\`uuid\`, \`name\`, \`doc\`, \`address\`) VALUES ('f2b6cafe-6e49-48f9-87a7-57fa05d71ea2', 'Global Tech', '33.222.333/0001-11', 'Avenida Paulista, 1000, Bela Vista, São Paulo - SP');
    INSERT INTO \`peoplelist\`.\`company\` (\`uuid\`, \`name\`, \`doc\`, \`address\`) VALUES ('e8fb95f5-c22d-4a3e-a72c-85d7d1a14d8c', 'Dream Cars', '45.678.912/0001-01', 'Rua das Flores, 500, Jardim Europa, Porto Alegre - RS');

    
    INSERT INTO \`peoplelist\`.\`company_has_users\` (\`users_id\`, \`company_id\`) VALUES ('1', '1');

    GRANT ALL PRIVILEGES ON \`peoplelist%\`.* TO 'admin'@'%';
EOSQL