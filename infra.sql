DROP SCHEMA app CASCADE;
CREATE SCHEMA app;

CREATE TABLE app.tb_agent (
    agent_id uuid PRIMARY KEY DEFAULT uuid_generate_v1 (),
    agent_code_unique varchar(256) NOT NULL UNIQUE,
    agent_nom varchar(32),
    agent_postnom varchar(32),
    agent_prenom varchar(32),
    agent_sexe varchar(1),
    agent_date_naissance date,
    agent_grade varchar(20),
    agent_affectation varchar(50),
    agent_telephone varchar(32),
    agent_mail varchar(50),
    agent_adresse TEXT,
    agent_categorie integer,
	agent_create_datetime timestamp without time zone default now()
);
CREATE INDEX idx_agent_01 ON app.tb_agent (agent_id);
CREATE INDEX idx_agent_02 ON app.tb_agent (agent_code_unique);

CREATE TABLE app.tb_vehicule (
    vehicule_id uuid PRIMARY KEY DEFAULT uuid_generate_v1 (),
    vehicule_code_unique varchar(256) NOT NULL UNIQUE,
    vehicule_numero_plaque varchar(32), 
    vehicule_numero_chassis varchar(32),
    vehicule_marque varchar(100),
    vehicule_type varchar(45),
    vehicule_annee_fabrication integer,
    vehicule_nombre_siege integer,
    vehicule_couleur varchar(50),
    vehicule_noms_proprietaire varchar(100),
    vehicule_telephone_proprietaire varchar(15),
    vehicule_mail_proprietaire varchar(50),
    vehicule_adresse_proprietaire TEXT,
	vehicule_create_datetime timestamp without time zone default now(),
    CONSTRAINT ukey_numero_plaque UNIQUE (vehicule_numero_plaque),
    CONSTRAINT ukey_numero_chassis UNIQUE (vehicule_numero_chassis)
);
CREATE INDEX idx_vehicule_01 ON app.tb_vehicule (vehicule_id);
CREATE INDEX idx_vehicule_02 ON app.tb_vehicule (vehicule_code_unique);
CREATE INDEX idx_vehicule_03 ON app.tb_vehicule (vehicule_numero_plaque);
CREATE INDEX idx_vehicule_04 ON app.tb_vehicule (vehicule_numero_chassis);

CREATE TABLE app.tb_demande_immatriculation (
    demande_immatriculation_id uuid PRIMARY KEY DEFAULT uuid_generate_v1 (),
    demande_immatriculation_code_unique varchar(256) NOT NULL UNIQUE,
    vehicule_id uuid REFERENCES app.tb_vehicule (vehicule_id) ON DELETE RESTRICT,
    code_transaction_id uuid REFERENCES app.tb_code_transaction (code_transaction_id),
	demande_immatriculation_create_datetime timestamp without time zone default now()
);
CREATE INDEX idx_demande_immatriculation_01 ON app.tb_demande_immatriculation (demande_immatriculation_id);
CREATE INDEX idx_demande_immatriculation_02 ON app.tb_demande_immatriculation (demande_immatriculation_code_unique);
CREATE INDEX idx_demande_immatriculation_03 ON app.tb_demande_immatriculation (vehicule_id);

CREATE TABLE app.tb_code_transaction (
    code_transaction_id uuid PRIMARY KEY DEFAULT uuid_generate_v1 (),
    code_transaction_code_unique varchar(256) NOT NULL UNIQUE,
    agent_id uuid REFERENCES app.tb_agent (agent_id),
    code_transaction_designation varchar(10) NOT NULL UNIQUE,
    code_transaction_noms_demandeur varchar(100),
	code_transaction_create_datetime timestamp without time zone default now()
);
CREATE INDEX idx_code_transaction_01 ON app.tb_code_transaction (code_transaction_id);
CREATE INDEX idx_code_transaction_02 ON app.tb_code_transaction (code_transaction_code_unique);
CREATE INDEX idx_code_transaction_03 ON app.tb_code_transaction (agent_id);
CREATE INDEX idx_code_transaction_04 ON app.tb_code_transaction (code_transaction_designation);

CREATE TABLE app.tb_plainte (
    plainte_id uuid PRIMARY KEY DEFAULT uuid_generate_v1 (),
    plainte_code_unique varchar(256) NOT NULL UNIQUE,
    vehicule_id uuid REFERENCES app.tb_vehicule (vehicule_id),
    plainte_noms varchar(100),
    plainte_telephone varchar(15),
    plainte_cause TEXT,
    plainte_numero_plaque varchar(10),
    plainte_localisation varchar(100),
    plainte_photo varchar(255),
    plainte_video varchar(255),
    plainte_status integer default 0,
	plainte_create_datetime timestamp without time zone default now(),
    CONSTRAINT ukey_numero_plaque_1 UNIQUE (plainte_numero_plaque)
);
CREATE INDEX idx_plainte_01 ON app.tb_plainte (plainte_id);
CREATE INDEX idx_plainte_02 ON app.tb_plainte (plainte_code_unique);
CREATE INDEX idx_plainte_03 ON app.tb_plainte (plainte_numero_plaque);

CREATE TABLE app.tb_recherche (
    recherche_id uuid PRIMARY KEY DEFAULT uuid_generate_v1 (),
    recherche_code_unique varchar(256) NOT NULL UNIQUE,
    plainte_id uuid REFERENCES app.tb_plainte (plainte_id),
    recherche_date_disparition date,
    recherche_cause_disparition text,
	recherche_create_datetime timestamp without time zone default now()
);
CREATE INDEX idx_recherche_01 ON app.tb_recherche (recherche_id);
CREATE INDEX idx_recherche_02 ON app.tb_recherche (recherche_code_unique);
CREATE INDEX idx_recherche_03 ON app.tb_recherche (plainte_id);

CREATE TABLE app.tb_vehicule_retrouve (
    vehicule_retrouve_id uuid PRIMARY KEY DEFAULT uuid_generate_v1 (),
    vehicule_retrouve_code_unique varchar(256) NOT NULL UNIQUE,
    recherche_id uuid REFERENCES app.tb_recherche (recherche_id),
    agent_id uuid REFERENCES app.tb_agent (agent_id),
    vehicule_retrouve_date date,
	vehicule_retrouve_create_datetime timestamp without time zone default now()
);
CREATE INDEX idx_vehicule_retrouve_01 ON app.tb_vehicule_retrouve (vehicule_retrouve_id);
CREATE INDEX idx_vehicule_retrouve_02 ON app.tb_vehicule_retrouve (vehicule_retrouve_code_unique);
CREATE INDEX idx_vehicule_retrouve_03 ON app.tb_vehicule_retrouve (recherche_id);
CREATE INDEX idx_vehicule_retrouve_04 ON app.tb_vehicule_retrouve (agent_id);

CREATE TABLE app.tb_vehicule_libre (
    vehicule_libre_id uuid PRIMARY KEY DEFAULT uuid_generate_v1 (),
    vehicule_libre_code_unique varchar(256) NOT NULL UNIQUE,
    vehicule_id uuid REFERENCES app.tb_vehicule (vehicule_id),
    agent_id uuid REFERENCES app.tb_agent (agent_id),
    vehicule_libre_numero_transaction varchar(32),
	vehicule_libre_create_datetime timestamp without time zone default now()
);
CREATE INDEX idx_vehicule_libre_01 ON app.tb_vehicule_libre (vehicule_libre_id);
CREATE INDEX idx_vehicule_libre_02 ON app.tb_vehicule_libre (vehicule_libre_code_unique);
CREATE INDEX idx_vehicule_libre_03 ON app.tb_vehicule_libre (vehicule_id);
CREATE INDEX idx_vehicule_libre_04 ON app.tb_vehicule_libre (agent_id);

CREATE TABLE app.tb_vehicule_has_agent_police (
    vehicule_has_agent_police_id uuid PRIMARY KEY DEFAULT uuid_generate_v1 (),
    vehicule_has_agent_police_code_unique varchar(256) NOT NULL UNIQUE,
    vehicule_id uuid REFERENCES app.tb_vehicule (vehicule_id),
    agent_id uuid REFERENCES app.tb_agent (agent_id),
    vehicule_has_agent_police_numero_transaction varchar(32),
	vehicule_has_agent_police_create_datetime timestamp without time zone default now()
);
CREATE INDEX idx_vehicule_has_agent_police_01 ON app.tb_vehicule_has_agent_police (vehicule_has_agent_police_id);
CREATE INDEX idx_vehicule_has_agent_police_02 ON app.tb_vehicule_has_agent_police (vehicule_has_agent_police_code_unique);
CREATE INDEX idx_vehicule_has_agent_police_03 ON app.tb_vehicule_has_agent_police (vehicule_id);
CREATE INDEX idx_vehicule_has_agent_police_04 ON app.tb_vehicule_has_agent_police (agent_id);

CREATE TABLE app.tb_user (
    user_id uuid PRIMARY KEY DEFAULT uuid_generate_v1 (),
    user_code_unique varchar(256) NOT NULL UNIQUE,
    user_pseudo varchar(15) NOT NULL UNIQUE,
    user_password varchar(15),
    user_profil varchar(15),
	user_create_datetime timestamp without time zone default now()
);
CREATE INDEX idx_user_01 ON app.tb_user (user_id);
CREATE INDEX idx_user_02 ON app.tb_user (user_code_unique);
CREATE INDEX idx_user_03 ON app.tb_user (user_pseudo);

INSERT INTO app.tb_user(user_code_unique, user_pseudo, user_password, user_profil) VALUES('706d69b2ad301b70d0d8ee5c4c9cbabc', 'dgi01', '$ecret@01','agent_dgi');
INSERT INTO app.tb_user(user_code_unique, user_pseudo, user_password, user_profil) VALUES('606d69b2ad301b70d0d8ee5c4c9cbabc', 'police01', 'P@5$word01','agent_police');
INSERT INTO app.tb_user(user_code_unique, user_pseudo, user_password, user_profil) VALUES('506d69b2ad301b70d0d8ee5c4c9cbabc', 'dgi02', 'P@5$W0rd','admin_dgi');
INSERT INTO app.tb_user(user_code_unique, user_pseudo, user_password, user_profil) VALUES('406d69b2ad301b70d0d8ee5c4c9cbabc', 'police02', '$#cr#t@01','admin_police');
insert into app.tb_code_transaction (code_transaction_code_unique , agent_id, code_transaction_designation, code_transaction_noms_demandeur) values ('003d4eb0-3752-11ed-9d2f-7fcbfa431781', '003d4eb0-3752-11ed-9d2f-7fcbfa431781', '456875','Franklin Mwamba');

CREATE OR REPLACE VIEW app.vw_demande AS
SELECT 
 a.vehicule_id,
 a.vehicule_code_unique,
 a.vehicule_numero_plaque,
 a.vehicule_numero_chassis,
 a.vehicule_marque,
 a.vehicule_type,
 a.vehicule_annee_fabrication,
 a.vehicule_nombre_siege,
 a.vehicule_couleur,
 a.vehicule_noms_proprietaire,
 a.vehicule_telephone_proprietaire,
 a.vehicule_mail_proprietaire,
 a.vehicule_adresse_proprietaire,
 a.vehicule_create_datetime,

 b.demande_immatriculation_code_unique,
 b.code_transaction_id,
 b.demande_immatriculation_create_datetime,

 c.code_transaction_code_unique,
 c.agent_id,
 c.code_transaction_designation,
 c.code_transaction_noms_demandeur,
 c.code_transaction_create_datetime,
 a.vehicule_date_immatriculation
 

FROM app.tb_vehicule a, app.tb_demande_immatriculation b, app.tb_code_transaction c
WHERE a.vehicule_id = b.vehicule_id AND b.code_transaction_id=c.code_transaction_id;


CREATE OR REPLACE VIEW app.vw_recherche AS
SELECT 
 a.plainte_id,
 a.vehicule_id,
 a.plainte_numero_plaque,

 b.recherche_id,

 c.vehicule_marque,
 c.vehicule_couleur,
 c.vehicule_numero_plaque,
 
 b.recherche_date_disparition,
 b.recherche_cause_disparition,
 b.recherche_create_datetime,

 b.recherche_status

FROM app.tb_vehicule c, app.tb_plainte a, app.tb_recherche b
WHERE a.plainte_numero_plaque = c.vehicule_numero_plaque AND b.plainte_id=a.plainte_id;


CREATE OR REPLACE VIEW app.vw_vehicule_trouver AS
SELECT 
 a.plainte_id,
 a.vehicule_id,
 a.plainte_numero_plaque,

 b.recherche_id,

 c.vehicule_marque,
 c.vehicule_couleur,
 c.vehicule_numero_plaque,
 
 b.recherche_date_disparition,
 b.recherche_cause_disparition,
 b.recherche_create_datetime,

 d.agent_id,
 d.vehicule_retrouve_date,
 
 e.agent_nom,
 e.agent_postnom,
 e.agent_prenom

FROM app.tb_vehicule c, app.tb_plainte a, app.tb_recherche b, 
app.tb_vehicule_retrouve d, app.tb_agent e
WHERE a.plainte_numero_plaque = c.vehicule_numero_plaque 
AND b.plainte_id=a.plainte_id
AND d.recherche_id = b.recherche_id 
AND e.agent_id = d.agent_id;