<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class ConstArray extends Enum
{
    const DoForLiving = [
        0 => "TRABAJA",
        1 => "ESTUDIA",
        2 => "ESTUDIA Y TRABAJA",
        3 => "NO ESTUDIA NI TRABAJA",
    ];

    const Speciality = [
        0 => "ESPECIALIDAD",
        1 => "MAESTRIA",
        2 => "DOCTORADO",
        3 => "IDIOMAS",
        4 => "OTRO",
    ];

    const LongTakeJob = [
        0 => "ANTES DE EGRESAR",
        1 => "MENOS DE 6 MESES",
        2 => "6 MESES A 1 AÑO",
        3 => "MAS DE UN AÑO",
    ];

    const HearAbout = [
        0 => "BOLSA DE TRABAJO DEL PLANTEL",
        1 => "CONTACTO PERSONAL",
        2 => "RESIDENCIA PROFESIONAL",
        3 => "MEDIOS MASIVOS DE COMUNICACION",
    ];

    const LanguageMostSpoken = [
        0 => "ESPAÑOL",
        1 => "INGLES",
        2 => "CHINO MANDARIN",
        3 => "FRANCES",
        4 => "ARABE",
        5 => "BENGALI",
        6 => "RUSO",
        7 => "PORTUGUES",
        8 => "ALEMAN",
        9 => "JAPONES",
    ];

    const Seniority = [
        0 => "MENOS DE UN AÑO",
        1 => "UN AÑO",
        2 => "TRES AÑOS",
        3 => "MAS DE TRES AÑOS",
    ];


    const Salary = [
        0 => "MENOS DE CINCO",
        1 => "ENTRE CINCO Y SIETE",
        2 => "ENTRE OCHO Y DIEZ",
        3 => "MAS DE DIEZ",
    ];

    const ManagementLevel = [
        0 => "TECNICO",
        1 => "SUPERVISOR",
        2 => "JEFE DE AREA",
        3 => "FUNCIONARIO",
        4 => "DIRECTIVO",
        5 => "EMPRESARIO"
    ];

    const JobCondition = [
        0 => "BASE",
        1 => "EVENTUAL",
        2 => "CONTRATO",
    ];

    const BusinessStructure = [
        0 => "PUBLICA",
        1 => "PRIVADA",
        2 => "SOCIAL",
    ];

    const CompanySize = [
        0 => "MICRO",
        1 => "PEQUENA",
        2 => "MEDIANA",
        3 => "GRANDE",
    ];

    const NumberGraduates = [
        0 => "0",
        1 => "1",
        2 => "DE 2 A 5",
        3 => "DE 6 A 8",
        4 => "DE 9 A 10",
        5 => "MAS DE 10",
    ];

    const Congruence = [
        0 => "COMPLETAMENTE",
        1 => "MEDIANAMENTE",
        2 => "LIGERAMENTE",
        3 => "NINGUNA RELACION",
    ];

    const Requirements = [
        0 => "AREA O CAMPO DE ESTUDIO",
        1 => "TITULACION",
        2 => "EXPERIENCIA LABORAL/PRACTICA (ANTES DE EGRESAR)",
        3 => "POSICIONAMIENTO DE LA INSTITUCION DE EGRESO",
        4 => "CONOCIMIENTO DE IDIOMAS EXTRANJEROS",
        5 => "RECOMENDACIONES/REFERENCIAS",
        6 => "PERSONALIDAD/ACTITUDES",
        7 => "CAPACIDAD DE LIDERAZGO",
    ];

    const Level = [
        0 => "MANDO SUPERIOR",
        1 => "MANDO INTERMEDIO",
        2 => "SUPERVISOR O EQUIVALENTE",
        3 => "TECNICO O AUXILIAR",
        4 => "DIRECTOR DE DEPARTAMENTO",
        5 => "GERENTE",
        6 => "SUPERVISOR",
    ];

}
