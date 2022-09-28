CREATE OR REPLACE VIEW app.vw_courrier AS
SELECT a.user_id,
    a.user_code_unique,
    a.user_pseudo,
    a.user_password,
    a.user_create_datetime,

    b.identite_id,
    b.identite_code_unique,
    b.identite_nom,
    b.identite_postnom,
    b.identite_prenom,
    b.identite_autre_nom,
    b.identite_tranche_age,
    b.identite_etat_civil,
    b.identite_sexe,
    b.identite_date_naissance,
    b.identite_create_datetime,

    c.courrier_id,
    c.courrier_code_unique,
    c.agent_id,
    c.courrier_titre,
    c.courrier_contenu,
    c.courrier_status,
    c.courrier_create_datetime

   FROM app.tb_user a, app.tb_identite b, app.tb_courrier c

  WHERE a.identite_id = b.identite_id AND a.user_id = c.user_id;