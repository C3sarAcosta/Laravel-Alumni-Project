INSERT INTO `careers` (`name`, `created_at`, `updated_at`) VALUES ('INGENIERIA INDUSTRIAL', NOW(), NOW());
INSERT INTO `careers` (`name`, `created_at`, `updated_at`) VALUES ('INGENIERIA ELECTROMECANICA', NOW(), NOW());
INSERT INTO `careers` (`name`, `created_at`, `updated_at`) VALUES ('INGENIERIA SISTEMAS COMPUTACIONALES', NOW(), NOW());
INSERT INTO `careers` (`name`, `created_at`, `updated_at`) VALUES ('INGENIERIA GESTION EMPRESARIAL', NOW(), NOW());
INSERT INTO `careers` (`name`, `created_at`, `updated_at`) VALUES ('INGENIERIA ENERGIAS RENOVABLES', NOW(), NOW());

-- Especialidades
----Industrial
SELECT @industrial := `id` FROM careers WHERE name = 'INGENIERIA INDUSTRIAL';
INSERT INTO `specialties` (`name`, `id_career`, `created_at`, `updated_at`) VALUES ('MANUFACTURA INTELIGENTE', @industrial, NOW(), NOW());
INSERT INTO `specialties` (`name`, `id_career`, `created_at`, `updated_at`) VALUES ('HERRAMIENTAS DE MANUFACTURA Y MEJORA CONTINUA', @industrial, NOW(), NOW());


----Electromecánica
SELECT @electro := `id` FROM careers WHERE name = 'INGENIERIA ELECTROMECANICA';
INSERT INTO `specialties` (`name`, `id_career`, `created_at`, `updated_at`) VALUES ('MECATRONICA', @electro, NOW(), NOW());
INSERT INTO `specialties` (`name`, `id_career`, `created_at`, `updated_at`) VALUES ('AUTOMATIZACION Y CONTROL', @electro, NOW(), NOW());
INSERT INTO `specialties` (`name`, `id_career`, `created_at`, `updated_at`) VALUES ('SISTEMAS DE PROGRAMACION ELECTRONICA', @electro, NOW(), NOW());
INSERT INTO `specialties` (`name`, `id_career`, `created_at`, `updated_at`) VALUES ('AUTOMATIZACION', @electro, NOW(), NOW());


----Sistemas
SELECT @sistemas := `id` FROM careers WHERE name = 'INGENIERIA SISTEMAS COMPUTACIONALES';
INSERT INTO `specialties` (`name`, `id_career`, `created_at`, `updated_at`) VALUES ('ESTANDARES ABIERTOS', @sistemas, NOW(), NOW());
INSERT INTO `specialties` (`name`, `id_career`, `created_at`, `updated_at`) VALUES ('INGENIERIA DE SOFTWARE', @sistemas, NOW(), NOW());
INSERT INTO `specialties` (`name`, `id_career`, `created_at`, `updated_at`) VALUES ('DESARROLLO AGIL DE SOFTWARE', @sistemas, NOW(), NOW());


----Electromecánica
SELECT @gestion := `id` FROM careers WHERE name = 'INGENIERIA GESTION EMPRESARIAL';
INSERT INTO `specialties` (`name`, `id_career`, `created_at`, `updated_at`) VALUES ('DESARROLLO GLOBAL DE NEGOCIOS', @gestion, NOW(), NOW());
INSERT INTO `specialties` (`name`, `id_career`, `created_at`, `updated_at`) VALUES ('CREACION Y DESARROLLO ESTRATEGICO DE NEGOCIOS', @gestion, NOW(), NOW());
INSERT INTO `specialties` (`name`, `id_career`, `created_at`, `updated_at`) VALUES ('DESARROLLO DE NEGOCIOS INTERNACIONALES', @gestion, NOW(), NOW());
INSERT INTO `specialties` (`name`, `id_career`, `created_at`, `updated_at`) VALUES ('CALIDAD EN EL DESARROLLO ESTRATEGICO DE NEGOCIOS', @gestion, NOW(), NOW());


----Renovables
SELECT @renovables := `id` FROM careers WHERE name = 'INGENIERIA ENERGIAS RENOVABLES';
INSERT INTO `specialties` (`name`, `id_career`, `created_at`, `updated_at`) VALUES ('MODELADO SOLAR Y EOLICO', @renovables, NOW(), NOW());
INSERT INTO `specialties` (`name`, `id_career`, `created_at`, `updated_at`) VALUES ('DISEÑO SOLAR Y EOLICO', @renovables, NOW(), NOW());