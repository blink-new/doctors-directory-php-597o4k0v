-- Create database (uncomment if needed)
-- CREATE DATABASE doctors_directory CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
-- USE doctors_directory;

-- Doctor categories table
CREATE TABLE `doctor_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL UNIQUE,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  INDEX `idx_slug` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Insert doctor categories
INSERT INTO `doctor_categories` (`id`, `name`, `slug`, `created_at`) VALUES
(2, 'Allerqoloq', 'allerqoloq', '2025-07-06 17:27:41'),
(3, 'Androloq', 'androloq', '2025-07-06 17:27:41'),
(4, 'Anesteziologiya və İntensiv Terapiya', 'anesteziologiya-ve-intensiv-terapiya', '2025-07-06 17:27:41'),
(5, 'Dermatoveneroloq', 'dermatoveneroloq', '2025-07-06 17:27:41'),
(6, 'Dietoloq', 'dietoloq', '2025-07-06 17:27:41'),
(7, 'Endokrinoloq', 'endokrinoloq', '2025-07-06 17:27:41'),
(8, 'Fizioterapevt', 'fizioterapevt', '2025-07-06 17:27:41'),
(9, 'Hematoloq', 'hematoloq', '2025-07-06 17:27:41'),
(10, 'İnfeksionist', 'infeksionist', '2025-07-06 17:27:41'),
(11, 'Kardioloq', 'kardioloq', '2025-07-06 17:27:41'),
(12, 'Mama-Ginekoloq', 'mama-ginekoloq', '2025-07-06 17:27:41'),
(13, 'Nefroloq', 'nefroloq', '2025-07-06 17:27:41'),
(14, 'Neonatoloq', 'neonatoloq', '2025-07-06 17:27:41'),
(15, 'Nevroloq', 'nevroloq', '2025-07-06 17:27:41'),
(16, 'Neyrocərrah', 'neyrocerrah', '2025-07-06 17:27:41'),
(17, 'Oftalmoloq', 'oftalmoloq', '2025-07-06 17:27:41'),
(18, 'Pediatr', 'pediatr', '2025-07-06 17:27:41'),
(19, 'Plastik,Rekonstruktiv və Estetik Cərrah', 'plastik-rekonstruktiv-ve-estetik-cerrah', '2025-07-06 17:27:41'),
(20, 'Psixiatr', 'psixiatr', '2025-07-06 17:27:41'),
(25, 'LOR Cərrah', 'lor-cerrah', '2025-07-06 17:27:41'),
(27, 'Uroloq - Androloq', 'uroloq-androloq', '2025-07-06 17:27:41'),
(28, 'Ürək-Damar Cərrahiyyəsi', 'urek-damar-cerrahiyyasi', '2025-07-06 17:27:41'),
(29, 'Otolarinqoloq', 'otolarinqoloq', '2025-07-06 17:27:41'),
(31, 'Ortopediya - Travmatologiya', 'ortopediya-travmatologiya', '2025-07-06 17:27:41'),
(33, 'Ümumi cərrah', 'umumi-cerrah', '2025-07-06 17:27:41'),
(34, 'Beyin və Sinir Cərrahı', 'beyin-ve-sinir-cerrahi', '2025-07-06 17:27:41'),
(36, 'Uşaq cərrahı', 'usaq-cerrahi', '2025-07-06 17:27:41'),
(37, 'Radioloq', 'radioloq', '2025-07-06 17:27:41'),
(38, 'Ağız və Üz-Çənə Cərrahı', 'agiz-ve-uz-cene-cerrahi', '2025-07-06 17:27:41'),
(40, 'Uroloq', 'uroloq', '2025-07-06 17:27:41'),
(41, 'Nevropatoloq', 'nevropatoloq', '2025-07-06 17:27:41'),
(44, 'Pediatr - Neonatoloq', 'pediatr-neonatoloq', '2025-07-06 17:27:41'),
(45, 'Daxili xəstəliklər, Terapevt', 'daxili-xestelikler-terapevt', '2025-07-06 17:27:41'),
(47, 'Dermatoloq', 'dermatoloq', '2025-07-06 17:27:41'),
(48, 'Torakal cərrah', 'torakal-cerrah', '2025-07-06 17:27:41'),
(50, 'Ginekoloq Cərrah', 'ginekoloq-cerrah', '2025-07-06 17:27:41'),
(51, 'Həkim-Laborant', 'hekim-laborant', '2025-07-06 17:27:41'),
(53, 'Ortodont', 'ortodont', '2025-07-06 17:27:41');

-- Doctor workplaces table
CREATE TABLE `doctor_workplaces` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL UNIQUE,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  INDEX `idx_slug` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Insert doctor workplaces
INSERT INTO `doctor_workplaces` (`id`, `name`, `slug`, `created_at`) VALUES
(2, 'Baku Medical Plaza', 'baku-medical-plaza', '2025-07-06 20:41:41'),
(3, 'Caspian International Hospital', 'caspian-international-hospital', '2025-07-06 21:18:07'),
(4, 'Olimp Hospital', 'olimp-hospital', '2025-07-06 21:18:09'),
(5, 'LOR Hospital', 'lor-hospital', '2025-07-06 21:18:12'),
(6, 'Liv Bona Dea Hospital', 'liv-bona-dea-hospital', '2025-07-06 21:18:14'),
(7, 'Yeni Klinika', 'yeni-klinika', '2025-07-06 21:18:15'),
(8, '"НВ" ("Güven") klinikası', 'guven-klinikasi', '2025-07-06 21:18:17'),
(9, 'Avrasiya Hospital', 'avrasiya-hospital', '2025-07-06 21:18:19'),
(10, 'Azərbaycan Tibb Universiteti Tədris Cərrahiyyə Klinikası', 'azerbaycan-tibb-universiteti-tedris-cerrahiyye-klinikasi', '2025-07-06 21:18:33'),
(11, 'İmplant Art Dental Klinika', 'mplant-art-dental-klinika', '2025-07-06 21:18:36'),
(12, 'Celamig Göz Klinikası', 'celamig-goz-klinikasi', '2025-07-06 21:18:42'),
(13, 'Baku Medical Plaza Mərkəz', 'baku-medical-plaza-merkez', '2025-07-06 21:18:45'),
(14, 'Oksigen klinikasi', 'oksigen-klinikasi', '2025-07-06 21:18:51'),
(15, 'Akad. M. Topçubaşov ad. Elmi Cərrahiyyə Mərkəzi', 'akad-m-topcubasov-ad-elmi-cerrahiyye-merkezi', '2025-07-06 21:18:52'),
(16, 'Ege Hospital', 'ege-hospital', '2025-07-06 21:19:02'),
(17, 'Mərkəzi Gömrük Hospital', 'merkezi-gomruk-hospital', '2025-07-06 21:19:04'),
(18, 'Real Hospital', 'real-hospital', '2025-07-06 21:19:06'),
(19, 'Dövlət Təhlükəsizlik Xidməti Hərbi Hospitalı', 'dovlet-tehlukesizlik-xidmeti-herbi-hospitali', '2025-07-06 21:19:07'),
(20, 'Zəfəran Hospital', 'zeferan-hospital', '2025-07-06 21:19:11'),
(21, 'Silahlı Qüvvələr Baş Klinik Hospitalı', 'silahli-quvveler-bas-klinik-hospitali', '2025-07-06 21:19:12'),
(22, 'MedEra Hospital', 'medera-hospital', '2025-07-06 21:19:16'),
(23, 'Azərbaycan Tibb Universitetinin Onkoloji Klinikası', 'azerbaycan-tibb-universitetinin-onkoloji-klinikasi', '2025-07-06 21:19:17'),
(24, 'Medical Plaza', 'medical-plaza', '2025-07-06 21:19:20'),
(25, 'Can Klinika', 'can-klinika', '2025-07-06 21:19:22'),
(26, 'Mərkəzi Neftçilər Xəstəxanası', 'merkezi-neftciler-xestexanasi', '2025-07-06 21:19:25'),
(27, 'Mərkəzi Klinik Xəstəxana', 'merkezi-klinik-xestexana', '2025-07-06 21:19:28'),
(28, 'Medistyle Hospital', 'medistyle-hospital', '2025-07-06 21:19:43'),
(29, 'Respublika Müalicəvi Diaqnostika Mərkəzi', 'respublika-mualicevi-diaqnostika-merkezi', '2025-07-06 21:19:48'),
(30, '1 saylı klinik xəstəxana', '1-sayli-klinik-xestexana', '2025-07-06 21:20:02'),
(31, 'Qələndər – Plastik və rekonstruktiv klinika', 'qelender-plastik-ve-rekonstruktiv-klinika', '2025-07-06 21:20:14'),
(32, 'Milli Onkoloji Mərkəz', 'milli-onkoloji-merkez', '2025-07-06 21:20:19'),
(33, 'Mediland Hospital', 'mediland-hospital', '2025-07-06 21:20:33'),
(34, 'İstanbul NS Klinikası', 'stanbul-ns-klinikasi', '2025-07-06 21:20:41'),
(35, 'German Hospital', 'german-hospital', '2025-07-06 21:20:46'),
(36, 'Gəncə Beynəlxalq Xəstəxanası', 'gence-beynelxalq-xestexanasi', '2025-07-06 21:20:56'),
(37, 'Modern Hospital', 'modern-hospital', '2025-07-06 21:20:59'),
(38, 'Uzmanlar Tibb Mərkəzi', 'uzmanlar-tibb-merkezi', '2025-07-06 21:21:02'),
(39, 'Baku Clinic', 'baku-clinic', '2025-07-06 21:21:07');

-- Regions table
CREATE TABLE `regions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `address` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL UNIQUE,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  INDEX `idx_slug` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Insert regions
INSERT INTO `regions` (`id`, `address`, `slug`, `created_at`) VALUES
(3, 'Nəsimi rayonu', 'nesimi-rayonu', '2025-07-06 17:29:10'),
(5, 'Binəqədi rayonu', 'bineqedi-rayonu', '2025-07-06 17:29:10'),
(11, 'Nərimanov rayonu', 'nerimanov-rayonu', '2025-07-06 17:29:10'),
(12, 'Xətai metrosu (M)', 'xetai-metrosu', '2025-07-06 17:29:10'),
(13, 'Xətai ray, Babək prospekti', 'xetai-ray-babek-prospekti', '2025-07-06 17:29:10'),
(16, 'Atatürk prospekti', 'ataturk-prospekti', '2025-07-06 17:29:10'),
(18, '28 May (M)', '28-may', '2025-07-06 17:29:10'),
(19, 'Nəsimi ray, 28 May (M)', 'nesimi-ray-28-may', '2025-07-06 17:29:10'),
(22, 'Nəsimi r-nu, Ak.Həsən Əliyev 15', 'nesimi-r-nu-ak-hesen-eli-ev-15', '2025-07-06 17:29:10'),
(23, 'Nərimanov (M)', 'nerimanov', '2025-07-06 17:29:10'),
(24, 'Badamdar', 'badamdar', '2025-07-06 17:29:10'),
(25, '118 Kazim Kazimzade Küçəsi', '118-kazim-kazimzade-kucəsi', '2025-07-06 17:29:10'),
(26, 'Zahid Xəlilov küç,99', 'zahid-xelilov-kuc-99', '2025-07-06 17:29:10'),
(27, 'Asif Məmmədov 30', 'asif-memmedov-30', '2025-07-06 17:29:10'),
(28, 'Tbilisi Prospekti', 'tbilisi-prospekti', '2025-07-06 17:29:10'),
(29, 'Əcəmi Naxçivani 53', 'ecemi-naxcivani-53', '2025-07-06 17:29:10'),
(30, 'Nəsimi ray.Səməd Vurğun', 'nesimi-ray-semed-vurgun', '2025-07-06 17:29:10'),
(33, 'Nəsimi rayonu, Vaqif pr 9A', 'nesimi-rayonu-vaqif-pr-9a', '2025-07-06 17:29:10'),
(34, 'Xətai, Mehdi Mehdizadə küç', 'xetai-mehdi-mehdizade-kuc', '2025-07-06 17:29:10'),
(37, 'Nəsimi ray. Akademik Həsən Əliyev küç 38', 'nesimi-ray-akademik-hesen-eli-ev-kuc-38', '2025-07-06 17:29:10'),
(38, 'Babek pr - ti 92', 'babek-pr-ti-92', '2025-07-06 17:29:10'),
(39, 'B.Bağırova, küç.22', 'b-bagirova-kuc-22', '2025-07-06 17:29:10'),
(40, 'Parlament pr. 76', 'parlament-pr-76', '2025-07-06 17:29:10'),
(42, 'Gənclik (M).', 'genclik', '2025-07-06 17:29:10'),
(47, 'Akademik Şəfayət Mehdiyev 558-ci məhəllə', 'akademik-sefayet-mehdiyev-558-ci-mehelle', '2025-07-06 17:29:10'),
(48, 'Heydər Hüseynov, Bakı', 'heydər-huseynov-baki', '2025-07-06 17:29:10'),
(50, 'Bakı ş.Yasamal r-nu, İsmayıl bəy Qutqaşınlı küç., 51', 'baki-s-yasamal-r-nu-ismayil-bey-qutqasinli-kuc-51', '2025-07-06 17:29:10'),
(51, 'H. Əliyev pr-ti 60 D/E/F, Gəncə, Azərbaycan', 'h-eli-ev-pr-ti-60-def-gence-azərbaycan', '2025-07-06 17:29:10'),
(53, '78 Həsən bəy Zərdabi Küçəsi, Bakı', '78-hesen-bey-zerdabi-kucəsi-baki', '2025-07-06 17:29:10'),
(54, 'Bəkir Çobanzadə', 'bekir-cobanzade', '2025-07-06 17:29:10'),
(55, 'Xətai rayonu, 1188 məhəllə, Sabit Orucov küç., 57G', 'xetai-rayonu-1188-mehelle-sabit-orucov-kuc-57g', '2025-07-06 17:29:10'),
(56, 'Mixail Kaveroçkin 30 (Amerika Səfirliyinin Qarşısı)', 'mixail-kaverockin-30-amerika-sefirliyinin-qarsisi', '2025-07-06 17:29:10'),
(57, 'Badamdar, 1-ci yaşayış massivi 31', 'badamdar-1-ci-yasayis-massivi-31', '2025-07-06 17:29:10'),
(58, 'Q.Qarayev, Mehdi Abbasov 2', 'q-qarayev-mehdi-abbasov-2', '2025-07-06 17:29:10'),
(59, 'Əhməd Rəcəbli 1/25., Nərimanov r.', 'ehmed-recebli-1-25-nerimanov-r', '2025-07-06 17:29:10'),
(60, 'Heydər Əliyev Prospekti', 'heydər-eli-ev-prospekti', '2025-07-06 17:29:10'),
(61, 'İnşaatçılar prospekti 8', 'insaatcilar-prospekti-8', '2025-07-06 17:29:10');

-- Doctors table
CREATE TABLE `doctors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `fullName` varchar(100) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `region_id` int(11) NOT NULL,
  `workplace_id` int(11) NOT NULL,
  `phone` text DEFAULT NULL,
  `haqqinda` text NOT NULL,
  `tehsil` text NOT NULL,
  `rating` decimal(3,2) NOT NULL DEFAULT 5.00,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  FOREIGN KEY (`category_id`) REFERENCES `doctor_categories`(`id`) ON DELETE CASCADE,
  FOREIGN KEY (`region_id`) REFERENCES `regions`(`id`) ON DELETE CASCADE,
  FOREIGN KEY (`workplace_id`) REFERENCES `doctor_workplaces`(`id`) ON DELETE CASCADE,
  INDEX `idx_category` (`category_id`),
  INDEX `idx_region` (`region_id`),
  INDEX `idx_workplace` (`workplace_id`),
  INDEX `idx_rating` (`rating`),
  FULLTEXT(`fullName`, `haqqinda`, `tehsil`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Insert sample doctors
INSERT INTO `doctors` (`title`, `fullName`, `category_id`, `region_id`, `workplace_id`, `phone`, `haqqinda`, `tehsil`, `rating`) VALUES
('Dr.', 'Əhməd Əliyev', 11, 3, 2, '+994 50 123 45 67', 'Kardioloq sahəsində 15 il təcrübəsi olan həkim. Ürək xəstəlikləri və damar problemləri üzrə ixtisaslaşıb. Müasir diaqnostika üsulları və müalicə metodları ilə məşğuldur.', 'Azərbaycan Tibb Universiteti, Kardioloq ixtisası, 2008. Türkiyədə təkmilləşmə kursu, 2015.', 4.8),
('Prof. Dr.', 'Leyla Məmmədova', 15, 11, 3, '+994 55 987 65 43', 'Nevrologiya sahəsində tanınmış mütəxəssis. Beyin və sinir sisteminin xəstəlikləri üzrə 20 il təcrübəsi var. Çoxsaylı elmi əsərlərin müəllifi.', 'Bakı Dövlət Universiteti Tibb fakültəsi, 1995. Moskvada aspirantura, 2000. Professor dərəcəsi, 2010.', 4.9),
('Dr.', 'Rəşad Həsənov', 17, 23, 12, '+994 70 456 78 90', 'Göz xəstəlikləri sahəsində mütəxəssis. Katarakt əməliyyatları və lazer müalicələr aparır. Müasir avadanlıqla təchiz olunmuş klinikada çalışır.', 'Azərbaycan Tibb Universiteti, Oftalmologiya ixtisası, 2010. Almaniyada təkmilləşmə kursu, 2018.', 4.7),
('Dr.', 'Gülnar Qasımova', 12, 5, 6, '+994 51 234 56 78', 'Qadın sağlamlığı sahəsində təcrübəli həkim. Hamiləlik dövrü və doğuş prosesi üzrə ixtisaslaşıb. Müasir müalicə üsulları tətbiq edir.', 'Azərbaycan Tibb Universiteti, Mama-Ginekoloq ixtisası, 2012. Türkiyədə staj, 2016.', 4.6),
('Dr.', 'Elvin Babayev', 33, 18, 4, '+994 77 345 67 89', 'Ümumi cərrahiyyə sahəsində 12 il təcrübəsi olan həkim. Qarın boşluğu əməliyyatları və laparoskopik cərrahiyyə üzrə ixtisaslaşıb.', 'Azərbaycan Tibb Universiteti, Ümumi cərrah ixtisası, 2011. İtaliyada təkmilləşmə kursu, 2019.', 4.5);

-- Create indexes for better performance
CREATE INDEX idx_doctors_search ON doctors(fullName, category_id, region_id);
CREATE INDEX idx_doctors_rating ON doctors(rating DESC);
CREATE INDEX idx_categories_name ON doctor_categories(name);
CREATE INDEX idx_regions_address ON regions(address);
CREATE INDEX idx_workplaces_name ON doctor_workplaces(name);