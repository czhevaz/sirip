DELIMITER $$

ALTER ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `det_indeks_pegawai` AS 
SELECT
  `indeks_pegawai`.`NIK`               AS `NIK`,
  `mstr_pegawai`.`NAMA_PEGAWAI`        AS `NAMA_PEGAWAI`,
  `mstr_ruangan`.`DESCP_RUANGAN`       AS `DESCP_RUANGAN`,
  `mstr_level`.`DESCP_LEVEL`           AS `DESCP_LEVEL`,
  `mstr_karir`.`DESC_KARIR`            AS `DESC_KARIR`,
  `mstr_risiko_kerja`.`DESCP_RISIKO`   AS `DESCP_RISIKO`,
  `mstr_ket_khusus`.`DESCP_KET`        AS `DESCP_KET`,
  `mstr_intensitas`.`DESCP_INTENSITAS` AS `DESCP_INTENSITAS`,
  `mstr_absensi`.`DESCP_ABSENSI`       AS `DESCP_ABSENSI`
FROM ((((((((`indeks_pegawai`
          LEFT JOIN `mstr_pegawai`
            ON ((`indeks_pegawai`.`NIK` = `mstr_pegawai`.`NIK`)))
         LEFT JOIN `mstr_ruangan`
           ON ((`indeks_pegawai`.`ID_RUANGAN` = `mstr_ruangan`.`ID_RUANGAN`)))
        LEFT JOIN `mstr_level`
          ON ((`indeks_pegawai`.`ID_LEVEL` = `mstr_level`.`ID_LEVEL`)))
       LEFT JOIN `mstr_karir`
         ON ((`indeks_pegawai`.`ID_KARIR` = `mstr_karir`.`ID_KARIR`)))
      LEFT JOIN `mstr_risiko_kerja`
        ON ((`indeks_pegawai`.`ID_RISIKO` = `mstr_risiko_kerja`.`ID_RISIKO`)))
     LEFT JOIN `mstr_ket_khusus`
       ON ((`indeks_pegawai`.`ID_KET` = `mstr_ket_khusus`.`ID_KET`)))
    LEFT JOIN `mstr_intensitas`
      ON ((`indeks_pegawai`.`ID_INTENSITAS` = `mstr_intensitas`.`ID_INTENSITAS`)))
   LEFT JOIN `mstr_absensi`
     ON ((`indeks_pegawai`.`ID_ABSENSI` = `mstr_absensi`.`ID_ABSENSI`)))$$

DELIMITER ;