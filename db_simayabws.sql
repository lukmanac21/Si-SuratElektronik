-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Agu 2020 pada 02.27
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_simayabws`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_bagian`
--

CREATE TABLE `tbl_bagian` (
  `id_bagian` int(11) NOT NULL,
  `id_dinas` int(11) NOT NULL,
  `nama_bagian` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_bagian`
--

INSERT INTO `tbl_bagian` (`id_bagian`, `id_dinas`, `nama_bagian`) VALUES
(1, 1, 'Kepala Dinas'),
(2, 1, 'Kepala Bidang'),
(3, 1, 'Kepala Sie'),
(4, 1, 'Sekretaris Dinas'),
(10, 1, 'Tata Usaha'),
(12, 1, 'Programmer'),
(13, 2, 'Kepala Dinas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_dinas`
--

CREATE TABLE `tbl_dinas` (
  `id_dinas` int(11) NOT NULL,
  `nama_dinas` varchar(50) NOT NULL,
  `alamat_dinas` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_dinas`
--

INSERT INTO `tbl_dinas` (`id_dinas`, `nama_dinas`, `alamat_dinas`) VALUES
(1, 'Dinas Komunikasi dan Informatika', ''),
(2, 'Dinas Pertanian', 'Jalan'),
(3, 'Dinas Sosial', ''),
(4, 'Dinas Perhubungan', ''),
(5, 'Dinas Ketahanan Pangan', 'Jalan'),
(6, 'Dinas Kesehatan', 'Jalan 1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_disposisi`
--

CREATE TABLE `tbl_disposisi` (
  `id_disposisi` int(11) NOT NULL,
  `tgl_disposisi` datetime NOT NULL,
  `id_surat` int(11) NOT NULL,
  `id_pengirim` int(11) NOT NULL,
  `id_penerima` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_menu`
--

CREATE TABLE `tbl_menu` (
  `id_menu` int(11) NOT NULL,
  `nama_menu` varchar(50) NOT NULL,
  `icon_menu` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_menu`
--

INSERT INTO `tbl_menu` (`id_menu`, `nama_menu`, `icon_menu`) VALUES
(2, 'Data Master', 'nav-icon fas fa-th'),
(3, 'Kotak Surat Masuk', 'nav-icon far fa-envelope'),
(4, 'Kotak Surat Keluar', 'nav-icon fas fa-envelope'),
(6, 'Buku Tamu', 'nav-icon fas fa-book'),
(7, 'Agenda', 'nav-icon fas fa-calendar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_penanggungjawab`
--

CREATE TABLE `tbl_penanggungjawab` (
  `id_penanggungjawab` int(11) NOT NULL,
  `id_dinas` int(11) NOT NULL,
  `id_bagian` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_penanggungjawab`
--

INSERT INTO `tbl_penanggungjawab` (`id_penanggungjawab`, `id_dinas`, `id_bagian`) VALUES
(1, 1, 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_perihal`
--

CREATE TABLE `tbl_perihal` (
  `id_perihal` int(11) NOT NULL,
  `kode_perihal` varchar(12) NOT NULL,
  `nama_perihal` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_perihal`
--

INSERT INTO `tbl_perihal` (`id_perihal`, `kode_perihal`, `nama_perihal`) VALUES
(1, '', 'Pemberitahuan'),
(2, '', 'Permohonan Pengiriman Delegasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_role`
--

CREATE TABLE `tbl_role` (
  `id_role` int(11) NOT NULL,
  `id_dinas` int(11) NOT NULL,
  `nama_role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_role`
--

INSERT INTO `tbl_role` (`id_role`, `id_dinas`, `nama_role`) VALUES
(1, 1, 'Superadmin'),
(2, 1, 'Admin'),
(6, 1, 'User');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_status_surat`
--

CREATE TABLE `tbl_status_surat` (
  `id_status_surat` int(11) NOT NULL,
  `nama_status_surat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_status_surat`
--

INSERT INTO `tbl_status_surat` (`id_status_surat`, `nama_status_surat`) VALUES
(1, 'Diterima'),
(2, 'Dibaca'),
(3, 'Disposisi'),
(4, 'Ditolak');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_sub_menu`
--

CREATE TABLE `tbl_sub_menu` (
  `id_sub_menu` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `nama_sub_menu` varchar(30) NOT NULL,
  `link_sub_menu` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_sub_menu`
--

INSERT INTO `tbl_sub_menu` (`id_sub_menu`, `id_menu`, `nama_sub_menu`, `link_sub_menu`) VALUES
(2, 2, 'Master OPD', 'Dinas/index'),
(3, 2, 'Master Menu', 'Menu/index'),
(4, 2, 'Master Role', 'Role/index'),
(5, 3, 'Surat Masuk', 'Surat/surat_masuk'),
(6, 4, 'Surat Keluar', 'Surat/surat_keluar'),
(7, 2, 'Master Sub Menu', 'Submenu/index'),
(8, 2, 'Master Perihal Surat', 'Perihalsurat/index'),
(9, 3, 'Konsep Surat Masuk', 'Konsepsmasuk/index'),
(10, 3, 'Disposisi Keluar', 'Dispokeluar/index'),
(11, 3, 'Disposisi Inisiatif', 'Dispoinisiatif/index'),
(12, 3, 'Buat Surat', 'Surat/index'),
(14, 2, 'Master User', 'User/index'),
(15, 2, 'Master Status Surat', 'Statussurat/index'),
(16, 2, 'Master Bagian', 'Bagian/index'),
(17, 2, 'Master Penanggung Jawab', 'Penanggungjawab/index');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_surat`
--

CREATE TABLE `tbl_surat` (
  `id_surat` int(11) NOT NULL,
  `id_pengirim` int(11) NOT NULL,
  `id_penerima` int(11) NOT NULL,
  `id_perihal` int(11) NOT NULL,
  `no_surat` varchar(50) NOT NULL,
  `tgl_surat` date NOT NULL,
  `tgl_surat_kirim` datetime NOT NULL,
  `isi_surat` text NOT NULL,
  `status_dibaca` datetime NOT NULL,
  `status_surat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_surat`
--

INSERT INTO `tbl_surat` (`id_surat`, `id_pengirim`, `id_penerima`, `id_perihal`, `no_surat`, `tgl_surat`, `tgl_surat_kirim`, `isi_surat`, `status_dibaca`, `status_surat`) VALUES
(3, 10, 3, 1, '005/149/430.9.5/2020', '2020-08-07', '2020-08-07 08:08:30', 'Dalam rangka dilaksanakannya Studi Tiru Implementasi Yogyakarta Smart City, dimana salah satu ketentuan yang dipersyaratkan adalah membawa dan menunjukan Surat Keterangan Rapid Test dengan hasil Non Reaktif yang masih berlaku 3 (tiga) hari pada saat kunjungan, maka kami mengajukan pemeriksaan Rapid Test Covid-19 bagi Tim Studi Tiru Kabupaten Bondowoso yang berjumlah 20 (dua puluh) orang. Demikian atas permohonan kami, atas perhatian dan kerjasamanya disampaikan terima kasih                        ', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  `id_dinas` int(11) NOT NULL,
  `id_bagian` int(11) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `email_user` varchar(50) NOT NULL,
  `password_user` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `id_role`, `id_dinas`, `id_bagian`, `nama_user`, `email_user`, `password_user`) VALUES
(1, 1, 2, 10, 'Lukman Arief Cahyono', 'lukman@devplus.com', 'd033e22ae348aeb5660fc2140aec35850c4da997'),
(2, 1, 2, 1, 'Fajar Dewandaru', 'fajar@devplus.com', 'd033e22ae348aeb5660fc2140aec35850c4da997'),
(4, 6, 1, 3, 'Eka Kusuma A, S.Kom', 'ekakusuma@kominfo.com', 'd033e22ae348aeb5660fc2140aec35850c4da997');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user_access`
--

CREATE TABLE `tbl_user_access` (
  `id_user_access` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  `id_sub_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_user_access`
--

INSERT INTO `tbl_user_access` (`id_user_access`, `id_role`, `id_sub_menu`) VALUES
(4, 2, 12),
(5, 2, 11),
(6, 2, 10),
(7, 2, 9),
(8, 2, 6),
(10, 1, 12),
(11, 1, 11),
(12, 1, 10),
(13, 1, 9),
(14, 1, 2),
(15, 1, 3),
(16, 1, 8),
(17, 1, 4),
(18, 1, 7),
(19, 1, 14),
(20, 1, 6),
(21, 1, 5),
(22, 1, 15),
(23, 1, 16),
(24, 1, 17),
(25, 2, 5);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_bagian`
--
ALTER TABLE `tbl_bagian`
  ADD PRIMARY KEY (`id_bagian`);

--
-- Indeks untuk tabel `tbl_dinas`
--
ALTER TABLE `tbl_dinas`
  ADD PRIMARY KEY (`id_dinas`);

--
-- Indeks untuk tabel `tbl_disposisi`
--
ALTER TABLE `tbl_disposisi`
  ADD PRIMARY KEY (`id_disposisi`);

--
-- Indeks untuk tabel `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indeks untuk tabel `tbl_penanggungjawab`
--
ALTER TABLE `tbl_penanggungjawab`
  ADD PRIMARY KEY (`id_penanggungjawab`);

--
-- Indeks untuk tabel `tbl_perihal`
--
ALTER TABLE `tbl_perihal`
  ADD PRIMARY KEY (`id_perihal`);

--
-- Indeks untuk tabel `tbl_role`
--
ALTER TABLE `tbl_role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indeks untuk tabel `tbl_status_surat`
--
ALTER TABLE `tbl_status_surat`
  ADD PRIMARY KEY (`id_status_surat`);

--
-- Indeks untuk tabel `tbl_sub_menu`
--
ALTER TABLE `tbl_sub_menu`
  ADD PRIMARY KEY (`id_sub_menu`);

--
-- Indeks untuk tabel `tbl_surat`
--
ALTER TABLE `tbl_surat`
  ADD PRIMARY KEY (`id_surat`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `tbl_user_access`
--
ALTER TABLE `tbl_user_access`
  ADD PRIMARY KEY (`id_user_access`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_bagian`
--
ALTER TABLE `tbl_bagian`
  MODIFY `id_bagian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `tbl_dinas`
--
ALTER TABLE `tbl_dinas`
  MODIFY `id_dinas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tbl_disposisi`
--
ALTER TABLE `tbl_disposisi`
  MODIFY `id_disposisi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tbl_penanggungjawab`
--
ALTER TABLE `tbl_penanggungjawab`
  MODIFY `id_penanggungjawab` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_perihal`
--
ALTER TABLE `tbl_perihal`
  MODIFY `id_perihal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_role`
--
ALTER TABLE `tbl_role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tbl_status_surat`
--
ALTER TABLE `tbl_status_surat`
  MODIFY `id_status_surat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_sub_menu`
--
ALTER TABLE `tbl_sub_menu`
  MODIFY `id_sub_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `tbl_surat`
--
ALTER TABLE `tbl_surat`
  MODIFY `id_surat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_user_access`
--
ALTER TABLE `tbl_user_access`
  MODIFY `id_user_access` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
