<?php

namespace App\Constants;

trait ConstantExport
{
    static function getConstants()
    {
        $refl = new \ReflectionClass(__CLASS__);
        return $refl->getConstants();
    }
}

class Constants
{
    public const ROLE =
    [
        'Administrator' => "admin",
        'Graduate' => "graduate",
        'Company' => "company",
        'Committee' => "committee"
    ];

    const STATUS = [
        'Inactive' => 0,
        'Active' => 1
    ];

    const YES_NO = [
        "Yes" => "SÍ",
        "No" => "NO",
    ];

    const DO_FOR_LIVING = [
        "Work" => "TRABAJA",
        "Study" => "ESTUDIA",
        "WorkAndStudy" => "ESTUDIA Y TRABAJA",
        "NotWorkStudy" => "NO ESTUDIA NI TRABAJA",
    ];

    const ALERT_TYPE = [
        "Success" => "success",
        "Info" => "info",
        "Error" => "error",
        "Warning" => "warning",
    ];

    const MONTH = [
        0 => "ENERO-JUNIO",
        1 => "AGOSTO-DICIEMBRE"
    ];

    const MARITAL_STATUS = [
        0 => "SOLTERO",
        1 => "CASADO",
        2 => "DIVORCIADO",
        3 => "VIUDO",
        4 => "CONCUBINATO",
        5 => "OTRO",
    ];

    const GOOD_BAD_QUESTION = [
        0 => "MUY BUENA",
        1 => "BUENA",
        2 => "REGULAR",
        3 => "MALA",
    ];

    const SPECIALITY = [
        0 => "ESPECIALIDAD",
        1 => "MAESTRIA",
        2 => "DOCTORADO",
        3 => "IDIOMAS",
        4 => "OTRO",
    ];

    const LONG_TAKE_JOB = [
        0 => "ANTES DE EGRESAR",
        1 => "MENOS DE 6 MESES",
        2 => "6 MESES A 1 AÑO",
        3 => "MÁS DE UN AÑO",
    ];

    const HEAR_ABOUT = [
        0 => "BOLSA DE TRABAJO DEL PLANTEL",
        1 => "CONTACTO PERSONAL",
        2 => "RESIDENCIA PROFESIONAL",
        3 => "MEDIOS MASIVOS DE COMUNICACIÓN",
    ];

    const SENIORITY = [
        0 => "MENOS DE UN AÑO",
        1 => "UN AÑO",
        2 => "TRES AÑOS",
        3 => "MÁS DE TRES AÑOS",
    ];

    const SALARY = [
        0 => "MENOS DE CINCO",
        1 => "ENTRE CINCO Y SIETE",
        2 => "ENTRE OCHO Y DIEZ",
        3 => "MÁS DE DIEZ",
    ];

    const MANAGEMENT_LEVEL = [
        0 => "TÉCNICO",
        1 => "SUPERVISOR",
        2 => "JEFE DE ÁREA",
        3 => "FUNCIONARIO",
        4 => "DIRECTIVO",
        5 => "EMPRESARIO"
    ];

    const JOB_CONDITION = [
        0 => "BASE",
        1 => "EVENTUAL",
        2 => "CONTRATO",
    ];

    const BUSINESS_STRUCTURE = [
        0 => "PÚBLICA",
        1 => "PRIVADA",
        2 => "SOCIAL",
    ];

    const COMPANY_SIZE = [
        0 => "MICROEMPRESA (DE 1 A 30)",
        1 => "PEQUEÑA (DE 31 A 100)",
        2 => "MEDIANA (DE 101 A 500)",
        3 => "GRANDE (MÁS DE 500)",
    ];

    const NUMBER_GRADUATES = [
        0 => "0",
        1 => "1",
        2 => "DE 2 A 5",
        3 => "DE 6 A 8",
        4 => "DE 9 A 10",
        5 => "MÁS DE 10",
    ];

    const CONGRUENCE = [
        0 => "COMPLETAMENTE",
        1 => "MEDIANAMENTE",
        2 => "LIGERAMENTE",
        3 => "NINGUNA RELACIÓN",
    ];

    const LEVEL = [
        0 => "MANDO SUPERIOR",
        1 => "MANDO INTERMEDIO",
        2 => "SUPERVISOR O EQUIVALENTE",
        3 => "TÉCNICO O AUXILIAR",
        4 => "DIRECTOR DE DEPARTAMENTO",
        5 => "GERENTE",
        6 => "SUPERVISOR",
    ];

    use ConstantExport;
}
