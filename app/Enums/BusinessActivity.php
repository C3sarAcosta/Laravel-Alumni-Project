<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class BusinessActivity extends Enum
{
    const SportActivities = "ACTIVIDADES DEPORTIVAS";
    const Administration = "ADMINISTRACIÓN";
    const Agrifood = "AGRO-ALIMENTARIO";
    const Agriindustial = "AGRO-INDUSTRIAL";
    const Food = "ALIMENTOS, BEBIDAS Y TABACO";
    const GraphicArts = "ARTES GRÁFICAS";
    const Automotive = "AUTOMOTRIZ";
    const Plastic = "CAUCHO Y PLÁSTICO";
    const Construction = "CONSTRUCCIÓN";
    const Commerce = "COMERCIO Y TURISMO";
    const Education = "EDUCACIÓN";
    const Electricity = "ELECTRICIDAD, GAS Y AGUA";
    const Energy = "ENERGÍA";
    const PersonalImage = "IMAGEN PERSONAL";
    const ImageSound = "IMAGEN Y SONIDO";
    const Industrial = "INDUSTRIAL";
    const IndustrialBasic = "INDUSTRIAS METÁLICAS BÁSICAS";
    const Software = "INFORMÁTICA Y SOFTWARE";
    const Milkmaid = "LECHERA";
    const LogisticsTransportation = "LOGÍSTICA Y TRANSPORTE";
    const Manufacturing = "MANUFACTURERA";
    const Maquiladora = "MAQUILADORA";
    const Environment = "MEDIO AMBIENTE";
    const Mining = "MINERÍA";
    const Furniture = "MUEBLERA, MADERA Y SUS PRODUCTOS";
    const Walnut = "NOGALERA";
    const Paper = "PAPEL, IMPRENTA Y EDITORIALES";
    const Fishing = "PESCA Y ACUACULTURA";
    const MetallicProducts = "PRODUCTOS METÁLICOS, MAQUINARÍA Y EQUIPO";
    const Chemistry = "QUÍMICA";
    const Health = "SALUD Y SERVICIOS A LA COMUNIDAD";
    const Tourist = "SERVICIO TURISTICO Y HOSTELEROS";
    const Financialervices = "SERVICIOS FINANCIEROS";
    const Textile = "TEXTIL";
    const Transport = "TRANSPORTE, ALMACENAJE Y COMUNICACIONES";
    const other = "OTRA";
}
