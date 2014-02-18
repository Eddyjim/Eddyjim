CREATE TABLE Banners (id INT UNIQUE AUTO_INCREMENT, banner_style_id INT, INDEX fk_Banners_BannerStyles1_idx_idx (banner_style_id), PRIMARY KEY(id, banner_style_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = InnoDB;
CREATE TABLE BannerPictures (id INT UNIQUE AUTO_INCREMENT, banner_id INT NOT NULL, picture VARCHAR(45) NOT NULL, order INT, INDEX fk_BannerPictures_Banners1_idx_idx (banner_id), INDEX banner_id_idx (banner_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = InnoDB;
CREATE TABLE BannerStyles (id INT UNIQUE AUTO_INCREMENT, name VARCHAR(45) NOT NULL, description VARCHAR(255), direction VARCHAR(45), effect VARCHAR(45), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = InnoDB;
CREATE TABLE Blogs (id INT UNIQUE AUTO_INCREMENT, title VARCHAR(255) NOT NULL, section_id INT NOT NULL, icon VARCHAR(45), INDEX fk_Blogs_Sections_idx_idx (section_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = InnoDB;
CREATE TABLE Comments (id INT UNIQUE AUTO_INCREMENT, user_id VARCHAR(45) NOT NULL, description MEDIUMBLOB NOT NULL, publications_id INT, comments_id INT, INDEX fk_Comments_Publications1_idx_idx (publications_id), INDEX fk_Comments_Comments1_idx_idx (comments_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = InnoDB;
CREATE TABLE Downloads (id INT UNIQUE AUTO_INCREMENT, name VARCHAR(45) NOT NULL, description MEDIUMBLOB, file VARCHAR(255) NOT NULL, sections_id INT NOT NULL, type VARCHAR(45) NOT NULL, INDEX fk_Downloads_Sections1_idx_idx (sections_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = InnoDB;
CREATE TABLE Pages (id INT UNIQUE AUTO_INCREMENT, name VARCHAR(45) NOT NULL, icon VARCHAR(45) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = InnoDB;
CREATE TABLE Publications (id INT UNIQUE AUTO_INCREMENT, title VARCHAR(45) NOT NULL, description VARCHAR(45) NOT NULL, blogs_id INT NOT NULL, INDEX fk_Publications_Blogs1_idx_idx (blogs_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = InnoDB;
CREATE TABLE Sections (id INT UNIQUE AUTO_INCREMENT, name VARCHAR(45) NOT NULL, icon VARCHAR(45), order INT, pages_id INT NOT NULL, INDEX fk_Sections_Pages1_idx_idx (pages_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = InnoDB;
CREATE TABLE Sections_has_Banners (section_id INT, banner_id INT, INDEX fk_Sections_has_Banners_Banners1_idx_idx (banner_id), INDEX fk_Sections_has_Banners_Sections1_idx_idx (section_id), PRIMARY KEY(section_id, banner_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = InnoDB;
CREATE TABLE SocialNetworks (id INT UNIQUE AUTO_INCREMENT, name VARCHAR(45) NOT NULL, link MEDIUMBLOB NOT NULL, icon VARCHAR(255) NOT NULL, order INT, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = InnoDB;
CREATE TABLE sf_guard_forgot_password (id BIGINT AUTO_INCREMENT, user_id BIGINT NOT NULL, unique_key VARCHAR(255), expires_at DATETIME NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX user_id_idx (user_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_group (id BIGINT AUTO_INCREMENT, name VARCHAR(255) UNIQUE, description TEXT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_group_permission (group_id BIGINT, permission_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(group_id, permission_id)) ENGINE = INNODB;
CREATE TABLE sf_guard_permission (id BIGINT AUTO_INCREMENT, name VARCHAR(255) UNIQUE, description TEXT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_remember_key (id BIGINT AUTO_INCREMENT, user_id BIGINT, remember_key VARCHAR(32), ip_address VARCHAR(50), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX user_id_idx (user_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_user (id BIGINT AUTO_INCREMENT, first_name VARCHAR(255), last_name VARCHAR(255), email_address VARCHAR(255) NOT NULL UNIQUE, username VARCHAR(128) NOT NULL UNIQUE, algorithm VARCHAR(128) DEFAULT 'sha1' NOT NULL, salt VARCHAR(128), password VARCHAR(128), is_active TINYINT(1) DEFAULT '1', is_super_admin TINYINT(1) DEFAULT '0', last_login DATETIME, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX is_active_idx_idx (is_active), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_user_group (user_id BIGINT, group_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(user_id, group_id)) ENGINE = INNODB;
CREATE TABLE sf_guard_user_permission (user_id BIGINT, permission_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(user_id, permission_id)) ENGINE = INNODB;
ALTER TABLE Banners ADD CONSTRAINT Banners_id_Sections_has_Banners_banner_id FOREIGN KEY (id) REFERENCES Sections_has_Banners(banner_id);
ALTER TABLE Banners ADD CONSTRAINT Banners_id_BannerPictures_banner_id FOREIGN KEY (id) REFERENCES BannerPictures(banner_id);
ALTER TABLE Banners ADD CONSTRAINT Banners_banner_style_id_BannerStyles_id FOREIGN KEY (banner_style_id) REFERENCES BannerStyles(id) ON UPDATE CASCADE ON DELETE CASCADE;
ALTER TABLE BannerPictures ADD CONSTRAINT BannerPictures_banner_id_Banners_id FOREIGN KEY (banner_id) REFERENCES Banners(id) ON UPDATE CASCADE ON DELETE CASCADE;
ALTER TABLE Blogs ADD CONSTRAINT Blogs_section_id_Sections_id FOREIGN KEY (section_id) REFERENCES Sections(id) ON UPDATE CASCADE ON DELETE CASCADE;
ALTER TABLE Comments ADD CONSTRAINT Comments_publications_id_Publications_id FOREIGN KEY (publications_id) REFERENCES Publications(id) ON UPDATE CASCADE ON DELETE CASCADE;
ALTER TABLE Comments ADD CONSTRAINT Comments_comments_id_Comments_id FOREIGN KEY (comments_id) REFERENCES Comments(id) ON UPDATE CASCADE ON DELETE CASCADE;
ALTER TABLE Downloads ADD CONSTRAINT Downloads_sections_id_Sections_id FOREIGN KEY (sections_id) REFERENCES Sections(id) ON UPDATE CASCADE ON DELETE CASCADE;
ALTER TABLE Publications ADD CONSTRAINT Publications_blogs_id_Blogs_id FOREIGN KEY (blogs_id) REFERENCES Blogs(id) ON UPDATE CASCADE ON DELETE CASCADE;
ALTER TABLE Sections ADD CONSTRAINT Sections_pages_id_Pages_id FOREIGN KEY (pages_id) REFERENCES Pages(id) ON UPDATE CASCADE ON DELETE CASCADE;
ALTER TABLE Sections_has_Banners ADD CONSTRAINT Sections_has_Banners_section_id_Sections_id FOREIGN KEY (section_id) REFERENCES Sections(id) ON UPDATE CASCADE ON DELETE CASCADE;
ALTER TABLE Sections_has_Banners ADD CONSTRAINT Sections_has_Banners_banner_id_Banners_id FOREIGN KEY (banner_id) REFERENCES Banners(id) ON UPDATE CASCADE ON DELETE CASCADE;
ALTER TABLE sf_guard_forgot_password ADD CONSTRAINT sf_guard_forgot_password_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_group_permission ADD CONSTRAINT sf_guard_group_permission_permission_id_sf_guard_permission_id FOREIGN KEY (permission_id) REFERENCES sf_guard_permission(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_group_permission ADD CONSTRAINT sf_guard_group_permission_group_id_sf_guard_group_id FOREIGN KEY (group_id) REFERENCES sf_guard_group(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_remember_key ADD CONSTRAINT sf_guard_remember_key_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_group ADD CONSTRAINT sf_guard_user_group_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_group ADD CONSTRAINT sf_guard_user_group_group_id_sf_guard_group_id FOREIGN KEY (group_id) REFERENCES sf_guard_group(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_permission ADD CONSTRAINT sf_guard_user_permission_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_permission ADD CONSTRAINT sf_guard_user_permission_permission_id_sf_guard_permission_id FOREIGN KEY (permission_id) REFERENCES sf_guard_permission(id) ON DELETE CASCADE;
