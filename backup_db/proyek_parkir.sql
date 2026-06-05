-- ============================================================
--  SISTEM INFORMASI MANAJEMEN PARKIR
--  Project Basis Data & Pemrograman Web
--  Lengkap: DDL · Seed ≥20 baris · SP · Trigger · Index ·
--           View · Multi-User · Relasi 1:1 & 1:M
-- ============================================================

DROP DATABASE IF EXISTS db_parkir;
CREATE DATABASE db_parkir
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;
USE db_parkir;

-- ============================================================
-- ①  DDL — STRUKTUR TABEL
-- ============================================================

-- 1. USERS
CREATE TABLE users (
  id_user    INT          NOT NULL AUTO_INCREMENT,
  nama       VARCHAR(100) NOT NULL,
  username   VARCHAR(50)  NOT NULL UNIQUE,
  password   VARCHAR(255) NOT NULL,
  role       ENUM('admin','petugas') NOT NULL DEFAULT 'petugas',
  created_at TIMESTAMP    NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id_user)
) ENGINE=InnoDB COMMENT='Akun login admin dan petugas';

-- 2. TARIF
CREATE TABLE tarif (
  id_tarif        INT         NOT NULL AUTO_INCREMENT,
  jenis_kendaraan VARCHAR(50) NOT NULL,
  tarif_per_jam   INT         NOT NULL COMMENT 'Rupiah per jam',
  PRIMARY KEY (id_tarif)
) ENGINE=InnoDB COMMENT='Daftar tarif parkir per jenis kendaraan';

-- 3. KENDARAAN
CREATE TABLE kendaraan (
  id_kendaraan    INT          NOT NULL AUTO_INCREMENT,
  plat_nomor      VARCHAR(20)  NOT NULL UNIQUE,
  jenis_kendaraan VARCHAR(50)  NOT NULL,
  pemilik         VARCHAR(100) NOT NULL,
  id_tarif        INT          NOT NULL,
  PRIMARY KEY (id_kendaraan),
  CONSTRAINT fk_kendaraan_tarif
    FOREIGN KEY (id_tarif) REFERENCES tarif(id_tarif)
    ON UPDATE CASCADE ON DELETE RESTRICT
) ENGINE=InnoDB COMMENT='Data kendaraan yang terdaftar';

-- 4. SLOT_PARKIR
CREATE TABLE slot_parkir (
  id_slot   INT         NOT NULL AUTO_INCREMENT,
  kode_slot VARCHAR(20) NOT NULL UNIQUE,
  status    ENUM('kosong','terisi') NOT NULL DEFAULT 'kosong',
  PRIMARY KEY (id_slot)
) ENGINE=InnoDB COMMENT='Tempat/slot parkir fisik';

-- 5. TRANSAKSI
CREATE TABLE transaksi (
  id_transaksi INT      NOT NULL AUTO_INCREMENT,
  id_kendaraan INT      NOT NULL,
  id_slot      INT      NOT NULL,
  id_user      INT      NOT NULL,
  waktu_masuk  DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  waktu_keluar DATETIME          DEFAULT NULL,
  total_bayar  INT      NOT NULL DEFAULT 0,
  status       ENUM('masuk','keluar') NOT NULL DEFAULT 'masuk',
  PRIMARY KEY (id_transaksi),
  CONSTRAINT fk_trx_kendaraan FOREIGN KEY (id_kendaraan) REFERENCES kendaraan(id_kendaraan) ON UPDATE CASCADE ON DELETE RESTRICT,
  CONSTRAINT fk_trx_slot      FOREIGN KEY (id_slot)      REFERENCES slot_parkir(id_slot)    ON UPDATE CASCADE ON DELETE RESTRICT,
  CONSTRAINT fk_trx_user      FOREIGN KEY (id_user)      REFERENCES users(id_user)           ON UPDATE CASCADE ON DELETE RESTRICT
) ENGINE=InnoDB COMMENT='Transaksi parkir masuk dan keluar';

-- 6. HISTORI_TRANSAKSI  (relasi 1:1 dengan transaksi)
CREATE TABLE histori_transaksi (
  id_histori   INT  NOT NULL AUTO_INCREMENT,
  id_transaksi INT  NOT NULL UNIQUE,          -- UNIQUE = 1 transaksi → 1 histori
  tanggal      DATE NOT NULL,
  total_bayar  INT  NOT NULL DEFAULT 0,
  PRIMARY KEY (id_histori),
  CONSTRAINT fk_histori_trx
    FOREIGN KEY (id_transaksi) REFERENCES transaksi(id_transaksi)
    ON UPDATE CASCADE ON DELETE RESTRICT
) ENGINE=InnoDB COMMENT='Riwayat final setiap transaksi yang selesai';

-- ============================================================
-- ②  INDEX — Percepat pencarian umum
-- ============================================================
CREATE INDEX idx_plat_nomor   ON kendaraan(plat_nomor);
CREATE INDEX idx_status_slot  ON slot_parkir(status);
CREATE INDEX idx_waktu_masuk  ON transaksi(waktu_masuk);
CREATE INDEX idx_status_trx   ON transaksi(status);
CREATE INDEX idx_tgl_histori  ON histori_transaksi(tanggal);

-- ============================================================
-- ③  SEED DATA — minimal 20 baris INSERT
-- ============================================================

-- Users (5 baris)
INSERT INTO users (nama, username, password, role) VALUES
  ('Administrator',    'admin',   SHA2('Admin@123',    256), 'admin'),
  ('Budi Santoso',     'budi',    SHA2('Budi@123',     256), 'petugas'),
  ('Siti Rahayu',      'siti',    SHA2('Siti@123',     256), 'petugas'),
  ('Deni Firmansyah',  'deni',    SHA2('Deni@123',     256), 'petugas'),
  ('Rika Amelia',      'rika',    SHA2('Rika@123',     256), 'admin');

-- Tarif (3 baris)
INSERT INTO tarif (jenis_kendaraan, tarif_per_jam) VALUES
  ('motor',  2000),
  ('mobil',  5000),
  ('truk',  10000);

-- Kendaraan (8 baris)
INSERT INTO kendaraan (plat_nomor, jenis_kendaraan, pemilik, id_tarif) VALUES
  ('B 1234 ABC', 'motor', 'Ahmad Fauzi',      1),
  ('D 5678 XYZ', 'mobil', 'Rina Wati',        2),
  ('F 9999 QRS', 'motor', 'Dedi Cahyono',     1),
  ('H 4321 MNO', 'mobil', 'Lutfi Hakim',      2),
  ('G 8888 PQR', 'motor', 'Mira Lestari',     1),
  ('B 7777 STU', 'truk',  'PT Maju Jaya',     3),
  ('D 1111 VWX', 'motor', 'Yudi Pratama',     1),
  ('E 2222 YZA', 'mobil', 'Dewi Anggraini',   2);

-- Slot parkir (12 baris)
INSERT INTO slot_parkir (kode_slot, status) VALUES
  ('A1','kosong'),('A2','kosong'),('A3','kosong'),('A4','kosong'),
  ('B1','kosong'),('B2','kosong'),('B3','kosong'),('B4','kosong'),
  ('C1','kosong'),('C2','kosong'),('C3','kosong'),('C4','kosong');

-- Transaksi contoh selesai (5 baris — status keluar, trigger akan isi histori)
INSERT INTO transaksi (id_kendaraan, id_slot, id_user, waktu_masuk, waktu_keluar, total_bayar, status) VALUES
  (1, 1, 2, '2025-05-01 08:00:00', '2025-05-01 10:00:00',  4000, 'keluar'),
  (2, 5, 3, '2025-05-01 09:00:00', '2025-05-01 12:00:00', 15000, 'keluar'),
  (3, 2, 2, '2025-05-02 07:30:00', '2025-05-02 09:30:00',  4000, 'keluar'),
  (4, 6, 4, '2025-05-02 10:00:00', '2025-05-02 14:00:00', 20000, 'keluar'),
  (5, 3, 3, '2025-05-03 08:00:00', '2025-05-03 09:00:00',  2000, 'keluar');

-- Histori transaksi (5 baris — relasi 1:1)
INSERT INTO histori_transaksi (id_transaksi, tanggal, total_bayar) VALUES
  (1, '2025-05-01',  4000),
  (2, '2025-05-01', 15000),
  (3, '2025-05-02',  4000),
  (4, '2025-05-02', 20000),
  (5, '2025-05-03',  2000);

-- Total baris: 5+3+8+12+5+5 = 38 baris INSERT ✓

-- ============================================================
-- ④  STORED PROCEDURE — minimal 3 (CRUD + bisnis logik)
-- ============================================================
DELIMITER $$

-- SP-1: Tambah kendaraan baru (CREATE)
CREATE PROCEDURE sp_tambah_kendaraan(
  IN p_plat       VARCHAR(20),
  IN p_jenis      VARCHAR(50),
  IN p_pemilik    VARCHAR(100),
  IN p_id_tarif   INT
)
BEGIN
  IF EXISTS (SELECT 1 FROM kendaraan WHERE plat_nomor = p_plat) THEN
    SIGNAL SQLSTATE '45000'
      SET MESSAGE_TEXT = 'Plat nomor sudah terdaftar!';
  END IF;
  INSERT INTO kendaraan(plat_nomor, jenis_kendaraan, pemilik, id_tarif)
  VALUES (p_plat, p_jenis, p_pemilik, p_id_tarif);
  SELECT LAST_INSERT_ID() AS id_kendaraan_baru;
END$$

-- SP-2: Proses kendaraan MASUK (CREATE transaksi + UPDATE slot)
CREATE PROCEDURE sp_kendaraan_masuk(
  IN p_plat       VARCHAR(20),
  IN p_kode_slot  VARCHAR(20),
  IN p_id_user    INT
)
BEGIN
  DECLARE v_id_kendaraan INT DEFAULT NULL;
  DECLARE v_id_slot      INT DEFAULT NULL;

  SELECT id_kendaraan INTO v_id_kendaraan
    FROM kendaraan WHERE plat_nomor = p_plat LIMIT 1;

  IF v_id_kendaraan IS NULL THEN
    SIGNAL SQLSTATE '45000'
      SET MESSAGE_TEXT = 'Kendaraan tidak ditemukan. Daftarkan dulu!';
  END IF;

  SELECT id_slot INTO v_id_slot
    FROM slot_parkir WHERE kode_slot = p_kode_slot AND status = 'kosong' LIMIT 1;

  IF v_id_slot IS NULL THEN
    SIGNAL SQLSTATE '45000'
      SET MESSAGE_TEXT = 'Slot tidak tersedia atau sudah terisi!';
  END IF;

  INSERT INTO transaksi(id_kendaraan, id_slot, id_user, waktu_masuk, status)
  VALUES (v_id_kendaraan, v_id_slot, p_id_user, NOW(), 'masuk');

  SELECT LAST_INSERT_ID() AS id_transaksi_baru;
END$$

-- SP-3: Proses kendaraan KELUAR — hitung total bayar otomatis (UPDATE)
CREATE PROCEDURE sp_kendaraan_keluar(
  IN p_id_transaksi INT
)
BEGIN
  DECLARE v_tarif       INT;
  DECLARE v_durasi_jam  INT;
  DECLARE v_total       INT;
  DECLARE v_status      VARCHAR(10);

  SELECT status INTO v_status FROM transaksi WHERE id_transaksi = p_id_transaksi;

  IF v_status IS NULL THEN
    SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'ID transaksi tidak ditemukan!';
  END IF;

  IF v_status = 'keluar' THEN
    SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Kendaraan sudah tercatat keluar!';
  END IF;

  -- Ambil tarif per jam dari kendaraan yang parkir
  SELECT t.tarif_per_jam INTO v_tarif
  FROM transaksi tr
  JOIN kendaraan k ON k.id_kendaraan = tr.id_kendaraan
  JOIN tarif     t ON t.id_tarif     = k.id_tarif
  WHERE tr.id_transaksi = p_id_transaksi;

  -- Durasi minimal 1 jam, dibulatkan ke atas
  SELECT GREATEST(CEIL(TIMESTAMPDIFF(MINUTE, waktu_masuk, NOW()) / 60), 1)
    INTO v_durasi_jam
  FROM transaksi WHERE id_transaksi = p_id_transaksi;

  SET v_total = v_tarif * v_durasi_jam;

  -- Update transaksi → trigger akan jalankan insert histori & bebaskan slot
  UPDATE transaksi
  SET waktu_keluar = NOW(),
      total_bayar  = v_total,
      status       = 'keluar'
  WHERE id_transaksi = p_id_transaksi;

  SELECT v_total AS total_bayar, v_durasi_jam AS durasi_jam;
END$$

-- SP-4: Laporan pendapatan per periode (READ / laporan)
CREATE PROCEDURE sp_laporan_pendapatan(
  IN p_dari  DATE,
  IN p_sampai DATE
)
BEGIN
  SELECT
    h.tanggal,
    COUNT(*)              AS jumlah_transaksi,
    SUM(h.total_bayar)    AS total_pendapatan,
    AVG(h.total_bayar)    AS rata_rata
  FROM histori_transaksi h
  WHERE h.tanggal BETWEEN p_dari AND p_sampai
  GROUP BY h.tanggal
  ORDER BY h.tanggal;
END$$

-- SP-5: Lihat slot kosong tersedia (READ)
CREATE PROCEDURE sp_slot_tersedia()
BEGIN
  SELECT kode_slot, status FROM slot_parkir
  WHERE status = 'kosong'
  ORDER BY kode_slot;
END$$

DELIMITER ;

-- ============================================================
-- ⑤  TRIGGER — minimal 3 (manipulasi data otomatis)
-- ============================================================
DELIMITER $$

-- TRIGGER-1: Saat kendaraan MASUK → slot otomatis jadi 'terisi'
CREATE TRIGGER trg_slot_masuk
BEFORE INSERT ON transaksi
FOR EACH ROW
BEGIN
  -- Validasi: tolak jika slot sudah terisi
  IF (SELECT status FROM slot_parkir WHERE id_slot = NEW.id_slot) = 'terisi' THEN
    SIGNAL SQLSTATE '45000'
      SET MESSAGE_TEXT = 'Slot parkir sudah terisi, pilih slot lain!';
  END IF;
  -- Tandai slot sebagai terisi
  UPDATE slot_parkir SET status = 'terisi' WHERE id_slot = NEW.id_slot;
END$$

-- TRIGGER-2: Saat kendaraan KELUAR → slot kembali 'kosong' + isi histori otomatis
CREATE TRIGGER trg_slot_keluar
AFTER UPDATE ON transaksi
FOR EACH ROW
BEGIN
  IF NEW.status = 'keluar' AND OLD.status = 'masuk' THEN
    -- Bebaskan slot parkir
    UPDATE slot_parkir SET status = 'kosong' WHERE id_slot = NEW.id_slot;

    -- Insert histori jika belum ada (relasi 1:1)
    IF NOT EXISTS (
      SELECT 1 FROM histori_transaksi WHERE id_transaksi = NEW.id_transaksi
    ) THEN
      INSERT INTO histori_transaksi(id_transaksi, tanggal, total_bayar)
      VALUES (NEW.id_transaksi, DATE(NEW.waktu_keluar), NEW.total_bayar);
    END IF;
  END IF;
END$$

-- TRIGGER-3: Saat histori baru masuk → log ke tabel log_aktivitas
-- (Tabel bonus untuk menunjukkan cascade trigger)
CREATE TRIGGER trg_log_histori
AFTER INSERT ON histori_transaksi
FOR EACH ROW
BEGIN
  INSERT INTO log_aktivitas(keterangan, waktu)
  VALUES (
    CONCAT('Transaksi #', NEW.id_transaksi, ' selesai. Total: Rp', NEW.total_bayar),
    NOW()
  );
END$$

DELIMITER ;

-- ============================================================
-- ⑥  TABEL BONUS — log_aktivitas (diperlukan trigger ke-3)
--     Buat SEBELUM trigger ke-3 dieksekusi pada data INSERT
-- ============================================================
CREATE TABLE log_aktivitas (
  id_log     INT          NOT NULL AUTO_INCREMENT,
  keterangan VARCHAR(255) NOT NULL,
  waktu      DATETIME     NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id_log)
) ENGINE=InnoDB COMMENT='Log otomatis setiap transaksi selesai';

-- ============================================================
-- ⑦  VIEW — laporan siap pakai
-- ============================================================

-- View-1: Transaksi lengkap + durasi otomatis
CREATE OR REPLACE VIEW v_transaksi_lengkap AS
SELECT
  t.id_transaksi,
  k.plat_nomor,
  k.jenis_kendaraan,
  k.pemilik,
  s.kode_slot,
  u.nama                                                          AS petugas,
  t.waktu_masuk,
  t.waktu_keluar,
  TIMESTAMPDIFF(MINUTE, t.waktu_masuk, IFNULL(t.waktu_keluar, NOW())) AS durasi_menit,
  tf.tarif_per_jam,
  t.total_bayar,
  t.status
FROM transaksi t
JOIN kendaraan  k  ON k.id_kendaraan = t.id_kendaraan
JOIN slot_parkir s ON s.id_slot      = t.id_slot
JOIN users       u ON u.id_user      = t.id_user
JOIN tarif       tf ON tf.id_tarif   = k.id_tarif;

-- View-2: Pendapatan harian
CREATE OR REPLACE VIEW v_pendapatan_harian AS
SELECT
  tanggal,
  COUNT(*)          AS jumlah_transaksi,
  SUM(total_bayar)  AS total_pendapatan
FROM histori_transaksi
GROUP BY tanggal
ORDER BY tanggal DESC;

-- View-3: Slot kosong (untuk petugas)
CREATE OR REPLACE VIEW v_slot_kosong AS
SELECT kode_slot FROM slot_parkir WHERE status = 'kosong' ORDER BY kode_slot;

-- View-4: Kendaraan yang sedang parkir (masuk, belum keluar)
CREATE OR REPLACE VIEW v_parkir_aktif AS
SELECT
  t.id_transaksi,
  k.plat_nomor,
  k.jenis_kendaraan,
  s.kode_slot,
  t.waktu_masuk,
  TIMESTAMPDIFF(MINUTE, t.waktu_masuk, NOW()) AS menit_parkir,
  tf.tarif_per_jam
FROM transaksi t
JOIN kendaraan   k  ON k.id_kendaraan = t.id_kendaraan
JOIN slot_parkir s  ON s.id_slot      = t.id_slot
JOIN tarif       tf ON tf.id_tarif    = k.id_tarif
WHERE t.status = 'masuk';

-- ============================================================
-- ⑧  MULTI USER MySQL — hak akses berbeda per peran
-- ============================================================

-- Hapus user lama jika ada
DROP USER IF EXISTS 'admin_parkir'@'localhost';
DROP USER IF EXISTS 'petugas_parkir'@'localhost';
DROP USER IF EXISTS 'viewer_parkir'@'localhost';

-- Admin: akses penuh ke seluruh database
CREATE USER 'admin_parkir'@'localhost' IDENTIFIED BY 'Admin@Parkir2025';
GRANT ALL PRIVILEGES ON db_parkir.* TO 'admin_parkir'@'localhost';

-- Petugas: hanya boleh operasi transaksi & lihat data referensi
CREATE USER 'petugas_parkir'@'localhost' IDENTIFIED BY 'Petugas@2025';
GRANT SELECT                 ON db_parkir.tarif              TO 'petugas_parkir'@'localhost';
GRANT SELECT                 ON db_parkir.kendaraan          TO 'petugas_parkir'@'localhost';
GRANT SELECT, UPDATE         ON db_parkir.slot_parkir        TO 'petugas_parkir'@'localhost';
GRANT SELECT, INSERT, UPDATE ON db_parkir.transaksi          TO 'petugas_parkir'@'localhost';
GRANT SELECT                 ON db_parkir.histori_transaksi  TO 'petugas_parkir'@'localhost';
GRANT SELECT                 ON db_parkir.v_transaksi_lengkap TO 'petugas_parkir'@'localhost';
GRANT SELECT                 ON db_parkir.v_slot_kosong      TO 'petugas_parkir'@'localhost';
GRANT SELECT                 ON db_parkir.v_parkir_aktif     TO 'petugas_parkir'@'localhost';
GRANT EXECUTE                ON db_parkir.*                  TO 'petugas_parkir'@'localhost';

-- Viewer/laporan: hanya baca view dan histori
CREATE USER 'viewer_parkir'@'localhost' IDENTIFIED BY 'Viewer@2025';
GRANT SELECT ON db_parkir.v_transaksi_lengkap TO 'viewer_parkir'@'localhost';
GRANT SELECT ON db_parkir.v_pendapatan_harian TO 'viewer_parkir'@'localhost';
GRANT SELECT ON db_parkir.v_slot_kosong       TO 'viewer_parkir'@'localhost';
GRANT SELECT ON db_parkir.v_parkir_aktif      TO 'viewer_parkir'@'localhost';
GRANT SELECT ON db_parkir.histori_transaksi   TO 'viewer_parkir'@'localhost';

FLUSH PRIVILEGES;

-- ============================================================
-- ⑨  CONTOH PEMANGGILAN (opsional — bisa dirun manual)
-- ============================================================
/*
-- Cek slot tersedia
CALL sp_slot_tersedia();

-- Daftarkan kendaraan baru
CALL sp_tambah_kendaraan('B 5555 NEW', 'motor', 'Andi Setiawan', 1);

-- Catat kendaraan masuk ke slot A2
CALL sp_kendaraan_masuk('B 5555 NEW', 'A2', 2);

-- Catat kendaraan keluar (ganti id_transaksi sesuai hasil masuk)
CALL sp_kendaraan_keluar(6);

-- Laporan pendapatan Mei 2025
CALL sp_laporan_pendapatan('2025-05-01', '2025-05-31');

-- Lihat semua transaksi lengkap
SELECT * FROM v_transaksi_lengkap;

-- Lihat kendaraan yang masih parkir
SELECT * FROM v_parkir_aktif;

-- Lihat pendapatan harian
SELECT * FROM v_pendapatan_harian;
*/
