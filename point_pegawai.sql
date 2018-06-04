
CREATE
    /*[ALGORITHM = {UNDEFINED | MERGE | TEMPTABLE}]
    [DEFINER = { user | CURRENT_USER }]
    [SQL SECURITY { DEFINER | INVOKER }]*/
    VIEW `dbsirip`.`point_pegawai` 
    AS
SELECT
    `mstr_pegawai`.`ID_PEGAWAI`
    , `mstr_pegawai`.`NIK`
    , `mstr_pegawai`.`NAMA_PEGAWAI`
    , `mstr_level`.`POINT_LEVEL`
    , `mstr_karir`.`POINT_KARIR`
    , `mstr_risiko_kerja`.`POINT_RISIKO`
    , `mstr_ket_khusus`.`POINT_KET`
    , `mstr_intensitas`.`POINT_INTENSITAS`
    , `mstr_absensi`.`POINT_ABSENSI`
FROM
    `mstr_pegawai`
    LEFT JOIN mstr_level
    ON mstr_pegawai.ID_LEVEL = mstr_level.ID_LEVEL
    LEFT JOIN mstr_karir
    ON mstr_pegawai.ID_KARIR = mstr_karir.ID_KARIR
    LEFT JOIN mstr_risiko_kerja
    ON mstr_pegawai.ID_RISIKO = mstr_risiko_kerja.ID_RISIKO
    LEFT JOIN mstr_ket_khusus
    ON mstr_pegawai.ID_KET = mstr_ket_khusus.ID_KET
    LEFT JOIN mstr_intensitas
    ON mstr_pegawai.ID_INTENSITAS = mstr_intensitas.ID_INTENSITAS
    LEFT JOIN mstr_absensi
    ON mstr_pegawai.ID_ABSENSI = mstr_absensi.ID_ABSENSI
WHERE (`mstr_pegawai`.`ID_PEGAWAI` = '1');
