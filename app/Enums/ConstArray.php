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

    const MaritalStatus = [
        0 => "SOLTERO",
        1 => "CASADO",
        2 => "DIVORCIADO",
        3 => "VIUDO",
        4 => "CONCUBINATO",
        5 => "OTRO",
    ];

    const Month = [
        0 => "ENERO",
        1 => "FEBRERO",
        2 => "MARZO",
        3 => "ABRIL",
        4 => "MAYO",
        5 => "JUNIO",
        6 => "JULIO",
        7 => "AGOSTO",
        8 => "SEPTIEMBRE",
        9 => "OCTUBRE",
        10 => "NOVIEMBRE",
        11 => "DICIEMBRE",
    ];

    const YesNoQuestion = [
        0 => "SÍ",
        1 => "NO",
    ];

    const GoodBadQuestion = [
        0 => "MUY BUENA",
        1 => "BUENA",
        2 => "REGULAR",
        3 => "MALA",
    ];

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
        3 => "MÁS DE UN AÑO",
    ];

    const HearAbout = [
        0 => "BOLSA DE TRABAJO DEL PLANTEL",
        1 => "CONTACTO PERSONAL",
        2 => "RESIDENCIA PROFESIONAL",
        3 => "MEDIOS MASIVOS DE COMUNICACIÓN",
    ];

    const LanguageMostSpoken = [
        0 => "ESPAÑOL",
        1 => "INGLÉS",
        2 => "CHINO MANDARÍN",
        3 => "FRANCÉS",
        4 => "ÁRABE",
        5 => "BENGALI",
        6 => "RUSO",
        7 => "PORTUGUÉS",
        8 => "ALEMÁN",
        9 => "JAPONÉS",
        10 => "COREANO",
        11 => "ITALIANO",
    ];

    const Seniority = [
        0 => "MENOS DE UN AÑO",
        1 => "UN AÑO",
        2 => "TRES AÑOS",
        3 => "MÁS DE TRES AÑOS",
    ];

    const Salary = [
        0 => "MENOS DE CINCO",
        1 => "ENTRE CINCO Y SIETE",
        2 => "ENTRE OCHO Y DIEZ",
        3 => "MÁS DE DIEZ",
    ];

    const ManagementLevel = [
        0 => "TÉCNICO",
        1 => "SUPERVISOR",
        2 => "JEFE DE ÁREA",
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
        0 => "PÚBLICA",
        1 => "PRIVADA",
        2 => "SOCIAL",
    ];

    const CompanySize = [
        0 => "MICROEMPRESA (DE 1 A 30)",
        1 => "PEQUEÑA (DE 31 A 100)",
        2 => "MEDIANA (DE 101 A 500)",
        3 => "GRANDE (MÁS DE 500) ",
    ];

    const NumberGraduates = [
        0 => "0",
        1 => "1",
        2 => "DE 2 A 5",
        3 => "DE 6 A 8",
        4 => "DE 9 A 10",
        5 => "MÁS DE 10",
    ];

    const Congruence = [
        0 => "COMPLETAMENTE",
        1 => "MEDIANAMENTE",
        2 => "LIGERAMENTE",
        3 => "NINGUNA RELACIÓN",
    ];

    const Requirements = [
        0 => "ÁREA O CAMPO DE ESTUDIO",
        1 => "TITULACIÓN",
        2 => "EXPERIENCIA LABORAL/PRÁCTICA (ANTES DE EGRESAR)",
        3 => "POSICIONAMIENTO DE LA INSTITUCIÓN DE EGRESO",
        4 => "CONOCIMIENTO DE IDIOMAS EXTRANJEROS",
        5 => "RECOMENDACIONES/REFERENCIAS",
        6 => "PERSONALIDAD/ACTITUDES",
        7 => "CAPACIDAD DE LIDERAZGO",
    ];

    const Level = [
        0 => "MANDO SUPERIOR",
        1 => "MANDO INTERMEDIO",
        2 => "SUPERVISOR O EQUIVALENTE",
        3 => "TÉCNICO O AUXILIAR",
        4 => "DIRECTOR DE DEPARTAMENTO",
        5 => "GERENTE",
        6 => "SUPERVISOR",
    ];
}
